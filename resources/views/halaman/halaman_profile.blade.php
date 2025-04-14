@extends('template.index')
@section('title', 'Profile')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
        <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" width="100px" height="100px" src="{{ session('urlFotoProfil') }}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3>{{ session('nama_user') }}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ session('nama_outlet') }}
                        </li>
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> {{ session('role') }}
                        </li>

                        <li>
                          <i class="fa fa-envelope user-profile-icon"></i> {{ session('email') }}
                        </li>
                      </ul>
                      <br />

                    </div>
                    <div class="col-md-9 col-sm-9 ">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Riwayat Kerja</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Edit Profile</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade table-responsive" id="tab_content1"
                                aria-labelledby="profile-tab">
                                <!-- start edit user -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="x_content">
                                        <br />
                                        <form enctype="multipart/form-data" id="editPengguna" data-parsley-validate
                                            class="form-horizontal form-label-left" method="POST"
                                            action="{{ route ('postProfile') }}">
                                               <input class="form-control" id="editid_user" name="id_user" value="{{ session('id_user') }}" type="text"
                                                hidden="true" />
                                            {{ csrf_field() }}
                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left"
                                                    id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" value="{{ session('nama_user') }}"
                                                    required data-parsley-nama_pengguna>
                                                <span class="fa fa-user form-control-feedback left"
                                                    aria-hidden="true"></span>
                                            </div>

                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" id="email" value="{{ session('email') }}"
                                                    name="email" placeholder="Email" data-parsley-type="email" required>
                                                <span class="fa fa-envelope form-control-feedback left"
                                                    aria-hidden="true"></span>
                                            </div>
                                         
                                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                                <input class="form-control" name="foto_user" id="foto_user" type="file" value="{{ session('urlFotoProfil') }}"
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
                                <!-- end user projects -->
                            </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <!-- start edit user -->
                            <table id="datatable-responsive" class="data table table-striped dt-responsive no-margin">
                              <thead>
                                <tr>
                                        <th>No</th>
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
                            <!-- end user projects -->
                          </div>
                        </div>
                      </div>
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
