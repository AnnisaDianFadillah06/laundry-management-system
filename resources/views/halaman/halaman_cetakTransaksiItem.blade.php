<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:13px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:5px;
            width:650px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:20px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:650px;
        }
        td, tr, th{
            padding:4px;
            border:1px solid #333;
            width:125px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <caption>
                HAPPY DICUCIIN
            </caption>
            <thead>
                <tr>
                    <th colspan="2">Invoice <strong>#{{ $request -> kode_invoice }}</strong>&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Outlet <strong>#{{ $transaksi->OutletModel->nama_outlet }}</strong></th>
                    <th>Keterangan Tanggal</th>
                </tr>
                <tr>
                    <td>
                        <h4>Perusahaan: </h4>
                        <p>PT. Dicuciin<br>
                            Jln. Cibeureum Citeureup G-16, Cimahi<br>
                            Telp. [022] 678 640 || dayenrakuman@gmail.com<br>
                        </p>
                    </td>
                    <td>
                        <h4>Pelanggan: </h4>
                        <p>  {{ $member->nama_member }} <br>
                        Telp. {{ $member->tlp_member }}<br>
                        {{ $member->alamat_member }}
                        </p>
                    </td>
                    <td>
                        <p>Pesan / {{ $request->tgl_pesan }}<br>
                        Selesai / {{ $request->tgl_selesai }}<br>
                        Bayar / {{ $request->tgl_bayar }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Paket</th>
                    <th>Tarif</th>
                    <th>Berat</th>
                </tr>
                <tr>
                    <td>{{ $transaksi->PaketModel->nama_paket }}</td>
                    <td>Rp {{ number_format($transaksi->PaketModel->harga_paket) }}</td>
                    <td>{{ $request->berat }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <td colspan="2">Rp {{ number_format($request->total) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>