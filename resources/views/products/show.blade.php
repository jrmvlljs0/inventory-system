<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="mb-4 text-lg font-semibold">Product Details</h2>
                        <a href="{{ route('products.index') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-md font-medium">Product Name:</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $product->name }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-md font-medium">SKU:</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $product->sku }}</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-md font-medium">Description:</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
