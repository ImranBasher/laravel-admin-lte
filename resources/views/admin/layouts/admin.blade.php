<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield("title") | Dubai Online Car Care Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('dashboardFiles/css') }}/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dashboardFiles/css') }}/OverlayScrollbars.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

  <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" 
        integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" 
        />

  <link rel="stylesheet" href="{{ asset('dashboardFiles/css') }}/adminlte.min.css">

    @yield("css")
    @yield("styles")
    @yield("links")

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset('dashboardFiles/images') }}/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>

        {{-- Dashboard Header --}}
        @include("admin.includes.header")
      <!-- Main Sidebar Container -->

        {{-- Dashboard Sidebar Start --}}
        @include("admin.includes.admin-sidebar")
        {{-- Dashboard Sidebar End --}}

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include("admin.includes.page-header")
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                  @yield("content")
              </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
          </div>
         <!-- /.content-wrapper -->

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
            <!-- /.control-sidebar -->
        <!-- Main Footer -->
        @include("admin.includes.footer")
    </div>
    <!-- ./wrapper -->
    @include("admin.includes.footer-script")


    @yield("js")
    @yield("scripts")

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
