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
            <h1 class="text-3xl font-base text-slate-700 mb-4">Tambah Category</h1>
            <div class="border p-6 shadow-lg bg-slate-100 rounded-md pb-7">
                <form action="{{ route('category.update', $category->id) }}" method="post">
                    @if (session('message'))
                        <p class="w-full border p-3 bg-green-300 rounded-md mb-4">{{ session('message') }}</p>
                    @endif
                    @csrf
                    @method('put')
                    @if ($errors->any())
                        <div class="border p-3 bg-red-300 mb-4 rounded-md">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex flex-wrap gap-4 lg:flex-nowrap">
                        <div class="w-full">
                            <label for="name_category" class="block text-gray-700 text-sm font-bold mb-2">Name
                                Category:</label>
                            <input type="text" autofocus value="{{ $category->name_category }}" id="name_category"
                                name="name_category" placeholder=""
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4 lg:flex-nowrap mt-4 mb-6">
                        <div class="w-full">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea type="text" cols="5" rows="5" autofocus id="description" name="description" placeholder=""
                                class="shadow w-full valid:border-green-500 appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">{{ $category->description }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="border p-2 px-4 py-2 rounded-md bg-primary text-white"><i
                            class="fas fa-save mr-1"></i>Simpan</button>
                    <a href="{{ url('admin/category') }}" class="border p-2 px-4 py-3 rounded-md bg-red-600 text-white"><i
                            class="fas fa-arrow-left mr-1"></i>Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
