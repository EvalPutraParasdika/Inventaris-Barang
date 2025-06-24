<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class LokasiModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'lokasis';
    protected $primaryKey = 'id_lokasi';
    protected $fillable = ['nama_lokasi'];

    public function barang()
    {
        return $this->hasMany(BarangModel::class, 'id_lokasi', 'id_lokasi');
    }

}
