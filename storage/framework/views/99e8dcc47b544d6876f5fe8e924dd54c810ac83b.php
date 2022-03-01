<div>
<div class="row my-8">
    <div class="grid grid-cols-4">
        <div>
            <img src="<?php echo e(asset('img/logo_color.png')); ?>" alt="logo" class="w-8">
            <div class="text-lg text-gray-800 my-auto font-semibold">TAPETES / ALFOMBRAS</div>
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
<div class="row my-8 rounded-b-md">
    <div class="grid grid-cols-4">
        <div class="form-control col-span-2 my-auto">
            <div class="flex space-x-2">
                <input wire:model="searchWidth"  type="text" placeholder="Buscar Ancho en cm." class="w-full input input-bordered"> 
                <input wire:model="searchHeight" type="text" placeholder="Buscar Alto en cm." class="w-full input input-bordered"> 
                <button wire:click="resetSearch" class="btn bg-neutral p-2" title="Limpiar Busqueda">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="form-control col-span-1 col-start-4 my-auto mx-12">
            <?php if(!empty($customProduct[0]->id)): ?>
                <button wire:click="addCart('<?php echo e($customProduct[0]->id); ?>')"  class="bg-gray-900 p-3 rounded-lg text-white"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-10 h-10 mr-2 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    COTIZAR A MEDIDA
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="overflow-x-auto grid">
        <table class="table w-full">
            <thead>
            </thead> 
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="shadow-sm border">
                    <td>
                        <div class="flex items-center space-x-4">
                            <div class="avatar mx-2">
                                <div class="w-20 h-20 border border-primary">
                                    <div class="grid w-20 h-20 bg-base-300 place-items-center">content</div>
                                </div>
                            </div> 
                            <div>
                                <div class="font-bold text-md opacity-75"><?php echo e($product->name); ?> | <?php echo e($product->Line->design); ?></div> 
                                <div class="text-sm text-primary opacity-90"><?php echo e($product->width); ?> x <?php echo e($product->height); ?> cm.</div>
                                <div class="text-sm opacity-50"><?php echo e(($product->Line->border_include) ? 'Borde Incluido' : ''); ?></div>
                            </div>
                        </div>
                    </td> 
                    <td>
                        <div class="text-sm opacity-50">Precio Sin Imp.</div>
                        <div class="font-semibold text-lg">$ <?php echo e($product->price); ?></div>
                    </td> 
                    <th>
                        <button wire:click="addCart('<?php echo e($product->id); ?>')"  class="btn btn-ghost">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </button>
                    </th>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody> 
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cart.shopping-add-steps')->html();
} elseif ($_instance->childHasBeenRendered('HtufYnT')) {
    $componentId = $_instance->getRenderedChildComponentId('HtufYnT');
    $componentTag = $_instance->getRenderedChildComponentTagName('HtufYnT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HtufYnT');
} else {
    $response = \Livewire\Livewire::mount('cart.shopping-add-steps');
    $html = $response->html();
    $_instance->logRenderedChild('HtufYnT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>;
</div>



<script>

    window.addEventListener('cartStepsModal', event => {
        Livewire.emit('openModalSteps', event.detail.productId);
    });

</script><?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/cart/shopping-add.blade.php ENDPATH**/ ?>