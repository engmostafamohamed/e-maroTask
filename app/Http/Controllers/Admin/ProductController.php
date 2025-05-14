<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        Product::create($request->only('name', 'price'));
        return redirect()->route('admin.products');
    }

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->only('name', 'price'));
        return redirect()->route('admin.products');
    }

    public function destroy($id) {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products');
    }
}
