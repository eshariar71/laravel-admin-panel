<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Welcome To My Website | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/backend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/summernote/summernote-bs4.css') }}">
  {{-- Favicon Link --}}
	<link rel="favicon" sizes="48x48" href="{!! asset('assets/frontend/images/favicon/favicon.ico') !!}">
	<link rel="apple-touch-icon" sizes="180x180" href="{!! asset('assets/frontend/images/favicon/apple-touch-icon.png') !!}">
	<link rel="icon" type="image/png" sizes="32x32" href="{!! asset('assets/frontend/images/favicon/favicon-32x32.png') !!}">
	<link rel="icon" type="image/png" sizes="16x16" href="{!! asset('assets/frontend/images/favicon/favicon-16x16.png') !!}">
	<link rel="manifest" href="{!! asset('assets/frontend/images/favicon/site.webmanifest') !!}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
@include('backend.partials.header')
@include('backend.partials.sidebar')

@yield('content')

@include('backend.partials.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('assets/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backend/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets/backend/dist/js/demo.js') }}"></script>

<script src="{{ asset('assets/backend/dist/js/admin_custom.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/backend/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/backend/plugins/chart.js/Chart.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('assets/backend/dist/js/pages/dashboard2.js') }}"></script>


<!-- DataTables -->
<script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $("#cur_pass").keyup(function(){
        var current_pwd = $("#cur_pass").val();
        var incorrect = "<font color=red> Current Password is incorrect</font>";
        var correct = "<font color=green> Current Password is correct</font>";
        // alert(current_pwd);
        $.ajax({
          type:'post',
          url:'/admin/checkCurrPass',
          data:{current_pwd:current_pwd},
          success:function(resp){
            if(resp=="false"){
              $("#cur_pass_id").html(incorrect);
            }
            else if(resp=="true"){
              $("#cur_pass_id").html(correct);
            }
          },
          error:function(){
            alert("Error!");
          }
        });
      });
    });

</script>

<script type="text/javascript">
  $(document).ready(function(){
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 3000);
    });
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    $(function () {
        $("#dtable").DataTable();
    });
</script>
</body>
</html>
