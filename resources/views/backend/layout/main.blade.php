<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield("title")</title>
    <link rel="icon" href="{{ URL::asset('/favicon.ico',true) }}" type="image/x-icon"/>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/sbadmin2/vendor/fontawesome-free/css/all.min.css',true)}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('/sbadmin2/css/sb-admin-2.min.css',true)}}" rel="stylesheet">
    <!-- Custom css-->
    <link rel="stylesheet" href="{{asset('/sbadmin2/css/main.css',true)}}">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include("backend.partial.sidebar")
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Topbar -->
        @include("backend.partial.topbar")
        <!-- End of Topbar -->
        <!-- Main Content -->
        <div id="content" class="container-fluid">
            @yield("content")
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        @include("backend.partial.footer")
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
@include("backend.partial.logout_modal")

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/sbadmin2/vendor/jquery/jquery.min.js',true)}}"></script>
<script src="{{asset('/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js',true)}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/sbadmin2/vendor/jquery-easing/jquery.easing.min.js',true)}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/sbadmin2/js/sb-admin-2.min.js',true)}}"></script>

</body>

</html>
