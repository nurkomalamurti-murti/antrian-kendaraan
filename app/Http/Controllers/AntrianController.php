<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    public function index()
    {
        $antrian = Antrian::whereHas('kendaraan', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('kendaraan')->latest()->get();

        return view('antrian.index', compact('antrian'));
    }

    public function create()
    {
        $kendaraan = Kendaraan::where('user_id', Auth::id())->get();

        return view('antrian.create', compact('kendaraan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraan,id',
            'nomor_antrian' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'status' => 'required'
        ]);

        $kendaraan = Kendaraan::where('user_id', Auth::id())
            ->findOrFail($request->kendaraan_id);

        Antrian::create([
            'kendaraan_id' => $kendaraan->id,
            'nomor_antrian' => $request->nomor_antrian,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'status' => $request->status
        ]);

        return redirect()->route('antrian.index')
            ->with('success', 'Data antrian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $antrian = Antrian::whereHas('kendaraan', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);

        $kendaraan = Kendaraan::where('user_id', Auth::id())->get();

        return view('antrian.edit', compact('antrian', 'kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $antrian = Antrian::whereHas('kendaraan', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);

        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraan,id',
            'nomor_antrian' => 'required',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'status' => 'required'
        ]);

        $kendaraan = Kendaraan::where('user_id', Auth::id())
            ->findOrFail($request->kendaraan_id);

        $antrian->update([
            'kendaraan_id' => $kendaraan->id,
            'nomor_antrian' => $request->nomor_antrian,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'status' => $request->status
        ]);

        return redirect()->route('antrian.index')
            ->with('success', 'Data antrian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $antrian = Antrian::whereHas('kendaraan', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);

        $antrian->delete();

        return redirect()->route('antrian.index')
            ->with('success', 'Data antrian berhasil dihapus!');
    }
}