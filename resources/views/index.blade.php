@extends('layouts.header')
@section('title', 'Donasi Yo')
@section('content')
    {{-- TAMPILAN HOME --}}

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500">
        <div class="carousel-caption d-block">
            <div class="header text-center">
                <h1 class="text-black">Mereka Membutuhkan Kita.</h1>
                <p class="text-black">Bersama kita bisa membuat perubahan</p>
            </div>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 carousel-image" src="/images/index/gempa.jpg" alt="foto gempa" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel-image" src="/images/index/kebakaran.jpg" alt="foto kebakaran" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel-image" src="/images/index/header-3.png" alt="foto banjir" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 carousel-image" src="/images/index/gunung meletus.jpg"
                    alt="foto gunung meletus" />
            </div>
        </div>

        <!-- Tombol Carousel -->
        <a class="carousel-control-prev custom-carousel-btn" href="#carouselExampleControls" role="button"
            data-slide="prev">
            <span class="carousel-control-icon"><i class="fas fa-chevron-left"></i></span>
        </a>
        <a class="carousel-control-next custom-carousel-btn" href="#carouselExampleControls" role="button"
            data-slide="next">
            <span class="carousel-control-icon"><i class="fas fa-chevron-right"></i></span>
        </a>
    </div>

    {{-- CTA DONASI --}}
    <div class="content text-center mt-5 fade-in">
        <h2 class="mb-4">Ayo Mulai Donasi Sekarang</h2>
        <button class="pushable" onclick="redirectDonasi()">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Mulai Donasi</span>
        </button>
    </div>

    {{-- ABOUT --}}
    <div class="container mt-5 fade-in">
        <div class="row">
            <div class="col-md-6">
                <img src="/images/index/kebakaran.jpg" class="img-fluid rounded" alt="About Image">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <h3>Tentang Donasi Yo</h3>
                    <p>Kami adalah platform donasi yang bertujuan untuk membantu korban bencana alam, kebakaran, dan
                        berbagai krisis lainnya di Indonesia. Dengan semangat kebersamaan, kami percaya bahwa bantuan kecil
                        dapat membuat perubahan besar.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- KATEGORI DONASI --}}
    <div class="container mt-5 fade-in text-center">
        <h3>Kategori Donasi</h3>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="/images/index/gempa.jpg" class="card-img-top kategori-img" alt="Gempa">
                    <div class="card-body">
                        <h5 class="card-title">Bencana Alam</h5>
                        <p class="card-text">Bantu korban gempa, banjir, dan tanah longsor.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="/images/index/kebakaran.jpg" class="card-img-top kategori-img" alt="Kebakaran">
                    <div class="card-body">
                        <h5 class="card-title">Kebakaran</h5>
                        <p class="card-text">Bantu korban kebakaran rumah atau hutan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="/images/index/header-3.png" class="card-img-top kategori-img" alt="Kesehatan">
                    <div class="card-body">
                        <h5 class="card-title">Kesehatan & Sosial</h5>
                        <p class="card-text">Bantu biaya pengobatan & pendidikan anak-anak.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AJAKAN BERGABUNG --}}
    <div class="container mt-5 mb-5 fade-in text-center">
        <h3>Bersama Kita Bisa Lebih Kuat</h3>
        <p>Ayo bergabung menjadi bagian dari perubahan. Mari bantu saudara kita yang sedang kesulitan.</p>
        <a href="{{ route('gabung.cek') }}" class="btn btn-primary btn-lg mt-3">Gabung Sekarang</a>
    </div>

    {{-- FOOTER --}}
    <footer class="bg-light text-center text-lg-start mt-5 pt-4 border-top">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 text-left">
                    <h5 class="text-uppercase">Donasi Yo</h5>
                    <p>Donasi Yo adalah platform peduli bencana & sosial di Indonesia. Mari bersama-sama membantu sesama
                        dan menciptakan perubahan positif.</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 text-left">
                    <h5 class="text-uppercase">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-dark">Beranda</a></li>
                        <li><a href="/donasi" class="text-dark">Donasi</a></li>
                        <li><a href="/donatur" class="text-dark">Donatur</a></li>
                        <li><a href="#" onclick="handleLoginClick()" class="text-dark">Login</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 text-left">
                    <h5 class="text-uppercase">Kontak</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope mr-2"></i> info@donasikita.com</li>
                        <!-- <li><i class="fas fa-phone mr-2"></i> +62 812-3456-7890</li>
                                    <li><i class="fas fa-map-marker-alt mr-2"></i> Jakarta, Indonesia</li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3 bg-light text-lg-start" style="font-size: 0.9rem;">
            © {{ date('Y') }} Donasi Yo. All rights reserved.
        </div>
    </footer>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function redirectDonasi() {
            window.location.href = "/donasi";
        }

        function handleLoginClick() {
            const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

            if (isLoggedIn) {
                Swal.fire({
                    title: 'Kamu sudah login!',
                    text: 'Selamat datang kembali! 😊',
                    icon: 'info',
                    timer: 2000,
                    timerProgressBar: true,
                    confirmButtonText: 'Oke',
                });
            } else {
                window.location.href = "/session";
            }
        }
    </script>

    <style>
        footer a:hover {
            text-decoration: underline;
            color: #007bff;
        }

        footer h5 {
            font-weight: 600;
        }

        .fade-in {
            opacity: 0;
            animation: fadeInAnimation 1s ease-in forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .carousel-image {
            height: 500px;
            object-fit: cover;
            object-position: center;
        }

        .kategori-img {
            height: 220px;
            object-fit: cover;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        .carousel-caption {
            top: 40%;
            text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .pushable {
            position: relative;
            background: transparent;
            padding: 0;
            border: none;
            cursor: pointer;
        }

        .shadow {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: hsl(226, 25%, 69%);
            border-radius: 8px;
            filter: blur(2px);
            transform: translateY(2px);
        }

        .edge {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 99%;
            border-radius: 12px;
            background: #073abb;
        }

        .front {
            display: block;
            position: relative;
            border-radius: 12px;
            background: #007bff;
            padding: 16px 32px;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 1rem;
            transform: translateY(-4px);
        }

        .pushable:hover .front {
            transform: translateY(-6px);
        }

        .pushable:active .front {
            transform: translateY(-2px);
        }

        .pushable:hover .shadow {
            transform: translateY(4px);
        }

        .pushable:active .shadow {
            transform: translateY(1px);
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .custom-carousel-btn {
            width: 50px;
            height: 50px;
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        .carousel-control-prev.custom-carousel-btn {
            left: 20px;
        }

        .carousel-control-next.custom-carousel-btn {
            right: 20px;
        }

        .carousel-control-icon {
            color: #fff;
            font-size: 1.5rem;
        }

        .custom-carousel-btn:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .custom-carousel-btn:hover .carousel-control-icon {
            transform: scale(1.2);
        }
    </style>
@endsection