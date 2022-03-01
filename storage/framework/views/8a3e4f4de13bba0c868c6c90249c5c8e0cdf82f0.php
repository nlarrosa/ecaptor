<div id="my-modal" class="modal ">
    <div class="modal-box">

        
        





        

            

            
            

            <h1 class="text-gray-700 my-5 text-center font-extrabold">SELECCIONAR COLORES</h1>
            <div class="row">
                <div class="grid grid-cols-4 gap-1">
                    <div class="avatar my-auto">
                        <div class="w-full h-48 border border-gray-400">
                            <div class="grid w-full h-48 bg-gray-200 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                </svg>
                                <div class="text-sm font-semibold text-gray-500">BASE</div>
                            </div>
                        </div>
                    </div>
                    <div class="avatar my-auto">
                        <div class="w-full h-48 border border-gray-400">
                            <div class="grid w-full h-48 bg-gray-200 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <div class="text-sm font-semibold text-gray-500">LOGO</div>
                            </div>
                        </div>
                    </div>
                    <div class="avatar my-auto">
                        <div class="w-full h-48 border border-gray-400">
                            <div class="grid w-full h-48 bg-gray-200 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                </svg>
                                <div class="text-sm font-semibold text-gray-500">LETRAS</div>
                            </div>
                        </div>
                    </div>
                    <div class="avatar my-auto">
                        <div class="w-full h-48 border border-gray-400">
                            <div class="grid w-full h-48 bg-gray-200 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                </svg>
                                <div class="text-sm font-semibold text-gray-500">BORDES</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="grid grid-cols-8 my-8 gap-x-1 gap-y-1 mx-5">
                    <?php for($i = 1; $i <= 27; $i++): ?>
                    <div data-tip="color_<?php echo e($i); ?>" class="tooltip">
                        <img src="<?php echo e(asset('img/rubercolors/color_'.$i.'.png')); ?>" alt="color_violeta" class="w-10 h-10 rounded-lg">
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </form>
        <div class="mt-6 text-center">
            <a href="" class="btn btn-primary w-full">SIGUIENTE</a> 
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\laravel\ecaptor\resources\views/components/modal-sale.blade.php ENDPATH**/ ?>