<div>
<div class="row my-5">
    <div class="grid grid-cols-3">
        <div>
            <img src="<?php echo e(asset('img/logo_color.png')); ?>" alt="logo" class="w-8">
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
    <?php if(!empty($cart)): ?>

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
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productId => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="shadow-sm">
                            <td>
                                <div class="flex items-center space-x-4 ml-5">
                                    
                                    <div>
                                        <div class="font-bold text-sm opacity-75"><?php echo e(strtoupper($data[0]['product']['name']) . ' ' .strtoupper($data[0]['product']['design'])); ?></div> 
                                        <div class="text-sm text-primary opacity-90 font-semibold"><?php echo e($data[0]['product']['width'] . ' x ' . $data[0]['product']['height']); ?>cm</div>
                                        <div class="text-sm opacity-60"><?php echo e($data[0]['product']['line']); ?></div>
                                        <div class="text-xs opacity-70 font-semibold"><?php echo e($data[0]['formato']); ?></div>
                                        <div class="text-xs opacity-90 my-2 badge badge-outline <?php echo e(($data[0]['bordes']['tipo']) ? ' badge-accent' : ''); ?>"> <?php echo e(($data[0]['bordes']['tipo']) ? $data[0]['bordes']['tipo'] :  'SIN BORDE'); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-xs font-bold opacity-80"><?php echo e($data[0]['cantidad'].' unid.'); ?></div>
                                <div class="font-semibold text-md"><span class="text-sm">USD</span> $<?php echo e($data[0]['product']['priceTotal']); ?></div>
                            </td>
                            <td>
                                <div class="text-gray-5 text-sm"> cant. <?php echo e($data[0]['bordes']['cant']); ?></div>
                                <div class="font-semibold text-md"><span class="text-sm">USD</span> $<?php echo e($data[0]['bordes']['totalPrice']); ?></div>
                            </td>
                            <td><div class="font-semibold text-md"><span class="text-sm">USD</span> $<?php echo e($data[0]['product']['priceTotal'] + $data[0]['bordes']['totalPrice']); ?></div></td>
                            <td>
                                <button wire:click="deleteItemCart('<?php echo e($productId); ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <div wire:model="subtotal" class="text-right font-semibold"><span class="text-sm">USD</span> $<?php echo e($subtotal); ?></div>
                        </div>
                        <div class="grid grid-cols-2 mx-5 my-5">
                            <div class="text-sm font-semibold">BORDES</div>
                            <div wire:model="totalBordes" class="text-right font-semibold"> <span class="text-sm">USD</span> $<?php echo e($totalBordes); ?></div>
                        </div>
                        <div class="grid grid-cols-2 mx-5 my-5">
                            <div class="text-sm font-semibold">IMPUESTOS</div>
                            <div wire:model="impuestos" class="text-right font-semibold"><span class="text-sm">USD</span> $<?php echo e($impuestos); ?></div>
                        </div>
                        <div class="grid grid-cols-2 mx-1 px-5 py-2 rounded-lg my-10 bg-gray-300">
                            <div class=" text-lg text-gray-900 font-extrabold">TOTAL</div>
                            <div wire:model="total" class=" text-lg text-gray-900 text-right font-extrabold"><span class="text-sm">USD</span> $<?php echo e($total); ?></div>
                        </div>
                    </table>
                </div>
                <button wire:click="createSale" class=" btn btn-neutral p-2 bg-primary mx-10 my-10 hover:bg-primary-focus">HACER PEDIDO</button>
            </div>
        </div>
    <?php else: ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.alert', ['message' => 'No tiene productos agregados al carrito.', 'status' => 'info'])->html();
} elseif ($_instance->childHasBeenRendered('S2h71O8')) {
    $componentId = $_instance->getRenderedChildComponentId('S2h71O8');
    $componentTag = $_instance->getRenderedChildComponentTagName('S2h71O8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('S2h71O8');
} else {
    $response = \Livewire\Livewire::mount('ui.alert', ['message' => 'No tiene productos agregados al carrito.', 'status' => 'info']);
    $html = $response->html();
    $_instance->logRenderedChild('S2h71O8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>    
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modal-sale','data' => []]); ?>
<?php $component->withName('modal-sale'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

</div>
</div>
<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/cart/shopping-cart.blade.php ENDPATH**/ ?>