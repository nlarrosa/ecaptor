<div>
    <div class="row">
        <div class="overflow-x-auto grid grid-cols-5 gap-4">
            <div class="col-span-3 col-start-2">
                <div class="card shadow bg-white">
                    
                    <div class="card-body">
                        <div class="grid grid-cols-12">
                            <div class="col-span-1 my-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-primary opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="col-span-9">
                                <div class="text-lg font-bold">CONFIRMAR MUESTRA!</div> 
                                <div class="text-sm text-gray-400">Aprueba o rechaza la muestra de tu tapete</div>
                            </div>
                            <div class="col-span-2 text-right">
                                
                                <div class="grid w-32 h-10 rounded bg-<?php echo e($saleSketchStatus['color']); ?> text-primary-content place-content-center"><?php echo e($saleSketchStatus['status']); ?></div> 
                            </div>
                        </div>
                        <div class="divider opacity-10"></div> 

                        <div class="avatar m-2 my-auto">
                            <div class="border border-primary w-full">
                                <div class="grid w-full h-full bg-base-300 place-items-center">
                                    <img src="<?php echo e($imagePath); ?>" alt="" >
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 mt-5">
                            <button wire:click="confirmSketch" class="btn bg-success hover:bg-accent-focus p-3 m-4" <?php echo e($btnDisabledConfirm); ?>>APROBAR</button>
                            <button wire:click="rechazarSketch" class="btn bg-error hover:bg-error p-3 m-4" <?php echo e($btnDisabledModify); ?>>MODIFICAR</button>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

        

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/sketch/confirm.blade.php ENDPATH**/ ?>