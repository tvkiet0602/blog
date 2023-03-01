<?php

namespace app\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function home()
    {
        return view('frontend.homePage');
    }

}
