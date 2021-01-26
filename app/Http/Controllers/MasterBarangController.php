<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\MasterBarangModels;

class MasterBarangController extends BaseController{

    public function construct(){

    }

    public function autocomplete(Request $r){
        $data = MasterBarangModels::whereRaw("LOWER(nama_barang) LIKE '".strtolower($r->get('term'))."%'")->get();
        foreach($data AS $i => $row){
            $data[$i]["label"] = $row->nama_barang;
        }
        return response()->json($data,200);
    }
}