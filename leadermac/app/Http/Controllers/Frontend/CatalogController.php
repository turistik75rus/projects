<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatalogCategory;
use App\Models\Product;
use App\Models\Page;

class CatalogController extends Controller {

    public function getIndex(Request $request, $slug_category, $slug_product = null) {

        $category = CatalogCategory::where('slug', $slug_category)->first();
        $products = Product::with('category')->OrderBy('order_id')->get();
        
       

        if ($category != null) {
            
            
            if ($slug_product == null) {

               

                return view('frontend.catalog.index', compact('products', 'pages', 'category'));
            } else {

                $product = Product::where('slug', $slug_product)->first();

                return view('frontend.catalog.product', compact('product','products', 'pages', 'category'));
            }
        } else {


            $page = Page::where('slug', $slug_category)->first();


            return view('frontend.page', compact('page', 'pages', 'products'));
        }
    }
}
    