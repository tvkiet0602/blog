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
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('backend.login');
        } else {
            $request->validate([
                'username' => 'required',
                'password' => 'required|min:6',
            ], [
                    'username.required' => 'Username không được để trống!',
                    'password.required' => 'Password không được để trống!',
                ]
            );
            $admin = $request->only('username', 'password');
            $login = Auth::attempt($admin);
            if (auth()->user()->role == 1) {
                if ($login) {
                    return redirect()
                        ->route('dashboard');
                } else {
                    return "Validate!!";
                }
            } else {
                return view('error.403');
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-admin');
    }
    public function addUser(Request $request)
    {
        $roles = Role::all();
        if ($request->method() == 'GET') {
            return view('backend.addUser',
                compact('roles'));
        } else {
            $dataInsert = [
                'fullname' => $request->fullname,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 1,
                'name' => $request->has_role,
            ];
            $new = User::create($dataInsert);
            if ($new) {
                $idRole = User::find($new->id);
                $idRole->assignRole($request->has_role);
            }
            return redirect()->route('user-manager');
        }
    }
    public function dashboard()
    {
        $user = User::all()
            ->count();
        $cmt = Comments::all()
            ->count();
        $article = Posts::all()
            ->count();
        $cat = Categories::all()
            ->count();
        return view('backend.dashboard',
            compact('user', 'cat', 'cmt', 'article'));
    }
    public function managerUser()
    {
        $info = User::all();
        return view('backend.managerUser',
            compact('info'));
    }
    public function deleteUser($id)
    {
        $del = User::find($id);
        $del->delete();
        return redirect()
            ->route('user-manager');
    }
    public function editUser(Request $request, $id)
    {
        $info = User::find($id);
        if ($request->method() == 'GET') {
            return view('backend.editUser',
                compact('info'));
        } else {
            $avatar = $request->file('avatar');
            $filenames = date('YmdHi').$avatar
                    ->getClientOriginalName();
            $avatar->move(public_path('assets/img'), $filenames);
            $data = [
                'fullname' => $request->fullname,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $filenames
            ];
            User::where('id', $id)
                ->update($data);
            return redirect()
                ->route('user-manager');
        }
    }
    public function article(Request $request)
    {
        $cmt = Comments::all();
        $count = Comments::all()
            ->count();
        $article = Posts::orderByDesc('created_at')
            ->simplePaginate(10);
        if ($request->method() == 'GET') {
            return view('backend.managerArticle',
                compact('article', 'cmt', 'count'));
        }
    }
    public function deleteArticle($id)
    {
        $deleteArt = Posts::find($id);
        $deleteArt
            ->delete();
        return redirect()
            ->route('article-manager',
                compact('deleteArt'));
    }
    public function editArticle(Request $request, $id)
    {
        $role = Role::find($id);
        $permission = Permission::find($id);
        $role->givePermissionTo($permission);
        $articleEdit = Posts::find($id);
        if ($request->method() == 'GET') {
            return view('backend.editArticle',
                compact('articleEdit'));
        } else {
            $img_url = $request->file('img_url');
            $filenames = date('YmdHi').$img_url
                    ->getClientOriginalName();
            $img_url
                ->move(public_path('assets/img'), $filenames);
            $updateArticle = [
                'title' => $request->title,
                'content' => $request->contents,
                'describe_img' => $request->describe_img,
                'img_url' => $filenames
            ];
            Posts::where('id', $id)
                ->update($updateArticle);
            return redirect()
                ->route('article-manager');
        }
    }
    public function managerCmt(Request $request)
    {
        $cmt = Comments::simplePaginate(30);
        $art = Posts::all();
        return view('backend.managerComment',
            compact('cmt', 'art'));
    }
    public function deleteCheck($id)
    {
        $deleteCmt = Comments::find($id);
        $deleteCmt
            ->delete();
        return redirect()
            ->route('comment-manager');
    }
    public function updateCheck($id)
    {
        $data = [
            'check' => 1
        ];
        Comments::where('id', $id)
            ->update($data);
        return redirect()
            ->route('comment-manager');
    }
    public function editPermission(Request $request, $id)
    {
        $permission = Permission::with('roles')
            ->get();
        $roles = Role::with('permissions')
            ->where('id', $id)
            ->get();
        $r = Permission::all();
        foreach ($roles as $role) {
            if ($request->method() == 'GET') {
                return view('backend.editPermission',
                    compact('permission', 'roles', 'role'));
            } else {
                $idRole = Role::find($id);
                $idRole
                    ->syncPermissions([$request->permission_id]);
                return redirect()
                    ->route('permission-manager');
            }
        }
    }
    public function managerPermission()
    {
        $info = User::with('roles')
            ->get();
        $roles = Role::with('users')
            ->get();
        $idRole = Role::find($roles);
        $permissions = Permission::with('roles')
            ->get();
        return view('backend.managerPermission',
            compact('info', 'roles', 'permissions', 'idRole'));
    }

}
