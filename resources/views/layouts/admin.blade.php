<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title> Mycash| Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Select 2 -->
  <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet">
  <!-- Bootstrap 3.3.6 -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet">

  <!--Datable CSS -->
  <link href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
  <!-- datapicke.css-->
  <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- fullCalendar 2.2.5-->
  <link href="{{ asset('plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/fullcalendar/fullcalendar.print.css') }}" rel="stylesheet"  media="print">

  <!--Ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

  <!--DatePicker3 -->
  <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet">


  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
      -->
      <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script> 
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script> 
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

   @include('layouts._header')
   @include('layouts._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @include('layouts._footer')
 @include('layouts._sidebar_left')

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script> 
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script> 
<!-- AdminLTE App -->
<script type="text/javascript" src="{{ URL::asset('dist/js/app.min.js') }}"></script> 
<!-- Select2 -->
<script type="text/javascript" src="{{ URL::asset('plugins/select2/select2.full.min.js') }}"></script> 
<!-- InputMask -->
<script type="text/javascript" src="{{ URL::asset('plugins/input-mask/jquery.inputmask.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script> 

<script type="text/javascript" src="{{ URL::asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js') }}"></script> 
<!-- DataTables -->
<script type="text/javascript" src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script> 

<!--select 2 -->
<script type="text/javascript" src="{{ URL::asset('plugins/select2/select2.full.min.js') }}"></script>

<!-- fullCalendar 2.2.5 -->
<script type="text/javascript" src="{{ URL::asset('plugins/moment/moment.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script> 

<!-- Bootstrap JavaScript -->

<!-- App scripts -->
@stack('scripts')


</body>
</html>
