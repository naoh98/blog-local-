@extends("backend.layout.sbadmin2")
@section("title","Admin Login")
@section("content")
    <div class="p-5">
        <div class="text-center">
            @if(session("status"))
                <div class="alert alert-danger">
                    {{session("status")}}
                </div>
            @endif
            @if(session("success"))
                <div class="alert alert-success">
                    {{session("success")}}
                </div>
            @endif
            <h1 class="h4 text-gray-900 mb-4">Login</h1>
        </div>
        <form class="user" action="{{route("admin.login")}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="Enter Username..." value="" name="username">
            </div>
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="password" class="form-control form-control-user" placeholder="Password..." value="" name="password">
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group text-center">
                <input type="submit" value="Login" class="btn btn-info">
            </div>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{route("admin.regpage")}}">Create an Account!</a>
        </div>
    </div>
@endsection