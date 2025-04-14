@extends('template.index')
@section('title', 'Data Pengguna')

@section('content')
    <div class="row" style="display: inline-block;">
        <div class="top_tiles">
            @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Owner' || Auth::user()->role == 'Kasir')
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 @if(Auth::user()->role == 'Kasir') col-lg-4 col-md-4 col-sm-6 @endif">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                  <div class="count">{{ $totaltransaksi }}</div>
                  <h3>Transaksi</h3>
                  <p>Transaksi dalam proses.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 @if(Auth::user()->role == 'Kasir') col-lg-4 col-md-4 col-sm-6 @endif">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-cubes"></i></div>
                  <div class="count">{{ $totalpaket }}</div>
                  <h3>Paket</h3>
                  <p>Paket berstatus aktif.</p>
                </div>
              </div>
              @if(Auth::user()->role != 'Kasir')
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count">{{ $totalpengguna }}</div>
                  <h3>Pengguna</h3>
                  <p>Pengguna berstatus aktif.</p>
                </div>
              </div>
              @endif
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 @if(Auth::user()->role == 'Kasir') col-lg-4 col-md-4 col-sm-6 @endif">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">{{ $totaloutlet }}</div>
                  <h3>Outlet </h3>
                  <p>Outlet berstatus aktif.</p>
                </div>
              </div>
              @endif
        </div>
    </div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Transaksi</h2>
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
                                        <th>Action</th>
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
                                        <td>
                                            <div class="col-group">
                                                <button type="button" data-toggle="modal" data-target="#modalStatusProses" class="btn btn-secondary btn-sm" data-id="{{ $item->id_transaksi }}" data-status="{{ $item->status }}" data-kode="{{ $item->kode_invoice }}" data-namamember="{{ $item->nama_member }}"  data-toggle="tooltip" data-placement="top" title="Status Proses">
                                                    <i class="fa fa-recycle"></i>
                                                </button>

                                                <button type="button" data-toggle="modal" data-target="#modalStatusBayar" class="btn btn-primary btn-sm" data-id="{{ $item->id_transaksi }}" data-status="{{ $item->dibayar }}" data-kode="{{ $item->kode_invoice }}" data-namamember="{{ $item->nama_member }}"  data-toggle="tooltip" data-placement="top" title="Status Bayar">
                                                    <i class="fa fa-money"></i>
                                                </button>
                                            </div>
                                        </td>
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


@push('script')
<script>

$(document).ready(function () {

});

</script>
@endpush('')    
@endsection