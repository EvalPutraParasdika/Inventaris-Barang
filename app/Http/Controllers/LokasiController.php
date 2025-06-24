<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokasiModel;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LokasiModel::all();
        return view('lokasi.index', compact('datas'));
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
            'nama_lokasi' => 'required|string'
        ]);

        try {
            LokasiModel::create([
                'nama_lokasi' => $request->nama_lokasi
            ]);
            return redirect()->back()->with('success', 'Data berhasil Ditambah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi Kesalahan, Data Lokasi gagal ditambahkan' . $e->getMessage());
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
        $lokasi = LokasiModel::findOrFail($id);
        return response()->json($lokasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama_lokasi' => 'required|string'
        ]);

        $lokasi = LokasiModel::findOrfail($id);

        $lokasi->update([
            'nama_lokasi' => $request->nama_lokasi
        ]);
        return redirect()->route('lokasi.index')->with('success', 'Data Lokasi berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lokasi = LokasiModel::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Data Lokasi berhasil dihapus');
    }
}
