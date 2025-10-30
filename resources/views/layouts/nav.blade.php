<!-- Sidebar Navigation -->
<nav x-data="{ open: true }"
    class="fixed top-0 left-0 h-full bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 w-64 transition-all duration-300"
    :class="{ 'w-64': open, 'w-20': !open }">
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200 dark:border-gray-700">
            <a href="{{ route('dashboard') }}" class="flex items-center" :class="{ 'justify-center': !open }">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                <span class="ml-2 text-gray-800 dark:text-gray-200 font-semibold text-lg" x-show="open">Inventory</span>
            </a>
            <button @click="open = !open" class="p-2 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 px-2 py-4 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard') }}"
                class="flex items-center p-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                :class="{ 'justify-center': !open }">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="ml-3 text-gray-800 dark:text-gray-200" x-show="open">Dashboard</span>
            </a>

            <a href="{{ route('products.index') }}"
                class="flex items-center p-2 rounded-lg {{ request()->routeIs('products.*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}"
                :class="{ 'justify-center': !open }">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span class="ml-3 text-gray-800 dark:text-gray-200" x-show="open">Products</span>
            </a>
        </div>

        <!-- User Profile -->
        <div class="border-t border-gray-200 dark:border-gray-700 p-4">
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button @click="dropdownOpen = !dropdownOpen" class="flex items-center w-full"
                    :class="{ 'justify-center': !open }">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center">
                            <span
                                class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div class="ml-3" x-show="open">
                            <p class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </button>

                <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                    class="absolute bottom-full mb-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5"
                    :class="!open ? 'left-0' : 'right-0'">
                    <div class="py-1">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                            {{ __('Profile') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Responsive Navigation Overlay -->
<div x-data="{ mobileMenuOpen: false }" class="sm:hidden">
    <button @click="mobileMenuOpen  = true"
        class="fixed top-4 right-4 p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="fixed inset-0 z-40">
        <div class="fixed inset-0 bg-black bg-opacity-25" @click="mobileMenuOpen = false"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white dark:bg-gray-800 overflow-y-auto">
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    <span class="ml-2 text-xl font-bold">Inventory</span>
                </a>
                <button @click="mobileMenuOpen = false"
                    class="p-2 text-gray-500 hover:text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-4">
                <a href="{{ route('dashboard') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    Dashboard
                </a>
                <a href="{{ route('products.index') }}"
                    class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('products.*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                    Products
                </a>
            </div>
        </nav>
    </div>
</div>



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-6">Welcome to the Dashboard</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div
                                class="border border-gray-300 dark:border-gray-700 rounded-lg p-4 bg-gray-50 dark:bg-gray-900">
                                <h3 class="text-lg font-medium mb-2">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1"><strong>SKU:</strong>
                                    {{ $product->sku }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Description:</strong>
                                    {{ $product->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



            // Product routes use for fetching and displaying products
// Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
// Route::get('/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
// Route::delete('/products/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');