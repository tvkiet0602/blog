<?php

namespace app\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function home()
    {
        $posts = Posts::orderByDesc('created_at')->simplePaginate(9);
        $idCat = Categories::all();
//        $idUser = User::all();
        foreach ($posts as $post){
            return view('frontend.homePage', compact('posts', 'post', 'idCat'));
        }
    }

    public function detailPosts(Request $request, $id){
        $detail = Posts::find($id);
        $idCategories = $detail->categories;
        $cmt = Comments::where('post_id', $id)->get();
        $idCat = Posts::where('categories_id', $idCategories->id)->where('id','!=', $id)->orderByDesc('created_at')->take(5)->get();
        if($request->method() == 'GET'){
            return view('frontend.detail', compact( 'detail', 'idCat', 'idCategories', 'cmt'));
        }else{
            $cmt = [
                'content' => $request->content_cmt,
                'post_id' => $id,
                'user_id'=> 1
            ];
            Comments::create($cmt);
            return redirect()->route('detail', ['id' => $detail]);
        }
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

    public function register(Request $request){
        if($request->method()=='GET'){
            return view('frontend.register');
        }else{
            $avatar = $request->file('avatar');
            $filename = date('YmdHi') . $avatar->getClientOriginalName();
            $avatar->move(public_path('assets/img'), $filename);
            $dataInsert = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'username' => $request->username,
                'password' =>Hash::make($request->password),
                'avatar' => $avatar
            ];
        User::create($dataInsert);
        return redirect()->route('login');
        }
    }

    public function login(Request $request){
        $posts = Posts::orderByDesc('created_at')->simplePaginate(9);
        $idCat = Categories::all();
        if($request->method()=='GET'){
            return view('frontend.login');
        }else{
            $login = $request->only('username', 'password');
            if (Auth::attempt($login)) {
                foreach ($posts as $post){
                    return view('frontend.homePage', compact('posts', 'post', 'idCat'));
                }
            }else{
                return "Validate!!";
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
