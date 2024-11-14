@extends('layouts.app')
@section('content')
    <section class="mt-24">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <header class="text-center">
                    <h1 class="text-xl font-bold text-primary sm:text-3xl">Your Cart</h1>
                    @if ($carts->count() < 1)
                        <h3 class="text-xl mt-10 mb-10">Your Cart is Empty, Click <a href="{{ route('user.product.index') }}"
                                class="text-primary">here</a> to search for products</h3>
                    @endif
                </header>
                @if ($carts->count() > 0)
                    <div class="mt-8">
                        <ul class="space-y-4">
                            @foreach ($carts as $cart)
                                <li class="flex items-center gap-4">
                                    <img src="{{ asset('storage/' . $cart->product->image) }}" alt=""
                                        class="size-16 rounded object-cover" />

                                    <div>
                                        <h3 class="text-sm text-gray-900">{{ $cart->product->name_product }}</h3>

                                        <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                            <div>
                                                <dt class="inline">Price:</dt>
                                                <dd class="inline">Rp.
                                                    {{ number_format($cart->product->price, 0, ',', '.') }}</dd>
                                            </div>
                                        </dl>
                                    </div>

                                    <div class="flex flex-1 items-center justify-end gap-2">
                                        <form>
                                            <label for="quantity" class="sr-only"> Quantity </label>

                                            <input type="number" min="1" value="{{ $cart->quantity }}"
                                                id="quantity-{{ $cart->id }}"
                                                class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 
                                                   [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 
                                                   [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 
                                                   [&::-webkit-outer-spin-button]:appearance-none"
                                                onchange="updateQuantity({{ $cart->id }})" />
                                        </form>
                                        <form action="{{ route('my-cart.destroy', $cart->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-gray-600 transition mt-1.5 hover:text-red-600">
                                                <span class="sr-only">Remove item</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                            <div class="w-screen max-w-lg space-y-4">
                                <dl class="space-y-0.5 text-sm text-gray-700">
                                    <div class="flex justify-between !text-base font-medium">
                                        <dt>Total</dt>
                                        <dd id="total-price">Rp. {{ number_format($total, 0, ',', '.') }}</dd>
                                    </div>
                                </dl>

                                <div class="flex justify-end">
                                </div>

                                <div class="flex justify-end">
                                    <a href="{{ url('checkout') }}"
                                        class="block rounded bg-primary px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                                        Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function updateQuantity(cartId) {
            const quantityInput = document.getElementById(`quantity-${cartId}`);
            const newQuantity = quantityInput.value;
            fetch(`my-cart/${cartId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        _method: 'put',
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById("total-price").innerText =
                            `Rp. ${new Intl.NumberFormat('id-ID').format(data.total)}`;
                    } else {
                        quantityInput.value = data.quantity
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: `Stok product tidak cukup, stok hanya tersisa ${data.stok}`,
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi kesalahan",
                    });
                });
        }
    </script>
@endsection
