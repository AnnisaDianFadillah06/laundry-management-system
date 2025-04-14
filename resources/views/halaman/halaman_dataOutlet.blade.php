@extends('template.index')
@section('title', 'Data Outlet')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Outlet</h2>
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
            <!-- <div class="well" style="overflow: auto">
                <div class="col-md-12">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('postDataOutlet') }}">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left parsley-error" id="inputSuccess2"
                                name="nama_outlet" placeholder="Nama Outlet" required="" data-parsley-required="true">
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12 form-group has-feedback">
                            <input type="tel" class="form-control has-feedback-left" id="inputSuccess5"
                                name="tlp_outlet" placeholder="Phone">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <textarea class="form-control has-feedback-left" rows="3" placeholder="Alamat"
                                name="alamat_outlet"></textarea>
                            <textarea id="message" required="required" class="form-control has-feedback-left" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div> -->
                <div class="row">
                    
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                        <div class="dt-buttons">
                                    <a class="btn btn-success btn-sm" tabindex="0" aria-controls="datatable-buttons" data-toggle="modal"
                                    data-toggle="tooltip" data-placement="top" title="Tambah Data"
                                    data-target="#modalTambahOutlet"><span><i class="fa fa-plus"></i>
                                    Tambah Outlet</span></a>
                                </div>

                            <table id="datatable-responsive"
                                class="table table-striped table-bordered table-hover dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Outlet</th>
                                        <th>Alamat</th>
                                        <th>Telephone</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($tboutlet as $item)
                                    <tr>
                                        <td>{{ $item->id_outlet}}</td>
                                        <td>{{ $item->nama_outlet}}</td>
                                        <td>{{ $item->alamat_outlet}}</td>
                                        <td>{{ $item->tlp_outlet}}</td>
                                        <td><span class="badge badge-success {{ ($item->status == 1) ? 'badge badge-success' : 'badge badge-danger' }}">{{ ($item->status == 1) ? 'Aktif' : 'Non Aktif'}}</span></td>
                                        <td>{{ $item->created_by}}</td>
                                        <td>{{ $item->updated_by}}</td>
                                        <td>
                                            <div class="col-group">
                                                <button type="button" data-id="{{ $item->id_outlet}}" data-nama="{{ $item->nama_outlet}}" data-alamat="{{ $item->alamat_outlet}}" data-tlp="{{ $item->tlp_outlet}}" data-toggle="modal" data-target="#modalEditOutlet" class="btn btn-warning btn-sm"  data-toggle="tooltip" data-placement="top" title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button type="button" data-toggle="modal" data-target="#modalHapusOutlet" class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="Hapus Data">
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

<!-- Modal Tambah Outlet -->
<div class="modal fade" id="modalTambahOutlet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Outlet</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="inputoutlet" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('postDataOutlet') }}">
                        {{ csrf_field() }}
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="nama_outlet"
                                name="nama_outlet" placeholder="Nama Outlet" required data-parsley-trigger="focusout" data-parsley-nama_outlet data-parsley-nama_outlet="The name already exists">
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="tel" class="form-control has-feedback-left" id="inputSuccess5"
                                name="tlp_outlet" placeholder="Phone" data-parsley-type="number" required>
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <textarea class="form-control has-feedback-left" rows="3" placeholder="Alamat"
                                name="alamat_outlet" required></textarea>
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
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

<!-- Modal Edit Outlet -->
<div class="modal fade" id="modalEditOutlet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Outlet</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="editoutlet" data-parsley-validate class="form-horizontal form-label-left" method="POST"
                        action="{{ route ('postDataOutlet') }}">
                        <input class="form-control" id="editid_outlet" name="id_outlet" type="text" hidden="true" />
                        {{ csrf_field() }}
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="editnama_outlet"
                                name="nama_outlet" placeholder="Nama Outlet" required data-parsley-nama_outlet>
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <input type="tel" class="form-control has-feedback-left" id="edittlp_outlet"
                                name="tlp_outlet" placeholder="Phone" data-parsley-type="number" required>
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <textarea class="form-control has-feedback-left" id="editalamat_outlet" rows="3" placeholder="Alamat"
                                name="alamat_outlet" required></textarea>
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
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

    // $('#nama_outlet').parsley();
    // window.Parsley.addValidator('nama_outlet', {
    //     validateString: function(value) {
    //         var response = false;
    //         $.ajax({
    //             headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    // },
    //             url: "/postDataOutlet",
    //             data: {
    //                 nama_outlet: value
    //             },
    //             dataType: 'json',
    //             type: 'post',
    //             success: function (data) {
    //                 response = true;
    //                 console.log("benar");
    //             },
    //             error: function () {
    //                 response = false;
    //                 console.log("salah");
    //             }
    //         });
    //         return response;
    //     }
    // });
//     $('#inputoutlet, #editoutlet').on('submit', function (event) {
//     event.preventDefault(); // membatalkan submit form
//     $('#nama_outlet').parsley();
//     window.Parsley.addValidator('nama_outlet', {
//         validateString: function (value) {
//             var response = false;
//             $.ajax({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 },
//                 url: "/postDataOutlet",
//                 data: {
//                     nama_outlet: value
//                 },
//                 dataType: 'json',
//                 type: 'post',
//                 success: function (data) {
//                     if (data.status == 'success') {
//                         $('#inputoutlet, #editoutlet').unbind('submit').submit(); // meng-submit form setelah validasi berhasil
//                     } else {
//                         response = false;
//                         // Memunculkan pesan error menggunakan Parsley
//                         $('#nama_outlet').parsley().validate();
//                     }
//                 },
//                 error: function () {
//                     console.log("salah");
//                 }
//             });
//             return response;
//         }
//     });
// });
    $("#modalEditOutlet").on('show.bs.modal', (e) => {
           console.log("edit");
        $("#modalEditOutlet").find('input[name="id_outlet"]').val($(e.relatedTarget).data('id'));
        $("#modalEditOutlet").find('input[name="nama_outlet"]').val($(e.relatedTarget).data('nama'));
        $("#modalEditOutlet").find('textarea[name="alamat_outlet"]').val($(e.relatedTarget).data('alamat'));
        $("#modalEditOutlet").find('input[name="tlp_outlet"]').val($(e.relatedTarget).data('tlp'));
    })
    });
</script>
@endpush('')
           
@endsection
