<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use App\Models\PelangganModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $outlet = DB::table('tb_outlet')->where('status','=','1')->get();
        $paket = DB::table('tb_paket')->where('status','=','1')->get();
        $transaksi = DB::table('tb_transaksi')
        ->leftjoin('tb_outlet','tb_transaksi.id_outlet','=','tb_outlet.id_outlet')
        ->leftjoin('users','tb_transaksi.id_user','=','users.id_user')
        ->leftjoin('tb_member','tb_transaksi.id_member','=','tb_member.id_member')
        ->leftjoin('tb_paket','tb_transaksi.id_paket','=','tb_paket.id_paket')
        ->select('tb_transaksi.*','tb_outlet.nama_outlet', 'users.nama_user', 'tb_member.nama_member', 'tb_paket.nama_paket')
        ->get();
        return view('halaman.halaman_transaksi', compact('transaksi','paket', 'outlet'));
    }

    public function input($member)
    {
        $outlet = DB::table('tb_outlet')->where('status','=','1')->get();
        $paket = DB::table('tb_paket')->where('status','=','1')->get();
        $member = PelangganModel::findOrFail($member);
        return view('halaman.halaman_inputtransaksi', compact('member', 'paket', 'outlet'));
    }

    public function statusTransaksi(Request $request)
    {
        // Ambil pengguna yang sedang login
        $nama_user = session('nama_user');
        $requestData['updated_by'] = $nama_user;
        $transaksi = TransaksiModel::findorfail($request->id_transaksi);
        $transaksi->update($request->all());
        $message = 'Data Berhasil Diedit!';

        // Tandai pengguna yang menghapus data
        $transaksi->updated_by = $requestData['updated_by'];
        $transaksi->save();
        return redirect('transaksi')->with('success', $message);
    }

    public function post(Request $request) 
    {
        $nama_user = session('nama_user');
        $id_user = session('id_user');
        if ($request -> filled('id_member')) {
            $requestTransaksi['updated_by'] = $nama_user;
        }
        // Tambahkan nilai created_by dan updated_by dalam request
        $request -> merge([
            'created_by' => $nama_user,
            'id_user' => $id_user,
        ]);
        TransaksiModel::updateOrCreate([
            'id_transaksi' => $request->id_transaksi
        ], [
            'id_outlet' => $request -> id_outlet,
            'id_member' => $request -> id_member,
            'id_paket' => $request -> id_paket,
            'kode_invoice' => $request -> kode_invoice,
            'tgl_pesan' => $request -> tgl_pesan,
            'batas_waktu' => $request -> tgl_selesai,
            'tgl_bayar' => $request -> tgl_bayar,
            'tarif' => $request -> tarif,
            'berat' => $request -> berat,
            'total' => $request -> total,
            'dibayar' => $request -> dibayar,
            'id_user' => $request -> id_user,
            'created_by' => $request -> created_by,

            // tambahkan nilai 'updated_by' jika dalam mode update
            'updated_by' => $requestTransaksi['updated_by'] ?? null,
            
        ]);
        if ($request -> id_transaksi) {
            $message = 'Data Berhasil Diedit!';
        } else {
            $message = 'Data Berhasil Disimpan!';
        }
        return redirect('transaksi')->with('success', $message);
    }

    public function postinput(Request $request, $member) 
    {
        $nama_user = session('nama_user');
        $id_user = session('id_user');
        // Tambahkan nilai created_by dalam request
        $request -> merge([
            'created_by' => $nama_user,
            'id_user' => $id_user,
        ]);
        // dd($request);
        $member = PelangganModel::findOrFail($member);

        $transaksi = TransaksiModel::create([
            'id_outlet' => $request -> id_outlet,
            'id_member' => $request -> id_member,
            'nama_member' => $request -> nama_member,
            'id_paket' => $request -> id_paket,
            'kode_invoice' => $request -> kode_invoice,
            'tgl_pesan' => $request -> tgl_pesan,
            'batas_waktu' => $request -> tgl_selesai,
            'tgl_bayar' => $request -> tgl_bayar,
            'tarif' => $request -> tarif,
            'berat' => $request -> berat,
            'total' => $request -> total,
            'dibayar' => $request -> dibayar,
            'id_user' => $request -> id_user,
            'created_by' => $request -> created_by,
        ]);
        $message = 'Data Berhasil Disimpan!';
        if ($request->has('print')) {
            // GET DATA BERDASARKAN ID
            // $transaksi = TransaksiModel::with(['PaketModel', 'OutletModel', 'PelangganModel'])->find($transaksi->id_transaksi);
            // $transaksi = TransaksiModel::where('id_transaksi', $id_transaksi)->first();
            // LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
            // KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
            $pdf = PDF::loadView('halaman.halaman_cetakTransaksiItem', compact('transaksi', 'request', 'member'))->setPaper('a5', 'landscape');
            return $pdf->stream();
            
        }
        return redirect('transaksi')->with('success', $message);
        
    }
    public function destroy($id_transaksi)
    {
        $transaksi = TransaksiModel::findorfail($id_transaksi);
        $transaksi->delete();
        $message = 'Data Berhasil Dihapus!';
        return redirect('transaksi')->with('succes', $message);
    }
}
