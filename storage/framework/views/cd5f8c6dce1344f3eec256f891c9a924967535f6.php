<div>
    <div id="my-modal" class="modal <?php echo e($modalOpen); ?>">
        <div class="modal-box relative">
            <label wire:click="$set('modalOpen', '')" for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h1 class="text-gray-900 my-5 text-center font-extrabold text-xl">DETALLE DE PEDIDO </h1>
            <div class="flex flex-col w-full">
                <div class="divider">
                    <h1 class="text-gray-700 mb-5 text-center font-semibols text-lg">N° 45637989 </h1>
                </div> 
            </div>
            <?php if(!empty($saleProduct)): ?>
                <div class="grid grid-cols-2 gap-1 px-5">
                    <div class="font-bold my-2">
                        <span class="text-lg md:text-sm">Cantidad</span>
                    </div>
                    <div class="col-start-4 my-auto text-right"> <?php echo e($saleProduct->quantity); ?> Unid.</div>
                    <div class="font-bold my-2">
                        <span class="text-lg md:text-sm">Producto</span>
                    </div>
                    <div class="col-start-4  my-auto text-right"> <?php echo e($saleProduct->Product->Line->name); ?> <?php echo e($saleProduct->Product->Line->design); ?></div>
                    <div class="font-bold my-2">
                        <span class="text-lg md:text-sm">Tipo</span>
                    </div>
                    <div class="col-start-4  my-auto text-right"> <?php echo e($saleProduct->Product->Line->type); ?> </div>
                    <div class="font-bold my-2">
                        <span class="text-lg md:text-sm">Medida</span>
                    </div>
                    <div class="col-start-4  my-auto text-right"> <?php echo e($saleProduct->width); ?> x <?php echo e($saleProduct->height); ?> cm.</div>
                    <div class="font-bold my-2">
                        <span class="text-lg md:text-sm">Valor</span>
                    </div>
                    <div class="col-start-4  my-auto text-right text-info"> US$ <?php echo e($saleProduct->total_price); ?> </div>
                    <div class="font-bold my-2">
                        <span class="text-lg md:text-sm">Valor Borde</span>
                    </div>
                    <div class="col-start-4  my-auto text-right text-info"> US$ <?php echo e($saleProduct->SaleBorderProduct->total_price); ?> </div>
                    <div class="font-bold my-2">
                        <span class="text-lg md:text-sm">Valor Total</span>
                    </div>
                    <div class="col-start-4  my-auto text-right text-info font-extrabold"> US$ <?php echo e($saleProduct->total_price +  $saleProduct->SaleBorderProduct->total_price); ?> </div>
                    
                    <?php if(!empty($saleProduct->saleDesignProduct->type)): ?>
                        <div class="font-bold my-2">
                            <span class="text-lg md:text-sm">Archivo</span>
                        </div>
                        <div class="col-start-4  my-auto text-right"> 
                            <?php echo e(($saleProduct->SaleDesignProduct->type == Config::get('ecaptor.design.type.archivo'))
                            ? $saleProduct->SaleDesignProduct->design_content
                            : 'Ver Diseño de Texto'); ?>

                        </div>
                    <?php endif; ?>
                    <div class="font-bold my-4">
                        <span class="text-lg">Muestra</span>
                    </div>
                    <div class="col-start-4 my-auto">
                        <?php if($saleSketch): ?>
                            <div class=" font-bold badge badge-lg badge-<?php echo e($saleSketch->StatusSketch->color); ?>  p-4 float-right border-<?php echo e($saleSketch->StatusSketch->color); ?>">
                                <?php echo e($saleSketch->StatusSketch->name); ?>

                            </div> 
                        <?php else: ?>
                            <?php if(strtoupper($saleProduct->Product->Line->design) != Config::get('ecaptor.design.type.liso')): ?>
                                <div class=" font-bold badge badge-lg badge-primary  p-4 float-right border-primary">SIN ENVIAR</div> 
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!empty($buttonStatus)): ?>
                <div class="pt-10 text-center w-full">
                    <button wire:click="$emitUp( 'updateStatus', '<?php echo e($saleProduct->Sale->id); ?>' , '<?php echo e($buttonStatus['action']); ?>', '<?php echo e($saleProduct->id); ?>' )" class="btn btn-lg w-full bg-<?php echo e($buttonStatus['color']); ?> hover:bg-<?php echo e($buttonStatus['color']); ?> border-0" <?php echo e($buttonStatus['disabled']); ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    <?php echo e($buttonStatus['title']); ?>

                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/sale/sale-detail.blade.php ENDPATH**/ ?>