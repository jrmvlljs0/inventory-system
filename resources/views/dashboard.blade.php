<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-800 p-4 sm:p-6">
                    <h1 class="text-xl font-semibold mb-4 dark:text-gray-100">Available Products</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-gray-100 text-black rounded-lg p-4 sm:p-6 shadow-md">
                            <h2 class="text-lg font-medium mb-2">Total Products</h2>
                            <p class="text-3xl sm:text-4xl font-bold">{{ $dashboardData->totalProducts }}</p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-4 sm:p-6 shadow-md">
                            <h2 class="text-lg font-medium mb-2">Active Products</h2>
                            <p class="text-3xl sm:text-4xl font-bold">{{ $dashboardData->activeProducts }}</p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-4 sm:p-6 shadow-md">
                            <h2 class="text-lg font-medium mb-2">Total Stock</h2>
                            <p class="text-3xl sm:text-4xl font-bold">{{ $dashboardData->totalStock }}</p>
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
                                @foreach ($stockMovements as $movement)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $movement->product->name }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $movement->reason }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $movement->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                @endforeach
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
                                @foreach ($products as $product)
                                    @if ($product->stock_quantity < 10)
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->id }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->sku }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->description }}</td>
                                            <td
                                                class="px-4 py-3 text-sm {{ $product->stock_quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold' }}">
                                                {{ $product->stock_quantity }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
