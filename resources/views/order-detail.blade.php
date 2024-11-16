@extends('layouts.app')
@section('content')
    <section class="mt-24">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <header class="text-center mb-6">
                    <h1 class="text-xl font-bold text-primary sm:text-3xl">ORDER DETAIL</h1>
                </header>
                <a href="{{ url('my-order') }}" class="text-primary">
                    <i class="fa fa-arrow-left"></i> Kembali</a>
                        <p class="mt-4">Nama Lengkap : {{ $order->name }}</p>
                        <p>Alamat : {{ $order->shipping_address }}</p>
                        <p>Nomor Handphone : {{ $order->number_phone }}</p>
                        <p>Status Pesanan : <span
                                class="border bg-yellow-500 text-dark p-1 rounded-full px-3">{{ $order->payment->status }}</span>
                        </p>
                        <div class="mt-8">
                            <ul class="space-y-4">
                                @foreach ($order->detail as $detail)
                                    <li class="flex items-center gap-4">
                                        <img src="{{ asset('storage/'.$detail->product->image) }}"
                                            alt="" class="size-16 rounded object-cover" />

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

                                                <input type="number" disabled value="{{ $detail->quantity }}"
                                                    id="Line1Qty"
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
                                        @if ($order->payment->status == 'unpaid')
                                            <p>Silahkan melakukan pembayaran pada salah satu rekening bank berikut, Kemudian
                                                upload
                                                bukti pembayaran dan tunggu validasi dari admin:</p>
                                            <p class="">BRI : 423642364324632</p>
                                            <p class="">BNI : 321312341</p>
                                            <form action="{{ route('payment.order', $order->payment->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="flex justify-end">
                                                    <input type="file" class="mt-2" name="proof_payment"
                                                        id="proof_payment">
                                                    <button type="submit"
                                                        class="block rounded bg-primary px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                                                        Upload
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
    </section>
    @if (session('message'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{ session('message') }}",
                icon: "success"
            });
        </script>
    @endif
@endsection
