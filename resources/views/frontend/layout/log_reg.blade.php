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
<body style="background: whitesmoke;">
    @yield("content")
<!--back to cover page-->
<a class="back_to_cover" href="{{route("welcome")}}" ><i class="fas fa-arrow-circle-left"></i></a>
<!--custom js-->
<script src="{{asset("/blog")}}/js/main.js"></script>
</body>
</html>