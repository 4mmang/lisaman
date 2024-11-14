<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('id_user', Auth::user()->id)
            ->with('product')
            ->get();
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->product->price * $cart->quantity;
        }
        return view('my-cart', compact('carts', 'total'));
    }

    public function store(Request $request)
    {
        Cart::create([
            'id_user' => Auth::user()->id,
            'id_product' => $request->id_product,
            'quantity' => $request->quantity ?? 1,
        ]);

        return redirect()->route('my-cart.index');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return back()->with([
            'message' => 'Data product berhasil dihapus dari cart',
        ]);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::with('product')->find($id);
        if ($cart->product->stok < $request->quantity) {
            $quantity = $cart->quantity;
            return response()->json(['success' => false, 'quantity' => $quantity, 'stok' => $cart->product->stok]);
        } else {
            $cart->quantity = $request->quantity;
            $cart->save();

            $carts = Cart::where('id_user', Auth::user()->id)
                ->with('product')
                ->get();
            $total = 0;
            foreach ($carts as $cart) {
                $total += $cart->quantity * $cart->product->price;
            }

            return response()->json(['success' => true, 'total' => $total]);
        }
    }
}
