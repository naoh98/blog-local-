<div class="col-md-12 col-sm-12">
    <h1><a href="{{route("home")}}">Blogmotion</a></h1>
</div>
<div class="auth col-md-3 col-sm-12">
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
