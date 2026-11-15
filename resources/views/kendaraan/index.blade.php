@extends('layouts.app')

@section('content')

<div class="card shadow-sm p-4">

    <h3>Data Kendaraan</h3>

    <div class="mb-3 mt-3">

        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
            + Tambah Kendaraan
        </a>

        <a href="{{ route('laporan.kendaraan') }}" class="btn btn-danger">
            Cetak PDF
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nomor Polisi</th>
                <th>Jenis Kendaraan</th>
                <th>Nama Pemilik</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($kendaraan as $item)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nomor_polisi }}</td>
                <td>{{ $item->jenis_kendaraan }}</td>
                <td>{{ $item->nama_pemilik }}</td>

                <td>

                    <a href="{{ route('kendaraan.edit', $item->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('kendaraan.destroy', $item->id) }}"
                          method="POST" class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data?')">
                            Hapus
                        </button>

                    </form>

                </td>
            </tr>

            @empty

            <tr>
                <td colspan="5" class="text-center">
                    Belum ada data kendaraan.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection