<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiBeliModels extends Model
{
    protected $table = "transaksi_pembelian_barang";
    protected $fillable = [
        "transaksi_pembelian_id",
        "master_barang_id",
        "jumlah",
        "harga_satuan",
    ];
    public $timestamps = false;
}
