
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

<title>{{config('app.name')}}</title>

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layout.include.navbar')
  <!-- /.navbar -->
@include('admin.layout.include.logout_modal')

  <!-- Main Sidebar Container -->

  @include('admin.layout.include.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Developed By <a href="http://saroven.info">saroven</a>
    </div>
    <!-- Default to the left -->
<strong>Copyright &copy; {{date('Y')}} <a href="{{url('/')}}">{{config('app.name')}}</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>
<script src="{{asset('js/nav.js')}}"></script>

@yield('script')

</body>
</html>
