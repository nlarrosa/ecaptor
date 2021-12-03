<div class="row my-8">
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
    </div>
</div>
<div class="row">
    <div class="overflow-x-auto grid grid-cols-6 ">
        <div class="grid col-span-4">
            <table class="table w-full">
                <thead>
                </thead> 
                <tbody>
                    @for($i = 1; $i < 5; $i++)
                    <tr class="shadow-sm border">
                        <td>
                            <div class="flex items-center space-x-4">
                                <div class="avatar mx-2">
                                    <div class="w-12 h-12 border border-primary rounded-lg">
                                        <div class="grid w-12 h-12 bg-base-300 place-items-center"></div>
                                    </div>
                                </div> 
                                <div>
                                    <div class="font-bold text-xs opacity-75">TAPETE CAPTOR JET</div> 
                                    <div class="text-sm text-primary opacity-90">60 x 40 cm</div>
                                    <div class="text-sm opacity-50">Transito Pesado</div>
                                    <div class="text-sm opacity-50">Borde Termofundido</div>
                                </div>
                            </div>
                        </td>
                        <td><div class="text-sm font-bold opacity-80">2 U.</div></td>
                        <td><div class="font-semibold text-md">$ 1254.85</div></td>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </td>
                    </tr>
                    @endfor
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
                        <div class="text-sm">SUBTOTAL</div>
                        <div class="text-right">$15.986</div>
                    </div>
                    <div class="grid grid-cols-2 mx-5 my-5">
                        <div class="text-sm">BORDES</div>
                        <div class="text-right">$15.986</div>
                    </div>
                    <div class="grid grid-cols-2 mx-5 my-5">
                        <div class="text-sm">IMPUESTOS</div>
                        <div class="text-right">$15.986</div>
                    </div>
                    <div class="grid grid-cols-2 mx-1 px-5 py-2 rounded-lg my-10 bg-gray-300">
                        <div class="text-gray-900 font-extrabold">TOTAL</div>
                        <div class="text-gray-900 text-right font-extrabold">$15.986</div>
                    </div>
                </table>
            </div>
            <button class="btn btn-neutral p-2 bg-primary mx-10 my-5 hover:bg-primary-focus">HACER PEDIDO</button>
        </div>
    </div>

    <x-modal-sale />

</div>
