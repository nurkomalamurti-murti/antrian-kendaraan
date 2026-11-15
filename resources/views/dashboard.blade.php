@extends('layouts.app')

@section('content')

<style>
    .welcome-box {
        background: linear-gradient(135deg, #1e3a8a, #2563eb);
        color: white;
        padding: 35px;
        border-radius: 15px;
        margin-bottom: 25px;
    }

    .welcome-box h2 {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .menu-card {
        border: none;
        border-radius: 15px;
        padding: 25px;
        transition: 0.3s;
        height: 100%;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin-bottom: 18px;
    }

    .blue-icon {
        background: #dbeafe;
    }

    .green-icon {
        background: #dcfce7;
    }

    .menu-card h5 {
        font-weight: bold;
        color: #1e293b;
    }

    .menu-card p {
        color: #64748b;
        min-height: 45px;
    }

    .info-box {
        background: white;
        padding: 22px;
        border-radius: 15px;
        margin-top: 25px;
        border-left: 5px solid #2563eb;
    }
</style>

<div class="welcome-box">

    <h2>Selamat Datang! 👋</h2>

    <p class="mb-0">
        Di Sistem Informasi Antrian Kendaraan.
        Kelola data kendaraan dan antrian dengan lebih mudah,
        cepat, dan teratur.
    </p>

</div>

<div class="mb-4">
    <h4 style="font-weight: bold; color: #1e293b;">
        Menu Utama
    </h4>

    <p class="text-secondary">
        Silakan pilih menu yang ingin kamu kelola.
    </p>
</div>

<div class="row g-4">

    <div class="col-md-6">

        <div class="card menu-card shadow-sm">

            <div class="icon-box blue-icon">
                🚘
            </div>

            <h5>Data Kendaraan</h5>

            <p>
                Mengelola informasi kendaraan yang terdaftar,
                mulai dari nomor polisi, jenis kendaraan,
                hingga nama pemilik.
            </p>

            <a href="{{ route('kendaraan.index') }}"
               class="btn btn-primary mt-2">
                Lihat Data Kendaraan →
            </a>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card menu-card shadow-sm">

            <div class="icon-box green-icon">
                📋
            </div>

            <h5>Data Antrian</h5>

            <p>
                Mengelola nomor antrian, tanggal, waktu,
                serta memantau status antrian kendaraan.
            </p>

            <a href="{{ route('antrian.index') }}"
               class="btn btn-success mt-2">
                Lihat Data Antrian →
            </a>

        </div>

    </div>

</div>

<div class="info-box shadow-sm">

    <h5 class="fw-bold">ℹ️ Informasi Aplikasi</h5>

    <p class="text-secondary mb-0">
        Sistem Informasi Antrian Kendaraan merupakan aplikasi
        berbasis web yang digunakan untuk membantu pencatatan
        data kendaraan, pengelolaan antrian, dan pembuatan
        laporan dalam bentuk PDF.
    </p>

</div>

@endsection