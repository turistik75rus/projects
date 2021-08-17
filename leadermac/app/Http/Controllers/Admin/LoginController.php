<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller {

    public function getIndex() {

        return view('admin.login');
    }

    public function postIndex(Request $request) {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], true)) {
            return redirect()->intended('/admin/settings');
        } else {
            return redirect('/admin/login');
        }
    }

}
