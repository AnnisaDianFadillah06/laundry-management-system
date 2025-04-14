<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanTransaksiController extends Controller
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
        return view('halaman.halaman_laporanTransaksi', compact('transaksi','paket', 'outlet'));
    }

    public function cetakTransaksi($tglawal, $tglakhir){
        //dd("Tanggal Awal : " .$tglawal, "Tanggal Akhir : " .$tglakhir);
        $transaksi = DB::table('tb_transaksi')
        ->leftjoin('tb_outlet','tb_transaksi.id_outlet','=','tb_outlet.id_outlet')
        ->leftjoin('users','tb_transaksi.id_user','=','users.id_user')
        ->leftjoin('tb_member','tb_transaksi.id_member','=','tb_member.id_member')
        ->leftjoin('tb_paket','tb_transaksi.id_paket','=','tb_paket.id_paket')
        ->whereBetween('tb_transaksi.created_at',[$tglawal, $tglakhir])
        ->select('tb_transaksi.*','tb_outlet.nama_outlet', 'users.nama_user', 'tb_member.nama_member', 'tb_paket.nama_paket')
        ->get();

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->set_option('isRemoteEnabled',TRUE);

        $path = base_path('logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/'.$type.';base64,'. base64_encode($data);
 
       
        ini_set('max_execution_time', 300);
        $pdf = PDF::loadView('halaman.halaman_cetakLaporan', compact('transaksi', 'tglawal', 'tglakhir', 'pic'))->setPaper('A4', 'landscape');
        return $pdf->download('Laporan Transaksi.pdf');

    }
}
