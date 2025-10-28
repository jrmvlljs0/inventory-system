<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>

                    <div class="flex justify-between gap-4  grid-cols-1 md:grid-cols-3">
                        <div class="bg-blue-500 text-white rounded-lg p-6 shadow-md">
                            <h3 class="text-lg font-medium mb-2">Total Products</h3>
                            <p class="text-3xl font-bold"><?php echo e($totalProducts); ?></p>
                        </div>
                        <div class="bg-green-500 text-white rounded-lg p-6 shadow-md">
                            <h3 class="text-lg font-medium mb-2">Active Products</h3>
                            <p class="text-3xl font-bold"><?php echo e($activeProducts); ?></p>
                        </div>
                        <div class="bg-yellow-500  text-white rounded-lg p-6 shadow-md">
                            <h3 class="text-lg font-medium mb-2">Inactive Products</h3>
                            <p class="text-3xl font-bold"><?php echo e($inactiveProducts); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\AIO Wireless\Documents\github\inventory-system\resources\views/dashboard.blade.php ENDPATH**/ ?>