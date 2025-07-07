@extends('layouts.header')
@section('title', 'Daftar Donatur')
{{-- LIST DONATUR PUBLIK --}}

@section('content')
    <div class="container mt-5">
        <div class="fade-in text-center mb-5">
            <h1 class="mb-4" id="gradient">
                <i class="fa-solid fa-envelope-open-text"></i>
                Daftar Donatur
            </h1>
            <p class="text-muted">Ucapan terima kasih sebesar-besarnya kepada para donatur yang telah berbagi kebaikan.</p>
        </div>

        @if ($donaturs->isEmpty())
            <p class="text-center text-muted">Belum ada donatur.</p>
        @else
            @foreach ($donaturs as $donatur)
                <div class="card mb-4 shadow donate-card">
                    <div class="card-body d-flex align-items-center">
                        <img src="https://i.ibb.co.com/nQQmMw8/ikonrupiah.png" class="donatur-avatar mr-3" alt="Avatar" />
                        <div>
                            <h5 class="mb-1 name">{{ $donatur->nama }}</h5>
                            <p class="amount mb-1">
                                <span class="donation-amount">Rp {{ number_format($donatur->total_donasi, 0, ',', '.') }}</span>
                                <span class="via-method ml-2"><i class="fa-solid fa-circle small-dot"></i> Via
                                    {{ $donatur->tipe_bayar }}</span>
                            </p>
                            @if ($donatur->pesan)
                                <p class="message mt-1">{{ $donatur->pesan }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $donaturs->links() }}
            </div>
        @endif
    </div>
    
    {{-- FOOTER --}}
    @include('layouts.footer')

    <style>
        body {
            background-color: #f9fafb;
        }

        #gradient {
            font-weight: 700;
            background: linear-gradient(to right, #5374cd 20%, #00affa 30%, #0a92ec 70%, #4a64da 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 500% auto;
            animation: textShine 5s ease-in-out infinite alternate;
        }

        @keyframes textShine {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        .fade-in {
            animation: fadeIn 1.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .donate-card {
            border-radius: 20px;
            background-color: #ffffff;
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .donatur-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .name {
            font-weight: 600;
            font-size: 1.25rem;
            color: #1f2937;
        }

        .amount {
            font-size: 1rem;
            font-weight: 500;
        }

        .donation-amount {
            color: #22c55e;
        }

        .via-method {
            color: #6b7280;
            font-size: 0.95rem;
            font-weight: 400;
        }

        .small-dot {
            font-size: 0.35rem;
            margin-right: 0.3rem;
            vertical-align: middle;
            color: #9ca3af;
        }

        .message {
            color: #6b7280;
            font-size: 0.95rem;
            margin-top: 0.3rem;
            word-break: break-word;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.donate-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.15}s`;
            });
        });
    </script>

    @if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true
        });
    </script>
@endif
@endsection