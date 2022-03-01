<div>
    <div id="my-modal" class="modal <?php echo e($modalOpen); ?>">
        <div class="modal-box px-10">

            <h1 class="text-gray-900 my-5 text-center font-extrabold text-xl">AGREGAR PRODUCTO</h1>
            
            <?php if($step == 1): ?>
            <form wire:submit.prevent="cartSetting">
                <div class="form-control grid grid-cols-1 w-full">
                    <label class="label"><span class="label-text font-semibold">Cantidad</span></label>
                    <input wire:model="cantidad" type="number" min="1" max="500" value="1" class="input input-primary">
                </div>

                <div class="text-center grid grid-cols-1 w-full my-4">
                    <label class="label"><span class="label-text font-semibold">Formato</span></label>
                    <select wire:model="formato" class="select select-bordered  text-gray-500">
                        <?php if($arrFormato): ?>
                            <?php $__currentLoopData = $arrFormato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $format): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($format->type); ?>"><?php echo e($format->type); ?></option> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                
                <?php if($typeProduct == Config::get('ecaptor.product.type.medida')): ?>

                
                    <?php if(($formato == Config::get('ecaptor.tapetes.formato.apaisado')) || ($formato == Config::get('ecaptor.tapetes.formato.camino'))): ?>
                        <div class="text-center grid grid-cols-2 w-full my-6 gap-5">
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Ancho</span></label> 
                                <input wire:model="width" type="text" placeholder="Ancho en cm." class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Alto</span></label>
                                <input wire:model="height" type="text" placeholder="Alto en cm." class="input input-bordered">
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(($formato == Config::get('ecaptor.tapetes.formato.asimetrico'))): ?>
                        <div class="text-center grid grid-cols-2 w-full my-6 gap-5">
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Ancho  - (Izquierda)</span></label> 
                                <input wire:model="widthLeft" type="text" placeholder="Ancho en cm." class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Ancho  - (Derecha)</span></label>
                                <input wire:model="widthRight" type="text" placeholder="Ancho en cm." class="input input-bordered">
                            </div>
                        </div>
                        <div class="text-center grid grid-cols-2 w-full my-6 gap-5">
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Alto  - (Cabecera)</span></label>
                                <input wire:model="heightHeader" type="text" placeholder="Alto en cm." class="input input-bordered">
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Alto  - (Pie)</span></label>
                                <input wire:model="heightFoot" type="text" placeholder="Alto en cm." class="input input-bordered">
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(($formato == Config::get('ecaptor.tapetes.formato.redondo'))): ?>
                        <div class="text-center grid grid-cols-1 w-full my-6 gap-5">
                            <div class="form-control">
                                <label class="label"><span class="label-text font-semibold">Diametro</span></label>
                                <input wire:model="diametro" type="text" placeholder="Diametro en cm." class="input input-bordered">
                            </div>
                        </div>
                        <?php $__errorArgs = ['diametro'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error'])->html();
} elseif ($_instance->childHasBeenRendered('2Qw9DZJ')) {
    $componentId = $_instance->getRenderedChildComponentId('2Qw9DZJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('2Qw9DZJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2Qw9DZJ');
} else {
    $response = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error']);
    $html = $response->html();
    $_instance->logRenderedChild('2Qw9DZJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php endif; ?>
                <?php endif; ?>
                
                <div class="mt-8 text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button type="submit"  class="btn btn-primary w-full"><?php echo e($buttonName); ?></button> 
                </div>
            </form>
            <?php endif; ?>
            

            
            <?php if($step == 2): ?>
            <h1 class="divider text-gray-400 mb-12 text-center font-semibold">BORDES DEL TAPETE</h1>
            <form wire:submit.prevent="cartSetting">
                <div class="grid grid-cols-2 gap-6">
                    <div class="avatar  my-auto">
                        <div class="w-48 h-48  <?php echo e($borderRounded); ?> ">
                            <div class="grid w-48 h-48 bg-base-300 mx-auto my-auto place-items-center <?php echo e($borderCss); ?> <?php echo e($borderRounded); ?> ">
                                <?php echo e((!empty($borderLados) ? $borderLados : 'SIN BORDES')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="my-auto">
                        <div class="form-control ">
                            <label class="label"><span class="label-text font-semibold">Tapetes con Borde</span></label>
                            <select wire:model="border" class="select select-bordered  text-gray-500">
                                <option value="">NINGUNO</option>
                                <?php for($i = 1; $i <= $cantidad; $i++): ?> 
                                    <option><?php echo e($i); ?></option> 
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-control  mt-4">
                            <select wire:model="borderType" 
                                class="select select-bordered  text-gray-500" 
                                <?php echo e(($border < 1 ) ? 'disabled': ''); ?>>

                                <option value="" disabled="disabled" >--- TIPO DE BORDE ---</option> 
                                <option value="TERMOFUNDIDO">TERMOFUNDIDO</option> 
                                <option value="ANTITROPIEZO">ANTITROPIEZO</option> 
                            </select>
                        </div>
                        <div class="form-control  mt-4">
                            <select wire:model="borderLados" 
                                class="select select-bordered  text-gray-500" 
                                <?php echo e(($borderType == 'ANTITROPIEZO' ) ? '': 'disabled'); ?>>

                                <option value="" disabled="disabled">--- UBICACION ---</option> 
                                <option value="COMPLETOS">COMPLETOS</option> 
                                <option value="CABECERA">CABECERA</option> 
                                <option value="PIE">PIE</option> 
                                <option value="CABECERA-PIE">CABECERA / PIE</option> 
                                <option value="IZQUIERDA-DERECHA">IZQUIERDA / DERECHA</option>
                            </select>
                        </div>
                    </div>
                </div>

                <?php $__errorArgs = ['borderType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error'])->html();
} elseif ($_instance->childHasBeenRendered('Qwsld5u')) {
    $componentId = $_instance->getRenderedChildComponentId('Qwsld5u');
    $componentTag = $_instance->getRenderedChildComponentTagName('Qwsld5u');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Qwsld5u');
} else {
    $response = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error']);
    $html = $response->html();
    $_instance->logRenderedChild('Qwsld5u', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <?php $__errorArgs = ['borderLados'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error'])->html();
} elseif ($_instance->childHasBeenRendered('ECGC4xy')) {
    $componentId = $_instance->getRenderedChildComponentId('ECGC4xy');
    $componentTag = $_instance->getRenderedChildComponentTagName('ECGC4xy');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ECGC4xy');
} else {
    $response = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error']);
    $html = $response->html();
    $_instance->logRenderedChild('ECGC4xy', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="mt-8 text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button type="submit"  class="btn btn-primary w-full"><?php echo e($buttonName); ?></button> 
                </div>
            </form>
            <?php endif; ?>
            

            
            <?php if($step == 3): ?>
            <h1 class="divider text-gray-400 mb-12 text-center font-semibold">ARCHIVO O DISEÑO DE TEXTO</h1>
            <form wire:submit.prevent="cartSetting">
                <select wire:model="typeLogo" class="select select-bordered w-full mb-5">
                    <option value="File" >Subir Archivo</option> 
                    <option value="Texto">Diseño de Texto</option> 
                </select>

                <?php if($typeLogo == 'Texto'): ?>
                    <div class="grid grid-cols-1 mt-5 mb-10">
                        <div class="my-auto">
                            <div class="form-control w-full border">
                                <textarea wire:model="textLogo" class="text-center textarea h-32 bg-gray-100 border-2 text-lg border-gray-700" placeholder="Tu Texto del diseño aqui..."></textarea>
                            </div>
                        </div>
                        <?php $__errorArgs = ['textLogo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error'])->html();
} elseif ($_instance->childHasBeenRendered('Cslfz8e')) {
    $componentId = $_instance->getRenderedChildComponentId('Cslfz8e');
    $componentTag = $_instance->getRenderedChildComponentTagName('Cslfz8e');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Cslfz8e');
} else {
    $response = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error']);
    $html = $response->html();
    $_instance->logRenderedChild('Cslfz8e', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="divider text-gray-700 my-8 text-center font-extrabold">COMENTARIO SOBRE EL DISEÑO</div>
                    <div class="grid grid-cols-1 mt-5 mb-10">
                        <div class="my-auto">
                            <div class="form-control w-full border">
                                <textarea wire:model="comentLogo" class="textarea text-center h-24 border-2 border-gray-300 text-md" placeholder="Tu comentario del diseño aqui..."></textarea>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($typeLogo == 'File'): ?>
                    <div class="bg-white mt-5 mb-10">
                        <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                            <div class="md:flex">
                                <div class="w-full">
                                    <div class="relative border-dotted h-24 rounded-lg border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                        <div class="absolute">
                                            <div class="flex flex-col items-center"> <i class="fa fa-folder-open fa-4x text-blue-700"></i> <span class="block text-gray-400 font-normal">Subir tu Archivo - Click Aqui</span> </div>
                                        </div> 
                                        <input wire:model="logo" type="file" class="h-full w-full opacity-0" name="">
                                    </div>
                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error'])->html();
} elseif ($_instance->childHasBeenRendered('NsNWXD2')) {
    $componentId = $_instance->getRenderedChildComponentId('NsNWXD2');
    $componentTag = $_instance->getRenderedChildComponentTagName('NsNWXD2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NsNWXD2');
} else {
    $response = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error']);
    $html = $response->html();
    $_instance->logRenderedChild('NsNWXD2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="mb-10">
                    <?php if(!empty($msgFileUpload)): ?>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $msgFileUpload, 'status' => 'success'])->html();
} elseif ($_instance->childHasBeenRendered('Y16coDZ')) {
    $componentId = $_instance->getRenderedChildComponentId('Y16coDZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('Y16coDZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Y16coDZ');
} else {
    $response = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $msgFileUpload, 'status' => 'success']);
    $html = $response->html();
    $_instance->logRenderedChild('Y16coDZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                     <?php endif; ?>
                </div>
                <div wire:loading wire:target="logo" class="mt-8 mb-12 ml-52">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.loading')->html();
} elseif ($_instance->childHasBeenRendered('zfBeD5g')) {
    $componentId = $_instance->getRenderedChildComponentId('zfBeD5g');
    $componentTag = $_instance->getRenderedChildComponentTagName('zfBeD5g');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zfBeD5g');
} else {
    $response = \Livewire\Livewire::mount('ui.loading');
    $html = $response->html();
    $_instance->logRenderedChild('zfBeD5g', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button <?php echo e($buttonStatus); ?>  type="submit" class="btn btn-primary w-full"><?php echo e($buttonName); ?></button> 
                </div>
            </form>
            <?php endif; ?>
            

            
            <?php if($step == 4): ?>
            <form wire:submit.prevent="cartSetting">
                <h1 class="divider text-gray-400 mb-12 text-center font-semibold">COLOR DE LA BASE</h1>
                <div class="row">
                    <div class="grid grid-cols-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-48 border-gray-400 border">
                                <div class="grid w-full h-48 bg-gray-100 place-items-center cursor-pointer" id="base">
                                    <div class="text-gray-300 font-bold relative text-center text-4xl">BASE</div>
                                    <div class="grid grid-cols-5 my-8 gap-x-3 gap-y-2 mx-7 justify-center absolute" id="baseColor">
                                        <?php if($arrColorBase): ?>
                                            <?php $__currentLoopData = $arrColorBase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <div  wire:click="deleteColor('base', <?php echo e($i); ?>)" class="indicator">
                                                <div class="indicator-item indicator-middle indicator-center badge badge-neutral opacity-30 hover:opacity-90 font-bold w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div> 
                                                <div class="w-16 h-16 text-center">
                                                    <img  src="<?php echo e(asset('img/rubercolors/color_'.$i.'.png')); ?>" alt="color_violeta" class="w-10 h-10 rounded-lg">
                                                    <input type="hidden" wire:model="arrColorBase.base." value="<?php echo e($i); ?>">
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['arrColorBase'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error'])->html();
} elseif ($_instance->childHasBeenRendered('ZRwQqGm')) {
    $componentId = $_instance->getRenderedChildComponentId('ZRwQqGm');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZRwQqGm');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZRwQqGm');
} else {
    $response = \Livewire\Livewire::mount('ui.alert', [ 'message' =>  $message, 'status' => 'error']);
    $html = $response->html();
    $_instance->logRenderedChild('ZRwQqGm', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        |   </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        <?php $__currentLoopData = $arrColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div data-tip="<?php echo e($color->name); ?>" class="tooltip cursor-pointer">
                                <img wire:click="selectedColor( 'base',  <?php echo e($color->code); ?> , '<?php echo e($color->name); ?>'  )" src="<?php echo e(asset('img/rubercolors/color_'.$color->code.'.png')); ?>" alt="color_violeta" class="w-12 h-12 rounded-full">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button  type="submit" class="btn btn-primary w-full"><?php echo e($buttonName); ?></button> 
                </div>
            </form>
            <?php endif; ?>
            

            
            <?php if($step == 5): ?>
            <form wire:submit.prevent="cartSetting">
                <h1 class="divider text-gray-400 mb-12 text-center font-semibold">COLORES DEL LOGO</h1>
                <div class="row">
                    <div class="grid grid-cols-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-48 border-gray-400 border">
                                <div class="grid w-full h-48 bg-gray-100 place-items-center cursor-pointer">
                                    <div class="text-gray-300 font-bold relative text-center text-4xl">LOGO</div>
                                    <div class="grid grid-cols-5 my-8 gap-x-3 gap-y-2 mx-7 justify-center absolute" id="baseColor">
                                        <?php if($arrColorLogo): ?>
                                            <?php $__currentLoopData = $arrColorLogo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <div  wire:click="deleteColor('logo', <?php echo e($i); ?>)" class="indicator">
                                                <div class="indicator-item indicator-middle indicator-center badge badge-neutral opacity-30 hover:opacity-90 font-bold w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div> 
                                                <div class="w-16 h-16 text-center">
                                                    <img  src="<?php echo e(asset('img/rubercolors/color_'.$i.'.png')); ?>" alt="color_violeta" class="w-10 h-10 rounded-lg">
                                                    <input type="hidden" wire:model="arrColorLogo.Logo." value="<?php echo e($i); ?>">
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        |   </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        <?php $__currentLoopData = $arrColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div data-tip="<?php echo e($color->name); ?>" class="tooltip cursor-pointer">
                                <img wire:click="selectedColor( 'logo',  <?php echo e($color->code); ?> , '<?php echo e($color->name); ?>'  )" src="<?php echo e(asset('img/rubercolors/color_'.$color->code.'.png')); ?>" alt="color_violeta" class="w-12 h-12 rounded-full">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button  type="submit" class="btn btn-primary w-full"><?php echo e($buttonName); ?></button> 
                </div>
            </form>
            <?php endif; ?>
            


            
            <?php if($step == 6): ?>
            <form wire:submit.prevent="cartSetting">
                <h1 class="divider text-gray-400 mb-12 text-center font-semibold">COLORES DE LAS LETRAS</h1>
                <div class="row">
                    <div class="grid grid-cols-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-48 border-gray-400 border">
                                <div class="grid w-full h-48 bg-gray-100 place-items-center cursor-pointer">
                                    <div class="text-gray-300 font-bold relative text-center text-4xl">LETRAS</div>
                                    <div class="grid grid-cols-5 my-8 gap-x-3 gap-y-2 mx-7 justify-center absolute" id="baseColor">
                                        <?php if($arrColorLetras): ?>
                                            <?php $__currentLoopData = $arrColorLetras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <div  wire:click="deleteColor('letras', <?php echo e($i); ?>)" class="indicator">
                                                <div class="indicator-item indicator-middle indicator-center badge badge-neutral opacity-30 hover:opacity-90 font-bold w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div> 
                                                <div class="w-16 h-16 text-center">
                                                    <img  src="<?php echo e(asset('img/rubercolors/color_'.$i.'.png')); ?>" alt="color_violeta" class="w-10 h-10 rounded-lg">
                                                    <input type="hidden" wire:model="arrColorLetras.Letras." value="<?php echo e($i); ?>">
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        |   </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        <?php $__currentLoopData = $arrColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div data-tip="<?php echo e($color->name); ?>" class="tooltip cursor-pointer">
                                <img wire:click="selectedColor( 'letras',  <?php echo e($color->code); ?> , '<?php echo e($color->name); ?>'  )" src="<?php echo e(asset('img/rubercolors/color_'.$color->code.'.png')); ?>" alt="color_violeta" class="w-12 h-12 rounded-full">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button  type="submit" class="btn btn-primary w-full"><?php echo e($buttonName); ?></button> 
                </div>
            </form>
            <?php endif; ?>
            


            
            <?php if($step == 7): ?>
            <form wire:submit.prevent="cartSetting">
                <h1 class="divider text-gray-400 mb-12 text-center font-semibold">COLORES DEL BORDE</h1>
                <div class="row">
                    <div class="grid grid-cols-1">
                        <div class="avatar my-auto">
                            <div class="w-full h-48 border-gray-400 border">
                                <div class="grid w-full h-48 bg-gray-100 place-items-center cursor-pointer">
                                    <div class="text-gray-300 font-bold relative text-center text-4xl">BORDE</div>
                                    <div class="grid grid-cols-5 my-8 gap-x-3 gap-y-2 mx-7 justify-center absolute" id="baseColor">
                                        <?php if($arrColorBordes): ?>
                                            <?php $__currentLoopData = $arrColorBordes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <div  wire:click="deleteColor('bordes', <?php echo e($i); ?>)" class="indicator">
                                                <div class="indicator-item indicator-middle indicator-center badge badge-neutral opacity-30 hover:opacity-90 font-bold w-10 h-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div> 
                                                <div class="w-16 h-16 text-center">
                                                    <img  src="<?php echo e(asset('img/rubercolors/color_'.$i.'.png')); ?>" alt="color_violeta" class="w-10 h-10 rounded-lg">
                                                    <input type="hidden" wire:model="arrColorBordes.Bordes." value="<?php echo e($i); ?>">
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        |   </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid grid-cols-7 my-8 gap-x-1 gap-y-2 mx-7">
                        <?php $__currentLoopData = $arrColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div data-tip="<?php echo e($color->name); ?>" class="tooltip cursor-pointer">
                                <img wire:click="selectedColor( 'bordes', <?php echo e($color->code); ?> , '<?php echo e($color->name); ?>' )" src="<?php echo e(asset('img/rubercolors/color_'.$color->code.'.png')); ?>" alt="color_violeta" class="w-12 h-12 rounded-full">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="text-center grid grid-cols-2 gap-4">
                    <button type="button" wire:click="cartReset" class="btn btn-default w-full">CANCELAR</button> 
                    <button  type="submit" class="btn btn-primary w-full"><?php echo e($buttonName); ?></button> 
                </div>
            </form>
            <?php endif; ?>
            
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/cart/shopping-add-steps.blade.php ENDPATH**/ ?>