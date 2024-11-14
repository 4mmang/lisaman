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
            <h1 class="text-3xl font-base text-slate-700 mb-4">Add Product</h1>
            <div class="border p-6 shadow-lg bg-slate-100 rounded-md pb-7">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @if (session('message'))
                        <p class="w-full border p-3 bg-green-300 rounded-md mb-4">{{ session('message') }}</p>
                    @endif
                    @csrf
                    @if ($errors->any())
                        <div class="border p-3 bg-red-300 mb-4 rounded-md">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex flex-wrap gap-4 lg:flex-nowrap">
                        <div class="w-full lg:w-1/2">
                            <label for="name_product" class="block text-gray-700 text-sm font-bold mb-2">Name
                                Product:</label>
                            <input type="text" autofocus value="{{ old('name_product') }}" id="name_product"
                                name="name_product" placeholder=""
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="stok" class="block text-gray-700 text-sm font-bold mb-2">Stok:</label>
                            <input type="number" autofocus value="{{ old('stok') }}" id="stok" name="stok"
                                placeholder=""
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                            <input type="number" autofocus value="{{ old('price') }}" id="price" name="price"
                                placeholder=""
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 lg:flex-nowrap mt-4">
                        <div class="w-full lg:w-1/2">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                            <input type="file" autofocus value="{{ old('image') }}" id="image" name="image"
                                placeholder=""
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="id_category" class="block text-gray-700 text-sm font-bold mb-2">Name
                                Product:</label>
                            <select name="id_category" id="id_catgeory" class="w-full rounded-md">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 lg:flex-nowrap mt-4 mb-6">
                        <div class="w-full">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea type="text" cols="5" rows="5" autofocus id="description" name="description" placeholder=""
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="border p-2 px-4 py-2 rounded-md bg-primary text-white"><i
                            class="fas fa-save mr-1"></i>Simpan</button>
                    <a href="{{ route('product.index') }}" class="border p-2 px-4 py-3 rounded-md bg-red-600 text-white"><i
                            class="fas fa-arrow-left mr-1"></i>Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
