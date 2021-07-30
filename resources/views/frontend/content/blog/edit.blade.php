@extends("frontend.layout.main")
@section("title","Edit Blog")
@section("content")
    <div class="container-fluid padding-con">
        <form action="{{route("doeditblog",["id"=>$blog->id])}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{$blog->title}}">
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Content</label>
                <textarea name="blog_content" class="form-control" rows="20"><?php echo $blog->content ?></textarea>
            </div>
            @error('blog_content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <?php
                    foreach ($cat as $key => $value){  ?>
                    <option {{($value->id == $blog->cat_id) ? "selected":""}} value="{{$value->id}}"><?php echo $value->category_name ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="text-center">
                <input class="btn btn-success" type="submit" value="Edit">
            </div>
        </form>
    </div>
@endsection