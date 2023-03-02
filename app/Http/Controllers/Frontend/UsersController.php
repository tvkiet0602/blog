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
        $posts = Posts::orderByDesc('post_date')->simplePaginate(9);
        foreach ($posts as $post){
            return view('frontend.homePage', compact('posts', 'post'));
        }
    }

    public function detailPosts($id){
        $detail = Posts::find($id);
        $idCategories = $detail->categories;
        $idCat = Posts::where('categories_id', $idCategories->id)->where('id','!=', $id)->orderByDesc('post_date')->take(5)->get();
        return view('frontend.detail', compact( 'detail', 'idCat', 'idCategories'));
    }
}
