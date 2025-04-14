@extends('template.index')
@section('title', 'Laporan Transaksi')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Laporan Transaksi</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                                <div class="dt-buttons">
                                    <a class="btn btn-primary btn-sm" tabindex="0" aria-controls="datatable-buttons" data-toggle="modal"
                                    data-toggle="tooltip" data-placement="top" title="Cetak PDF"
                                    data-target="#modalCetakPDF"><span><i class="fa fa-print"></i>
                                    Cetak PDF</span></a>
                                </div>
                            <table id="datatable-responsive"
                                class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode Invoice</th>
                                        <th>Nama Outlet</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Paket</th>
                                        <th>Berat</th>
                                        <th>Total</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Batas Waktu</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status Proses</th>
                                        <th>Status Dibayar</th>
                                        <th>Nama Kasir</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{ $item->id_transaksi}}</td>
                                        <td>{{ $item->kode_invoice}}</td>
                                        <td>{{ $item->nama_outlet}}</td>
                                        <td>{{ $item->nama_member}}</td>
                                        <td>{{ $item->nama_paket}}</td>
                                        <td>{{ $item->berat}}</td>
                                        <td>{{ $item->total}}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tgl_pesan)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->batas_waktu)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->tgl_bayar)) }}</td>
                                        <td>
                                            <span class="badge {{
                                                ($item->status == 'Baru') ? 'badge-danger' :
                                                (($item->status == 'Proses') ? 'badge-primary' :
                                                (($item->status == 'Selesai') ? 'badge-success' :
                                                (($item->status == 'Diambil') ? 'badge-secondary' : '')))
                                            }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ ($item->dibayar == 'Dibayar') ? 'badge-success' : 'badge-danger' }}">{{ $item->dibayar }}</span>
                                        </td>
                                        <td>{{ $item->nama_user}}</td>
                                        <td>{{ $item->created_by}}</td>
                                        <td>{{ $item->updated_by}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cetak PDF -->
<div class="modal fade" id="modalCetakPDF" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cetak PDF</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <div class="input-group col-md-12 col-sm-12">
                        <label for="label">Tanggal Awal</label>&emsp;
                        <input type="date" name="tglawal" id="tglawal"/>
                    </div>
                    <div class="input-group col-md-12 col-sm-12">
                        <label for="label">Tanggal Akhir</label>&emsp;
                        <input type="date" name="tglakhir" id="tglakhir"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="" onclick="this.href='/cetak-transaksi-pertanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-success cold-md-12"> <i class="fa fa-print"> </i> Cetak </a>
            </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
$(document).ready(function () {

});
</script>
@endpush('')    
@endsection
