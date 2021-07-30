<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;
    protected $table = "blog";
    protected $fillable = [
        "user_id",
        "cat_id",
        "title",
        "content",
        "date"
    ];
}
