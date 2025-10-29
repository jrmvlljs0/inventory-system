<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="  px-4 py-3 rounded relative mb-4" role="alert">
                            <x-bladewind::alert type="success" shade="dark">
                                {{ session('success') }}
                            </x-bladewind::alert>
                        </div>
                    @endif
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Product List</h2>
                        <a href="{{ route('products.create') }}"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Add New
                            Product</a>
                    </div>

                    <div class="overflow-x-auto py-4">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
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
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse($products as $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $product->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('products.show', $product->id) }}" class="">
                                                {{ $product->name }}
                                            </a>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $product->sku }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $product->description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                            {{ $product->stock_quantity }}
                                        </td>
                                        <td class="px-12 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="px-3 py-1  text-white rounded  mr-2 bg-blue-500">Show</a>

                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="px-3 py-1  text-white rounded  mr-2 bg-green-500">Edit
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="flex px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"
                                            class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                            No products found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
