<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\TransaksiModels;
use App\Models\TransaksiBeliModels;
use DB;

class TransaksiBeliController extends BaseController{

    public function construct(){

    }

    public function save(Request $r){
        $data = [
            "status" => 1,
            "message" => "Berhasil"
        ];
        $post = $r->post('data');

        $transaksi = new TransaksiModels();
        $transaksi->total_harga = $r->post('total');
        if($transaksi->save()){
            foreach($post AS $i => $row){
                $row = (array) $row;
                $detail = new TransaksiBeliModels();
                $detail->transaksi_pembelian_id = $transaksi->id;
                $detail->master_barang_id = $row["id"];
                $detail->jumlah = $row["jumlah"];
                $detail->harga_satuan = $row["harga_satuan"];
                $detail->save();
            }
        } else {
            $data['status'] = 0;
            $data['message'] = "Gagal Menyimpan Transaksi Pembelian";
        }

        return response()->json($data,200);
    }

    public function list(){
        $data = TransaksiModels::all();
        foreach($data AS $i => $row){
            $data[$i]['dibuat'] = date("d-m-Y H:i:s", strtotime($row->created_at));
        }
        return response()->json($data,200);
    }

    public function detail(Request $r){
        $sql = DB::table("transaksi_pembelian_barang")
            ->leftJoin("master_barang", "transaksi_pembelian_barang.master_barang_id", "=", "master_barang.id")
            ->where("transaksi_pembelian_barang.transaksi_pembelian_id",$r->post('id'))
            ->select("transaksi_pembelian_barang.id", "master_barang.nama_barang", "transaksi_pembelian_barang.jumlah", "transaksi_pembelian_barang.harga_satuan")
            ->get()
            ->toArray();

        $data = count($sql) > 0? $sql:[];
        return response()->json($data,200);
    }
}