<div>
    <div class="row mb-10">
        <div class="grid grid-cols-6 gap-5">
            <select wire:model="categoryFilter" class="select select-bordered w-full max-w-xs col-span-1">
                <option value="" selected="selected">Todos</option> 
            </select>
            <div class="form-control col-span-2">
                <div class="flex space-x-2">
                    <input wire:model="search" type="text" placeholder="Buscar" class="w-full input input-bordered"> 
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table w-full table-zebra">
            <thead>
                <tr>
                    <th>N°</th> 
                    <th>Fecha</th> 
                    <th>Cliente</th> 
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Importe</th>
                    <th>Responsable</th>
                    <th>Estado</th>
                    <th>Muestra</th>
                    <th></th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($saleProducts as $saleProduct)
                    <tr>
                        <th>{{ $saleProduct->Sale->id }}</th> 
                        <td><div class="text-sm">{{ $saleProduct->Sale->created_at }}</div></td> 
                        <td>{{ $saleProduct->Sale->User->bussines }}</td> 
                        <td>{{ $saleProduct->Sale->User->name }} {{ $saleProduct->Sale->User->last_name }}</td>
                        <td>{{ $saleProduct->Product->Line->name }} - {{ $saleProduct->Product->Line->design }}</td>
                        <td><div class="font-bold">US$ {{ $saleProduct->total_price + $saleProduct->SaleBorderProduct->total_price }}</div></td>
                        <td><div class="font-semibold text-gray-400">{{ $saleProduct->Sale->responsability }}</div></td>
                        <td><div class="badge border-2 border-{{ $saleProduct->Sale->SaleStatus->color }} badge-{{ $saleProduct->Sale->SaleStatus->color }}">{{ $saleProduct->Sale->SaleStatus->name }}</div> </td>
                        <td><div class="badge border-2 border-primary badge-primary">muestra</div></td>
                        <td>
                            <button wire:click="openModalDetail( {{ $saleProduct->id }})" class="btn btn-square btn-sm ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                </svg>
                            </button> 

                            <button wire:click="openModalDetailDesign( {{ $saleProduct->id }})" class="btn btn-square btn-sm btn-info">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                            </button> 

                            @if($saleProduct->Sale->SaleStatus->id != Config::get('ecaptor.saleStatus.finalizado'))

                                @if($saleProduct->Sale->SaleStatus->id != Config::get('ecaptor.saleStatus.anulado'))

                                    @if(!empty($saleProduct->SaleDesignProduct->type))
                                        <button wire:click="downloadLogoFile( {{ $saleProduct->id }} )" class="btn btn-square btn-sm btn-success">
                                            @if($saleProduct->SaleDesignProduct->type == Config::get('ecaptor.design.type.archivo'))
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            @endif
                                        </button> 

                                        <button  wire:click="openModalSketchUpload( {{ $saleProduct->id }})" class="btn btn-square btn-sm btn-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                        </button> 
                                    @endif 
                                    
                                @endif

                                <button wire:click="openModalConfirmCancel( {{ $saleProduct->Sale->id }} )" class="btn btn-square btn-sm btn-error">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button> 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-8">
            {{ $saleProducts->links() }}
        </div>
    </div>
    @livewire('sale.sale-detail')
    @livewire('sale.sale-detail-design')
    @livewire('sketch.upload-sketch')
</div>


<script>

    window.addEventListener('openModalSaleDetail', event => {
        Livewire.emit('openModalDetail', event.detail.saleProductId);
    });

    window.addEventListener('openModalSaleDesign', event => {
        Livewire.emit('openModalDetailDesign', event.detail.saleProductId);
    });

    window.addEventListener('openModalSendSketch', event => {
        Livewire.emit('openModalUploadSendSketch', event.detail.saleProductId);
    });

    window.addEventListener('statusSale', event => {
        Livewire.emit('updateStatusSale');
    });

    window.addEventListener('responsability', event => {
        Livewire.emit('updateResponsability');
    });


</script>

