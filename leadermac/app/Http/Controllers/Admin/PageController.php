<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;


class PageController extends Controller {

    public function getIndex() {



        $pages = Page::paginate(20);

        return view('admin.page.index', compact('pages'));
    }

    public function getCreate() {


        
        return view('admin.page.create');
    }

    public function postCreate(Request $request) {


        $page = $request->get('page');
        $page = Page::create($page);

        
        flash('Страница успешно добавлена');

        return redirect('/admin/pages');
    }

    public function getEdit($id) {

        $page = Page::find($id);

        
        return view('admin.page.edit', compact('page'));
    }

    public function postEdit($id, Request $request) {

        
        $page = $request->get('page');
        Page::where('id', $id)->update($page);
    
        

        flash('Страница успешно обновлена');
        return redirect('/admin/pages');
    }
    
    
        public function getDelete($id) {

          Page::find($id)->delete();

        
        return redirect('/admin/pages');
    }

}
