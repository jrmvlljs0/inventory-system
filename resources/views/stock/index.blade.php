<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" text-gray-900 dark:text-gray-100">
                <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    @if (session('success'))
                        <div class="bg-green-500 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Stock Movements') }}
                        </h2>
                        <a href="{{ route('stock.create') }}"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Add Stock Movement
                        </a>
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
                                        Date
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Product
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Reason
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse ($stockMovements as $movement)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $movement->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $movement->created_at->format('Y-m-d H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $movement->product->name }}
                                        </td>
                                        <td
                                            class="{{ $movement->quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold' }}">
                                            {{ $movement->quantity }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $movement->reason }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('stock.edit', $movement) }}"
                                                class="px-3 py-1  text-white rounded  mr-2 bg-green-500">
                                                Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                            No stock movements found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $stockMovements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
