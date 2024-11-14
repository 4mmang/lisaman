@extends('layouts.app')
@section('content')
    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-36 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-5">
                    <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-4">Contact</h2>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="p-4 md:w-1/2 w-full">
                    <div class="border p-6 shadow-lg bg-white flex items-center space-x-4">
                        <i class="fas fa-envelope text-xl border p-5 rounded-full bg-primary text-white"></i>
                        <div>
                            <p>Email Us</p>
                            <p>Lisaman@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 w-full">
                    <div class="border p-6 shadow-lg bg-white flex items-center space-x-4">
                        <i class="fas fa-phone text-xl border p-5 rounded-full bg-primary text-white"></i>
                        <div>
                            <p>Telephone</p>
                            <p>+6264236462346</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 w-full">
                    @if (session('message'))
                    <p class="border py-2 w-full rounded-md bg-green-400 px-3 mb-3">{{ session('message') }}</p>
                    @endif
                    <div class="border p-6 shadow-lg bg-white flex items-center space-x-4">
                        <form class="w-full" action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <div class="flex flex-wrap space-y-4 md:space-y-0 md:flex-nowrap md:space-x-4">
                                <div class="mb-4 w-full md:w-1/3">
                                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                    <input type="text" id="name" name="name" placeholder="Enter your name"
                                        class="shadow valid:border-green-500 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        required>
                                </div>

                                <div class="mb-4 w-full md:w-1/3">
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                    <input type="email" required id="email" name="email"
                                        placeholder="Enter your email"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="mb-4 w-full md:w-1/3">
                                    <label for="number_phone" class="block text-gray-700 text-sm font-bold mb-2">Phone
                                        Number:</label>
                                    <input type="number" required id="number_phone" name="number_phone"
                                        placeholder="Enter your number_phone"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>

                            <div class="mb-5 mt-4 w-full">
                                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
                                <textarea rows="6" required id="message" name="message" placeholder="Enter your message"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
                            <button type="submit" class="border p-3 bg-primary text-white px-5 rounded-full">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portofolio Section End -->
@endsection