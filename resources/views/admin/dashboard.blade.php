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
            <h1 class="text-3xl font-base text-slate-700">Dashboard</h1>

            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                        <h2 class="text-xl font-semibold text-slate-700">Jumlah Category</h2>
                        <p class="text-4xl font-bold text-slate-700 mt-4">{{ $countCategory }}
                        </p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                        <h2 class="text-xl font-semibold text-slate-700">Jumlah Product</h2>
                        <p class="text-4xl font-bold text-slate-700 mt-4">{{ $countProduct }}
                        </p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                        <h2 class="text-xl font-semibold text-slate-700">Jumlah Order</h2>
                        <p class="text-4xl font-bold text-slate-700 mt-4">{{ $countOrder }}
                        </p>
                    </div>
                </div>
                <div class="mb-12 p-4 w-full mt-7">
                    <canvas id="myLineChart" style="height: 250px; width: 100%"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let labels = [];
        let total = []
        fetch('/grafik')
            .then((response) => {
                // Cek apakah response berhasil
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json(); // Konversi response ke JSON
            })
            .then((data) => {
                total = data.data
                console.log(total);
                // Isi labels dengan data dari API
                data.products.forEach(element => {
                    labels.push(element.name_product);
                });

                // Setelah data labels selesai diisi, buat chart
                initializeChart(labels, total);
            })
            .catch((err) => {
                console.error('Error:', err); // Tangani error
            });

        function initializeChart(labels, total) {
            var bar = document.getElementById('myLineChart').getContext('2d');

            var myBarChart = new Chart(bar, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Total Product Terjual",
                        data: total,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(75, 192, 192)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            responsive: true,
                            maintainAspectRatio: false,
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
@endsection
