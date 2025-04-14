<?php

namespace App\Http\Controllers;

use App\Models\PelangganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = DB::table('tb_member')->get();
        return view('halaman.halaman_dataPelanggan', compact('pelanggan'));
    }

    public function post(Request $request) 
    {
            $nama_user = session('nama_user');

            if ($request -> filled('id_member')) {
                $requestPelanggan['updated_by'] = $nama_user;
            }
            // Tambahkan nilai created_by dan updated_by dalam request
            $request -> merge([
                'created_by' => $nama_user,
            ]);
            PelangganModel::updateOrCreate([
                'id_member' => $request->id_member
            ], [
                'nama_member' => $request -> nama_member,
                'alamat_member' => $request -> alamat_member,
                'jenis_kelamin' => $request -> jenis_kelamin,
                'tlp_member' => $request -> tlp_member,
                'created_by' => $request -> created_by,

                // tambahkan nilai 'updated_by' jika dalam mode update
                'updated_by' => $requestPelanggan['updated_by'] ?? null,
            ]);    
    }
}
