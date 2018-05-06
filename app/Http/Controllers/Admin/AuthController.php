<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.common.layout');
    }

    public function check(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username != env('AUTH_USERNAME') || md5($password) != env('AUTH_PASSWORD')) {

        }
    }
}
