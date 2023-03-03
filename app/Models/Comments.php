<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public $timestamps = true;

    protected $fillable = ['content', 'user_id', 'post_id', 'check'];

    public function posts(){
        return $this->belongsTo(Posts::class, 'post_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
