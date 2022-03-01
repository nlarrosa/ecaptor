<div>
    <div class="row mb-10">
        <div class="grid grid-cols-6 gap-5">
            <select wire:model="categoryFilter" class="select select-bordered w-full max-w-xs col-span-1">
                <option value="" selected="selected">Todos</option> 
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value=<?php echo e($category->id); ?>><?php echo e($category->name); ?></option> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="form-control col-span-2">
                <div class="flex space-x-2">
                    <input wire:model="search" type="text" placeholder="Buscar" class="w-full input input-bordered"> 
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="grid grid-cols-2 gap-6">
            <?php $__currentLoopData = $lines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div key=<?php echo e($line->id); ?> class="card shadow-2xl lg:card-side bg-white text-primary-content">
                <div class="card-body">
                    <a href="<?php echo e(route('cart.add', ['id' => $line->id])); ?>">
                        <div class="grid grid-cols-2">
                            <div class="indicator">
                                <div class="indicator-item indicator-bottom indicator-center badge badge-outline font-bold">New</div> 
                                <img src="" alt="Image Lines Captor" class="h-36 w-48 border p-4">
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 text-lg"><?php echo e($line->name); ?> | <?php echo e($line->design); ?></div>
                                <div class="font-semibold text-primary text-md mb-10"><?php echo e($line->type); ?></div>
                                
                                <button class="btn btn-gray-900 btn-sm mt-5">COMPRAR</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/products/lines.blade.php ENDPATH**/ ?>