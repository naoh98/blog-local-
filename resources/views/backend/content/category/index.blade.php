@extends("backend.layout.main")
@section("title", "Category")
@section("content")
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Level</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      <?php cat($cat) ?>
    </tbody>
</table>

    <?php
    function cat($categories,$parent_id=0,$html="",$level=0){
    foreach ($categories as $key => $value){
    if ($value->parent_id == $parent_id){
    $a= $level+1;
    ?>
    <tr>
        <td><?php echo $value->id ?></td>
        <td><?php echo $html.$value->category_name ?></td>
        <td><?php echo $a ?></td>
        <td>
            <a class="btn btn-warning" href="{{route("editcat",["catid"=>$value->id])}}">Edit</a>
            <a class="btn btn-danger" href="{{route("deletecat",["catid"=>$value->id])}}">Delete</a>
        </td>
    </tr>
    <?php
    $newid=$value->id;
    unset($categories[$key]);
    cat($categories,$newid,$html.$value->category_name." > ",$a);
    }
    }
    }
    ?>

@endsection
