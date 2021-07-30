@extends("frontend.layout.main")
@section("title",$blog->title)
@section("content")
    <div class="row text-center detail_page">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-12">
                @if(session("status"))
                <div class="alert alert-success">
                    {{session("status")}}
                </div>
                @endif
            <h3><?php echo $blog->title ?></h3>
            <p class="text-start"><?php echo $blog->content ?></p>
            <div class="text-end">
                <h6><?php echo $blog->date ?></h6>
                <h6><?php echo $blog->name ?></h6>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection