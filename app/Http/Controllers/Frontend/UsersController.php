<?php

namespace app\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function addPosts(Request $request, $id){
        $user_id = User::find($id);
        if ($request->method() == 'GET') {
            return view('frontend.addPosts');
        }else{
            $add = Posts::create([
                'title' => $request->title,
                'content' => $request->content,
                'img_url' => $request->img_url,
                'describe_img' => $request->describe_img,
                'post_date' => $request->post_date,
                'categories_id' => $request->categories->id,
                'user_id'=> $request->users->id
            ]);
            return redirect()->route('frontend.homePage');
        }
    }
}
