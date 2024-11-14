@extends('layouts.app')
@section('content')
    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-32 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-10">
                    <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-4">YOUR ORDER</h2>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="order-table" class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="bg-gray-100 text-center">
                        <tr class="text-center">
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Created At</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Status</th>
                            <th class="px-4 py-2 font-medium text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($orders as $order)
                        <tr class="hover:bg-gray-50">
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $loop->iteration }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                <span class="border px-3 py-1 rounded-full 
                                        {{ $order->payment->status === 'paid' ? 'bg-green-400' : 'bg-red-400' }} text-white">
                                    {{ $order->payment->status }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <a href="{{ route('my-order.show', $order->id) }}"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Portofolio Section End -->
@endsection
@section('scripts')
    <script>
        $('#order-table').DataTable({
                layout: {
                    topStart: 'info',
                    bottom: 'paging',
                    bottomStart: null,
                    bottomEnd: null
                }
            });
    </script>
@endsection