<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
    <link rel="icon" href="{{ URL::asset('/favicon.ico',true) }}" type="image/x-icon"/>
    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('/blog/css/bootstrap/css/bootstrap.min.css',true)}}">
    <script src="{{asset('/blog/css/bootstrap/js/bootstrap.bundle.min.js',true)}}"></script>
    <!--jquery-->
    <script src="{{asset('/blog/js/jquery.js',true)}}"></script>
    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('/blog/font_awesome/css/all.css',true)}}">
    <script src="{{asset('/blog/font_awesome/js/all.js',true)}}"></script>
    <!--custom css-->
    <link rel="stylesheet" href="{{asset('/blog/css/main.css',true)}}">
</head>
<body style="background: whitesmoke;">
    @yield("content")
<!--back to cover page-->
<a class="back_to_cover" href="{{route("welcome")}}" ><i class="fas fa-arrow-circle-left"></i></a>
<!--custom js-->
<script src="{{asset('/blog/js/main.js',true)}}"></script>
</body>
</html>