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
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="flex justify-between p-6 items-center mb-4">
                        <h2 class="mb-4 text-lg text-white font-semibold">Add New Product</h2>
                        <a href="{{ route('products.index') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium mb-1">Product Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('name') @else ring-blue-300 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="sku" class="block text-sm font-medium mb-1">SKU</label>
                            <input type="text" id="sku" name="sku" value="{{ old('sku') }}"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('sku') @else ring-blue-300 @enderror">
                            @error('sku')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium mb-1">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('description') @else ring-blue-300 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Create Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
