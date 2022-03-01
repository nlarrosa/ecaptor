<div>
  <div class="row mb-7 ">
    <div class="w-full gap-6">
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.stats')->html();
} elseif ($_instance->childHasBeenRendered('pGivSt0')) {
    $componentId = $_instance->getRenderedChildComponentId('pGivSt0');
    $componentTag = $_instance->getRenderedChildComponentTagName('pGivSt0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pGivSt0');
} else {
    $response = \Livewire\Livewire::mount('home.stats');
    $html = $response->html();
    $_instance->logRenderedChild('pGivSt0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  </div>
  <div class="row mb-7 ">
    <div class="grid grid-cols-1 gap-6">
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.profile')->html();
} elseif ($_instance->childHasBeenRendered('gPFPhHO')) {
    $componentId = $_instance->getRenderedChildComponentId('gPFPhHO');
    $componentTag = $_instance->getRenderedChildComponentTagName('gPFPhHO');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gPFPhHO');
} else {
    $response = \Livewire\Livewire::mount('home.profile');
    $html = $response->html();
    $_instance->logRenderedChild('gPFPhHO', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('2WmATQH')) {
    $componentId = $_instance->getRenderedChildComponentId('2WmATQH');
    $componentTag = $_instance->getRenderedChildComponentTagName('2WmATQH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2WmATQH');
} else {
    $response = \Livewire\Livewire::mount('home.order-request');
    $html = $response->html();
    $_instance->logRenderedChild('2WmATQH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.sketch-list')->html();
} elseif ($_instance->childHasBeenRendered('iMTRIuy')) {
    $componentId = $_instance->getRenderedChildComponentId('iMTRIuy');
    $componentTag = $_instance->getRenderedChildComponentTagName('iMTRIuy');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iMTRIuy');
} else {
    $response = \Livewire\Livewire::mount('home.sketch-list');
    $html = $response->html();
    $_instance->logRenderedChild('iMTRIuy', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
  </div>
</div>
  
<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/home/dashboard.blade.php ENDPATH**/ ?>