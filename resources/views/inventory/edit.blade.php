<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Item
        </h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('inventory.update', $item->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block">Name</label>
                    <input type="text" name="name" value="{{ $item->name }}" class="w-full border rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block">Quantity</label>
                    <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-full border rounded p-2" required>
                </div>

                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
