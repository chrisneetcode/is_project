<?php

namespace App\Http\Controllers;
use App\Models\Inventory;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Inventory::all();
        return view('inventory.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        Inventory::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('inventory')->with('success', 'Item added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $item = Inventory::findOrFail($id);
    return view('inventory.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $item = Inventory::findOrFail($id);
    return view('inventory.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $item = Inventory::findOrFail($id);
    $item->update($request->validate([
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:0',
    ]));

    return redirect()->route('inventory')->with('success', 'Item updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
