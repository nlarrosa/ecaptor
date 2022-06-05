<div>
    <div id="my-modal" class="modal <?php echo e($modalOpen); ?> modal-bottom sm:modal-middle">
        <div class="modal-box">
            <label wire:click="$set('modalOpen', '')" for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h1 class="text-gray-900 my-5 text-center font-extrabold text-xl md:text-lg">ORDEN DE DISEÑO PEDIDO </h1>
            <?php if(!empty($saleProduct)): ?>
                <div class="grid grid-cols-1">
                    <div class=" grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Cantidad</span>
                        <div class="my-auto text-right"> <?php echo e($saleProduct->quantity); ?> Unid.</div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="font-bold text-md md:text-sm">Producto</span>
                        <div class=" my-auto text-right"> <?php echo e($saleProduct->Product->Line->name); ?> <?php echo e($saleProduct->Product->Line->design); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Tipo</span>
                        <div class=" my-auto text-right"> <?php echo e($saleProduct->Product->Line->type); ?> </div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Medida</span>
                        <div class=" my-auto text-right"> <?php echo e($saleProduct->width); ?> x <?php echo e($saleProduct->height); ?> cm.</div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Formato</span>
                        <div class=" my-auto text-right"> <?php echo e($saleProduct->format); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Borde</span>
                        <div class=" my-auto text-right text-info"><?php echo e($saleProduct->SaleBorderProduct->type); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Borde Lados</span>
                        <div class=" my-auto text-right text-info"><?php echo e($saleProduct->SaleBorderProduct->lados); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Color Base</span>
                        <div class=" my-auto text-sm text-right font-semibold"><?php echo e($baseColors); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Color Logo</span>
                        <div class=" my-auto text-sm text-right font-semibold"><?php echo e($logoColors); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Color Letras</span>
                        <div class=" my-auto text-sm text-right font-semibold"><?php echo e($letrasColors); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-md md:text-sm font-bold">Color Bordes</span>
                        <div class=" my-auto text-sm text-right font-semibold"><?php echo e($bordesColors); ?></div>
                    </div>
                    <?php if($saleProduct->SaleDesignProduct->design_comments): ?>
                        <div class="grid grid-cols-1 py-2 border-b-2">
                            <span class="text-md md:text-sm font-bold">Comentario:</span>
                            <div class=" my-auto text-sm font-semibold"><?php echo e($saleProduct->SaleDesignProduct->design_comments); ?></div>
                        </div>
                    <?php endif; ?>
                    
                </div>
            <?php endif; ?>

            <div class="pt-10 text-center w-full">
                <button wire:click="printPlanilla" class="btn btn-lg w-full bg-neutral-500" <?php echo e(($buttonStatus) ? 'disabled' : ''); ?>>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                      </svg>
                    Imprimir Planilla
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/sale/sale-detail-design.blade.php ENDPATH**/ ?>