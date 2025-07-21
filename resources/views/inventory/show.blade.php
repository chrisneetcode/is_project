<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Item
        </h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            <p><strong>Name:</strong> {{ $item->name }}</p>
            <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
            <p><strong>Added:</strong> {{ $item->created_at->toDayDateTimeString() }}</p>
        </div>
    </div>
</x-app-layout>
