<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, []); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-card','data' => []]); ?>
<?php $component->withName('auth-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('logo', null, []); ?> 
            <a href="/">
                <img src="<?php echo e(asset('img/logo_color.png')); ?>" class="w-20 h-20" />
            </a>
         <?php $__env->endSlot(); ?>
        <div class="text-center mb-10">
            <h1 class="text-2xl">- Registro de Usuarios -</h1>
        </div>

        <!-- Validation Errors -->
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <div>
                <input type="text" id="name" name="name" :value="old('name')" required autofocus placeholder="Nombre" class="input input-bordered w-full mb-5">
            </div>
            <div>
                <input type="text" id="lastname" name="lastname" :value="old('lastname')" required autofocus placeholder="Apellido" class="input input-bordered w-full mb-5">
            </div>
            <div>
                <input type="email" id="email" name="email" :value="old('email')" required autofocus placeholder="Email" class="input input-bordered w-full mb-5">
            </div>
            <div>
                <input type="text" id="bussines" name="bussines" :value="old('bussines')" required autofocus placeholder="Empresa" class="input input-bordered w-full mb-5">
            </div>
            <div class="mt-4">
                <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Contraseña / Clave" class="input input-bordered w-full mb-5">
            </div>
            <div class="mt-4">
                <input type="password" id="password_confirmation" name="password_confirmation"  required placeholder="Repetir Contraseña " class="input input-bordered w-full mb-5">
            </div>

            <div class="grid items-center justify-start mt-4  grid-cols-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('login')); ?>">
                    <?php echo e(__('Ya estoy Regiistrado?')); ?>

                </a>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['class' => ' btn-md float-right text-center']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => ' btn-md float-right text-center']); ?>
                    <?php echo e(__('Registrarse')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        </form>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/auth/register.blade.php ENDPATH**/ ?>