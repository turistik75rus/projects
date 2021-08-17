<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller {

    public function getIndex() {

        $menu = Menu::where('parent_id', 0)->orderBy('order_id','asc')->get();

        return view('admin.menu.index', compact('menu'));
    }

    public function getCreate() {

        $parents = Menu::where('parent_id', 0)->get();


        return view('admin.menu.create', compact('parents'));
    }

    public function postCreate(Request $request) {

        $menu = $request->get('menu');
        
  
        Menu::create($request->get('menu'));

        return redirect('/admin/menu');
    }

    public function getEdit($id) {


        $parents = Menu::where('id', '!=', $id)->where('parent_id', 0)->get();
        $menu = Menu::find($id);


        return view('admin.menu.edit', compact('menu', 'parents'));
    }

    public function postEdit($id, Request $request) {
        $menu = $request->get('menu');
        


        Menu::where('id', $id)->update($menu);

        return redirect('/admin/menu');
    }
    
        public function getDelete($id) {
   


        Menu::where('id', $id)->delete();

        return redirect('/admin/menu');
    }

}
