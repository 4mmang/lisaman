<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['payment', 'detail'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['payment', 'detail.product'])->find($id);
        $amount = 0;
        foreach ($order->detail as $detail) {
            $amount += $detail->product->price * $detail->quantity;
        }
        return view('admin.orders.show', compact('order', 'amount'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = 'paid';
        $payment->save();
        return back()->with([
            'message' => 'Pembayaran berhasil disetujui',
        ]);
    }
}
