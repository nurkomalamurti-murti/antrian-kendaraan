@extends('layouts.app')

@section('content')

<div class="card shadow-sm p-4">

    <h3>Data Antrian Kendaraan</h3>

    <div class="mt-3 mb-3">

        <a href="{{ route('antrian.create') }}" class="btn btn-primary">
            + Tambah Antrian
        </a>

        <a href="{{ route('laporan.antrian') }}" class="btn btn-danger">
            Cetak PDF
        </a>

    </div>

    <table class="table table-bordered table-striped">

        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nomor Antrian</th>
                <th>Nomor Polisi</th>
                <th>Jenis Kendaraan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($antrian as $item)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nomor_antrian }}</td>
                <td>{{ $item->kendaraan->nomor_polisi }}</td>
                <td>{{ $item->kendaraan->jenis_kendaraan }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->waktu }}</td>
                <td>{{ $item->status }}</td>

                <td>

                    <a href="{{ route('antrian.edit', $item->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('antrian.destroy', $item->id) }}"
                          method="POST" class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus data antrian?')">
                            Hapus
                        </button>

                    </form>

                </td>
            </tr>

            @empty

            <tr>
                <td colspan="8" class="text-center">
                    Belum ada data antrian.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection