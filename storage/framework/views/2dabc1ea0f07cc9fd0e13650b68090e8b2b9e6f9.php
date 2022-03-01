<div>
    <div>
        <div class="mt-4">
            <div class="relative">
                <h2 class="text-xl font-semibold text-gray-700 leading-tight">Importar Productos</h2>
                <div class=" mx-1 my-3 w-full">
                    <form wire:submit.prevent="uploadProductFile">
                        <div class="grid grid-cols-2">
                            <input wire.loading.remove wire:model="fileProduct" type="file" />
                        </div>
                        <?php $__errorArgs = ['fileProduct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm error"></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="mt-5">
                            <button type="submit" class="px-3 py-1 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">SAVE</button>
                        </div>
                    </form>
                    <div wire:loading class="flex justify-center items-center mt-3 absolute">
                        <div class="animate-spin rounded-full h-14 w-14 border-b-2 border-gray-900"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 my-20 overflow-x-auto">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-10 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Categoria</th>
                        <th class="px-10 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Linea</th>
                        <th class="px-10 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Producto</th>
                        <th class="px-10 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Transito</th>
                        <th class="px-10 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tipo</th>
                        <th class="px-10 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Medida</th>
                        <th class="px-10 py-3 border-b-2   border-gray-200   bg-gray-100 text-left text-xs font-semibold   text-gray-600 uppercase tracking-wider">Precio</th>
                        <th class="px-10 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Sugerido</th>
                        <th class="px-10 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if($productsUploads): ?>
                    <?php $__currentLoopData = $productsUploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="px-10 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap"><?php echo e($product->category); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap"><?php echo e($product->name_line); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap"><?php echo e($product->name_product); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap"><?php echo e($product->type_transit); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap"><?php echo e($product->type_medida); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap"><?php echo e($product->width); ?> x <?php echo e($product->height); ?> cm.</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">$<?php echo e($product->price); ?> usd</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-10 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">$<?php echo e($product->price_suggest); ?> usd</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm align-middle text-center">
                            <button   class="px-1 py-1 bg-blue-900 rounded-md text-white font-medium tracking-wide hover:bg-blue-700">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
 
                </tbody>
            </table>
            <div class="bg-white px-10 py-8">
                
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\laravel\ecaptor\resources\views/livewire/products/upload-product.blade.php ENDPATH**/ ?>