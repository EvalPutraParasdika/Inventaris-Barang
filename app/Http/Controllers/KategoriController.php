<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = KategoriModel::all();
        return view('kategori.index', compact('datas'));
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
            'nama_kategori' => 'required|string'
        ]);

        try {
            KategoriModel::create([
                'nama_kategori' => $request->nama_kategori
            ]);
            return redirect()->back()->with('success', 'Data berhasil Ditambah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi Kesalahan, Data Kategori gagal ditambahkan' . $e->getMessage());
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
        $kategori = KategoriModel::findOrFail($id);
        return response()->json($kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama_kategori' => 'required|string'
        ]);

        $kategori = KategoriModel::findOrfail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil dihapus');
    }
}
