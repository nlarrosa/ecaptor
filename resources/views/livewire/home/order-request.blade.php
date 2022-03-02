<div>
    <div class="card lg:card-side bordered bg-white shadow">
        <div class="card-body">

            <div class="grid grid-cols-12">
                <div class="col-span-1 my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div class="col-span-9">
                    <div class="text-lg font-bold">PEDIDOS</div> 
                    <div class="text-sm text-gray-400">Ultimos Pedidos Realizados</div>
                </div>
                {{-- <div class="col-span-2 text-right">
                    <button class="btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div> --}}
            </div>
            <div class="divider opacity-10"></div> 

            <table class="table w-full table-zebra">
                <thead>
                    
                </thead> 
                <tbody>
                    @foreach($orders as $order)
                        @foreach ($order->SaleProducts as $saleProduct )
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                <div>
                                    <div class="text-md opacity-75">
                                            {{ $saleProduct->Product->name }} 
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $saleProduct->width }} x {{ $saleProduct->width }} cm.</td>
                            <td>{{ $saleProduct->Product->Line->design }}</td>
                            <td>
                                <div class=" float-right badge badge-{{ $order->SaleStatus->color }}  border-{{ $order->SaleStatus->color }}">{{ $order->SaleStatus->name }}</div>
                            </td> 
                            <td>
                                <button class="btn btn-square btn-outline btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                    </svg>
                                </button>
                            </td> 
                        </tr>
                        @endforeach
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>
        

