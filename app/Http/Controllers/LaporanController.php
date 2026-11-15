<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;
use FPDF;

class LaporanController extends Controller
{
    public function kendaraan()
    {
        $data = Kendaraan::where('user_id', Auth::id())->get();

        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'LAPORAN DATA KENDARAAN', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 10, 'Tanggal Cetak: ' . date('d-m-Y'), 0, 1);

        $pdf->Ln(5);

        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(15, 10, 'No', 1);
        $pdf->Cell(60, 10, 'Nomor Polisi', 1);
        $pdf->Cell(65, 10, 'Jenis Kendaraan', 1);
        $pdf->Cell(80, 10, 'Nama Pemilik', 1);

        $pdf->Ln();

        $pdf->SetFont('Arial', '', 10);

        $no = 1;

        foreach ($data as $item) {
            $pdf->Cell(15, 10, $no++, 1);
            $pdf->Cell(60, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $item->nomor_polisi), 1);
            $pdf->Cell(65, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $item->jenis_kendaraan), 1);
            $pdf->Cell(80, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $item->nama_pemilik), 1);
            $pdf->Ln();
        }

        $pdf->Ln(5);

        $pdf->Cell(0, 10, 'Jumlah Data Kendaraan: ' . $data->count(), 0, 1);

        $pdf->Output('D', 'laporan-kendaraan.pdf');
        exit;
    }

    public function antrian()
    {
        $data = Antrian::whereHas('kendaraan', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('kendaraan')->get();

        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'LAPORAN ANTRIAN KENDARAAN', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 10, 'Tanggal Cetak: ' . date('d-m-Y'), 0, 1);

        $pdf->Ln(5);

        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(15, 10, 'No', 1);
        $pdf->Cell(35, 10, 'Antrian', 1);
        $pdf->Cell(45, 10, 'Nomor Polisi', 1);
        $pdf->Cell(55, 10, 'Jenis Kendaraan', 1);
        $pdf->Cell(35, 10, 'Tanggal', 1);
        $pdf->Cell(30, 10, 'Waktu', 1);
        $pdf->Cell(35, 10, 'Status', 1);

        $pdf->Ln();

        $pdf->SetFont('Arial', '', 10);

        $no = 1;

        foreach ($data as $item) {
            $pdf->Cell(15, 10, $no++, 1);
            $pdf->Cell(35, 10, $item->nomor_antrian, 1);
            $pdf->Cell(45, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $item->kendaraan->nomor_polisi), 1);
            $pdf->Cell(55, 10, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $item->kendaraan->jenis_kendaraan), 1);
            $pdf->Cell(35, 10, $item->tanggal, 1);
            $pdf->Cell(30, 10, $item->waktu, 1);
            $pdf->Cell(35, 10, $item->status, 1);
            $pdf->Ln();
        }

        $pdf->Ln(5);

        $pdf->Cell(0, 10, 'Jumlah Data Antrian: ' . $data->count(), 0, 1);

        $pdf->Output('D', 'laporan-antrian.pdf');
        exit;
    }
}