<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
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
<body style="background: whitesmoke">
<div class="container-fluid home_original">
    <div class="row">
        <!--header-->
        <div class="col-md-12 col-sm-12">
            <a href="{{route("home")}}">Go to Blogmotion</a>
        </div>
        <div class="auth auth_original col-md-3 col-sm-12">
            <?php
                $session = session("felogin");
                if (isset($session) && $session){ ?>
                <span class="btn btn-light span_for_logout"><?php echo $session["name"] ?><a href="{{route("logout")}}">Log out</a></span>
            <?php
                }else{ ?>
                <span class="btn btn-light"><a href="{{route("login")}}">Sign in</a></span>
                <span class="btn btn-light"><a href="{{route("register")}}">Sign up</a></span>
            <?php
                }
            ?>
        </div>
        <!--end header-->
    </div>
    <div class="row presentation text-center">
        <h1>Blogmotion</h1>
        <p><i>~ We are all storytellers ~</i></p>
    </div>
</div>
<!--custom js-->
<script src="{{asset("/blog")}}/js/main.js"></script>
</body>
</html>