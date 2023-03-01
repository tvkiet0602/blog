<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    public $timestamps = false;

    protected $fillable = ['title', 'content', 'img_url', 'categories_id', 'user_id', 'post_date'];


}
