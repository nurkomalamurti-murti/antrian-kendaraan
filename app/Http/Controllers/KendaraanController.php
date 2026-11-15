<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('kendaraan.index', compact('kendaraan'));
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_polisi' => 'required|unique:kendaraan,nomor_polisi',
            'jenis_kendaraan' => 'required',
            'nama_pemilik' => 'required'
        ]);

        Kendaraan::create([
            'user_id' => Auth::id(),
            'nomor_polisi' => $request->nomor_polisi,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'nama_pemilik' => $request->nama_pemilik
        ]);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::where('user_id', Auth::id())
            ->findOrFail($id);

        $request->validate([
            'nomor_polisi' => 'required|unique:kendaraan,nomor_polisi,' . $id,
            'jenis_kendaraan' => 'required',
            'nama_pemilik' => 'required'
        ]);

        $kendaraan->update($request->only([
            'nomor_polisi',
            'jenis_kendaraan',
            'nama_pemilik'
        ]));

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::where('user_id', Auth::id())
            ->findOrFail($id);

        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus!');
    }
}