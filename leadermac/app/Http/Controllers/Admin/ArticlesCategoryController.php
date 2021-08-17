<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ArticleCategory;

class ArticlesCategoryController extends Controller {
    
    public function getIndex() {
        
        $categories = ArticleCategory::orderBy('id','desc')->get();
        
        
       
        return view('admin.articles_category.index', compact('categories'));
    }
    
    
    public function getCreate() {
        

        return view('admin.articles_category.create');
    }
    
    public function postCreate(Request $request) {
       

        ArticleCategory::create($request->get('category'));
        

        
        return redirect('/admin/articles_categories');
        
    }
    
    public function getEdit($id) {
        
        $category = ArticleCategory::find($id);
        

        return view('admin.articles_category.edit', compact('category'));
    }
    
    
     public function postEdit($id, Request $request) {
        
        ArticleCategory::where('id', $id)->update($request->get('category'));
        
        return redirect('/admin/articles_categories');
    }
    
    
    public function getDelete($id) {
        ArticleCategory::where('id', $id)->delete();
        
        return redirect('/admin/articles_categories');
    }

}
