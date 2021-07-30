@extends("frontend.layout.log_reg")
@section("title","Login")
@section("content")
    <div class="wrapper">
        @if(session("status"))
            <div class="alert alert-danger text-center">
                {{session("status")}}
            </div>
        @endif
        @if(session("success"))
            <div class="alert alert-success text-center">
                {{session("success")}}
            </div>
        @endif
        <h3>Login</h3>
        <form name="login_form" action="{{route("dologin")}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username" value="">
            </div>
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" name="password" value="">
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group text-center">
                <input type="submit" value="Login" class="btn btn-success">
            </div>
        </form>
        <div style="text-align: center;">
            <a href="{{route("register")}}">Don't have an account? Sign up here.</a>
        </div>
    </div>
@endsection