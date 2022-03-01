<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-gray-500">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
    
    <div class="flex items-center">

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cart.shopping-header')->html();
} elseif ($_instance->childHasBeenRendered('LV3UIWk')) {
    $componentId = $_instance->getRenderedChildComponentId('LV3UIWk');
    $componentTag = $_instance->getRenderedChildComponentTagName('LV3UIWk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LV3UIWk');
} else {
    $response = \Livewire\Livewire::mount('cart.shopping-header');
    $html = $response->html();
    $_instance->logRenderedChild('LV3UIWk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('notification.header-notification')->html();
} elseif ($_instance->childHasBeenRendered('sqbY4wA')) {
    $componentId = $_instance->getRenderedChildComponentId('sqbY4wA');
    $componentTag = $_instance->getRenderedChildComponentTagName('sqbY4wA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sqbY4wA');
} else {
    $response = \Livewire\Livewire::mount('notification.header-notification');
    $html = $response->html();
    $_instance->logRenderedChild('sqbY4wA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        
        <div x-data="{ dropdownOpen: false }"  class="relative">
            <button @click="dropdownOpen = ! dropdownOpen" class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80" alt="Your avatar">
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
                <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
            </div>
        </div>
    </div>
</header><?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/layouts/header.blade.php ENDPATH**/ ?>