<div>
    <div x-data="{ notificationOpen: true }" class="relative">
        <button @click="notificationOpen = ! notificationOpen" class="flex mx-4 text-gray-600 focus:outline-none">
            <svg class="h-8 w-8 indicator " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <div class="indicator-item badge"><?php echo e($totalNotifications); ?></div>
        </button>

        <div x-show="notificationOpen" @click="notificationOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-show="notificationOpen" class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-10" style="width:20rem;">
            <?php $__currentLoopData = $notificationsSketchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a wire:click="goToSketchConfirm('<?php echo e($notification->data['sketch_id']); ?>', '<?php echo e($notification->id); ?>')" class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">
                <div class="avatar placeholder">
                    <div class="w-8 h-8 rounded-full bg-success text-neutral-content">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                </div>
                <div class=" grid grid-cols-1 font-medium text-md ml-3">
                    Nueva Muestra
                    <div class="font-medium text-md ml-3 text-gray-400"><?php echo e($notification->data['file_name']); ?></div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\laravel\ecaptor\resources\views/livewire/notification/header-notification.blade.php ENDPATH**/ ?>