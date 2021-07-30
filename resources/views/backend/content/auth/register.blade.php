@extends("backend.layout.sbadmin2")
@section("title","Admin Register")
@section("content")
    <div class="p-5">
        <div class="text-center">
            @if(session("status"))
                <div class="alert alert-danger">
                    {{session("status")}}
                </div>
            @endif
            <h1 class="h4 text-gray-900 mb-4">Register</h1>
        </div>
        <form class="user" action="{{route("admin.register")}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Enter Name..." name="name" value="">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Enter Username..." name="username" value="">
            </div>
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="password" class="form-control form-control-user" placeholder="Password..." name="password" value="">
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="password" class="form-control form-control-user" placeholder="Confirm Password..." name="confirm" value="">
            </div>
            @error('confirm')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group text-center">
                <input type="submit" value="Register" class="btn btn-info">
            </div>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{route("admin.logpage")}}">Sign in now!</a>
        </div>
    </div>
@endsection