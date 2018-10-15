<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte/Ionicons/css/ionicons.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/skin-blue.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">E-COMMERCE</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-circle"></i>
                        <span>Dashboard</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> <span>Manage Users</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('users.index') }}"><i class="fa fa-circle"></i>Users List</a></li>
                        <li><a href="{{ route('users.create') }}"><i class="fa fa-circle"></i>Add User</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> <span>Manage Categories</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('categories.index') }}"><i class="fa fa-circle"></i>Categories List</a>
                        </li>
                        <li><a href="{{ route('categories.create') }}"><i class="fa fa-circle"></i>Add Category</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> <span>Manage Products</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('products.index') }}"><i class="fa fa-circle"></i>Products List</a></li>
                        <li><a href="{{ route('products.create') }}"><i class="fa fa-circle"></i>Add Product</a></li>
                    </ul>
                </li>
                <li class=""><a href="{{ route('homelink') }}"><i class="fa fa-circle"></i> <span>Homepage</span></a>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>

            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 <a href="#">Terkwaz</a>.</strong> All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script async="" src="//www.google-analytics.com/analytics.js"></script>
<script src="{{ asset('adminlte/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

<!-- DataTables -->
<script src="{{ asset('adminlte/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('adminlte/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('adminlte/fastclick/lib/fastclick.js') }}"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

<script src="{{ asset('js/plugins.js') }}" defer></script>

</body>

</html>
