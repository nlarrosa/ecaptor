<div>
    <div id="my-modal" class="modal {{ $modalOpen }}">
        <div class="modal-box">

            <button wire:click="$set('modalOpen', '')" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h1 class="text-gray-900 my-5 text-center font-extrabold text-xl">DETALLE DE PEDIDO </h1>
            <div class="flex flex-col w-full">
                <div class="divider">
                    <h1 class="text-gray-700 mb-5 text-center font-semibols text-lg">N° 45637989 </h1>
                </div> 
            </div>
            @if(!empty($saleProduct))
                <div class="grid grid-cols-2 gap-1 px-5">
                    <div class="font-bold my-2">
                        <span class="text-lg">Cantidad</span>
                    </div>
                    <div class="col-start-4 my-auto text-right"> {{ $saleProduct->quantity }} Unid.</div>
                    <div class="font-bold my-2">
                        <span class="text-lg">Producto</span>
                    </div>
                    <div class="col-start-4  my-auto text-right"> {{ $saleProduct->Product->Line->name }} {{ $saleProduct->Product->Line->design }}</div>
                    <div class="font-bold my-2">
                        <span class="text-lg">Tipo</span>
                    </div>
                    <div class="col-start-4  my-auto text-right"> {{ $saleProduct->Product->Line->type }} </div>
                    <div class="font-bold my-2">
                        <span class="text-lg">Medida</span>
                    </div>
                    <div class="col-start-4  my-auto text-right"> {{ $saleProduct->width }} x {{ $saleProduct->height }} cm.</div>
                    <div class="font-bold my-2">
                        <span class="text-lg">Valor</span>
                    </div>
                    <div class="col-start-4  my-auto text-right text-info"> US$ {{ $saleProduct->total_price }} </div>
                    <div class="font-bold my-2">
                        <span class="text-lg">Valor Borde</span>
                    </div>
                    <div class="col-start-4  my-auto text-right text-info"> US$ {{ $saleProduct->SaleBorderProduct->total_price }} </div>
                    <div class="font-bold my-2">
                        <span class="text-lg">Valor Total</span>
                    </div>
                    <div class="col-start-4  my-auto text-right text-info font-extrabold"> US$ {{ $saleProduct->total_price +  $saleProduct->SaleBorderProduct->total_price}} </div>
                    
                    @if(!empty($saleProduct->saleDesignProduct->type))
                        <div class="font-bold my-2">
                            <span class="text-lg">Archivo</span>
                        </div>
                        <div class="col-start-4  my-auto text-right"> 
                            {{ ($saleProduct->SaleDesignProduct->type == Config::get('ecaptor.design.type.archivo'))
                            ? $saleProduct->SaleDesignProduct->design_content
                            : 'Ver Diseño de Texto' }}
                        </div>
                    @endif
                    <div class="font-bold my-4">
                        <span class="text-lg">Muestra</span>
                    </div>
                    <div class="col-start-4 my-auto">
                        @if($saleSketch)
                            <div class=" font-bold badge badge-lg badge-{{ $saleSketch->StatusSketch->color }}  p-4 float-right border-{{ $saleSketch->StatusSketch->color }}">
                                {{ $saleSketch->StatusSketch->name }}
                            </div> 
                        @else
                            @if(strtoupper($saleProduct->Product->Line->design) != Config::get('ecaptor.design.type.liso'))
                                <div class=" font-bold badge badge-lg badge-primary  p-4 float-right border-primary">SIN ENVIAR</div> 
                            @endif
                        @endif
                    </div>
                </div>
            @endif

            @if(!empty($buttonStatus))
                <div class="pt-10 text-center w-full">
                    <button  class="btn btn-lg w-full bg-{{ $buttonStatus['color'] }} hover:bg-{{ $buttonStatus['color'] }} border-0" {{ $buttonStatus['disabled'] }}>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    {{ $buttonStatus['title'] }}
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
