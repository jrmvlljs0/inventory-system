@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Product List</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->quantity ?? '-' }}</td>
                        <td>{{ number_format($product->price ?? 0, 2) }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
