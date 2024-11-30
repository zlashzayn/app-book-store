<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('RuangAdmin-master') }}/img/logo/logo.png" rel="icon">
    <title>@yield('title')</title>
    <link href="{{ asset('RuangAdmin-master') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('RuangAdmin-master') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('RuangAdmin-master') }}/css/ruang-admin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @include('layouts.navbar')
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>

                </div>
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
        @include('layouts.footer')
        <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('RuangAdmin-master') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('RuangAdmin-master') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('RuangAdmin-master') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('RuangAdmin-master') }}/js/ruang-admin.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>new DataTable('#example');</script>

</body>

</html>