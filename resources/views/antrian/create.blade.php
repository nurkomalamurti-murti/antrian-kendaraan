@extends('layouts.app')

@section('content')

<div class="card shadow-sm p-4">

    <h3>Tambah Antrian Kendaraan</h3>

    <form action="{{ route('antrian.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Pilih Kendaraan</label>

            <select name="kendaraan_id" class="form-control" required>

                <option value="">Pilih Kendaraan</option>

                @foreach($kendaraan as $item)

                    <option value="{{ $item->id }}">
                        {{ $item->nomor_polisi }} - {{ $item->jenis_kendaraan }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Nomor Antrian</label>
            <input type="text" name="nomor_antrian"
                   class="form-control" placeholder="Contoh: A001" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status Antrian</label>

            <select name="status" class="form-control" required>
                <option value="Menunggu">Menunggu</option>
                <option value="Diproses">Diproses</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>

        <a href="{{ route('antrian.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection