@extends('layouts.header')
@section('title', 'Donasi Yo')
{{-- DASHBOARD ADMIN --}}

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Donatur</h1>
        <div class="row">
            <div class="col-12">
                @if (empty($donaturs))
                    <p class="text-center">Belum ada donatur.</p>
                @else
                    <div class="table-responsive shadow-sm rounded">
                        <table class="table table-striped table-bordered mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama</th>
                                    <th>Pesan</th>
                                    <th class="text-center">Jumlah Donasi</th>
                                    <th class="text-center">Metode</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donaturs as $donatur)
                                    <tr>
                                        <td>{{ $donatur->nama }}</td>
                                        <td>{{ $donatur->pesan }}</td>
                                        <td class="text-center">Rp. {{ number_format($donatur->total_donasi, 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $donatur->tipe_bayar }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('donaturs.destroy', $donatur->id) }}" method="POST">
                                                <a href="{{ route('donaturs.edit', $donatur->id) }}"
                                                    class="btn btn-sm btn-primary mb-1">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger mb-1" data-toggle="modal"
                                                    data-target="#deleteModal{{ $donatur->id }}">HAPUS</button>

                                                {{-- Modal Konfirmasi --}}
                                                <div class="modal fade" id="deleteModal{{ $donatur->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="deleteModalLabel{{ $donatur->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Hapus Donatur</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus donatur ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $donaturs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        @media (max-width: 576px) {

            .table th,
            .table td {
                white-space: nowrap;
                font-size: 0.85rem;
            }

            .btn-sm {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
@endsection