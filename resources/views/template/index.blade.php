<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dicuciin</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset ('template/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('template/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- NProgress -->
    <link rel="stylesheet" href="{{ asset ('template/vendors/nprogress/nprogress.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset ('template/vendors/iCheck/skins/flat/green.css')}}">
    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset ('template/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('template/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('template/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('template/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('template/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset ('template/css/custom.min.css')}}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   @stack('script');
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
        @include('template/navbar')
        @include('template/top_nav')
        @include('template/content')
        @include('template/footer')
        </div>
    </div>
 <style>
.custom-file-label::after {
  content: "Browse";
}

.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}

.custom-file-input::before {
  content: 'Choose file';
  display: inline-block;
  background: linear-gradient(to bottom, #f9f9f9 0%, #e3e3e3 100%);
  border: 1px solid #adadad;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
  color: #000;
  margin-right: 5px;
}

.custom-file-input:hover::before {
  border-color: black;
}

.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}

 </style>
 <script>
    function openPrintWindow(url) {
        window.open(url, 'Print', 'height=600,width=800');
    }
</script>
    <!-- jQuery -->
    <script src="{{ asset ('template/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset ('template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset ('template/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset ('template/vendors/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ asset ('template/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- jQuery Smart Wizard -->
    <script src="{{ asset ('template/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
    <!-- Datatables -->
    <script src="{{ asset ('template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset ('template/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset ('template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset ('template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- Parsley -->
	  <script src="{{ asset ('template/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <!-- Dropzone.js -->
    <!-- <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet"> -->
    <!-- Input Rupiah -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset ('template/js/custom.min.js')}}"></script>

</body>

</html>