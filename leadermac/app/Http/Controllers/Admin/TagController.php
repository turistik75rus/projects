<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags;


class TagController extends Controller {

    public function getIndex() {

        $tags = Tags::paginate(20);

        return view('admin.tags.index', compact('tags'));
    }

    public function getCreate() {

       


        return view('admin.tags.create');
    }

    public function postCreate(Request $request) {

        Tags::create($request->get('tag'));
        
  
   

        return redirect('/admin/tags');
    }

    public function getEdit($id) {


        $tag = Tags::find($id);


        return view('admin.tags.edit', compact('tag'));
    }

    public function postEdit($id, Request $request) {
      
        


        Tags::where('id', $id)->update($request->get('tag'));

        return redirect('/admin/tags');
    }
    
    
    public function getDelete($id) {
        
        $tag = Tags::find($id);
        
        if($tag->articles->count() == 0) {
            $tag->delete();
            return redirect('/admin/tags');
        } else {
            flash('Удалите тег из статей');
            return redirect('/admin/tags');
            
        }
        
        
    }

}
