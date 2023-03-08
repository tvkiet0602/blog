<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->method()=='GET'){
            return view('backend.login');
        }else{
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                return view('backend.dashboard');
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
    public function register(Request $request){
        if($request->method()=='GET'){
            return view('backend.registerManager');
        }else{
            $avatar = $request->file('avatar');
            $filename = date('YmdHi') . $avatar->getClientOriginalName();
            $avatar->move(public_path('assets/img'), $filename);
            $dataInsert = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'username' => $request->username,
                'password' =>Hash::make($request->password),
                'avatar' => $filename,
                'role' => 1
            ];
            User::create($dataInsert);
            return redirect()->route('login');
        }
    }
    public function dashboard()
    {
        $admin = User::all();
        return view('backend.dashboard', compact('admin'));
    }

    public function managerUser()
    {
        $info = User::all();
        return view('backend.managerUser', compact('info'));
    }
    public function managerPermission()
    {
        $info = User::all();
//        $role = Role::create(['name' => 'Writer']);
//        $permission = Permission::create(['name' => 'Edit Articles']);
//        $role->givePermissionTo($permission);
        return view('backend.managerPermission', compact('info'));


    }

    public function deleteUser($id)
    {
        $del = User::find($id);
        $del->delete();
        return redirect()->route('user-manager');
    }

    public function editUser(Request $request, $id)
    {
        $info = User::find($id);
        if ($request->method() == 'GET') {
            return view('backend.editUser', compact('info'));
        } else {
            $avatar = $request->file('avatar');
            $filenames = date('YmdHi') . $avatar->getClientOriginalName();
            $avatar->move(public_path('assets/img'), $filenames);
            $data = [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $filenames
            ];
            User::where('id', $id)->update($data);
            return redirect()->route('user-manager');
        }
    }

    public function article(Request $request)
    {
        $cmt = Comments::all();
        $count = Comments::all()->count();
        $article = Posts::orderByDesc('created_at')->simplePaginate(10);
        if ($request->method() == 'GET') {
            return view('backend.managerArticle', compact('article', 'cmt', 'count'));
        } else {

        }
    }

    public function deleteArticle($id)
    {
        $deleteArt = Posts::find($id);
        $deleteArt->delete();
        return redirect()->route('article-manager', compact('deleteArt'));
    }

    public function editArticle(Request $request, $id)
    {
        $articleEdit = Posts::find($id);
        if ($request->method() == 'GET') {
//            dd($articleEdit);
            return view('backend.editArticle', compact('articleEdit'));
        } else {
            $img_url = $request->file('img_url');
            $filenames = date('YmdHi') . $img_url->getClientOriginalName();
            $img_url->move(public_path('assets/img'), $filenames);
            $updateArticle = [
                'title' => $request->title,
                'content' => $request->contents,
                'describe_img' => $request->describe_img,
                'img_url' => $filenames
            ];
            Posts::where('id', $id)->update($updateArticle);
            return redirect()->route('article-manager');
        }
    }
    public function managerCmt(Request $request)
    {
        $cmt = Comments::simplePaginate(30);
        $art = Posts::all();
        return view('backend.managerComment', compact('cmt', 'art'));

    }

    public function deleteCheck($id)
    {
        $deleteCmt = Comments::find($id);
        $deleteCmt->delete();
        return redirect()->route('comment-manager');
    }
    public function updateCheck($id)
    {
        $data = [
            'check' => 1
        ];
        Comments::where('id', $id)->update($data);
        return redirect()->route('comment-manager');
    }
}
