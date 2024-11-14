@extends('layouts.app')
@section('content')
    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-36 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-8">Sejarah</h2>
                    <div class="min-w-full mb-10">
                        <img src="{{ asset('img/033073800_1662959004-Kain_Tenun_Mandar 1.png') }}" alt="Gambar 1" class="w-full h-auto rounded-lg" />
                    </div>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Here are some of the most recent projects I've worked on in the field of web development. Each
                        portfolio highlights my
                        skills, creativity, and dedication to delivering high-quality websites. Take a look at the
                        latest work that demonstrates
                        my expertise in web development.
                    </p>
                </div>
            </div>
    
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                {{-- <div class="mb-12 p-4 md:w-1/3">
                    <a href="#" class="block">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                    
                        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
                    
                        <p class="mt-2 max-w-sm text-gray-700">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                        </p>
                    </a>
                </div> 
                <div class="mb-12 p-4 md:w-1/3">
                    <a href="#" class="block">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                    
                        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
                    
                        <p class="mt-2 max-w-sm text-gray-700">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                        </p>
                    </a>
                </div> 
                <div class="mb-12 p-4 md:w-1/3">
                    <a href="#" class="block">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                    
                        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
                    
                        <p class="mt-2 max-w-sm text-gray-700">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                        </p>
                    </a>
                </div>  --}}
            </div>
        </div>
    </section>
    <!-- Portofolio Section End -->

    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-0 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-4">Tahapan Pembuatan Lipa Sabe</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Here are some of the most recent projects I've worked on in the field of web development. Each
                        portfolio highlights my
                        skills, creativity, and dedication to delivering high-quality websites. Take a look at the
                        latest work that demonstrates
                        my expertise in web development.
                    </p>
                </div>
            </div>
    
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/3">
                    <a href="#" class="block">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                
                        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
                
                        <p class="mt-2 max-w-sm text-gray-700">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                        </p>
                    </a>
                </div>
                <div class="mb-12 p-4 md:w-1/3">
                    <a href="#" class="block">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                
                        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
                
                        <p class="mt-2 max-w-sm text-gray-700">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                        </p>
                    </a>
                </div>
                <div class="mb-12 p-4 md:w-1/3">
                    <a href="#" class="block">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                
                        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
                
                        <p class="mt-2 max-w-sm text-gray-700">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Portofolio Section End -->

    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-0 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-4">Aktivitas Budaya</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Here are some of the most recent projects I've worked on in the field of web development. Each
                        portfolio highlights my
                        skills, creativity, and dedication to delivering high-quality websites. Take a look at the
                        latest work that demonstrates
                        my expertise in web development.
                    </p>
                </div>
            </div>
    
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('img/WhatsApp Image 2024-10-08 at 13.24.15.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Dataset Collection Platform</h3>
                    <p class="font-medium text-base text-secondary">This project is a web-based platform designed for
                        collecting and managing datasets. Built using Laravel as the back-end
                        framework, the platform efficiently handles data management and user authentication. The
                        front-end is developed using
                        Bootstrap for responsive design and jQuery to enhance interactivity and handle dynamic content.
                        The platform allows
                        users to upload, manage, and download datasets, providing an intuitive and user-friendly
                        interface.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('img/WhatsApp Image 2024-10-09 at 11.02.24.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Musical Instrument Sales </h3>
                    <p class="font-medium text-base text-secondary">This project is a web-based platform for selling
                        musical instruments, built using Laravel for the back-end, Bootstrap
                        for the front-end, and jQuery to enhance interactivity. The platform allows users to browse and
                        purchase musical
                        instruments with ease. It also features an integrated payment system using Midtrans, ensuring
                        secure and seamless
                        transactions.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('img/WhatsApp Image 2024-10-09 at 11.02.23.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Realtime Chat </h3>
                    <p class="font-medium text-base text-secondary">The Realtime Chat project is a Laravel-based web
                        application that uses Pusher to send real-time messages without needing
                        to refresh the page
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('img/WhatsApp Image 2024-10-09 at 11.02.22.png') }}" alt=""
                            width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Supplier Selection Decision Support System
                        using the SAW Method</h3>
                    <p class="font-medium text-base text-secondary">This project is a web-based Supplier Selection
                        Decision Support System built with Laravel, utilizing the Simple Additive
                        Weighting (SAW) method to assist in selecting the best supplier based on predefined criteria.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Portofolio Section End -->
@endsection