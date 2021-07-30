<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset("/blog")}}/css/bootstrap/css/bootstrap.min.css">
    <script src="{{asset("/blog")}}/css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--jquery-->
    <script src="{{asset("/blog")}}/js/jquery.js"></script>
    <!--font awesome-->
    <link rel="stylesheet" href="{{asset("/blog")}}/font_awesome/css/all.css">
    <script src="{{asset("/blog")}}/font_awesome/js/all.js"></script>
    <!--custom css-->
    <link rel="stylesheet" href="{{asset("/blog")}}/css/main.css">
</head>
<body>
<div class="container-fluid home">
    <div class="row">
        <!--header-->
        @include("frontend.partial.header")
        <!--end header-->
    </div>
    <div class="container">
        <!--nav bar and search-->
        @include("frontend.partial.navbar")
        <!--end nav bar and search-->
        <!--content-->
        @yield("content")
        <!--end content-->
    </div>
    <!--widget-->
    @include("frontend.partial.widget")
    <!--end widget-->
</div>

@include("frontend.partial.search")

<!--custom js-->
<script src="{{asset("/blog")}}/js/main.js"></script>
</body>
</html>