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
                            Product List
                        </h2>
                        <a href="{{ route('products.create') }}"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Add New
                            Product</a>
                    </div>
                    <div class="mb-1">
                        <form method="GET" action="{{ route('products.search') }}" onsubmit="return false;">
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

                            <tbody  id="product-table-body" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse($products as $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $product->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-white text-sm">
                                            <a href="{{ route('products.show', $product->id) }}" class="">
                                                {{ $product->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                            {{ $product->sku }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-white">
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
                  <div id="pagination-links" class="mt-4 flex justify-center space-x-1"></div>

                </div>
            </div>
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

   // fetch products function
    function fetchProducts(page = 1) {
        let query = searchInput.value;

        // show loading
        let tbody = document.getElementById('product-table-body');
        tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-gray-400">Loading...</td></tr>`;

        // axios get request
        axios.get("{{ route('products.search') }}", {
            params: { search: query, page: page }
        })
        .then(res => {
            let products = res.data.data;
            let tbodyHtml = '';

            if (products.length === 0) {
                tbodyHtml = `<tr><td colspan="6" class="text-center py-4 text-gray-400">No products found.</td></tr>`;
            } else {
                products.forEach(p => {
                    tbodyHtml += `
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 text-white">${p.id}</td>
                            <td class="px-6 py-4 text-white"><a href="/products/${p.id}">${p.name}</a></td>
                            <td class="px-6 py-4 text-white">${p.sku}</td>
                            <td class="px-6 py-4 text-white">${p.description ?? ''}</td>
                            <td class="px-6 py-4 ${p.stock_quantity < 0 ? 'text-red-600 font-bold' : 'text-green-600 font-bold'}">${p.stock_quantity ?? 0}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="/products/${p.id}" class="px-3 py-2 bg-blue-500 text-white rounded">Show</a>
                                <a href="/products/${p.id}/edit" class="px-3 py-2 bg-green-500 text-white rounded">Edit</a>
                               <button type="button" data-delete-id="${p.id}" class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    `;
                });
            }

            tbody.innerHTML = tbodyHtml;
            
            // attach delete button events for the newly rendered rows
            attachDeleteEvents();
            // Pagination
            let pagination = '';
            let current = res.data.pagination.current_page;
            let last = res.data.pagination.last_page;

            if (last > 1) {
                // Previous
                pagination += `<button class="px-3 py-1 border rounded ${current===1 ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-200'}" ${current===1 ? 'disabled' : 'onclick="fetchProducts('+(current-1)+')"'}>Previous</button>`;

                // Pages
                for (let i = 1; i <= last; i++) {
                    pagination += `<button class="px-3 py-1 border rounded ${i===current ? 'bg-blue-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-200'}" onclick="fetchProducts(${i})">${i}</button>`;
                }

                // Next
                pagination += `<button class="px-3 py-1 border rounded ${current===last ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-white text-gray-700 hover:bg-gray-200'}" ${current===last ? 'disabled' : 'onclick="fetchProducts('+(current+1)+')"'}>Next</button>`;
            }

            document.getElementById('pagination-links').innerHTML = pagination;

        })
        .catch(err => console.error(err));
    }
function attachDeleteEvents() {
    document.querySelectorAll('button[data-delete-id]').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.getAttribute('data-delete-id');
            openDeleteModal(productId);
        });
    });
}

function openDeleteModal(id) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    form.action = `/products/${id}`; // dynamically set the delete URL
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
    // return focus to the search input for convenience
    const search = document.getElementById('search');
    if (search) search.focus();
}

// close modal when clicking outside dialog content
(function setupModalCloseHandlers() {
    const modal = document.getElementById('deleteModal');
    if (!modal) return;

    // click on overlay
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeDeleteModal();
        }
    });

    // ESC key closes modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.hasAttribute('hidden')) {
            closeDeleteModal();
        }
    });
})();


    //debounce search input
    searchInput.addEventListener('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(() => fetchProducts(1), 300);
    });

    //first fetch on page load
    document.addEventListener('DOMContentLoaded', function() {
        fetchProducts(1);
        // attach events for any server-rendered buttons (if present)
        attachDeleteEvents();
    });
</script>

