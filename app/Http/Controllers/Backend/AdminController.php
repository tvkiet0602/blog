<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        return view('backend.login');
    }
    public function dashboard(){
        return view('backend.dashboard');
    }
    public function managerUser(Request $request){
        $info = User::all();
        if($request->method() == 'GET'){
            return view('backend.managerUser', compact('info'));
        }else{
            return view('backend.managerUser');
        }
    }

    public function deleteUser($id){
        $delete = User::find($id);
        $delete->delete();
        return redirect()->route('user-manager', compact('delete'));
    }
    public function editUser(Request $request, $id){
        $info = User::find($id);
        if($request->method() == 'GET'){
            return view('backend.editUser', compact('info'));
        }else{
            $avatar = $request->file('avatar');
            $filenames = date('YmdHi') . $avatar->getClientOriginalName();
            $avatar->move(public_path('assets/img'), $filenames);
            $data = [
              'fullname' => $request->fullname,
              'username' => $request->username,
              'email' => $request->email,
              'avatar' => $avatar
            ];
            dd($data);
            User::where('id', $id)->update($data);
            return redirect()->route('user-manager');
        }
    }
}
