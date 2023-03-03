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
        $posts = Posts::orderByDesc('created_at')->simplePaginate(9);
        foreach ($posts as $post){
            return view('frontend.homePage', compact('posts', 'post'));
        }
    }

    public function detailPosts($id){
        $detail = Posts::find($id);
        $idCategories = $detail->categories;
        $idCat = Posts::where('categories_id', $idCategories->id)->where('id','!=', $id)->orderByDesc('created_at')->take(5)->get();
        return view('frontend.detail', compact( 'detail', 'idCat', 'idCategories'));
    }

    public function addPosts(Request $request, $id){
        $user_id = Posts::with('users')->find($id);
        $categories = Categories::all();
        if ($request->method() == 'POST') {
            $file = $request->file('img_url');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);
            $add = [
                'title' => $request->title,
                'content' => $request->contents,
                'img_url' => $filename,
                'describe_img' => $request->describe_img,
                'categories_id' => $request->categories_id,
                'user_id'=> $user_id->user_id
            ];
            Posts::create($add);
            return redirect()->route('home');
        }else{
            return view('frontend.addPosts', compact('user_id', 'categories'));
        }
    }

    public function listPage($id){
        $categories = Categories::find($id);
        $posts = Posts::with('categories')->where('categories_id', $id)->orderByDesc('created_at')->simplePaginate(10);
        $idCat = Categories::all();
            return view('frontend.listPage', compact('posts', 'categories', 'idCat'));


    }
}
