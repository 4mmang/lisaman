@extends('layouts.app')
@section('content')
    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-32 pb-16 bg-slate-100">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2">Produk</h4>
                <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Sarung</h2>
                <p class="font-medium text-md text-secondary md:text-lg">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis ab modi quibusdam, aut dignissimos quam?
                </p>
                <input type="text" id="name" name="name" placeholder="Cari produk"
                    class="shadow appearance-none border rounded-full w-full py-4 px-6 mt-8 text-gray-700 leading-tight"
                    required>
            </div>
        </div>
        <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
            @foreach ($products as $product)
            <div class="mb-12 p-4 md:w-1/4 ">
                <a href="{{ route('user.product.show', $product->id) }}" class="group relative block overflow-hidden">
                    {{-- <img
                        src="https://images.unsplash.com/photo-1600185365926-3a2ce3cdb9eb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1450&q=80"
                        alt="" class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" /> --}}
                    <img src="{{ asset('storage/' . $product->image) }}" alt=""
                        class="h-64 bg-white w-full object-contain transition duration-500 group-hover:scale-105 sm:h-72" />
            
                    <div class="relative border border-gray-100 bg-white p-6">
                        <h3 class="mt-1.5 text-lg font-medium text-gray-900">{{ $product->name_product }}</h3>
                        <p class=" mb-1 line-clamp-3 text-gray-700 text-sm">
                            Available : {{ $product->stok }}
                        </p>
                        <p class="text-gray-700">
                            Rp. {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <form class="mt-4 flex gap-4" action="{{ route('my-cart.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id_product" id="id_product" value="{{ $product->id }}">
                            <button type="submit"
                                class="block w-full rounded bg-gray-100 px-2 py-3 text-sm font-medium text-gray-900 transition hover:scale-105">
                                Add to Cart
                            </button>
                            <button type="submit"
                                class="block w-full rounded bg-primary px-2 py-3 text-sm font-medium text-white transition hover:scale-105">
                                Buy Now
                            </button>
                        </form>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Portofolio Section End -->
@endsection
