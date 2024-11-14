@extends('layouts.master')
@section('content')
    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Navbar di atas konten utama -->
        <nav class="bg-white p-4 sticky top-0 z-10">
            <div class="flex justify-between items-center">
                <div class="text-lg font-semibold md:hidden">
                    <a href="{{ url('/') }}" class="text-3xl text-slate-700">LISAMAN</a>
                </div>
                <!-- Tombol toggle sidebar -->
                <button id="menu-btn" class="p-2 rounded-lg text-dark md:hidden">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <!-- Menu navigasi untuk desktop -->
                <ul class="hidden md:flex space-x-4 ml-auto text-red-500">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                    </form>
                </ul>
            </div>
        </nav>

        <div class="flex-1 p-6 bg-gray-100 overflow-y-auto">
            <h1 class="text-3xl font-base text-slate-700"><a href="{{ route('order.index') }}"><i class="fa fa-arrow-left"></i></a> Detail Orderan</h1>
            <div class="overflow-x-auto">
                <p class="mt-4 text-gray-600">Nama Lengkap : {{ $order->name }}</p>
                <p class="text-gray-600">Alamat : {{ $order->shipping_address }}</p>
                <p class="text-gray-600">Nomor Handphone : {{ $order->number_phone }}</p>
                <p class="text-gray-600">Waktu Pemesanan : {{ $order->created_at }}</p>
                <p class="text-gray-600">Status Pesanan : <span
                        class="border bg-indigo-500 text-white p-1 rounded-full px-3">{{ $order->payment->status }}</span>
                </p>
                <div class="mt-8">
                    <ul class="space-y-4">
                        @foreach ($order->detail as $detail)
                            <li class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $detail->product->image) }}" alt=""
                                    class="size-16 rounded object-cover" />

                                <div>
                                    <h3 class="text-sm text-gray-900">{{ $detail->product->name_product }}</h3>

                                    <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                        <div>
                                            <dt class="inline">Unit Price:</dt>
                                            <dd class="inline">Rp.
                                                {{ number_format($detail->product->price, 0, ',', '.') }}</dd>
                                        </div>
                                    </dl>
                                </div>

                                <div class="flex flex-1 items-center justify-end gap-2">
                                    <form>
                                        <label for="Line1Qty" class="sr-only"> Quantity </label>

                                        <input type="number" disabled value="{{ $detail->quantity }}" id="Line1Qty"
                                            class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                    </form>

                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                        <div class="w-screen max-w-lg space-y-4">
                            <dl class="space-y-0.5 text-sm text-gray-700">
                                <div class="flex justify-between">
                                    <dt>Payment Method</dt>
                                    <dd class="uppercase">{{ $order->payment_method }}</dd>
                                </div>


                                <div class="flex justify-between !text-base font-medium">
                                    <dt>Total Amount</dt>
                                    <dd>Rp. {{ number_format($amount, 0, ',', '.') }}</dd>
                                </div>
                            </dl>

                            @if ($order->payment_method !== 'cod')
                                @if ($order->payment->status == 'pending')
                                    <div class="flex justify-center !text-base font-medium">
                                        <img src="{{ asset('storage/' . $order->payment->proof_payment) }}" alt="">
                                    </div>
                                    <form action="{{ route('order.update', $order->payment->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="flex justify-center">
                                            <button type="submit"
                                                class="block rounded bg-primary px-5 py-3 mt-5 text-sm text-gray-100 transition hover:bg-gray-600">
                                                Approve
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            @else
                                @if ($order->payment->status !== 'paid')
                                    <form action="{{ route('order.update', $order->payment->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="block rounded bg-primary px-5 py-3 mt-5 text-sm text-gray-100 transition hover:bg-gray-600">
                                                Pesanan Diterima
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
