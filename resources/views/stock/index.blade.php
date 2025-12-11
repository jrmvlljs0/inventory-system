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
                               
                            </tbody>
                        </table>
                    </div>
                <div id="stock-pagination-links" class="mt-4 flex justify-center space-x-1"></div>
            </div>
        </div>
    </div>
    <!-- Modal (div-based for consistent centering across browsers) -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-900/50">
        <!-- overlay (click to close) -->
        <div class="absolute inset-0" onclick="closeDeleteModal()" aria-hidden="true"></div>
    
        <!-- modal panel -->
        <div role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle" tabindex="-1" class="relative bg-gray-800 rounded-lg w-full max-w-md p-6 mx-4">
            <h3 id="deleteModalTitle" class="text-white font-bold text-lg mb-4">Confirmation</h3>
            <p class="text-gray-300 mb-4">Are you sure you want to delete this product?</p>
            <form id="deleteForm" method="POST" class="flex justify-end gap-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600">Delete</button>
                <button type="button" onclick="closeDeleteModal()" class="bg-gray-600 px-4 py-2 rounded text-white hover:bg-gray-700">Cancel</button>
            </form>
        </div>
    </div>
</x-app-layout>


<script>
    // get search input element
    let searchInput = document.getElementById('search');
    let timeout = null;

    // fetch stocks function
    function fetchStocks(page = 1) {
        let query = searchInput.value;

        // show loading
        let tbody = document.getElementById('stock-table-body');
        tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-gray-400">Loading...</td></tr>`;

        // axios get request
        axios.get("{{ route('stock.search') }}", {
            params: { search: query, page: page }
        })
        .then(res => {
            let movements = res.data.data;
            let tbodyHtml = '';

            if (movements.length === 0) {
                tbodyHtml = `<tr><td colspan="6" class="text-center py-4 text-gray-400">No results found.</td></tr>`;
            } else {
                movements.forEach(m => {
                    tbodyHtml += `
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 text-white">
                            <td class="px-6 py-4">${m.id}</td>
                            <td class="px-6 py-4">${new Date(m.created_at).toLocaleString()}</td>
                            <td class="px-6 py-4">${m.product_name}</td>
                            <td class="px-6 py-4 ${m.quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold'}">${m.quantity}</td>
                            <td class="px-6 py-4">${m.reason ?? ''}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="/stock/${m.id}/edit" class="px-3 py-2 bg-green-500 text-white rounded">Edit</a>
                                <button type="button" data-delete-id="${m.id}" class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    `;
                });
            }

            tbody.innerHTML = tbodyHtml;

            // attach delete button events
            attachDeleteEvents();

            // Pagination
            let pagination = '';
            let current = res.data.pagination.current_page;
            let last = res.data.pagination.last_page;

            if (last > 1) {
                if (current > 1) {
                    pagination += `<button class="px-3 py-1 rounded bg-gray-600 text-white hover:bg-gray-500" onclick="fetchStocks(${current - 1})">Previous</button>`;
                }

                for (let i = 1; i <= last; i++) {
                    pagination += `<button class="px-3 py-1 rounded ${i===current ? 'bg-blue-600 text-white' : 'bg-gray-600 text-white hover:bg-gray-500'}" onclick="fetchStocks(${i})">${i}</button>`;
                }

                if (current < last) {
                    pagination += `<button class="px-3 py-1 rounded bg-gray-600 text-white hover:bg-gray-500" onclick="fetchStocks(${current + 1})">Next</button>`;
                }
            }

            document.getElementById('stock-pagination-links').innerHTML = pagination;

        })
        .catch(err => console.error(err));
    }

    // Delete buttons
    function attachDeleteEvents() {
        document.querySelectorAll('button[data-delete-id]').forEach(btn => {
            btn.addEventListener('click', function() {
                const stockId = this.getAttribute('data-delete-id');
                openDeleteModal(stockId);
            });
        });
    }

    function openDeleteModal(id) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        form.action = `/stock/${id}`; // dynamically set the delete URL
        // show modal (use Tailwind classes for flex centering)
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // move focus to the dialog content for accessibility
        const panel = modal.querySelector('[role="dialog"]');
        if (panel) panel.focus();
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        // return focus to search input
        const search = document.getElementById('search');
        if (searchInput) searchInput.focus();
    }

    // close modal when clicking outside or pressing ESC
    (function setupModalCloseHandlers() {
        const modal = document.getElementById('deleteModal');
        if (!modal) return;

        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeDeleteModal();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeDeleteModal();
            }
        });
    })();

    // debounce search input
    searchInput.addEventListener('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => fetchStocks(1), 300);
    });

    // first fetch on page load
    document.addEventListener('DOMContentLoaded', function() {
        fetchStocks(1);
        attachDeleteEvents();
    });
</script>



