<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('stock.update', $stockMovement->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex justify-between items-center mb-4 p-4">
                        <h2 class="mb-4 text-lg text-white font-semibold">Edit Stock Movement</h2>
                        <a href="{{ route('stock.index') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Back</a>
                    </div>
                    <div class="p-6">
                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium mb-1 text-white">Select
                                Product</label>
                            <select id="product_id" name="product_id"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring @error('product_id') border-red-500 @else ring-blue-300 @enderror">
                                <option value="">-- Select Product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('product_id', $stockMovement->product_id) == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} (SKU: {{ $product->sku }})
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium mb-1 text-white">Quantity</label>
                            <input type="number" id="quantity" name="quantity"
                                value="{{ old('quantity', $stockMovement->quantity) }}" step="1"
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring">
                            @error('quantity')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="reason" class="block text-sm font-medium mb-1 text-white">Reason</label>
                            <textarea id="reason" name="reason" rows="4"
                                class="text-black w-full px-3 py-2 border rounded-md focus:outline-none focus:ring">{{ old('reason', $stockMovement->reason) }}</textarea>
                            @error('reason')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Update Stock
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
