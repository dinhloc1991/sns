<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginGet() {
        return view('user.login');
    }
    public function loginPost(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = DB::table('users')->where('email', $username)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                return redirect('/sns/');
            } else {
                echo "sai password";
            }
        }
    }
}
