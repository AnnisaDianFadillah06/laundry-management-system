@extends('template.index')
@section('title', 'Input Transaksi')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Input Transaksi</h2>
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
                    <form class="form-horizontal form-label-left" data-parsley-validate method="POST" action="{{ route ('postTransaksi', $member->id_member) }}">
                    <input class="form-control" id="id_member" name="id_member" type="text" value="{{ $member->id_member }}" hidden="true" />
                    {{ csrf_field() }}
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Member</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="nama_member" value="{{ $member->nama_member }}" name="nama_member" readonly required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_member">Nama
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
                                        <input type="text" id="kode_invoice" name="kode_invoice" required class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_pesan">Tgl
                                        Pesan
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input id="birthday" name="tgl_pesan" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                            type="text" required type="text" onfocus="this.type='date'"
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
                                            type="text" required type="text" onfocus="this.type='date'"
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
                                            <input name="tgl_bayar" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                                type="text" type="text" onfocus="this.type='date'"
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
                                        <input type="text" id="tarif" name="tarif" readonly class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Berat(kg)</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="berat" name="berat" required data-parsley-type="number" class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Total</label>
                                    <div class="col-md-8 col-sm-8 ">
                                        <input type="text" id="total" name="total" readonly class="form-control  ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status Bayar</label>
                                    <div class="col-md-8 col-sm-8 ">
                                    <div class="radio">
                                        <label>
                                        <input type="radio" required class="flat" id="dibayar-radio" name="dibayar" value="Dibayar" /> Dibayar
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                        <input type="radio" required class="flat" id="belum-dibayar-radio" name="dibayar" value="Belum Dibayar" /> Belum Dibayar
                                        </label>
                                    </div>
                                    </div>
                                </div>
<br><br>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="submit" name="print" class="btn btn-primary">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
$(document).ready(function () {
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
    $("#modalEditPaket").on('show.bs.modal', (e) => {
           console.log("edit");
        $("#modalEditPaket").find('input[name="id_paket"]').val($(e.relatedTarget).data('id'));
        $("#modalEditPaket").find('input[name="nama_paket"]').val($(e.relatedTarget).data('nama'));
        $("#modalEditPaket").find('input[name="harga_paket"]').val($(e.relatedTarget).data('harga'));
    });
    $('#tarif, #total').mask('#.##0', {reverse: true});
    // $('form').submit(function () {
    //         $(this).attr('action', $(this).attr('action') + '?print=true');
    // });
});
</script>
@endpush('')
@endsection
