<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('id_user', Auth::user()->id)->with('payment')->get();
        return view('my-order', compact('orders'));
    }

    public function show($id){
        $order = Order::with('detail.product', 'payment')->findOrFail($id);
        $amount = 0;
        foreach ($order->detail as $detail) {
            $amount += $detail->product->price * $detail->quantity;
        }
        return view('order-detail', compact('order', 'amount'));
    }
}
