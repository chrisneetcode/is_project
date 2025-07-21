<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items.index'); // You'll make this view later
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorizeAdmin();
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorizeAdmin();
        // Store logic here
        return redirect()->route('items.index')->with('success', 'Item created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorizeAdmin();
        return view('items.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorizeAdmin();
        return view('items.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorizeAdmin();
        // Update logic here
        return redirect()->route('items.index')->with('success', 'Item updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorizeAdmin();
        // Delete logic here
        return redirect()->route('items.index')->with('success', 'Item deleted.');
    }

        private function authorizeAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized.');
        }
    }
}
