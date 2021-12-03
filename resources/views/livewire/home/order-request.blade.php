<div class="card lg:card-side bordered bg-white shadow">
    <div class="card-body">
        <h1 class="font-bold text-lg">Pedidos</h1> 
        <div class="font-sm opacity-50 stat-desc mb-5">Ultimos Pedidos Realizados</div>
        <table class="table w-full table-zebra">
            <thead>
                
            </thead> 
            <tbody>
                @for($i=0; $i <= 4; $i++)
                <tr>
                    <td class="text-sm">20-12-2021</td>
                    <td>
                        <div class="flex items-center space-x-3">
                            <div>
                                <div class="text-sm opacity-75">
                                    Felpudo 90x60cm
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><div class="badge badge-success">Finalizado</div></td>  
                </tr>
                @endfor
            </tbody> 
        </table>
    </div>
</div>
        

