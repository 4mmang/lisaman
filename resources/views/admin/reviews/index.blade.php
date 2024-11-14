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
            <h1 class="text-3xl font-base text-slate-700 mb-4">Reviews</h1>
            <a href="{{ route('product.index') }}" class="border p-3 px-5 bg-primary rounded-lg text-white">Back</a>
            @if (session('message'))
                <p class="w-full border p-3 bg-green-300 rounded-md mt-4 -mb-2">{{ session('message') }}</p>
            @endif
            <div class="overflow-x-auto">
                <table id="reviews-table" class="min-w-full divide-y-2 mt-6 divide-gray-200 bg-white text-sm">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Username</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Comment</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($reviews as $review)
                            <tr>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $loop->iteration }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $review->user->username }}</td>
                                <td class="px-4 py-2 text-gray-700">{{ $review->comment }}</td>
                                <td class="whitespace-nowrap px-4 py-2">
                                    <form action="{{ route('review.destroy', $review->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="inline-block rounded bg-red-500 px-4 py-2 text-xs font-medium text-white">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#reviews-table').DataTable({
            layout: {
                topStart: 'info',
                bottom: 'paging',
                bottomStart: null,
                bottomEnd: null
            }
        });
    </script>
@endsection
