<?php

namespace app\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Categories;
use App\Models\User;

class UsersController extends Controller
{

    public function home()
    {
        $posts = Posts::all();
        return view('frontend.homePage', compact('posts'));
    }
}
