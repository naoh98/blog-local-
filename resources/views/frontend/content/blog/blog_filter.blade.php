@extends("frontend.layout.main")
@section("title","Home")
@section("content")
    <div class="row news">
        <?php
        if (count($blog)>0){
        foreach ($blog as $key => $value){ ?>
        <div class="col-md-4 col-ct-6  col-sm-12">
            <div class="card">
                <div><h6 class="badge bg-secondary"><?php echo $value->category_name ?></h6></div>
                <div class="card-body">
                    <h5 class="card-title text-truncate" style="height: 30px;"><?php echo $value->title ?></h5>
                    <h6 class="card-title" style="font-size: 12px;">Author: <?php echo $value->name ?></h6>
                    <h6 class="card-title" style="font-size: 12px;"><?php echo $value->date ?></h6>
                    <p class="card-text" style="height: 100px;"><?php echo implode(" ",array_slice(explode(" ",$value->content),0,15))." ...." ?></p>
                    <a href="{{route("blogdetail",["id"=>$value->id])}}" class="btn btn-primary">More</a>
                    <a href="{{route("editblog",["id"=>$value->id])}}" class="btn btn-primary" style="display: {{($value->user_id == session("felogin")["id"]) ? '':'none'}};">Edit</a>
                    <a href="{{route("deleteblog",["id"=>$value->id])}}" class="btn btn-primary" style="display: {{(session("felogin")["role"]=="admin") ? "":"none"}};">Delete</a>
                </div>
            </div>
        </div>
        <?php
        } ?>
        <div class="row pages">
            {{ $blog->links() }}
        </div>
       <?php
        }else{ ?>
            <div class="col-12 text-center">
                <h4 style="color: red">There aren't any blog here</h4>
            </div>
        <?php
            }
        ?>
    </div>
@endsection