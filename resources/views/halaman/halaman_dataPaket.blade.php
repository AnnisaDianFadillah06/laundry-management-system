@extends('template.index')
@section('title', 'Data Paket')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Paket</h2>
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
                                    <a class="btn btn-success btn-sm" tabindex="0" aria-controls="datatable-buttons" data-toggle="modal"
                                    data-toggle="tooltip" data-placement="top" title="Tambah Data"
                                    data-target="#modalTambahPaket"><span><i class="fa fa-plus"></i>
                                    Tambah Paket</span></a>
                                </div>


                            <table id="datatable-responsive"
                                class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Jenis Paket</th>
                                        <th>Harga Paket</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($tbpaket as $item)
                                    <tr>
                                        <td>{{ $item->id_paket}}</td>
                                        <td>{{ $item->nama_paket}}</td>
                                        <td>{{ $item->harga_paket}}</td>
                                        <td><span class="badge badge-success {{ ($item->status == 1) ? 'badge badge-success' : 'badge badge-danger' }}">{{ ($item->status == 1) ? 'Aktif' : 'Non Aktif'}}</span></td>
                                        <td>{{ $item->created_by}}</td>
                                        <td>{{ $item->updated_by}}</td>
                                        <td>
                                            <div class="col-group">
                                                <button type="button" data-id="{{ $item->id_paket}}" data-nama="{{ $item->nama_paket}}" data-harga="{{ $item->harga_paket}}" data-toggle="modal" data-target="#modalEditPaket" class="btn btn-warning btn-sm"  data-toggle="tooltip" data-placement="top" title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button type="button" data-id="{{ $item->id_paket}}" data-status="{{ $item->status }}" data-toggle="modal" data-target="#modalHapusPaket" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                                    <i class="fa fa-remove"></i>
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

<!-- Modal Tambah Paket -->
<div class="modal fade" id="modalTambahPaket" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Paket</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="inputpaket" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route ('postDataPaket') }}">
                    {{ csrf_field() }}
                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="nama_paket"
                                    name="nama_paket" placeholder="Nama Paket" required>
                                <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="harga_paket" id="harga_paket" placeholder="Harga Paket" data-parsley-type="number" required>
                                <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
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

<!-- Modal Edit Paket -->
<div class="modal fade" id="modalEditPaket" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Paket</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="editpaket" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route ('postDataPaket') }}">
                    <input class="form-control" id="editid_paket" name="id_paket" type="text" hidden="true" />
                    {{ csrf_field() }}
                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="editnama_paket"
                                    name="nama_paket" placeholder="Nama Paket" required>
                                <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="harga_paket" id="editharga_paket" placeholder="Harga Paket" data-parsley-type="number" required>
                                <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
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
           
<!-- Modal Hapus Paket -->
<div class="modal fade" id="modalHapusPaket" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Hapus Paket</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="hapusPengguna" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('hapusDataPaket') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_paket" id="hapusid_paket" type="text" hidden="true"/>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <div class="radio">
                                <label>
                                <input type="radio" class="flat" id="aktif-radio" name="status" value="1" /> Aktif
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input type="radio" class="flat" id="non-aktif-radio" name="status" value="0" /> Non Aktif
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
    $("#modalEditPaket").on('show.bs.modal', (e) => {
           console.log("edit");
        $("#modalEditPaket").find('input[name="id_paket"]').val($(e.relatedTarget).data('id'));
        $("#modalEditPaket").find('input[name="nama_paket"]').val($(e.relatedTarget).data('nama'));
        $("#modalEditPaket").find('input[name="harga_paket"]').val($(e.relatedTarget).data('harga'));
    });

    $("#modalHapusPaket").on('show.bs.modal', (f) => {
        $("#modalHapusPaket").find('input[name="id_paket"]').val($(f.relatedTarget).data('id'));
        var status = $(f.relatedTarget).data('status');
        console.log(status);
        if (status == `1`) {
            $('input:radio[name="status"]').filter('[id="aktif-radio"]').iCheck('check');
        } else {
            $('input:radio[name="status"]').filter('[id="non-aktif-radio"]').iCheck('check');
        }
    });
    // $('#harga_paket, #editharga_paket').mask('#.##0', {reverse: true});
});
</script>
@endpush('')
@endsection
