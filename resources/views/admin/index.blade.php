<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{url('img/foto/logo1.png')}}" rel="icon">
  <title>SI Laundry</title>
  <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body id="page-top">
  <div id="wrapper">
    @include('sweetalert::alert')
    <!-- Sidebar -->
    @include('admin.sidebar')
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('admin.header')
        <!-- Topbar -->

        <!-- Container Fluid-->
        @yield('content')
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('admin.footer')
      <!-- Footer -->
    </div>
  </div>

  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
  @if (session('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            timer: 1500
        })
    </script>
  @elseif(session('error'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
    @endif
</body>
</html>