<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Category;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::with('category')->latest()->get();
        return view('drugs.index', compact('drugs'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('drugs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Drug::create($request->all());

        return redirect()->route('drugs.index')->with('success', 'Drug added successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $drug = Drug::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('drugs.edit', compact('drug', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $drug = Drug::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $drug->update($request->all());

        return redirect()->route('drugs.index')->with('success', 'Drug updated successfully.');
    }

    public function destroy(string $id)
    {
        $drug = Drug::findOrFail($id);
        $drug->delete();

        return redirect()->route('drugs.index')->with('success', 'Drug deleted successfully.');
    }
}