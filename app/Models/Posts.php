<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = ['title', 'content', 'img_url', 'categories_id', 'user_id'];
    public function categories(){
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }



}
