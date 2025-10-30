<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-800 p-6">
                    <h1 class="text-xl font-semibold mb-4 dark:text-gray-100">Available Products</h1>
                    <div class="flex justify-between gap-4  grid-cols-1 md:grid-cols-3">
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Total Products</h2>
                            <p class="text-4xl font-bold">{{ $totalProducts }}</p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Active Products</h2>
                            <p class="text-3xl font-bold">{{ $activeProducts }}</p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Total Stock</h2>
                            <p class="text-4xl font-bold">{{ $totalStock }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 max-w-7xl">
                <div class="bg-gray-800 p-6 mt-2 rounded lg:rounded-lg shadow-sm w-full">
                    <h2 class="text-xl font-semibold mb-4 text-white">Recent Stocks </h2>
                    <div class="overflow-x-auto py-4 rounded">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 rounded">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Reason
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($stockMovements as $movement)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $movement->product->name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $movement->reason }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $movement->created_at->format('Y-m-d H:i') }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="bg-gray-800 p-6 mt-2 rounded lg:rounded-lg shadow-sm">
                    <h2 class="text-xl font-semibold mb-4 text-white">Products Low in Stock</h2>
                    <div class="overflow-x-auto py-4 rounded">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 rounded">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        SKU
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($products as $product)
                                    @if ($product->stock_quantity < 10)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->name }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->sku }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $product->description }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm {{ $product->stock_quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold' }}">
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
    </div>
</x-app-layout>
