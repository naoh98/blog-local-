@extends("backend.layout.main")
@section("title", "Update category")
@section("content")
    <div>
        <a class="btn btn-secondary" href="{{route("cat")}}">Back to Category main page</a>
    </div>
    </br>
    @if(session("error"))
        <div class="alert alert-danger">
            {{session("error")}}
        </div>
    @endif
    <form method="post" action="{{route("doeditcat",["catid"=>$cat->id])}}">
        {{csrf_field()}}
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" type="text" value="{{$cat->category_name}}" name="category_name">
        </div>
        @error('category_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>This category belongs to ...</label>
            <select name="parent_id" class="form-control">
                <option value="0">None</option>
                <?php
                foreach ($cats as $key => $value){ ?>
                    <option value="{{$value->id}}"
                            {{($value->id==$cat->parent_id) ? "selected" : ""}}
                            {{($value->id==$cat->id) ? "hidden" : ""}}
                    ><?php echo $value->category_name ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="btn btn-success" value="Update">
        </div>
    </form>
@endsection