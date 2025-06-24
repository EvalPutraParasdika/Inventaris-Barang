<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\BarangKeluarMail;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = BarangKeluarModel::with('barang')->get();
        $barangs = BarangModel::all();
        return view('barang_keluar.index', compact('datas', 'barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        try {
            // Ambil data barang
            $barang = BarangModel::findOrFail($request->id_barang);

            // Cek apakah stok mencukupi
            if ($barang->stok < $request->jumlah) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi!');
            }

            // Simpan ke tabel barang_keluars
            $barangKeluar = BarangKeluarModel::create([
                'id_barang' => $request->id_barang,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);

            // Kurangi stok
            $barang->stok -= $request->jumlah;
            $barang->save();

            // Kirim email notifikasi
            Mail::to('Ariutaminingsih123@gmail.com')->send(new BarangKeluarMail($barangKeluar));

            return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barangKeluar = BarangKeluarModel::findOrFail($id);
        return response()->json($barangKeluar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        try {
            // Ambil data barang masuk lama
            $barangKeluar = BarangKeluarModel::findOrFail($id);
            $barang = BarangModel::findOrFail($barangKeluar->id_barang);

            // Hitung selisih jumlah lama vs baru
            $jumlahLama = $barangKeluar->jumlah;
            $jumlahBaru = $request->jumlah;
            $selisih = $jumlahBaru - $jumlahLama;

            // Update stok barang
            $barang->stok -= $selisih;
            $barang->save();

            // Update data barang Keluar
            $barangKeluar->update([
                'id_barang' => $request->id_barang,
                'jumlah' => $jumlahBaru,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangKeluar = BarangKeluarModel::findOrFail($id);
        $barangKeluar->delete();
        return redirect()->route('barang_keluar.index')->with('success', 'Data Berhasil Di hapus');
    }
}
