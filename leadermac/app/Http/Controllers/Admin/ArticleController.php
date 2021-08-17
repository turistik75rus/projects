<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

use App\Models\ArticleCategory;

use App\Models\Tags;

class ArticleController extends Controller {

    public function getIndex(Request $request) {

$categories = ArticleCategory::get();

         
        $articles =  new Article;
        
       if($request->has('title') && $request->get('title') != '') {
            $articles = $articles->where('title', 'ILIKE', '%'.$request->get('title').'%');
        }
        
             if ($request->has('ct_id') && $request->get('ct_id') > 0) {
            $articles = $articles->where('category_id', $request->get('ct_id'));
        }

        $articles = $articles->orderBy('id', 'desc')->paginate(20);
        return view('admin.article.index', compact('articles','categories'));
    }

    public function getCreate() {

        $categories = ArticleCategory::get();
   
        $tags = Tags::where('type', 'article')->lists('name', 'id');


        return view('admin.article.create', compact('tags', 'categories'));
    }

    public function postCreate(Request $request) {

        $data = $request->except('_token', 'tags','date');
        
        if($request->has('date') && $request->get('date') != '') {
            $data['date'] = date("Y-m-d H:i:s", strtotime($request->get('date')));
        }
        
        $article = Article::create($data);

        $tags = $request->get('tags');
        if (is_array($tags)) {
            
            $selected_tags = [];
            foreach ($tags as $tag) {
                if (ctype_digit($tag)) {
                    $selected_tags[] = $tag;
                } else {
                    $selected_tags[] = Tags::insertGetId(['name' => $tag, 'type' => 'article']);
                }
            }

            $article->tags()->sync($selected_tags);
        }
        flash('Статья успешно добавлена');

        return redirect('/admin/articles');
    }

    public function getEdit($id) {

        $article = Article::find($id);

        $categories = ArticleCategory::get();

        $tags = Tags::where('type', 'article')->lists('name', 'id');

    

        return view('admin.article.edit', compact('article','tags','categories'));
    }

    public function postEdit($id, Request $request) {

        
        $tags = $request->get('tags');



        
        $data = $request->except('_token', 'tags','date');
        
        if($request->has('date') && $request->get('date') != '') {
            $data['date'] = date("Y-m-d H:i:s", strtotime($request->get('date')));
        }
        
        Article::where('id', $id)->update($data);

        $article = Article::where('id', $id)->first();

        if (is_array($tags)) {
            $selected_tags = [];
            foreach ($tags as $tag) {

                if (ctype_digit($tag)) {
                    $selected_tags[] = $tag;
                } else {
                    $selected_tags[] = Tags::insertGetId(['name' => $tag, 'type' => 'article']);
                }
            }
           // dd($selected_tags);

            $article->tags()->sync($selected_tags);
        } else {
             $article->tags()->sync([]);
        }

        flash('Статья успешно обновлена');
        return redirect('/admin/articles');
    }
    
    
    public function getDelete($id) {
             Article::where('id', $id)->delete();
               return redirect('/admin/articles');
             
    }

}
