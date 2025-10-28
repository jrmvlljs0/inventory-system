<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>

                    <div class="flex justify-between gap-4  grid-cols-1 md:grid-cols-3">
                        <div class="bg-blue-500 text-white rounded-lg p-6 shadow-md">
                            <h3 class="text-lg font-medium mb-2">Total Products</h3>
                            <p class="text-3xl font-bold">{{ $totalProducts }}</p>
                        </div>
                        <div class="bg-green-500 text-white rounded-lg p-6 shadow-md">
                            <h3 class="text-lg font-medium mb-2">Active Products</h3>
                            <p class="text-3xl font-bold">{{ $activeProducts }}</p>
                        </div>
                        <div class="bg-yellow-500  text-white rounded-lg p-6 shadow-md">
                            <h3 class="text-lg font-medium mb-2">Inactive Products</h3>
                            <p class="text-3xl font-bold">{{ $inactiveProducts }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
