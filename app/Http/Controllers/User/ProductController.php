<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('produk', compact('products'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        $reviews = Review::with('user')->where('id_product', $id)->get();
        return view('detail', compact('product', 'reviews'));
    }
}
