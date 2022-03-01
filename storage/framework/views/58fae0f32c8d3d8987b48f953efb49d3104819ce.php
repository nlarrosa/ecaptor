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
                
            </div>
            <div class="divider opacity-10"></div> 

            <table class="table w-full table-zebra">
                <thead>
                    
                </thead> 
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-sm"><?php echo e($order->created_at); ?></td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <div class="text-sm opacity-75">
                                        
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class=" float-right badge badge-<?php echo e($order->SaleStatus->color); ?>  border-<?php echo e($order->SaleStatus->color); ?>"><?php echo e($order->SaleStatus->name); ?></div>
                        </td>  
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody> 
            </table>
        </div>
    </div>
</div>
        

<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/home/order-request.blade.php ENDPATH**/ ?>