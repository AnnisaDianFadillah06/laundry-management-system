<?php

namespace App\Http\Controllers;

use App\Models\PaketModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
    public function index()
    {
        $tbpaket = DB::table('tb_paket')->get();
        return view('halaman.halaman_dataPaket', compact('tbpaket'));
    }

    public function post(Request $request) 
    {
            $nama_user = session('nama_user');
            if ($request -> filled('id_paket')) {
                $requestData['updated_by'] = $nama_user;
            }
            // Tambahkan nilai created_by dan updated_by dalam request
            $request -> merge([
                'created_by' => $nama_user,
            ]);
            PaketModel::updateOrCreate([
                'id_paket' => $request->id_paket
            ], [
                'nama_paket' => $request -> nama_paket,
                'harga_paket' => $request -> harga_paket,
                'created_by' => $request -> created_by,

                // tambahkan nilai 'updated_by' jika dalam mode update
                'updated_by' => $requestData['updated_by'] ?? null,
            ]);
            if ($request -> id_paket) {
                $message = 'Data Berhasil Diedit!';
            } else {
                $message = 'Data Berhasil Disimpan!';
            }

            return redirect('dataPaket') -> with('success', $message);
    }

    public function destroy(Request $request)
    {
        // Ambil pengguna yang sedang login
        $nama_user = session('nama_user');
        $requestData['updated_by'] = $nama_user;
        $outlet = PaketModel::findorfail($request->id_paket);
        $outlet->update($request->all());
        $message = 'Data Berhasil Diedit!';
        // Tandai pengguna yang menghapus data
        $outlet->updated_by = $requestData['updated_by'];
        $outlet->save();
        return redirect('dataPaket')-> with('success', $message);
    }

}
