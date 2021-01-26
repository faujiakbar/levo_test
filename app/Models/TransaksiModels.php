<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiModels extends Model
{
    protected $table = "transaksi_pembelian";
    protected $fillable = [
        "total_harga",
        "created_at",
        "updated_at"
    ];
}
