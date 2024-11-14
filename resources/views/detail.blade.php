@extends('layouts.app')
@section('content')
    <!-- About Section Start -->
    <section id="about" class="pt-32 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">Detail Produk</h4>
                    <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl"></h4>
                    <a href="#" class="group block overflow-hidden">
                        <div class="relative h-[350px] sm:h-[450px]">
                            <img src="{{ asset('storage/' . $product->image) }}" alt=""
                                class="absolute inset-0 h-full w-full object-contain" />
                        </div>
                    </a>
                </div>

                <div class="w-full px-4 lg:w-1/2 mb-10">
                    <h3 class="font-semibold text-dark text-2xl mb-4 lg:text-3xl lg:pt-10">{{ $product->name_product }}</h3>
                    <p class="font-semibold text-2xl mb-4">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="font-medium text-base text-secondary mb-6">{{ $product->description }}</p>
                    <hr>
                    <div class="mt-7">
                        <label for="Quantity" class="sr-only"> Quantity </label>

                        <div class="flex items-center gap-1">
                            <form action="{{ route('my-cart.store') }}" method="post">
                                @csrf
                                <button type="button" onclick="reduceQuantity()"
                                    class="size-10 leading-10 text-gray-600 transition hover:opacity-75">
                                    &minus;
                                </button>
                                <input type="hidden" name="id_product" value="{{ $product->id }}">
                                <input type="number" id="quantity" name="quantity" value="1"
                                    class="h-10 w-16 rounded border-gray-200 text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />

                                <button type="button" onclick="addQuantity({{ $product->stok }})"
                                    class="size-10 leading-10 text-gray-600 transition hover:opacity-75">
                                    &plus;
                                </button>
                                <button type="submit" class="border p-2 px-5 rounded-sm bg-red-500 text-white">Add to
                                    cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 mb-10">
                    <h3 class="font-semibold text-dark text-2xl mb-4 lg:text-2xl lg:pt-10">Review Product</h3>
                    @foreach ($reviews as $review)
                        <div class="border p-3 px-5 rounded-md mt-3 bg-slate-200">
                            <p class="font-semibold">{{ ucfirst($review->user->username) }}</p>
                            <p>{{ $review->comment }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <h3 class="font-semibold text-dark text-2xl mb-4 lg:text-2xl lg:pt-10">Add Review</h3>
                    <p class="mb-3">Your data will not be published.</p>
                    @if (session('message'))
                        <p class="w-full border p-3 bg-green-400 rounded-md mb-4">{{ session('message') }}</p>
                    @endif
                    <form action="{{ route('review.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                        <textarea required name="comment" placeholder="Leave a comment" class="w-full rounded-md" id="" cols="30"
                            rows="7"></textarea>
                        <button type="submit" class="border p-2 px-6 rounded-lg float-end bg-primary text-white mt-3">Send
                            review</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
@endsection
@section('scripts')
    <script>
        let quantity = document.getElementById('quantity')

        function reduceQuantity() {
            if (quantity.value > 1) {
                quantity.value = quantity.value - 1;
            }
        }

        function addQuantity(stok) {
            let currentQuantity = parseInt(quantity.value)
            if (quantity.value < stok) {
                quantity.value = currentQuantity + 1;
            }
        }
    </script>
@endsection
