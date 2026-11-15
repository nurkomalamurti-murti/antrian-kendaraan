@extends('layouts.app')

@section('content')

<div class="card shadow-sm p-4">

    <h3>Edit Data Antrian</h3>

    <form action="{{ route('antrian.update', $antrian->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Pilih Kendaraan</label>

            <select name="kendaraan_id" class="form-control" required>

                @foreach($kendaraan as $item)

                    <option value="{{ $item->id }}"
                        {{ $antrian->kendaraan_id == $item->id ? 'selected' : '' }}>

                        {{ $item->nomor_polisi }} - {{ $item->jenis_kendaraan }}

                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Nomor Antrian</label>
            <input type="text" name="nomor_antrian"
                   value="{{ $antrian->nomor_antrian }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal"
                   value="{{ $antrian->tanggal }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu"
                   value="{{ substr($antrian->waktu, 0, 5) }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select name="status" class="form-control" required>

                <option value="Menunggu" {{ $antrian->status == 'Menunggu' ? 'selected' : '' }}>
                    Menunggu
                </option>

                <option value="Diproses" {{ $antrian->status == 'Diproses' ? 'selected' : '' }}>
                    Diproses
                </option>

                <option value="Selesai" {{ $antrian->status == 'Selesai' ? 'selected' : '' }}>
                    Selesai
                </option>

            </select>
        </div>

        <button class="btn btn-primary">Update</button>

        <a href="{{ route('antrian.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection