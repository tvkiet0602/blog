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
        if (!Auth::check()) {
            return redirect()
                ->route('login');
        }
        $posts = Posts::orderByDesc('created_at')
            ->simplePaginate(9);
        $idCat = Categories::all();
        foreach ($posts as $post) {
            return view('frontend.homePage',
                compact('posts', 'post', 'idCat'));
        }
    }
    public function detailPosts(Request $request, $id)
    {
        $detail = Posts::find($id);
        $idCategories = $detail->categories;
        $cmt = Comments::where('post_id', $id)->get();
        $count = Comments::where('post_id', $id)
            ->where('check', 1)
            ->count();
        $cat = Categories::all();
        $idCat = Posts::where('categories_id', $idCategories->id)
            ->where('id', '!=', $id)
            ->orderByDesc('created_at')
            ->take(5)->get();
        if ($request->method() == 'GET') {
            return view('frontend.detail',
                compact('detail', 'idCat', 'idCategories', 'cmt', 'count', 'cat'));
        } else {
            $cmt = [
                'content' => $request->content_cmt,
                'post_id' => $id,
                'user_id' => 1
            ];
            Comments::create($cmt);
            return redirect()
                ->route('detail', ['id' => $detail]);
        }
    }
    public function addPosts(Request $request, $id)
    {
        $user_id = Posts::with('users')
            ->find($id);
        $categories = Categories::all();
        if ($request->method() == 'POST') {
            $request->validate([
                'title' => 'required',
                'contents' => 'required',
                'categories_id' => 'required',
                'img_url' => 'required',
            ], [
                    'title.required' => 'Vui lòng nhập tên tiêu đề bài viết!',
                    'contents.required' => 'Vui lòng nhập nội dung cho bài viết!',
                    'categories_id.required' => 'Vui lòng chọn thể loại cho bài viết!',
                    'img_url.required' => 'Ảnh bài viết không được để trống!',
                ]
            );
            $file = $request
                ->file('img_url');
            $filename = date('YmdHi').$file
                    ->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);
            $add = [
                'title' => $request->title,
                'content' => $request->contents,
                'img_url' => $filename,
                'describe_img' => $request->describe_img,
                'categories_id' => $request->categories_id,
                'user_id' => auth()->user()->id
            ];

            Posts::create($add);
            return redirect()
                ->route('home');
        } else {
            return view('frontend.addPosts',
                compact('user_id', 'categories'));
        }
    }

    public function editPosts(Request $request, $id){
        $categories = Categories::all();
        $edit = Posts::find($id);
        if ($request->method() == 'GET') {
            return view('frontend.editPosts',
                compact('edit', 'categories'));
        } else {
            $updatePost = [
                'title' => $request->title,
                'content' => $request->contents,
                'describe_img' => $request->describe_img
            ];
            Posts::where('id', $id)
                ->update($updatePost);
            return redirect()
                ->route('home');
        }
    }
    public function listPage($id)
    {
        $categories = Categories::find($id);
        $posts = Posts::with('categories')
            ->where('categories_id', $id)
            ->orderByDesc('created_at')
            ->simplePaginate(10);
        $idCat = Categories::all();
        return view('frontend.listPage',
            compact('posts', 'categories', 'idCat'));
    }
    public function register(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('frontend.register');
        } else {
            $request->validate([
                'fullname' => 'required',
                'username' => 'required',
                'password' => 'required',
                'password' => 'required|min:6',
                'email' => 'required',
                'avatar' => 'required',
            ], [
                    'fullname.required' => 'Họ và tên không được để trống!',
                    'username.required' => 'Username không được để trống!',
                    'password.required' => 'Password không được để trống!',
                    'password.min' => 'Password phải có ít nhất 6 ký tự',
                    'email.required' => 'Email không hợp lệ!',
                    'avatar.required' => 'Ảnh đại diện không được để trống!',
                ]
            );
            $avatar = $request
                ->file('avatar');
            $filename = date('YmdHi') . $avatar->getClientOriginalName();
            $avatar->move(public_path('./assets/img/'), $filename);
            $dataInsert = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'avatar' => $filename,
                'role' => 0
            ];
            User::create($dataInsert);
            return redirect()
                ->route('login');
        }
    }
    public function login(Request $request)
    {

        if ($request->method() == 'GET') {
            return view('frontend.login');
        } else {
            $request->validate([
                'username' => 'required',
                'password' => 'required|min:6',
            ], [
                    'username.required' => 'Username không được để trống!',
                    'password.required' => 'Password không được để trống!',
                ]
            );
            $login = $request->only('username', 'password');
            if (Auth::attempt($login)) {
                return redirect()
                    ->route('home');
            }else{
                return "Loi";
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
