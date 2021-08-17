<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

use App\Models\Tags;
use App\Models\Page;

use DB;

class ArticleController extends Controller {

    public function getIndex(Request $request, $slug_article = null) {

 
        $pages = Page::where('in_menu', 1)->get();
         
        $tags = Tags::where('type', 'article')->get();

        
        $dates = Article::select(DB::raw("to_char(date,'YYYY-mm') as dd, *"))->orderBy('date','desc')->get();
  
        


        $products = Product::with('category')->orderBy('order_id')->get();
        
      
        if ($slug_article == null) {

            $articles = Article::with('tags');
            
            if ($request->has('tag')) {
               
                $articles->whereHas('tags', function ($query) use ($request) {
                            $query->where('name', $request->get('tag'));
                        });
            }
            
            if($request->has('year') && $request->has('month')) {
           
                $articles->where(DB::raw('EXTRACT(YEAR FROM date)'), $request->get('year'));
                $articles->where(DB::raw('EXTRACT(MONTH FROM date)'), $request->get('month'));
                
            }
             
           // dd($articles->toSql());
            $articles = $articles->orderBy('date', 'desc')->paginate(10);
            

            return view('frontend.article.index', compact('articles', 'tags', 'pages', 'dates', 'products'));
        } else {
            $article = Article::with('tags')->where('slug', $slug_article)->first();
        
            return view('frontend.article.show', compact('article', 'tags', 'pages', 'dates', 'products'));
        }
    }

}
