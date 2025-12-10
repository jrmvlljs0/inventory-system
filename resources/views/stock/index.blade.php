<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    @if (session('success'))
                        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-4 mb-4 rounded"
                            role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Stock Movements') }}
                        </h2>
                        <a href="{{ route('stock.create') }}"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Add Stock Movement
                        </a>
                    </div>
                    
                     <div class="mb-1">
                        <form method="GET" action="{{ route('stock.search') }}" onsubmit="return false;">
                            <div class="flex space-x-2">
                                <input type="text" name="search" id="search" placeholder="Search products..."
                                    value="{{ request('search') }}"
                                    class="max-w-full text-white w-80 bg-gray-600 px-3 py-2 rounded-md border hover:border-white ">
                                {{-- <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Search</button> --}}
                            </div>
                        </form>
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
                            <tbody id="stock-table-body" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse ($stockMovements as $movement)
                                    <tr class="text-white hover:bg-gray-50 dark:hover:bg-gray-700">
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
                                            class="px-8 py-4 whitespace-nowrap text-sm {{ $movement->quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold' }}">
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
                                            {{-- <form action="{{ route('stock.destroy', $movement->id) }}" method="POST"
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
                                            </form> --}}
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
                <div id="pagination-links" class="mt-4 flex justify-center space-x-1"></div>

                </div>
                    {{-- <div class="mt-4">
                        <div id="pagination-links">
                            {{ $stockMovements->links() }}
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Reusable delete modal used by AJAX-rendered rows -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50" aria-hidden="true"></div>
    <div role="dialog" aria-modal="true" class="relative max-w-lg w-full bg-gray-800 rounded-lg overflow-hidden">
        <form id="deleteForm" method="POST" class="p-4">
            @csrf
            @method('DELETE')
            <h3 class="text-lg font-medium text-white mb-2">Confirm delete</h3>
            <p class="text-sm text-gray-300 mb-4">Are you sure you want to delete this stock movement?</p>
            <div class="flex justify-end gap-2">
                <button type="button" id="cancelDelete" class="px-3 py-2 bg-white/10 text-white rounded">Cancel</button>
                <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded">Delete</button>
            </div>
        </form>
    </div>
</div>

<script  src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js">
// Wrap in an IIFE to avoid polluting global scope
(function(){
    const searchInput = document.getElementById('search');
    let timeout = null;

    // modal elements (used by delete handlers). guard in case markup is missing
    const deleteModal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    const cancelDelete = document.getElementById('cancelDelete');

    // fetch stocks using axios to match the products page
    function fetchStocks(page = 1) {
        const query = (searchInput && searchInput.value) ? searchInput.value : '';

        // show loading
        const tbody = document.getElementById('stock-table-body');
        if (tbody) tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-gray-400">Loading...</td></tr>`;

        axios.get("{{ route('stock.search') }}", { params: { search: query, page: page } })
            .then(res => {
                const movements = res.data.data;
                let tbodyHtml = '';

                if (!movements || movements.length === 0) {
                    tbodyHtml = `<tr><td colspan="6" class="text-center py-4 text-gray-400">No results found.</td></tr>`;
                } else {
                    movements.forEach(movement => {
                        const date = movement.created_at ? new Date(movement.created_at).toLocaleString() : '';
                        const quantityClass = movement.quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold';
                        const productName = movement.product && movement.product.name ? movement.product.name : (movement.product_name ?? '');

                        tbodyHtml += `
                            <tr class="text-white hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm">${movement.id}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">${date}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">${productName}</td>
                                <td class="px-8 py-4 whitespace-nowrap text-sm ${quantityClass}">${movement.quantity}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">${movement.reason ?? ''}</td>
                                <td class="flex gap-2 px-6 py-4 whitespace-nowrap text-sm">
                                    <a tag="a" href="/stock/${movement.id}/edit" class="px-3 py-2 bg-green-500 text-white rounded hover:bg-green-600" color="green">Edit</a>
                                    <button type="button" data-delete-id="${movement.id}" class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                }

                if (tbody) tbody.innerHTML = tbodyHtml;

                // attach delete button events
                attachDeleteEvents();

                // pagination
                let pagination = '';
                let current = res.data.pagination.current_page;
                let last = res.data.pagination.last_page;

                if (last > 1) {
                    pagination += `<button class="px-3 py-1 border rounded ${current===1 ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-200'}" ${current===1 ? 'disabled' : 'onclick="fetchStocks('+(current-1)+')"'}>Previous</button>`;
                    for (let i = 1; i <= last; i++) {
                        pagination += `<button class="px-3 py-1 border rounded ${i===current ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-200'}" onclick="fetchStocks(${i})">${i}</button>`;
                    }
                    pagination += `<button class="px-3 py-1 border rounded ${current===last ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-200'}" ${current===last ? 'disabled' : 'onclick="fetchStocks('+(current+1)+')"'}>Next</button>`;
                }

                const pagEl = document.getElementById('pagination-links');
                if (pagEl) pagEl.innerHTML = pagination;
            })
            .catch(err => { console.error(err); });
    }

    function attachDeleteEvents() {
        const buttons = document.querySelectorAll('button[data-delete-id]');
        if (!buttons) return;
        buttons.forEach(btn => {
            btn.removeEventListener('click', deleteHandler);
            btn.addEventListener('click', deleteHandler);
        });
    }

    function deleteHandler(e) {
        const id = this.getAttribute('data-delete-id');
        openDeleteModal(id);
    }

    function openDeleteModal(id) {
        if (!deleteForm || !deleteModal) return;
        deleteForm.action = `/stock/${id}`;
        deleteModal.classList.remove('hidden');
        deleteModal.classList.add('flex');
        const submit = deleteForm.querySelector('button[type="submit"]');
        if (submit) submit.focus();
    }

    function closeDeleteModal() {
        if (!deleteModal) return;
        deleteModal.classList.add('hidden');
        deleteModal.classList.remove('flex');
        if (searchInput) searchInput.focus();
    }

    if (cancelDelete) {
        cancelDelete.addEventListener('click', function(e){
            e.preventDefault();
            closeDeleteModal();
        });
    }

    if (deleteModal) {
        deleteModal.addEventListener('click', function(e){
            if (e.target === deleteModal) closeDeleteModal();
        });
    }

    document.addEventListener('keydown', function(e){
        if (e.key === 'Escape' && deleteModal && !deleteModal.classList.contains('hidden')) {
            closeDeleteModal();
        }
    });

    if (searchInput) {
        searchInput.addEventListener('keyup', function(){
            clearTimeout(timeout);
            timeout = setTimeout(() => fetchStocks(1), 300);
        });
    }

    // expose a global fetchStocks so inline onclick pagination buttons still work
    window.fetchStocks = fetchStocks;

    // initial fetch immediately
    try { fetchStocks(1); } catch (e) { console.error(e); }
})();
</script>
