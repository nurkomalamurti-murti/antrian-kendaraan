@extends('layouts.app')

@section('content')

<div class="card shadow-sm p-4">

    <h3>Tambah Data Kendaraan</h3>

    <form action="{{ route('kendaraan.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nomor Polisi</label>
            <input type="text" name="nomor_polisi" class="form-control"
                   value="{{ old('nomor_polisi') }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kendaraan</label>

            <select name="jenis_kendaraan" class="form-control" required>
                <option value="">Pilih Kendaraan</option>
                <option value="Motor">Motor</option>
                <option value="Mobil">Mobil</option>
                <option value="Truk">Truk</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>

        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection