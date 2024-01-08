<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abz Test Task 2024</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    @stack('stylesheets')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="nav-icon fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="nav-icon false">
                    @php
                        /**
                         * Вставити розмітку для елементу списку меню
                         */
                        if (!function_exists('insertRoute'))
                        {
                            function insertRoute(string $routePath)
                            {
                                return 'href="' . route($routePath) . '" class="nav-link ' . (Request::url() === route($routePath) ? 'active' : '') . '"';
                            }
                        }
                    @endphp

                    <li class="nav-item">
                        <a {!! insertRoute('main.index') !!}>
                            <i class="nav-icon fa fa-home" ></i>
                            <p>Головна</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a {!! insertRoute('user.index') !!}>
                            <i class="nav-icon fa fa-home" ></i>
                            <p>Користувачі</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a {!! insertRoute('country.index') !!}>
                            <i class="nav-icon fa fa-globe" ></i>
                            <p>Області</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a {!! insertRoute('city.index') !!}>
                            <i class="nav-icon fa fa-map" ></i>
                            <p>Міста</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer row mr-0 justify-content-between">
        <div class="col">
                <span class="font-weight-bold">
                    <div>Copyright &copy; 2024  Тристан Євген</div>
                </span>
            <span>Всі права захищено</span>
        </div>
    </footer>
</div>
<!-- /.wrapper -->

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@stack('scripts')
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
</body>
</html>
