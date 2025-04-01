<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('catalogue.index', compact('catalogues'));
    }

    // Show the form to create a new catalogue item
    public function create()
    {
        return view('catalogue.create');
    }

    // Store the new catalogue item in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|string',
        ]);

        Catalogue::create($request->all());

        return redirect()->route('catalogue.index')->with('success', 'Item created successfully.');
    }

    // Show the form to edit an existing catalogue item
    public function edit(Catalogue $catalogue)
    {
        return view('catalogue.edit', compact('catalogue'));
    }

    // Update the catalogue item in the database
    public function update(Request $request, Catalogue $catalogue)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|string',
        ]);

        $catalogue->update($request->all());

        return redirect()->route('catalogue.index')->with('success', 'Item updated successfully.');
    }

    // Delete the catalogue item from the database
    public function destroy(Catalogue $catalogue)
    {
        $catalogue->delete();

        return redirect()->route('catalogue.index')->with('success', 'Item deleted successfully.');
    }
}
