<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CatalogCategory;

class CatalogCategoryController extends Controller {
    
    public function getIndex() {
        
        $categories = CatalogCategory::with(['children' => function($query) {
                            $query->withCount('products');
                        }])->where('parent_id', 0)->orderBy('order_id','asc')->get();
        
        
       
        return view('admin.catalog_category.index', compact('categories'));
    }
    
    
    public function getCreate() {
        
        
        
        $parents = CatalogCategory::where('parent_id', 0)->get();
        return view('admin.catalog_category.create', compact('parents'));
    }
    
    public function postCreate(Request $request) {
       
        $data= $request->all();
        $data['order_id'] = CatalogCategory::where('parent_id', $data['parent_id'])->max('order_id')+1;
        
        CatalogCategory::create($data);
        
        flash('Раздел успешно добавлен');
        
        return redirect('/admin/catalog_categories');
        
    }
    
    public function getEdit($id) {
        
        $category = CatalogCategory::find($id);
        
        $parents = CatalogCategory::where('parent_id', 0)->get();
        return view('admin.catalog_category.edit', compact('category', 'parents'));
    }
    
    
     public function postEdit($id, Request $request) {
        
        CatalogCategory::where('id', $id)->update($request->except('_token'));
        
        flash('Раздел успешно изменен');
        return redirect('/admin/catalog_categories');
    }
    
    public function postOrder(Request $request) {
       $order = $request->get('order');
       
       foreach($order as $id => $order_id) {
           CatalogCategory::where('id', $id)->update(['order_id' => $order_id]);
       }
       
        return redirect('/admin/catalog_categories');
    }
}
