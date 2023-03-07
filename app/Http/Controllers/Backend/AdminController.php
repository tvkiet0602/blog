<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function dashboard()
    {
        $admin = User::all();
        return view('backend.dashboard', compact('admin'));
    }

    public function managerUser(Request $request)
    {
        $info = User::all();
        if ($request->method() == 'GET') {
            return view('backend.managerUser', compact('info'));
        } else {
            return view('backend.managerUser');
        }
    }

    public function deleteUser($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->route('user-manager', compact('delete'));
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
                'avatar' => $avatar
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
//            $img_url = $request->file('img_url');
//            $filenames = date('YmdHi') . $img_url->getClientOriginalName();
//            $img_url->move(public_path('assets/img'), $filenames);
            $updateArticle = [
                'title' => $request->title,
                'content' => $request->contents,
                'describe_img' => $request->describe_img,
//                'img_url' => $img_url
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
