<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; // Assuming Category model exists
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index(Request $request)
    {
        // Fetch categories with pagination
        $categories = Category::paginate($request->get('pageSize') ?? 10); // Default to 10 items per page if no pageSize provided
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        // Create the category
        Category::create($validated);

        // Redirect with success message
        return redirect()->route('admin.categories')->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        // Find the category by ID and update it
        $category = Category::findOrFail($id);
        $category->update($validated);

        // Redirect with success message
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        // Find the category by ID and delete it
        $category = Category::findOrFail($id);
        $category->delete();

        // Redirect with success message
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully!');
    }
}
