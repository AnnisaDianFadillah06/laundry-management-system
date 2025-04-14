@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible " role="alert">
    <strong>Selamat! </strong>{{ $message }}
    <a data-dismiss="alert" aria-label="Close" class="fa fa-close fa-lg close"></a>
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible " role="alert">
    <strong>Holy guacamole!</strong>{{ $message }}
    <a data-dismiss="alert" aria-label="Close" class="fa fa-close fa-lg close"></a>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible " role="alert">
    <strong>Holy guacamole!</strong>{{ $message }}
    <a data-dismiss="alert" aria-label="Close" class="fa fa-close fa-lg close"></a>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-danger alert-dismissible " role="alert">
    <strong>Holy guacamole!</strong>{{ $message }}
    <a data-dismiss="alert" aria-label="Close" class="fa fa-close fa-lg close"></a>
</div>
@endif