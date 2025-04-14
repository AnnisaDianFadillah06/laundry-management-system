@extends('template.index')
@section('title', 'Registrasi Pelanggan')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registrasi Pelanggan <small>Sessions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!-- Smart Wizard -->
                <div id="wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps">
                        <li>
                            <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr">
                                    Step 1<br />
                                    <small>Registrasi</small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                    Step 2<br />
                                    <small>Pelayanan</small>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div id="step-1">
                        <form class="form-horizontal form-label-left" id="myWizardForm" data-parsley-validate method="POST" action="{{ route ('postDataPelanggan') }}">
                        {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_member">Nama
                                    Pelanggan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="nama_member" required name="nama_member" class="form-control  ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="jenis_kelamin" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-secondary">
                                            <input type="radio" name="jenis_kelamin" value="Pria" class="join-btn">
                                            &nbsp; Pria
                                            &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary"
                                            data-toggle-passive-class="btn-secondary">
                                            <input type="radio" name="jenis_kelamin" value="Wanita" class="join-btn">
                                            Wanita
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tlp_member">Telephone
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="tlp_member" name="tlp_member" required data-parsley-type="number"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" rows="3" id="alamat_member" name="alamat_member"
                                        name="alamat_member" required></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="step-2">
                    @if ($id_member && $nama_member)
                        <form class="form-horizontal form-label-left" data-parsley-validate method="POST" action="{{ route ('postTransaksiRegis') }}">
                        <input class="form-control" id="id_member" name="id_member" type="text" value='{{ $id_member }}' hidden="true" />
                        {{ csrf_field() }}
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_member">Nama
                                        Pelanggan
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="nama_member" readonly required name="nama_member" value='{{ $nama_member }}' class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_outlet">Nama
                                        Outlet
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <select class="form-control" name="id_outlet" required>
                                            <option value="">Choose Outlet</option>
                                            @foreach($outlet as $row)
                                            <option value="{{$row -> id_outlet}}" {{ old('tb_outlet')==$row->id_outlet?'selected' :null}}>
                                                {{$row->nama_outlet}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Invoice</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="kode_invoice" name="kode_invoice" required="required" class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_pesan">Tgl
                                        Pesan
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input id="birthday" name="tgl_pesan" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                            type="text" required="required" type="text" onfocus="this.type='date'"
                                            onmouseover="this.type='date'" onclick="this.type='date'"
                                            onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function () {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_selesai">Tgl
                                        Selesai
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input name="tgl_selesai" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                            type="text" required="required" type="text" onfocus="this.type='date'"
                                            onmouseover="this.type='date'" onclick="this.type='date'"
                                            onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function () {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_bayar">Tgl
                                        Bayar
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input id="birthday" name="tgl_bayar" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                            type="text" required="required" type="text" onfocus="this.type='date'"
                                            onmouseover="this.type='date'" onclick="this.type='date'"
                                            onblur="this.type='text'" onmouseout="timeFunctionLong(this)" >
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function () {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="layanan_paket">Layanan Paket
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <select class="form-control" name="id_paket" id="id_paket" required>
                                            <option value="">Choose Paket</option>
                                            @foreach($paket as $row)
                                            <option value="{{$row -> id_paket}}" data-tarif="{{$row->harga_paket}}" {{ old('tb_paket')==$row->id_paket?'selected' :null}}>
                                                {{$row->nama_paket}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tarif Paket</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="tarif" name="tarif" required readonly class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Berat(kg)</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="berat" name="berat" required="required" class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Total</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="total" name="total" required readonly class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status Bayar</label>
                                    <div class="col-md-8 col-sm-8 ">
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
                        </form>
                        @else
                            <p>Isi Registrasi dengan Lengkap !</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pelanggan -->
<div class="modal fade" id="modalTambahPelanggan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2"
                                    placeholder="Nama Pelanggan">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="tel" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Phone">
                                <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <textarea class="form-control has-feedback-left" rows="3" placeholder="Alamat"></textarea>
                            <!-- <textarea id="message" required="required" class="form-control has-feedback-left" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea> -->
                                <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <label class="col-form-label form-horizontal form-label-left col-md-2 col-sm-2">Gender</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                        data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male
                                        &nbsp;
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary"
                                        data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="female" class="join-btn"> Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
				<button class="btn btn-primary" type="button">Cancel</button>
				<button class="btn btn-primary" type="reset">Reset</button>
				<button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
$(document).ready(function () {

    // var dropdown = document.getElementById("id_paket");
    // dropdown.addEventListener("change", function() {
    //     var tarif = document.getElementById("tarif");
    //     tarif.value = this.options[this.selectedIndex].getAttribute('data-tarif');
    // });
    var id_paket = document.getElementById('id_paket');
    var tarif = document.getElementById('tarif');
    var berat = document.getElementById('berat');
    var total = document.getElementById('total');

    // Menambahkan event listener pada dropdown dan input berat
    id_paket.addEventListener('change', hitungTotal);
    berat.addEventListener('input', hitungTotal);

    // Fungsi untuk menghitung total
    function hitungTotal() {
        var harga_paket = id_paket.options[id_paket.selectedIndex].dataset.tarif;
        tarif.value = harga_paket;
        var total_biaya = parseInt(harga_paket) * parseInt(berat.value);
        total.value = total_biaya;
    }

    $('#tarif, #total').mask('#.##0', {reverse: true});

  // initialize wizard
//   $('#myWizardForm').smartWizard({
//   onShowStep: function(anchorObject, stepNumber) {
//     $('#myWizardForm').parsley().validate();
//   }
// });
//     // Initialize form validation on the wizard form
//   $('form').parsley();

//     // Add event handler for wizard action clicked event
//     $('#myWizardForm').on('actionclicked.fu.wizard', function (evt, data) {
//     // If the current page is not valid, prevent the wizard from moving to the next page
//     if (!$(this).parsley().validate('block' + data.step)) {
//         evt.preventDefault();
//     }
//     });
});
</script>
@endpush('')
@endsection
