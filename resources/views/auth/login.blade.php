<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>
        @yield('title')
    </title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto h-screen flex justify-center items-center px-4">
        <div class="bg-white shadow-md rounded-lg max-w-sm w-full p-6">
            <h1 class="text-3xl font-bold mb-5 text-center">Selamat Datang di <span class="text-primary"><a
                        href="{{ url('/') }}">LISAMAN</a></span></h1>
            <p class="text-center mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod, eos!</p>
            @if (session('message'))
                <p class="w-full border p-3 bg-red-400 rounded-md mb-4">{{ session('message') }}</p>
            @endif
            <form action="{{ url('validation') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username"
                        class="shadow valid:border-green-500 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit"
                    class="bg-blue-500 rounded-full text-white px-4 py-2 mt-2 hover:bg-blue-600 w-full">Login</button>
                <div class="flex items-center mt-4">
                    <hr class="flex-grow border-t border-gray-300">
                    <span class="mx-4 text-gray-500">Belum punya akun? <a
                            href="{{ url('register') }}">Register</a></span>
                    <hr class="flex-grow border-t border-gray-300">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
