<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-4 mb-4 rounded"
                            role="alert">
                            {{ session('success') }}
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
                                        <td
                                            class="{{ $product->stock_quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold' }}">
                                            {{ $product->stock_quantity }}
                                        </td>
                                        <td class="flex gap-2 px-12 py-4 whitespace-nowrap text-sm">

                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="px-3 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                Show
                                            </a>

                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="px-3 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                                                color="green">
                                                Edit
                                            </a>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" command="show-modal" commandfor="dialog"
                                                    class="rounded bg-red-500 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-red-400">Delete</button>
                                                <el-dialog>
                                                    <dialog id="dialog" aria-labelledby="dialog-title"
                                                        class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                                                        <el-dialog-backdrop
                                                            class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                                                        <div tabindex="0"
                                                            class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                                                            <el-dialog-panel
                                                                class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                                                                <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                    <div class="sm:flex sm:items-start">
                                                                        <div
                                                                            class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                            <h3 id="dialog-title"
                                                                                class="text-base font-semibold text-white">
                                                                                Confirmation</h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-400">Are you
                                                                                    Are you sure you want to delete this
                                                                                    Product?</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="bg-gray-700/25 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                    <button type="submit" command="close"
                                                                        commandfor="dialog"
                                                                        class="inline-flex w-full justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white hover:bg-red-400 sm:ml-3 sm:w-auto">Delete</button>
                                                                    <button type="button" command="close"
                                                                        commandfor="dialog"
                                                                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20 sm:mt-0 sm:w-auto">Cancel</button>
                                                                </div>
                                                            </el-dialog-panel>
                                                        </div>
                                                    </dialog>
                                                </el-dialog>



                                                {{-- <button type="submit" onclick="showModal('confirmationModal')"
                                                    class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Delete
                                                </button> --}}

                                                {{-- <x-bladewind::modal title="Confirmation" name="confirmationModal"
                                                    class="bg-gray-800" show_action_buttons="false">
                                                    Are you sure you want to delete this product?
                                                    <div class="mt-4 flex justify-end">

                                                        <button type="button" onclick="hideModal('confirmationModal')"
                                                            class="px-4 py-2 bg-gray-800 text-white rounded mr-2 hover:bg-gray-600">
                                                            Cancel
                                                        </button>
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </x-bladewind::modal> --}}
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
