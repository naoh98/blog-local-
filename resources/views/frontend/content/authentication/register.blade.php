@extends("frontend.layout.log_reg")
@section("title","Register")
@section("content")
    <div class="wrapper">
            @if(session("status"))
            <div class="alert alert-danger text-center">
                {{session("status")}}
            </div>
            @endif
        <h3>Register</h3>
        <form name="reg_form" action="{{route("doregister")}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" value="">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
            <div class="form-group">
                <label>Confirm Password</label>
                <input class="form-control" type="password" name="confirm" value="">
            </div>
            @error('confirm')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group text-center">
                <input type="submit" value="Register" class="btn btn-success">
            </div>
        </form>
        <div style="text-align: center;">
            <a href="{{route("login")}}">Already have an account? Sign in here.</a>
        </div>
    </div>
@endsection