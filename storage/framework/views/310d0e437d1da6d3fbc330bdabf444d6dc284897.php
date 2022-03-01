<div>
    <div id="my-modal" class="modal <?php echo e($modalOpen); ?>">
        <div class="modal-box">

            <button wire:click="$set('modalOpen', '')" class="float-right">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h1 class="text-gray-900 my-5 text-center font-extrabold text-xl">ORDEN DE DISEÑO PEDIDO </h1>
            <div class="flex flex-col w-full">
                <div class="divider">
                    <h1 class="text-gray-700 mb-5 text-center font-semibols text-lg">N° 45637989 </h1>
                </div> 
            </div>
            <?php if(!empty($saleProduct)): ?>
                <div class="grid grid-cols-1">
                    <div class=" grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Cantidad</span>
                        <div class="my-auto text-right"> <?php echo e($saleProduct->quantity); ?> Unid.</div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="font-bold text-lg">Producto</span>
                        <div class=" my-auto text-right"> <?php echo e($saleProduct->Product->Line->name); ?> <?php echo e($saleProduct->Product->Line->design); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Tipo</span>
                        <div class=" my-auto text-right"> <?php echo e($saleProduct->Product->Line->type); ?> </div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Medida</span>
                        <div class=" my-auto text-right"> <?php echo e($saleProduct->width); ?> x <?php echo e($saleProduct->height); ?> cm.</div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Formato</span>
                        <div class=" my-auto text-right"> <?php echo e($saleProduct->format); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Borde</span>
                        <div class=" my-auto text-right text-info"><?php echo e($saleProduct->SaleBorderProduct->type); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Borde Lados</span>
                        <div class=" my-auto text-right text-info"><?php echo e($saleProduct->SaleBorderProduct->lados); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Color Base</span>
                        <div class=" my-auto text-sm text-right font-semibold"><?php echo e($baseColors); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Color Logo</span>
                        <div class=" my-auto text-sm text-right font-semibold"><?php echo e($logoColors); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Color Letras</span>
                        <div class=" my-auto text-sm text-right font-semibold"><?php echo e($letrasColors); ?></div>
                    </div>
                    <div class="grid grid-cols-2 py-2 border-b-2">
                        <span class="text-lg font-bold">Color Bordes</span>
                        <div class=" my-auto text-sm text-right font-semibold"><?php echo e($bordesColors); ?></div>
                    </div>
                    
                </div>
            <?php endif; ?>

            <div class="pt-10 text-center w-full">
                <button wire:click="printPlanilla" class="btn btn-lg w-full bg-neutral-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                      </svg>
                    Imprimir Planilla
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\ecaptor\resources\views/livewire/sale/sale-detail-design.blade.php ENDPATH**/ ?>