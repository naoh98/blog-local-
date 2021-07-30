@extends("backend.layout.main")
@section("title", "Welcome")
@section("content")
    <h1 class="welcome">Hello <?php echo (auth()->check()) ? auth()->user()->name : "" ?></h1>
@endsection