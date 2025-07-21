<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                @if(session('success'))
                    <div class="mb-4 text-green-600">{{ session('success') }}</div>
                @endif

                <!-- Add Item Form -->
                <form method="POST" action="{{ route('inventory.store') }}" class="mb-6">
                    @csrf
                    <div class="flex flex-col sm:flex-row sm:items-end sm:gap-4">
                        <div class="flex-1">
                            <label for="name" class="block text-sm font-medium text-gray-700">Item Name</label>
                            <input type="text" name="name" class="mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" name="quantity" class="mt-1 w-24 rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div>
                            <button type="submit" class="mt-4 sm:mt-0 px-4 py-2 bg-blue-600 text-black rounded-md hover:bg-blue-700">
                                Add
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Inventory Table -->
                <table class="min-w-full divide-y divide-gray-200 mt-6">
                    <thead class="bg-gray-100 text-sm font-medium text-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left">Item</th>
                            <th class="px-4 py-2 text-left">Quantity</th>
                            <th class="px-4 py-2 text-left">Added</th>
                            <th class="px-4 py-2 text-left">Actions</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-800">
                        @forelse ($items as $item)
                            <tr>
                                <td class="px-4 py-2">{{ $item->name }}</td>
                                <td class="px-4 py-2">{{ $item->quantity }}</td>
                                <td class="px-4 py-2">{{ $item->created_at->diffForHumans() }}</td>
                                <td class="px-4 py-2">
                                <a href="{{ route('inventory.edit', $item->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <a href="{{ route('inventory.show', $item->id) }}" class="text-blue-600 hover:underline">View</a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-2 text-gray-500">No items found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
