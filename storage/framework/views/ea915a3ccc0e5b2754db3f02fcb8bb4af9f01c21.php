<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Ecaptor')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <!-- Scripts -->
        <?php if (isset($component)) { $__componentOriginalee17d11fe42d875797545842a097698785eac27b = $component; } ?>
<?php $component = $__env->getContainer()->make(Asantibanez\LaravelBladeSortable\Components\Scripts::class, []); ?>
<?php $component->withName('laravel-blade-sortable::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee17d11fe42d875797545842a097698785eac27b)): ?>
<?php $component = $__componentOriginalee17d11fe42d875797545842a097698785eac27b; ?>
<?php unset($__componentOriginalee17d11fe42d875797545842a097698785eac27b); ?>
<?php endif; ?>
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

        

        <?php echo \Livewire\Livewire::styles(); ?>


    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <div class="flex-1 flex flex-col overflow-hidden">
                <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 relative">
                    <div class="container mx-auto px-6 py-8">
                        
                        <?php echo e($slot); ?>

                    </div>
                </main>
            </div>
        </div>

        <?php echo \Livewire\Livewire::scripts(); ?>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
        <script src="<?php echo e(asset('js/ecaptor.js')); ?>" defer></script>

        <script>
           

            window.addEventListener('ModalAlertTimer', event => {
                const icon  = event.detail.icon;
                const title = event.detail.title;
                AlertTimer(icon, title);
            });


            window.addEventListener('ModalAlertTimerRedirect', event => {
                const text  = event.detail.text;
                const title = event.detail.title;
                const url   = event.detail.url;
                AlertTimerRedirect(text, title, url);
            });


            window.addEventListener('ModalAlertConfirmCancel', event => {
                const saleId  = event.detail.saleId;
                AlertConfirmCancelSale(saleId);
            });


            window.addEventListener('ModalAlertTimerSketch', event => {
                const icon  = event.detail.icon;
                const title = event.detail.title;
                AlertTimerSketchConfirm(icon, title);
            });


        </script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/layouts/app.blade.php ENDPATH**/ ?>