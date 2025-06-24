<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasukModel;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\BarangMasukMail;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = BarangMasukModel::with('barang')->get();
        $barangs = BarangModel::all();
        return view('barang_masuk.index', compact('datas', 'barangs'));
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
            'keterangan' => 'nullable|string'
        ]);

        try {
            // Simpan ke tabel barang_masuks
            $barangMasuk = BarangMasukModel::create([
                'id_barang' => $request->id_barang,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);

            // Update stok di tabel barangs
            $barang = BarangModel::findOrFail($request->id_barang);
            $barang->stok += $request->jumlah;
            $barang->save();

            // Kirim email notifikasi
            Mail::to('Ariutaminingsih123@gmail.com')->send(new BarangMasukMail($barangMasuk));

            return redirect()->route('barang_masuk.index')->with('success', 'Data barang masuk berhasil ditambahkan');
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
        $barangMasuk = BarangMasukModel::findOrFail($id);
        return response()->json($barangMasuk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:barangs,id_barang',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        try {
            // Ambil data barang masuk lama
            $barangMasuk = BarangMasukModel::findOrFail($id);
            $barang = BarangModel::findOrFail($barangMasuk->id_barang);

            // Hitung selisih jumlah lama vs baru
            $jumlahLama = $barangMasuk->jumlah;
            $jumlahBaru = $request->jumlah;
            $selisih = $jumlahBaru - $jumlahLama;

            // Update stok barang
            $barang->stok += $selisih;
            $barang->save();

            // Update data barang masuk
            $barangMasuk->update([
                'id_barang' => $request->id_barang,
                'jumlah' => $jumlahBaru,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('barang_masuk.index')->with('success', 'Data barang masuk berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangMasuk = BarangMasukModel::findOrFail($id);
        $barangMasuk->delete();
        return redirect()->route('barang_masuk.index')->with('success', 'Data Berhasil Di hapus');
    }
}
