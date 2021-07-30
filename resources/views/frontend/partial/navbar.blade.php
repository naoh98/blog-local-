<div class=" row menu">
    <nav class="menubar col-md-11 col-sm-12">
         <?php showmenu($menubar); ?>
    </nav>
    <div class="search nav-tabs col-md-1 col-sm-12">
        <a href=""><i class="fas fa-search"></i></a>
    </div>
</div>
<?php
function showmenu($cats,$parent_id=0){
    $arr=[];
    foreach ($cats as $key => $value){
        if ($value->parent_id==$parent_id){
            $arr[]=$value;
            unset($cats[$key]);
        }
    }
    if (!empty($arr)){
        echo "<ul class='nav nav-tabs'>";
        foreach ($arr as $key => $value){ ?>
            <li class="nav-item"><a class="nav-link" href="{{route("category.blog",["catname"=>$value->category_name])}}"><?php echo $value->category_name ?></a>
                <?php
                $newid = $value->id;
                unset($arr[$key]);
                showmenu($cats,$newid);
                ?>
            </li>
<?php
        }
        echo "</ul>";
    }
}
?>