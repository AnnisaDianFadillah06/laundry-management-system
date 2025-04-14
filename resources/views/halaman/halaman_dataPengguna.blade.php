@extends('template.index')
@section('title', 'Data Outlet')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Pengguna</h2>
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
                                    data-target="#modalTambahPengguna"><span><i class="fa fa-plus"></i>
                                    Tambah Pengguna</span></a>
                                </div>

                            <table id="datatable-responsive"
                                class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Foto User</th>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Outlet</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($pengguna as $item)
                                    <tr>
                                        <td>{{ $item->id_user}}</td>
                                        <td>
                                            <img src="{{ $item->foto_user}}" width='50' height='50'
                                                class="img img-responsive" />
                                        </td>
                                        <td>{{ $item->nama_user}}</td>
                                        <td>{{ $item->email}}</td>
                                        <td>{{ $item->role}}</td>
                                        <td>{{ $item->nama_outlet}}</td>
                                        <td><span class="badge badge-success {{ ($item->status == 1) ? 'badge badge-success' : 'badge badge-danger' }}">{{ ($item->status == 1) ? 'Aktif' : 'Non Aktif'}}</span></td>
                                        <td>{{ $item->created_by}}</td>
                                        <td>{{ $item->updated_by}}</td>
                                        <td>
                                            <div class="col-group">
                                                <button type="button" data-toggle="modal" data-target="#modalEditPengguna" class="btn btn-warning btn-sm" data-id="{{ $item->id_user }}" data-nama="{{ $item->nama_user }}" data-email="{{ $item->email }}" data-role="{{ $item->role }}" data-id_outlet="{{ $item->id_outlet }}" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button type="button" data-toggle="modal" data-target="#modalHapusPengguna" class="btn btn-danger btn-sm" data-id="{{ $item->id_user }}" data-status="{{ $item->status }}" data-toggle="tooltip" data-placement="top" title="Hapus Data">
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

<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="modalTambahPengguna" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data" id="inputPengguna" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('postDataPengguna') }}">
                        {{ csrf_field() }}
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="nama_pengguna" name="nama_pengguna"
                                placeholder="Nama Pengguna" required data-parsley-nama_pengguna>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="email" name="email"
                                placeholder="Email" data-parsley-type="email" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <select name="id_outlet" id="id_outlet" class="form-control has-feedback-left" required>
                                <option value="">Choose Outlet</option>
                                @foreach($outlet as $row)
                                <option value="{{$row -> id_outlet}}" {{ old('tb_outlet')==$row->id_outlet?'selected' :null}}>
                                    {{$row->nama_outlet}}
                                </option>
                                @endforeach
                            </select>
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <select name="role" id="role" class="form-control has-feedback-left" required>
                                <option value="">Choose Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Owner">Owner</option>
                            </select>
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="password" class="form-control has-feedback-left" id="password" name="password"
                                placeholder="Password" required data-parsley-length="[6, 16]" required>
                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="password" class="form-control has-feedback-left" id="repassword"
                                name="repassword" placeholder="Re-Password" data-parsley-equalto="#password" required>
                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input class="form-control" name="foto_user" id="foto_user" type="file"
                                    placeholder="Foto Pengguna" required>
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

<!-- Modal Edit Pengguna -->
<div class="modal fade" id="modalEditPengguna" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form enctype="multipart/form-data" id="editPengguna" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('postDataPengguna') }}">
                        <input class="form-control" id="editid_user" name="id_user" type="text" hidden="true" />
                        {{ csrf_field() }}
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="nama_pengguna" name="nama_pengguna"
                                placeholder="Nama Pengguna" required data-parsley-nama_pengguna>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="email" name="email"
                                placeholder="Email" data-parsley-type="email" required>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <select name="id_outlet" id="outlet_id" class="form-control has-feedback-left" required>
                                <option value="">Choose Outlet</option>
                                @foreach($outlet as $row)
                                <option value="{{$row -> id_outlet}}" {{ old('tb_outlet')==$row->id_outlet?'selected' :null}}>
                                    {{$row->nama_outlet}}
                                </option>
                                @endforeach
                            </select>
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <select name="role" id="role" class="form-control has-feedback-left" required>
                                <option value="">Choose Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Owner">Owner</option>
                            </select>
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input class="form-control" name="foto_user" id="foto_user" type="file" placeholder="Foto Pengguna" required>
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

<!-- Modal Hapus Pengguna -->
<div class="modal fade" id="modalHapusPengguna" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="hapusPengguna" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('hapusDataPengguna') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_user">
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


// $(document).ready(function () {
    $(document).ready(function () {

    $("#modalHapusPengguna").on('show.bs.modal', (e) => {
        var status = $(e.relatedTarget).data('status');
        $("#modalHapusPengguna").find('input[name="id_user"]').val($(e.relatedTarget).data('id'));
        console.log(status);
        if (status == `1`) {
            $('input:radio[name="status"]').filter('[id="aktif-radio"]').iCheck('check');
        } else {
            $('input:radio[name="status"]').filter('[id="non-aktif-radio"]').iCheck('check');
        }
    })
    $("#modalEditPengguna").on('show.bs.modal', (a) => {
        $("#modalEditPengguna").find('input[name="id_user"]').val($(a.relatedTarget).data('id'));
        $("#modalEditPengguna").find('input[name="nama_pengguna"]').val($(a.relatedTarget).data('nama'));
        $("#modalEditPengguna").find('input[name="email"]').val($(a.relatedTarget).data('email'));
        $("#outlet_id option[value=" + $(a.relatedTarget).data('id_outlet') + "]").prop("selected", true);
        $("#role option[value=" + $(a.relatedTarget).data('role') + "]").prop("selected", true);
            
    })
});

    // window.Parsley.addValidator('nama_pengguna', function (value, requirement) {
    //     var response = false;

    //     $.ajax({
    //         url: "/postDataPengguna",
    //         data: {
    //             nama_pengguna: value
    //         },
    //         dataType: 'json',
    //         type: 'post',
    //         async: false,
    //         success: function (data) {
    //             response = true;
    //         },
    //         error: function () {
    //             response = false;
    //         }
    //     });

    //     return response;

    // }).addMessage('en', 'nama_pengguna', 'The name user already exists');

    // $("#inputPengguna").parsley({
    //     errorClass: 'is-invalid',
    //     successClass: 'is-valid',
    //     errorsWrapper: '<span class="invalid-feedback"></span>',
    //     errorTemplate: '<span></span>',
    //     trigger: 'change'
    // });

// });
//   const fileInput = document.getElementById('file-input');
//   const uploadImage = document.getElementById('uploadimage');

//   fileInput.addEventListener('change', (event) => {
//     const fileName = event.target.files[0].name;
//     uploadImage.value = fileName;
//   });
</script>
@endpush('')    
@endsection