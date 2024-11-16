@extends('layouts.app')
@section('content')
    <!-- Portofolio Section Start -->
    <section id="portofolio" class="pt-36 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-8">Sejarah</h2>
                    <div class="min-w-full mb-10">
                        <img src="{{ asset('img/033073800_1662959004-Kain_Tenun_Mandar 1.png') }}" alt="Gambar 1"
                            class="w-full h-auto rounded-lg" />
                    </div>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Lipa Sa’be, yang berarti "sarung sutra" dalam bahasa Mandar, adalah salah satu warisan budaya khas
                        suku Mandar di
                        Sulawesi Barat. Kain ini telah dikenal sejak ratusan tahun yang lalu sebagai simbol kebanggaan,
                        keanggunan, dan status
                        sosial masyarakat Mandar.Hingga kini, Lipa Sa’be tetap menjadi kebanggaan lokal yang terus dijaga
                        dan dilestarikan, baik
                        oleh pengrajin maupun masyarakat Mandar, sebagai bukti kecintaan mereka terhadap tradisi dan seni
                        warisan leluhur.
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
                    <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-4">Tahapan Pembuatan Lipa Sabe
                    </h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Lipa Sa'be Mandar, sebuah mahakarya yang memadukan keahlian tangan dan kekayaan tradisi, melalui proses yang sarat
                        makna. Dari pemilihan benang berkualitas tinggi hingga penganyaman yang penuh kesabaran, setiap helainya menggambarkan
                        keindahan budaya dan identitas Mandar yang tak lekang oleh waktu.
                    </p>
                </div>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/3">
                    <a href="https://youtu.be/2lkY6Rx45Gg?si=MU38XausHvJlDv8-" class="block">
                        <img alt="" src="{{ asset('img/033073800_1662959004-Kain_Tenun_Mandar 1.png') }}"
                            class="h-64 w-full object-cover sm:h-80 lg:h-96" />
                        {{-- 
                        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>

                        <p class="mt-2 max-w-sm text-gray-700">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
                        </p> --}}
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
                    <h2 class="font-bold text-primary text-3xl sm:text-4xl lg:text-5xl mb-4">Adat dan Tradisi Mandar</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Adat dan tradisi Mandar adalah cerminan dari kearifan lokal yang diwariskan lintas generasi. Mulai dari seni tenun Lipa
                        Sa'be hingga nilai-nilai luhur dalam kehidupan sehari-hari, budaya Mandar mengajarkan harmoni antara manusia, alam, dan
                        Sang Pencipta.
                    </p>
                </div>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('img/WhatsApp Image 2024-10-08 at 13.24.15.png') }}" alt=""
                            width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Saeyang Pattudu</h3>
                    <p class="font-medium text-base text-secondary">Festival Sayang Pattudu adalah perayaan budaya khas Mandar yang mengangkat seni tari, musik, dan tradisi sebagai wujud
                    pelestarian warisan leluhur. Nama "Sayang Pattudu" sendiri bermakna cinta dan penghormatan terhadap seni tari (pattudu),
                    yang menjadi salah satu identitas budaya masyarakat Mandar di Sulawesi Barat.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('img/WhatsApp Image 2024-10-09 at 11.02.24.png') }}" alt=""
                            width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Menari Mandar</h3>
                    <p class="font-medium text-base text-secondary">Tarian tradisional Mandar, seperti Tari Pattudu, menggambarkan keanggunan dan nilai filosofis masyarakat Mandar melalui
                    gerakan lembut dan penuh makna.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('img/WhatsApp Image 2024-10-09 at 11.02.23.png') }}" alt=""
                            width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Acara Pernikahan Mandar</h3>
                    <p class="font-medium text-base text-secondary">Upacara adat yang kaya simbol, menonjolkan prosesi seperti pengantin mengenakan Lipa Sa’be dan ritual doa sebagai
                    lambang keberkahan dan kesucian.
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="{{ asset('img/WhatsApp Image 2024-10-09 at 11.02.22.png') }}" alt=""
                            width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Musik Rawan</h3>
                    <p class="font-medium text-base text-secondary">Alunan musik tradisional Mandar yang menggunakan alat musik seperti gendang dan calong, menciptakan suasana syahdu dalam
                    berbagai acara adat.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Portofolio Section End -->
@endsection
