<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

 


  @include('layouts.link')

 >

</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="background-color: black">
<div class="wrapper">


  <!-- Navbar -->
  @include('layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: black">
    <!-- Content Header (Page header) -->
    @yield('main')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class=" " style="background-color: black">
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


@include('layouts.script')


</body>
</html>
