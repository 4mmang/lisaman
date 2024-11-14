@extends('layouts.app')
@section('content')
    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-24 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-5">
                    {{-- <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-4">Kontak</h2> --}}
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="p-4 w-full md:w-1/2 ">
                    <div class="border p-6 shadow-lg bg-white flex items-center space-x-4">
                        <form action="{{ route('create.order') }}" method="post">
                            @csrf
                            <p class="text-3xl">Detail Pemesanan:</p>
                            <hr class="mb-3 mt-3">
                            <div class="flex flex-wrap space-y-4 md:space-y-0 md:flex-nowrap md:space-x-4">
                                <div class="mb-4 w-full md:w-1/2">
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Full
                                        Name:</label>
                                    <input type="text" id="name" name="name" placeholder="Enter your full name"
                                        class="shadow valid:border-green-500 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        required>
                                </div>

                                <div class="mb-4 w-full md:w-1/2">
                                    <label for="number_phone" class="block text-gray-700 text-sm font-bold mb-2">Number
                                        Phone:</label>
                                    <input type="number" id="number_phone" name="number_phone"
                                        placeholder="Enter your number phone"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                            </div>
                            <div class="mb-4 w-full">
                                <label for="payment_method" class="block text-gray-700 text-sm font-bold mb-2">Payment
                                    Method:</label>
                                <select name="payment_method" id="payment_method" class="w-full" required>
                                    <option value="cod">COD</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                            </div>
                            <div class="mb-5 mt-4 w-full">
                                <label for="shipping_address" class="block text-gray-700 text-sm font-bold mb-2">Shipping
                                    Address:</label>
                                <textarea required rows="6" id="shipping_address" name="shipping_address" placeholder="Enter your shipping  address"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
                    </div>
                </div>
                <div class="p-4 w-full md:w-1/2">
                    <div class="border p-6 shadow-lg mb-7">
                        <p class="text-3xl">Daftar Pesanan</p>
                        <hr class="mb-5 mt-3">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                                <thead class="ltr:text-left rtl:text-right">
                                    <tr>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Product</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Quantity</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Unit Price (Rp)
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 text-center">
                                    @foreach ($carts as $cart)
                                        <tr class="odd:bg-gray-50">
                                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                                {{ $cart->product->name_product }}</td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $cart->quantity }}</td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="odd:bg-gray-50 ">
                                        <td colspan="2"
                                            class="whitespace-nowrap text-end px-4 py-2 font-medium text-gray-900">Order
                                            Total</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">Rp.
                                            {{ number_format($total, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="border p-3 px-5 bg-primary text-white float-end">Buat
                        Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Portofolio Section End -->
@endsection
