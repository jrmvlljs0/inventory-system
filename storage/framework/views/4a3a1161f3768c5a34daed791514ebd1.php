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
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-800 p-6">
                    <h1 class="text-xl font-semibold mb-4 dark:text-gray-100">Available Products</h1>
                    <div class="flex justify-between gap-4  grid-cols-1 md:grid-cols-3">
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Total Products</h2>
                            <p class="text-4xl font-bold"><?php echo e($totalProducts); ?></p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Active Products</h2>
                            <p class="text-3xl font-bold"><?php echo e($activeProducts); ?></p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Total Stock</h2>
                            <p class="text-4xl font-bold"><?php echo e($totalStock); ?></p>
                        </div>
                    </div>
                    <div class="flex grid-cols-2 gap-4 py-6">
                        <div class="bg-white text-black rounded-lg p-6 shadow-md w-full">

                            <?php if (isset($component)) { $__componentOriginal7666d208a986bb7934052694fe636d83 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7666d208a986bb7934052694fe636d83 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.horizontal-line-graph','data' => ['label' => 'Total Products ','percentage' => ''.e($totalProducts).'','color' => 'yellow']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bladewind::horizontal-line-graph'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Total Products ','percentage' => ''.e($totalProducts).'','color' => 'yellow']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $attributes = $__attributesOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__attributesOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $component = $__componentOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__componentOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginal7666d208a986bb7934052694fe636d83 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7666d208a986bb7934052694fe636d83 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.horizontal-line-graph','data' => ['label' => 'Active Products: ','percentage' => ''.e($activeProducts).'','color' => 'red','class' => 'py-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bladewind::horizontal-line-graph'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Active Products: ','percentage' => ''.e($activeProducts).'','color' => 'red','class' => 'py-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $attributes = $__attributesOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__attributesOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $component = $__componentOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__componentOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginal7666d208a986bb7934052694fe636d83 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7666d208a986bb7934052694fe636d83 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.horizontal-line-graph','data' => ['label' => 'Total Stocks ','percentage' => ''.e($totalStock).'','color' => 'blue']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bladewind::horizontal-line-graph'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Total Stocks ','percentage' => ''.e($totalStock).'','color' => 'blue']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $attributes = $__attributesOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__attributesOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $component = $__componentOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__componentOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>
                        </div>
                        <div class="bg-black text-white rounded-lg p-6 shadow-md w-full">

                            <?php if (isset($component)) { $__componentOriginal7666d208a986bb7934052694fe636d83 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7666d208a986bb7934052694fe636d83 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.horizontal-line-graph','data' => ['label' => 'Total Products ','percentage' => '55','color' => 'yellow']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bladewind::horizontal-line-graph'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Total Products ','percentage' => '55','color' => 'yellow']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $attributes = $__attributesOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__attributesOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $component = $__componentOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__componentOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginal7666d208a986bb7934052694fe636d83 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7666d208a986bb7934052694fe636d83 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.horizontal-line-graph','data' => ['label' => 'Active Products: ','percentage' => '30','color' => 'red','class' => 'py-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bladewind::horizontal-line-graph'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Active Products: ','percentage' => '30','color' => 'red','class' => 'py-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $attributes = $__attributesOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__attributesOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $component = $__componentOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__componentOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginal7666d208a986bb7934052694fe636d83 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7666d208a986bb7934052694fe636d83 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'bladewind::components.horizontal-line-graph','data' => ['label' => 'Total Stocks ','percentage' => '15','color' => 'blue']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('bladewind::horizontal-line-graph'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Total Stocks ','percentage' => '15','color' => 'blue']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $attributes = $__attributesOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__attributesOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7666d208a986bb7934052694fe636d83)): ?>
<?php $component = $__componentOriginal7666d208a986bb7934052694fe636d83; ?>
<?php unset($__componentOriginal7666d208a986bb7934052694fe636d83); ?>
<?php endif; ?>
                        </div>
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