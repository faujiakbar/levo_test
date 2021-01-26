<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterBarangModels extends Model
{
    protected $table = "master_barang";
    protected $fillable = [
        "nama_barang",
        "harga_satuan",
        "created_at",
        "updated_at"
    ];
}
