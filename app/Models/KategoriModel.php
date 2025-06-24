<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class KategoriModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori'];

    public function barang()
    {
        return $this->hasMany(BarangModel::class, 'id_kategori', 'id_kategori');
    }

}
