<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BarangModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'barangs';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama_barang', 'id_kategori','id_lokasi', 'stok', 'harga_satuan'];

public function kategori()
{
    return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id_kategori');
}

public function lokasi()
{
    return $this->belongsTo(LokasiModel::class, 'id_lokasi', 'id_lokasi');
}

}
