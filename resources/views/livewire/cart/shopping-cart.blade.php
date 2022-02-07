<div>
<div class="row my-5">
    <div class="grid grid-cols-3">
        <div>
            <img src="{{ asset('img/logo_color.png') }}" alt="logo" class="w-8">
            <div class="text-lg text-gray-800 my-auto font-semibold">PEDIDO A REALIZAR</div>
            <div class="text-sm breadcrumbs">
                <ul>
                    <li><a>Home</a></li> 
                    <li><a>Documents</a></li> 
                    <li>Add Document</li>
                </ul>
            </div>
        </div>
        <div class="text-right col-start-3">
            <button wire:click="goToLines" class="btn btn-md btn-accent">
                AGREGAR PRODUCTOS    
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button> 
        </div>
    </div>
</div>
<div class="row">
    @if(!empty($cart))

        <div class="grid grid-cols-6 ">
            <div class="grid col-span-4 overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <th class="text-left"></th>
                        <th class="text-left">Precio</th>
                        <th class="text-left">Borde</th>
                        <th class="text-left">Total</th>
                        <th></th>
                    </thead> 
                    <tbody>
                        @foreach($cart as $productId => $data)
                        <tr class="shadow-sm">
                            <td>
                                <div class="flex items-center space-x-4 ml-5">
                                    {{-- <div class="avatar mx-2">
                                        <div class="w-12 h-12 border border-primary rounded-lg">
                                            <div class="grid w-12 h-12 bg-base-300 place-items-center"></div>
                                        </div>
                                    </div>  --}}
                                    <div>
                                        <div class="font-bold text-sm opacity-75">{{ strtoupper($data[0]['product']['name']) . ' ' .strtoupper($data[0]['product']['design'])   }}</div> 
                                        <div class="text-sm text-primary opacity-90 font-semibold">{{ $data[0]['product']['width'] . ' x ' . $data[0]['product']['height'] }}cm</div>
                                        <div class="text-sm opacity-60">{{ $data[0]['product']['line'] }}</div>
                                        <div class="text-xs opacity-70 font-semibold">{{ $data[0]['formato']  }}</div>
                                        <div class="text-xs opacity-90 my-2 badge badge-outline {{ ($data[0]['bordes']['tipo']) ? ' badge-accent' : ''}}"> {{ ($data[0]['bordes']['tipo']) ? $data[0]['bordes']['tipo'] :  'SIN BORDE'}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-xs font-bold opacity-80">{{ $data[0]['cantidad'].' unid.' }}</div>
                                <div class="font-semibold text-md">$ {{ $data[0]['product']['priceTotal']  }}</div>
                            </td>
                            <td>
                                <div class="text-gray-5 text-sm"> cant. {{ $data[0]['bordes']['cant']  }}</div>
                                <div class="font-semibold text-md">$ {{ $data[0]['bordes']['totalPrice']  }}</div>
                            </td>
                            <td><div class="font-semibold text-md">$ {{ $data[0]['product']['priceTotal'] + $data[0]['bordes']['totalPrice']  }}</div></td>
                            <td>
                                <button wire:click="deleteItemCart('{{ $productId }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> 
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <div class="grid col-span-2 p-4 shadow-md bg-gray-300">
                <div class="">
                    <div class="text-neutral font-black text-lg my-3 py-2 px-6 ">DETALLE DE PAGO</div>
                    <hr class="border-gray-400 mb-5">
                    <table>
                        <div class="grid grid-cols-2 mx-5 my-5">
                            <div class="text-sm font-semibold">SUBTOTAL</div>
                            <div wire:model="subtotal" class="text-right font-semibold">${{ $subtotal }}</div>
                        </div>
                        <div class="grid grid-cols-2 mx-5 my-5">
                            <div class="text-sm font-semibold">BORDES</div>
                            <div wire:model="totalBordes" class="text-right font-semibold">${{ $totalBordes }}</div>
                        </div>
                        <div class="grid grid-cols-2 mx-5 my-5">
                            <div class="text-sm font-semibold">IMPUESTOS</div>
                            <div wire:model="impuestos" class="text-right font-semibold">${{ $impuestos }}</div>
                        </div>
                        <div class="grid grid-cols-2 mx-1 px-5 py-2 rounded-lg my-10 bg-gray-300">
                            <div class=" text-lg text-gray-900 font-extrabold">TOTAL</div>
                            <div wire:model="total" class=" text-lg text-gray-900 text-right font-extrabold">${{ $total }}</div>
                        </div>
                    </table>
                </div>
                <button wire:click="createSale" class=" btn btn-neutral p-2 bg-primary mx-10 my-10 hover:bg-primary-focus">HACER PEDIDO</button>
            </div>
        </div>
    @else
        @livewire('ui.alert', ['message' => 'No tiene productos agregados al carrito.', 'status' => 'info'])
    @endif    
    <x-modal-sale />

</div>
</div>
