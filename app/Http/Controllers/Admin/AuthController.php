<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function check(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username != env('AUTH_USERNAME') || ! password_verify($password, env('AUTH_PASSWORD_HASH'))) {
            return view('admin.common.modal', [ 'modal' => [
                'type'    => 'error',
                'title'   => '错误',
                'content' => '登录失败',
                'url'     => route('admin.auth.login')
            ]]);
        }

        session(['login_status' => 'T']);
        return redirect()->route('admin.index.index');
    }

    public function logout()
    {
        session(['login_status' => 'F']);
        return redirect()->route('admin.auth.login');
    }
}
