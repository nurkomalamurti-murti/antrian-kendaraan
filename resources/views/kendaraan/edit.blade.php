@extends('layouts.app')

@section('content')

<div class="card shadow-sm p-4">

    <h3>Edit Data Kendaraan</h3>

    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nomor Polisi</label>
            <input type="text" name="nomor_polisi"
                   value="{{ $kendaraan->nomor_polisi }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kendaraan</label>

            <select name="jenis_kendaraan" class="form-control" required>
                <option value="Motor" {{ $kendaraan->jenis_kendaraan == 'Motor' ? 'selected' : '' }}>Motor</option>

                <option value="Mobil" {{ $kendaraan->jenis_kendaraan == 'Mobil' ? 'selected' : '' }}>Mobil</option>

                <option value="Truk" {{ $kendaraan->jenis_kendaraan == 'Truk' ? 'selected' : '' }}>Truk</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik"
                   value="{{ $kendaraan->nama_pemilik }}"
                   class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>

        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection