<div>
  
  <div class="row mb-7 ">
    <div class="grid grid-cols-1 gap-6">
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.profile')->html();
} elseif ($_instance->childHasBeenRendered('3Gtjv5x')) {
    $componentId = $_instance->getRenderedChildComponentId('3Gtjv5x');
    $componentTag = $_instance->getRenderedChildComponentTagName('3Gtjv5x');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3Gtjv5x');
} else {
    $response = \Livewire\Livewire::mount('home.profile');
    $html = $response->html();
    $_instance->logRenderedChild('3Gtjv5x', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('SuPWRVD')) {
    $componentId = $_instance->getRenderedChildComponentId('SuPWRVD');
    $componentTag = $_instance->getRenderedChildComponentTagName('SuPWRVD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SuPWRVD');
} else {
    $response = \Livewire\Livewire::mount('home.order-request');
    $html = $response->html();
    $_instance->logRenderedChild('SuPWRVD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('home.sketch-list')->html();
} elseif ($_instance->childHasBeenRendered('sFuF1zk')) {
    $componentId = $_instance->getRenderedChildComponentId('sFuF1zk');
    $componentTag = $_instance->getRenderedChildComponentTagName('sFuF1zk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sFuF1zk');
} else {
    $response = \Livewire\Livewire::mount('home.sketch-list');
    $html = $response->html();
    $_instance->logRenderedChild('sFuF1zk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
  </div>
</div>
  
<?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/home/dashboard.blade.php ENDPATH**/ ?>