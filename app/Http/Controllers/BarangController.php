<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\LokasiModel;
// use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = BarangModel::with(['kategori', 'lokasi'])->get();
        $kategoris = KategoriModel::all();
        $lokasis = LokasiModel::all();

        return view('barang.index', compact('datas', 'kategoris', 'lokasis'));
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
            'nama_barang' => 'required|string',
            'id_kategori' => 'required|string',
            'id_lokasi' => 'required|string',
            'stok' => 'required|string',
            'harga_satuan' => 'required|numeric'
        ]);

        try {
            BarangModel::create([
                'nama_barang' => $request->nama_barang,
                'id_kategori' => $request->id_kategori,
                'id_lokasi' => $request->id_lokasi,
                'stok' => $request->stok,
                'harga_satuan' => $request->harga_satuan,
            ]);
            return redirect()->back()->with('success', 'Data berhasil Ditambah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi Kesalahan, Data Barang gagal ditambahkan' . $e->getMessage());
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
        $barang = BarangModel::findOrFail($id);
        return response()->json($barang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'id_kategori' => 'required|string',
            'id_lokasi' => 'required|string',
            'stok' => 'required|string',
            'harga_satuan' => 'required|numeric'
        ]);

        $barang = BarangModel::findOrfail($id);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'id_lokasi' => $request->id_lokasi,
            'stok' => $request->stok,
            'harga_satuan' => $request->harga_satuan,
        ]);
        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = BarangModel::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil dihapus');
    }

    // public function exportPDF(){
    //     $datas = ProdukModel::all();
    //     $pdf = Pdf::loadView('produk.pdf', compact('datas'));
    //     return $pdf->download('Data_Produk.pdf');
    // }
}
