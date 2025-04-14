@extends('template.index')
@section('title', 'Data Transaksi')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Transaksi</h2>
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
                                                <form action="{{ route('deleteTransaksi', ['id_transaksi' => $item->id_transaksi]) }}" method="POST" id="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" id="delete-transaksi" data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                                    <i class="fa fa-remove"></i>
                                                </button>
                                                </form>
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

<!-- Modal Status Proses -->
<div class="modal fade" id="modalStatusProses" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Status Proses</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="statusProsesTransaksi" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('statusTransaksi') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_transaksi" value="{{ $item->id_transaksi }}">
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="kode_invoice" name="kode_invoice" readonly
                                    placeholder="Kode Invoice">
                                <span class="fa fa-fax form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="nama_member" name="nama_member" readonly
                                    placeholder="Nama Member">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <select name="status" id="proses_id" class="form-control has-feedback-left" required>
                                <option value="">Choose Proses</option>
                                <option value="Baru">Baru</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Diambil">Diambil</option>
                            </select>
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Status Bayar -->
<div class="modal fade" id="modalStatusBayar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Status Proses</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="statusProsesTransaksi" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('statusTransaksi') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_transaksi" value="{{ $item->id_transaksi }}">
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="kode_invoice" name="kode_invoice" readonly
                                    placeholder="Kode Invoice">
                                <span class="fa fa-fax form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="nama_member" name="nama_member" readonly
                                    placeholder="Nama Member">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <div class="radio">
                                <label>
                                <input type="radio" class="flat" id="dibayar-radio" name="dibayar" value="Dibayar" /> Dibayar
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" class="flat" id="belum-dibayar-radio" name="dibayar" value="Belum Dibayar" /> Belum Dibayar
                                </label>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('script')
<script>
$(document).ready(function () {
    $("#modalStatusBayar").on('show.bs.modal', (e) => {
        $("#modalStatusBayar").find('input[name="id_transaksi"]').val($(e.relatedTarget).data('id'));
        $("#modalStatusBayar").find('input[name="kode_invoice"]').val($(e.relatedTarget).data('kode'));
        $("#modalStatusBayar").find('input[name="nama_member"]').val($(e.relatedTarget).data('namamember'));
        var dibayar = $(e.relatedTarget).data('status');
        console.log(dibayar);
        if (dibayar == 'Dibayar') {
            $('input:radio[name="dibayar"]').filter('[id="dibayar-radio"]').iCheck('check');
        } else {
            $('input:radio[name="dibayar"]').filter('[id="belum-dibayar-radio"]').iCheck('check');
        }
    })
    $("#modalStatusProses").on('show.bs.modal', (a) => {
        $("#modalStatusProses").find('input[name="id_transaksi"]').val($(a.relatedTarget).data('id'));
        $("#modalStatusProses").find('input[name="kode_invoice"]').val($(a.relatedTarget).data('kode'));
        $("#modalStatusProses").find('input[name="nama_member"]').val($(a.relatedTarget).data('namamember'));
        $("#proses_id option[value=" + $(a.relatedTarget).data('status') + "]").prop("selected", true);
    })
    $('#form-delete').submit(function (event) {
            event.preventDefault();
            var form = $(this);
            if (confirm("Yakin akan dihapus?")) {
                form.unbind('submit').submit();
            }
        });
});
</script>
@endpush('')    
@endsection
