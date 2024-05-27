<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|min:3|max:50',
        ]);

        Category::create($validatedData);

        return redirect()->route('admin.categories')->with('success', 'Category created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|min:3|max:50',
        ]);

        $category->update($validatedData);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully!');
    }

    public function status(Category $category)
    {
        if($category->status == 'Active') {
            $category->status = 'Inactive';
        } else {
            $category->status = 'Active';
        }

        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category status updated successfully!');
    }
}
