<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'product_desc' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $image = $request->file('product_image');
        $imageName = $request->input('product_name') . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('product_images', $imageName, 'public');
        $validateData['product_image'] = $imageName;

        Product::create($validateData);

        return redirect()->route('admin.products')->with('success', 'Product created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'product_desc' => 'required',
        ]);


        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = $request->input('product_name') . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('product_images', $imageName, 'public');
            $validateData['product_image'] = $imageName;
            Storage::disk('public')->delete('product_images/' . $product->product_image);
            $product->product_image = $imageName;
        } else {
            $validateData['product_image'] = $product->product_image;
        }

        $product->update($validateData);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
    }
}
