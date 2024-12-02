@extends('layouts.app')
@section('content')
    <section id="portofolio" class="pt-32 pb-16 bg-slate-100">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                {{-- <h4 class="font-semibold text-lg text-primary mb-2">Product</h4> --}}
                <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Manual Book LISAMAN</h2>
                <p class="font-medium text-md text-secondary md:text-lg">
                    Anda bisa melihat panduan penggunaan sistem LISAMAN <a class="text-primary" href="{{ asset('Manual Book Lisaman (2).pdf') }}">disini</a>.
                </p>
            </div>
        </div>
    </section>
@endsection