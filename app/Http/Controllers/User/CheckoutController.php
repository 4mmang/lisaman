<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
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
        return view('checkout', compact('carts', 'total'));
    }

    public function order(Request $request)
    {
        $order = Order::create([
            'id_user' => Auth::user()->id,
            'name' => $request->name,
            'number_phone' => $request->number_phone,
            'shipping_address' => $request->shipping_address,
            'payment_method' => $request->payment_method,
        ]);

        $carts = Cart::where('id_user', Auth::user()->id)->get();
        $amount = 0;
        foreach ($carts as $cart) {
            $product = Product::find($cart->id_product);
            $product->stok = $product->stok - $cart->quantity;
            $product->save();
            $amount += $cart->product->price * $cart->quantity;
            OrderDetail::create([
                'id_order' => $order->id,
                'id_product' => $cart->id_product,
                'quantity' => $cart->quantity,
            ]);
            $cart->delete();
        }

        Payment::create([
            'id_order' => $order->id,
            'amount' => $amount,
            'status' => 'unpaid',
        ]);

        return redirect()->route('my-order.show', $order->id);
    }

    public function payment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $path = $request->file('proof_payment')->store('proof-payment', 'public');
        $payment->proof_payment = $path;
        $payment->status = 'pending';
        $payment->save();
        return back()->with([
            'message' => 'Berhasil mengupload bukti pembayaran',
        ]);
    }
}
