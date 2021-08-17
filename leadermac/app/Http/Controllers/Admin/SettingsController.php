<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\User;
use Hash;

class SettingsController extends Controller {

    public function getIndex() {


        $user = User::find(1);
        
        

        return view('admin.settings.index', compact('phrases', 'links', 'user'));
    }

   
    
    public function postUser(Request $request) {
        $data = [];
        $data['email'] = $request->get('email');
        if($request->get('password') != '') {
            $data['password'] =  Hash::make($request->get('password'));
        }
        $data['notify_email'] = $request->get('notify_email');
        User::where('id', 1)->update($data);
        
        return redirect('/admin/settings');
        
    }

}
