<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BarangMasukModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';
    protected $fillable = ['nama_barang', 'id_barang', 'jumlah', 'tanggal', 'keterangan'];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
