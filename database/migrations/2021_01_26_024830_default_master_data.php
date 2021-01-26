<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MasterBarangModels;

class DefaultMasterData extends Migration
{

    public $datas = [
        ["Sabun Batang", 3000],
        ["Mie Instan", 2000],
        ["Pensil", 1000],
        ["Kopi Sachet", 1500],
        ["Air Minum Galon", 20000],
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable("master_barang")){
            foreach($this->datas as $row){
                $save = new MasterBarangModels;
                $save->nama_barang = $row[0];
                $save->harga_satuan = $row[1];
                $save->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable("master_barang")){
            MasterBarangModels::truncate();
        }
    }
}
