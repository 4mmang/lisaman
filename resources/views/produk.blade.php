@extends('layouts.app')
@section('content')
    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-32 pb-16 bg-slate-100">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg text-primary mb-2">Produk</h4>
                <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Sarung</h2>
                <p class="font-medium text-md text-secondary md:text-lg">
                    Lipa Sa'be, tenun tangan yang diwariskan turun temurun, dengan benang halus dan motif rumit yang
                    menawan.
                </p>
                <input type="text" autocomplete="off" id="product" name="product" placeholder="Cari produk"
                    class="shadow appearance-none border rounded-full w-full py-4 px-6 mt-8 text-gray-700 leading-tight"
                    required>
                <div id="dropdown" class="bg-white shadow-lg rounded-lg mt-2 w-full hidden">
                    <!-- Hasil pencarian akan muncul di sini -->
                </div>
            </div>
        </div>
        <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
            @foreach ($products as $product)
                <div class="mb-12 p-4 md:w-1/4 ">
                    <a href="{{ route('user.product.show', $product->id) }}" class="group relative block overflow-hidden">
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
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productInput = document.getElementById('product');
            productInput.setAttribute('autocomplete', 'off');
            const dropdown = document.getElementById('dropdown');

            productInput.addEventListener('input', function() {
                const query = productInput.value;

                // Jika input kosong, sembunyikan dropdown
                if (query === '') {
                    dropdown.classList.add('hidden');
                    dropdown.innerHTML = '';
                    return;
                }


                // Kirim permintaan ke backend
                fetch(`/search/${query}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const products = data.products;
                        console.log(products);

                        // Jika tidak ada hasil, sembunyikan dropdown
                        if (products.length < 1) {
                            dropdown.classList.add('hidden');
                            dropdown.innerHTML = '';
                            return;
                        }

                        // Tampilkan hasil pencarian
                        dropdown.classList.remove('hidden');
                        dropdown.innerHTML = products
                        dropdown.innerHTML = products
                            .map(product => `
        <a href="/product/${product.id}" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">
            ${product.name_product}
        </a>
    `)
                            .join('');

                        // Tambahkan event listener untuk setiap hasil
                        dropdown.querySelectorAll('div').forEach(item => {
                            item.addEventListener('click', function() {
                                productInput.value = item.textContent;
                                dropdown.classList.add('hidden');
                            });
                        });
                    })
                    .catch(error => {
                        console.error('Fetch Error:', error);
                    });
            });
        });
    </script>
@endsection
