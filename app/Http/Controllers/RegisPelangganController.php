<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\PelangganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisPelangganController extends Controller
{
    public function index()
    {
        $outlet = DB::table('tb_outlet')->where('status','=','1')->get();
        $paket = DB::table('tb_paket')->where('status','=','1')->get();
        // hapus session id_member dan nama_member
        session()->forget('id_member');
        session()->forget('nama_member');

        // dapatkan data pelanggan terbaru dari database
        $pelanggan = PelangganModel::orderBy('id_member', 'desc')->first();

        if ($pelanggan) {
            // perbarui nilai session id_member dan nama_member
            session(['id_member' => $pelanggan->id_member]);
            session(['nama_member' => $pelanggan->nama_member]);
        }

        // ambil data pelanggan sesuai session id_member
        $id_member = session('id_member');
        $nama_member = session('nama_member');
        $pelanggan = PelangganModel::find($id_member);
        return view('halaman.halaman_registrasiPelanggan', compact('paket', 'outlet', 'id_member', 'nama_member', 'pelanggan'));
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
            $pelanggan = PelangganModel::updateOrCreate([
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
        // simpan id_member sebagai session
        session(['id_member' => $pelanggan->id_member]);
        session(['nama_member' => $pelanggan->nama_member]);
    }
}