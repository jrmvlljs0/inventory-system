<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" text-gray-900 dark:text-gray-100">
                <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    @if (session('success'))
                        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-4 mb-4 rounded"
                            role="alert">
                            {{ session('success') }}
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
                                        <td class="flex gap-2 px-6 py-4 whitespace-nowrap text-sm">
                                            <a tag="a" href="{{ route('stock.edit', $movement) }}"
                                                class="px-3 py-2 bg-green-500 text-white rounded hover:bg-green-600"
                                                color="green">
                                                Edit
                                            </a>
                                            <form action="{{ route('stock.destroy', $movement->id) }}" method="POST"
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
                                                                                    Stock?</p>
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
                                            </form>
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
