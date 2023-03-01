<?php

namespace app\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\frontend\UsersController;

class UsersController extends Controller
{
    public function home(){
        return view('frontend.homePage');
    }
}
