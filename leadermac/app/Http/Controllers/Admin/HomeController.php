<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeBlock;


class HomeController extends Controller {

    public function getIndex() {

        $home_blocks = HomeBlock::get()->keyBy('id');
       

        return view('admin.home.index', compact('home_blocks'));
    }
    
    public function postIndex(Request $request) {
        
        $blocks = $request->get('block');
        
        foreach($blocks as $key => $block) {
            
            HomeBlock::where('id', $key)->update($block);
        }
        
        return redirect('/admin/home');
        
    }


}
