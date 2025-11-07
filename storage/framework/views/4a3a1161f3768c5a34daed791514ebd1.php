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
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-800 p-4 sm:p-6">
                    <h1 class="text-xl font-semibold mb-4 dark:text-gray-100">Available Products</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-gray-100 text-black rounded-lg p-4 sm:p-6 shadow-md">
                            <h2 class="text-lg font-medium mb-2">Total Products</h2>
                            <p class="text-3xl sm:text-4xl font-bold"><?php echo e($dashboardData->totalProducts); ?></p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-4 sm:p-6 shadow-md">
                            <h2 class="text-lg font-medium mb-2">Active Products</h2>
                            <p class="text-3xl sm:text-4xl font-bold"><?php echo e($dashboardData->activeProducts); ?></p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-4 sm:p-6 shadow-md">
                            <h2 class="text-lg font-medium mb-2">Total Stock</h2>
                            <p class="text-3xl sm:text-4xl font-bold"><?php echo e($dashboardData->totalStock); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tables Section -->
            <div class="flex flex-col lg:flex-row gap-2 mt-2">
                <!-- Recent Stocks Table -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-sm w-full lg:w-1/2">
                    <h2 class="text-xl font-semibold mb-4 text-white">Recent Stocks</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                        Name</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                        Reason</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                        Date</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                <?php $__currentLoopData = $stockMovements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            <?php echo e($movement->product->name); ?></td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            <?php echo e($movement->reason); ?></td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            <?php echo e($movement->created_at->format('Y-m-d H:i')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Low Stock Products Table -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-sm w-full lg:w-1/2">
                    <h2 class="text-xl font-semibold mb-4 text-white">Products Low in Stock</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                        ID</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                        Name</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                        SKU</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                        Description</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">
                                        Quantity</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product->stock_quantity < 10): ?>
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                <?php echo e($product->id); ?></td>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                <?php echo e($product->name); ?></td>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                <?php echo e($product->sku); ?></td>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                <?php echo e($product->description); ?></td>
                                            <td
                                                class="px-4 py-3 text-sm <?php echo e($product->stock_quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold'); ?>">
                                                <?php echo e($product->stock_quantity); ?>

                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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