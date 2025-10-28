<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-800 p-6">
                    <h1 class="text-xl font-semibold mb-4 dark:text-gray-100">Available Products</h1>

                    <div class="flex justify-between gap-4  grid-cols-1 md:grid-cols-3">
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Total Products</h2>
                            <p class="text-4xl font-bold">{{ $totalProducts }}</p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Active Products</h2>
                            <p class="text-3xl font-bold">{{ $activeProducts }}</p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full h-auto">
                            <h2 class="text-lg font-medium mb-2">Inactive Products</h2>
                            <p class="text-4xl font-bold">{{ $inactiveProducts }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800 p-6">
                    <h1 class="text-xl font-semibold mb-4 dark:text-gray-100">Available Stock</h1>

                    <div class="flex justify-between gap-4  grid-cols-1 md:grid-cols-3">
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Total Products</h2>
                            <p class="text-4xl font-bold">{{ $totalStock }}</p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full">
                            <h2 class="text-lg font-medium mb-2">Active Products</h2>
                            <p class="text-3xl font-bold">{{ $totalActiveStock }}</p>
                        </div>
                        <div class="bg-gray-100 text-black rounded-lg p-6 shadow-md w-full h-auto">
                            <h2 class="text-lg font-medium mb-2">Inactive Products</h2>
                            <p class="text-4xl font-bold">{{ $totalInactiveStock }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
