<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="mb-4 text-lg font-semibold">Edit Product</h2>
                        <a href="{{ route('products.index') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium mb-1">Product Name</label>
                            <input type="text" id="name" name="name"
                                value="{{ old('name', $product->name) }}"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('name') ring-red-500 @else ring-blue-300 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="sku" class="block text-sm font-medium mb-1">SKU</label>
                            <input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku) }}"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('sku') ring-red-500 @else ring-blue-300 @enderror">
                            @error('sku')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium mb-1">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('description') ring-red-500 @else ring-blue-300 @enderror">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Update
                            Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
