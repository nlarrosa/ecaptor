<div>
  <div class="row mb-7 ">
    <div class="w-full gap-6">
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.stats')->html();
} elseif ($_instance->childHasBeenRendered('pKBC6Ky')) {
    $componentId = $_instance->getRenderedChildComponentId('pKBC6Ky');
    $componentTag = $_instance->getRenderedChildComponentTagName('pKBC6Ky');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pKBC6Ky');
} else {
    $response = \Livewire\Livewire::mount('home.stats');
    $html = $response->html();
    $_instance->logRenderedChild('pKBC6Ky', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  </div>
  <div class="row mb-7 ">
    <div class="grid grid-cols-2 gap-6">
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.profile')->html();
} elseif ($_instance->childHasBeenRendered('iGPu0dZ')) {
    $componentId = $_instance->getRenderedChildComponentId('iGPu0dZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('iGPu0dZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iGPu0dZ');
} else {
    $response = \Livewire\Livewire::mount('home.profile');
    $html = $response->html();
    $_instance->logRenderedChild('iGPu0dZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      
    </div>
  </div>
  <div class="row">
    <div class="grid grid-cols-2 gap-6">
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.order-request')->html();
} elseif ($_instance->childHasBeenRendered('69UYfDq')) {
    $componentId = $_instance->getRenderedChildComponentId('69UYfDq');
    $componentTag = $_instance->getRenderedChildComponentTagName('69UYfDq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('69UYfDq');
} else {
    $response = \Livewire\Livewire::mount('home.order-request');
    $html = $response->html();
    $_instance->logRenderedChild('69UYfDq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.sketch-list')->html();
} elseif ($_instance->childHasBeenRendered('Y6eOUr0')) {
    $componentId = $_instance->getRenderedChildComponentId('Y6eOUr0');
    $componentTag = $_instance->getRenderedChildComponentTagName('Y6eOUr0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Y6eOUr0');
} else {
    $response = \Livewire\Livewire::mount('home.sketch-list');
    $html = $response->html();
    $_instance->logRenderedChild('Y6eOUr0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
  </div>
</div>
  
<?php /**PATH C:\xampp\htdocs\laravel\ecaptor\resources\views/livewire/home/dashboard.blade.php ENDPATH**/ ?>