@extends("backend.layout.main")
@section("title", "New category")
@section("content")
    <div>
        <a class="btn btn-secondary" href="{{route("cat")}}">Back to Category main page</a>
    </div>
    </br>
<form method="post" action="{{route("donewcat")}}">
    {{csrf_field()}}
    <div class="form-group">
        <label>Category Name</label>
        <input class="form-control" type="text" value="" name="category_name">
    </div>
    @error('category_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <label>This category belongs to ...</label>
        <select name="parent_id" class="form-control">
            <option value="0">None</option>
            <?php
            foreach ($cat as $value){ ?>
            <option value="{{$value->id}}"><?php echo $value->category_name ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group text-center">
        <input type="submit" class="btn btn-success" value="Create">
    </div>
</form>
@endsection