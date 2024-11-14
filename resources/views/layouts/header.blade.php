<!-- Header Start -->
<header class="bg-white absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a href="{{ url('/') }}" class="font-bold text-3xl text-primary block py-6"><span
                        class="text-dark"></span>LISAMAN</a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out "></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                </button>
                @guest
                    <a href="{{ url('login') }}"
                        class="lg:hidden text-base rounded-full bg-primary text-white py-2 px-4 mx-12">
                        Login
                    </a>
                @endguest
                <nav id="nav-menu"
                    class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none nav-menu">
                    <ul class="block lg:flex">
                        <li class="group">
                            <a href="{{ url('/') }}"
                                class="text-base py-2 mx-8 flex group-hover:text-primary {{ Request::is('/') ? 'text-primary' : '' }}">Home</a>
                        </li>
                        <li class="group">
                            <a href="{{ route('user.product.index') }}"
                                class="text-base py-2 mx-8 flex group-hover:text-primary {{ Request::is('product') ? 'text-primary' : '' }}">Product</a>
                        </li>
                        <li class="group">
                            <a href="{{ url('profil') }}"
                                class="text-base py-2 mx-8 flex group-hover:text-primary {{ Request::is('profil') ? 'text-primary' : '' }}">Profil</a>
                        </li>
                        <li class="group">
                            <a href="{{ route('contact.index') }}"
                                class="text-base py-2 mx-8 flex group-hover:text-primary {{ Request::is('contact') ? 'text-primary' : '' }}">Contact</a>
                        </li>
                        @guest
                            <li class="group">
                                <a href="{{ url('login') }}"
                                    class="text-base hidden lg:block rounded-full bg-primary px-8 text-white py-2 mx-8 flex group-hover:bg-blue-400">Login</a>
                            </li>
                        @endguest

                        @auth
                            <li class="group relative">
                                <a href="#"
                                    class="text-base text-dark py-2 mx-8 flex group-hover:text-primary capitalize">
                                    {{ ucfirst(Auth::user()->username) }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mt-1 mx-1" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <ul
                                    class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg p-3 max-w-[250px]">
                                    @if (Auth::user()->role === 'admin')
                                    <li>
                                        <a href="{{ url('admin/dashboard') }}"
                                            class="text-base text-dark py-1 px-4 block hover:bg-gray-100">Dashboard</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ url('my-order') }}"
                                            class="text-base text-dark py-1 px-4 block hover:bg-gray-100">My Order</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('my-cart') }}"
                                            class="text-base text-dark py-1 px-4 block hover:bg-gray-100">My Cart</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit"
                                                class="text-base text-dark py-1 px-4 block hover:bg-gray-100">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
