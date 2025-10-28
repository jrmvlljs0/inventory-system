<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('stock.store') }}" method="POST">
                    @csrf
                    <div class="flex justify-between items-center mb-4 p-4">
                        <h2 class="mb-4 text-lg text-white font-semibold">Add New Stock</h2>
                        <a href="{{ route('dashboard') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium mb-1">Select Product</label>
                            <select id="product_id" name="product_id"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('product_id') ring-red-500 @else ring-blue-300 @enderror">
                                <option value="">-- Select Product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} (SKU: {{ $product->sku }})
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium mb-1">Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('quantity') ring-red-500 @else ring-blue-300 @enderror">
                            @error('quantity')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium mb-1">Movement Type</label>
                            <select id="type" name="type"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('type') ring-red-500 @else ring-blue-300 @enderror">
                                <option value="">-- Select Type --</option>
                                <option value="addition" {{ old('type') == 'addition' ? 'selected' : '' }}>Add Stock
                                </option>
                                <option value="removal" {{ old('type') == 'removal' ? 'selected' : '' }}>Remove Stock
                                </option>
                            </select>
                            @error('type')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="reason" class="block text-sm font-medium mb-1">Reason</label>
                            <input type="text" id="reason" name="reason" value="{{ old('reason') }}"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('reason') ring-red-500 @else ring-blue-300 @enderror">
                            @error('reason')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Update Stock</button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
