<?php

namespace App\Http\Controllers;

use App\Models\OutletModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{
    public function index()
    {
        $tboutlet = DB::table('tb_outlet')->get();
        return view('halaman.halaman_dataOutlet', compact('tboutlet'));
    }

    public function post(Request $request) 
    {
        $nama_outlet = $request -> input('nama_outlet');
        $id_outlet = $request -> input('id_outlet');

        $outlet = OutletModel::where('nama_outlet', 'LIKE', '%'.$nama_outlet.
                '%') -> where('id_outlet', '!=', $id_outlet) -> first();

        if (!$outlet) {
            $nama_user = session('nama_user');
            if ($request -> filled('id_outlet')) {
                $requestData['updated_by'] = $nama_user;
            }
            // Tambahkan nilai created_by dan updated_by dalam request
            $request -> merge([
                'created_by' => $nama_user,
            ]);
            OutletModel::updateOrCreate([
                'id_outlet' => $id_outlet
            ], [
                'nama_outlet' => $nama_outlet,
                'alamat_outlet' => $request -> alamat_outlet,
                'tlp_outlet' => $request -> tlp_outlet,
                'created_by' => $request -> created_by,

                // tambahkan nilai 'updated_by' jika dalam mode update
                'updated_by' => $requestData['updated_by'] ?? null,
            ]);
            if ($request -> id_outlet) {
                $message = 'Data Berhasil Diedit!';
            } else {
                $message = 'Data Berhasil Disimpan!';
            }

            return redirect('dataOutlet') -> with('success', $message);
        }

        return response() -> json(['status' => 'error']);
    }

}
    
        // if (!$request->filled('id_outlet')) {
        //     $result = DB::select("SELECT * FROM tb_outlet WHERE nama_outlet = '%$nama_outlet%'");
        //     if (count($result) > 0) {
        //         return response()->json(['status' => 'error']);
        //     }
        // } else {
        //     $result = DB::select("SELECT * FROM tb_outlet WHERE nama_outlet = '%$nama_outlet%' AND id_outlet != $id_outlet");
        //     if (count($result) > 0) {
        //         return response()->json(['status' => 'error']);
        //     }
        // }
        // if (!$request->filled('id_outlet')) {
        //     $result = DB::select("SELECT * FROM tb_outlet WHERE nama_outlet = '%$nama_outlet%'");
        //     if (count($result) > 0) {
        //         return response()->json(['status' => 'error']);
        //     } else {
        //         return response()->json(['status' => 'success']);
        //     }
        // } else {
        //     $result = DB::select("SELECT * FROM tb_outlet WHERE nama_outlet = '%$nama_outlet%' AND id_outlet != $id_outlet");
        //     if (count($result) > 0) {
        //         return response()->json(['status' => 'error']);
        //     } else {
        //         return response()->json(['status' => 'success']);
        //     }
        // }
          
        

  
