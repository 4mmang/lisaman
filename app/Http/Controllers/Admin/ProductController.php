<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required',
            'stok' => 'required',
            'price' => 'required',
            'image' => 'required',
            'id_category' => 'required',
            'description' => 'required',
        ]);

        $path = $request->file('image')->store('image', 'public');

        Product::create([
            'name_product' => $request->name_product,
            'stok' => $request->stok,
            'price' => $request->price,
            'image' => $path,
            'id_category' => $request->id_category,
            'description' => $request->description,
        ]);

        return back()->with([
            'message' => 'Berhasil menambahkan product baru',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name_product' => 'required',
            'stok' => 'required',
            'price' => 'required',
            'id_category' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('image')) {
            Storage::delete('public/' . $product->image);
            $path = $request->file('image')->store('image', 'public');
            $product->image = $path;
        }

        $product->name_product = $request->name_product;
        $product->stok = $request->stok;
        $product->price = $request->price;
        $product->id_category = $request->id_category;
        $product->description = $request->description;
        $product->save();

        return back()->with([
            'message' => 'Berhasil mengedit data product',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/' . $product->image);
        $product->delete();
        return back()->with([
            'message' => 'Data Product berhasil dihapus',
        ]);
    }
}
