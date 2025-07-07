@extends('layouts.header')
@section('title', 'Mulai Donasi')

@section('content')
    <main class="flex-fill">
        <div class="container mt-5">
            <div class="text-center mb-5">
                <h1 class="font-weight-bold">Galang Dana yang Sedang Berlangsung</h1>
                <p class="lead text-muted">Setiap kebaikan Anda membawa harapan baru. Pilih untuk berdonasi.</p>
            </div>

            @php
                $donasiList = [
                    ['img' => '/images/index/header-3.png', 'title' => 'Bantu Mereka Korban Bencana Banjir'],
                    ['img' => '/images/index/gempa.jpg', 'title' => 'Bantu Mereka Korban Bencana Gempa'],
                    ['img' => '/images/index/Gunung Meletus.jpg', 'title' => 'Bantu Mereka Korban Gunung Meletus'],
                    ['img' => '/images/index/kebakaran.jpg', 'title' => 'Bantu Mereka Korban Kebakaran'],
                ];
            @endphp

            @foreach ($donasiList as $donasi)
                <div class="card mb-5 shadow-sm animate-card">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="{{ $donasi['img'] }}" class="card-img h-100 w-100 object-fit-cover" alt="Donasi Image"
                                style="max-height: 280px; object-fit: cover;">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column justify-content-between h-100">
                                <div>
                                    <h5 class="card-title font-weight-bold">{{ $donasi['title'] }}</h5>
                                    <p class="text-muted mb-2">
                                        <i class="fa-regular fa-circle-check text-success"></i> {{ $totalOrang }} Orang Telah
                                        Berdonasi
                                    </p>
                                    <p class="mb-1 text-primary h5">Rp {{ number_format($totalTerkumpul, 0, ',', '.') }}</p>
                                    <p class="text-muted mb-3">Terkumpul dari <strong>Rp 100.000.000</strong></p>

                                    <div class="progress mb-3" style="height: 8px;">
                                        @php
                                            $persentase = ($totalTerkumpul / 100000000) * 100;
                                        @endphp
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{ $persentase }}%; transition: width 1.5s;"
                                            aria-valuenow="{{ $persentase }}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <a href="/pembayaran">
                                        <button class="pushable">
                                            <span class="shadow"></span>
                                            <span class="edge"></span>
                                            <span class="front">Mulai Donasi</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    {{-- FOOTER --}}
    @include('layouts.footer')

    {{-- STYLE TAMBAHAN --}}
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main.flex-fill {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
        }

        .animate-card {
            animation: slideUp 0.7s ease-in-out both;
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .pushable {
            position: relative;
            background: transparent;
            padding: 0px;
            border: none;
            cursor: pointer;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
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
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .edge {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            border-radius: 12px;
            background: #073abb;
        }

        .front {
            display: block;
            position: relative;
            border-radius: 12px;
            background: #007bff;
            padding: 12px 32px;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            transform: translateY(-4px);
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .pushable:hover {
            filter: brightness(110%);
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

        .pushable:focus:not(:focus-visible) {
            outline: none;
        }
    </style>
@endsection