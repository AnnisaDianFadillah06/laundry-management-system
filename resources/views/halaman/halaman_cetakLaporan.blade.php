<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Transaksi - CUCIIN</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    .table2 tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }

    .table1 {
        border-collapse: collapse;
        width: 90%;
        text-align: center;
        padding: 5px;
    }

 
</style>

<body>
    <table class='table1'>
        <tr style="border:none;">
            <td style="border:none;"><img src="<?php echo $pic ?>" height="100" width="100"></td>
            <td style="border:none;">
                <h3>Laporan Data Transaksi</h3>
                <h3>PT. Cuciin</h3>
                <p style="font-size:14px;"><i>Jln. Cibeureum Citeureup G-16, Cimahi | Telp. [022] 678 640</i></p>
            </td>
        </tr>
    </table>
    <!-- <div class="head-title">
        <h1 class="text-center m-0 p-0">Data Karyawan</h1>
    </div> -->
    <div class="add-detail mt-10">
    <hr style="border: 3px double #000;">
        <div class="w-50 float-left mt-10">
            <!-- <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#6</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">162695CDFS</span></p> -->
            <p class="m-0 pt-5 text-bold w-100">Created Date - <span class="gray-color">{{ $tglawal }}</span>
                <span class="gray-color">s/d </span><span class="gray-color">{{ $tglakhir }}</span></p>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table2 w-100 mt-10">
            <tr>
                <th class="w-50">No</th>
                <th class="w-50">Kode Invoice</th>
                <th class="w-50">Nama Outlet</th>
                <th class="w-50">Nama Pelanggan</th>
                <th class="w-50">Nama Paket</th>
                <th class="w-50">Berat</th>
                <th class="w-50">Total Harga</th>
                <th class="w-50">Tanggal Pesan</th>
                <th class="w-50">Tanggal Selesai</th>
                <th class="w-50">Nama Kasir</th>
                <th class="w-50">Status Proses</th>
                <th class="w-50">Status Bayar</th>
            </tr>
            @foreach ($transaksi as $item)
            <tr align="center">
                <td>{{ $item->id_transaksi}}</td>
                <td>{{ $item->kode_invoice}}</td>
                <td>{{ $item->nama_outlet}}</td>
                <td>{{ $item->nama_member}}</td>
                <td>{{ $item->nama_paket}}</td>
                <td>{{ $item->berat}}</td>
                <td>{{ $item->total}}</td>
                <td>{{ date('d-m-Y', strtotime($item->tgl_pesan)) }}</td>
                <td>{{ date('d-m-Y', strtotime($item->batas_waktu)) }}</td>
                <td>{{ $item->nama_user}}</td>
                <td>{{ $item->status}}</td>
                <td>{{ $item->dibayar}}</td>
            </tr>
            @endforeach
        </table>
    </div>

</html>