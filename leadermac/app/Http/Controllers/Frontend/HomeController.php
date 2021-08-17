<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Page;
use App\Models\HomeBlock;
use App\Models\Product;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\CatalogCategory;
use App\Models\Tags;
use DB;
use Croppa;

class HomeController extends Controller {

    public function getEnIndex()
    {
        if (\Request::url() != 'http://www.zavodkorund.ru/contact') {
            $first = rand(0, 10);

            $second = rand(0, 10);

            if ($first == $second) {
                $first = rand(1, 5);
                $second = rand(6, 10);
            }

            $numbers = ['zero',
                'one',
                'two',
                'three',
                'four',
                'five',
                'six',
                'seven',
                'eight',
                'nine',
                'ten'
            ];

            $first_l = $numbers[$first];
            $second_l = $numbers[$second];

            $t = time();

            session()->forget('captcha_result');
            session()->flash('captcha_result', ($first + $second));

            $action = "plus";


            view()->share('captcha_text', 'What answer: ' . $first_l . ' ' . $action . ' ' . $second_l);
        }
        return view('frontend.page_en');
    }

    public function getIndex(Request $request) {


        if (\Request::url() != 'http://www.zavodkorund.ru/contact') {
            $first = rand(0, 10);

            $second = rand(0, 10);

            if ($first == $second) {
                $first = rand(1, 5);
                $second = rand(6, 10);
            }

            $numbers = ['ноль',
                'один',
                'два',
                'три',
                'четыре',
                'пять',
                'шесть',
                'семь',
                'восемь',
                'девять',
                'десять'
            ];

            $first_l = $numbers[$first];
            $second_l = $numbers[$second];

            $t = time();

            session()->forget('captcha_result');
                         session()->flash('captcha_result', ($first + $second));

                $action = "плюс";
/*
            if ($t & 1) {
                session()->flash('captcha_result', ($first + $second));

                $action = "плюс";
            } else {
                session()->flash('captcha_result', ($first - $second));

                $action = "минус";
            }
*/


            view()->share('captcha_text', 'Сколько будет: ' . $first_l . ' ' . $action . ' ' . $second_l);
        }


        $slides = Slide::where('show', 'true')->get();

        $products = Product::OrderBy('order_id')->get();

//dd($products);

        return view('frontend.index', compact('slides', 'products'));
    }

    public function resolveURL(Request $request, $slug1, $slug2 = null) {




        if ($slug1 == 'photos') {
            // dd(1);
            //    dd(urldecode( $request->url()));
            //   dd(str_replace('http://www.zavodkorund.ru', '', $request->url()));

            Croppa::render(str_replace('http://www.zavodkorund.ru', '', urldecode($request->url())));
        }




        if (\Request::url() != 'http://www.zavodkorund.ru/contact') {
            $first = rand(0, 10);

            $second = rand(0, 10);

            if ($first == $second) {
                $first = rand(1, 5);
                $second = rand(6, 10);
            }

            $numbers = ['ноль',
                'один',
                'два',
                'три',
                'четыре',
                'пять',
                'шесть',
                'семь',
                'восемь',
                'девять',
                'десять'
            ];

            $first_l = $numbers[$first];
            $second_l = $numbers[$second];

            $t = time();

            session()->forget('captcha_result');
            
                         session()->flash('captcha_result', ($first + $second));

                $action = "плюс";
/*
            if ($t & 1) {
                session()->flash('captcha_result', ($first + $second));

                $action = "плюс";
            } else {
                session()->flash('captcha_result', ($first - $second));

                $action = "минус";
            }
*/


            view()->share('captcha_text', 'Сколько будет: ' . $first_l . ' ' . $action . ' ' . $second_l);
        }

        $pages = Page::where('in_menu', 1)->get();


        $products = Product::with('category')->orderBy('order_id')->get();

        $page = Page::where('slug', $slug1)->first();
        if ($page != null && $slug2 == null) {


            return view('frontend.page', compact('page', 'pages', 'products'));
        }



        $category = CatalogCategory::where('slug', $slug1)->first();


        if ($category != null) {


            if ($slug2 == null) {

                return view('frontend.catalog.index', compact('products', 'pages', 'category'));
            } else {

                $product = Product::where('slug', $slug2)->first();
                if ($product == null) {
                    abort(404);
                }
                return view('frontend.catalog.product', compact('product', 'products', 'pages', 'category'));
            }
        }


        $tag = Tags::where('slug', $slug1)->first();
        if ($tag != null) {
            $articles = Article::with('tags');



            $articles->whereHas('tags', function ($query) use ($slug1) {
                $query->where('slug', $slug1);
            });
            // }

            $sel_tag = $tag;

            if ($sel_tag == null) {
                abort(404);
            }
            $articles = $articles->get();


            return view('frontend.article.tag', compact('articles', 'sel_tag', 'tags', 'pages', 'dates', 'category', 'products'));
        }


        $tags = Tags::where('type', 'article')->get();


        $dates = Article::select(DB::raw("to_char(date,'YYYY-mm') as dd, *"))->orderBy('date', 'desc')->get();

        $category = ArticleCategory::where('slug', $slug1)->first();

        if ($category == null) {
            abort(404);
        }
        if ($slug2 == null) {

            $articles = Article::with('tags');


            if ($request->has('year') && $request->has('month')) {

                $articles->where(DB::raw('EXTRACT(YEAR FROM date)'), $request->get('year'));
                $articles->where(DB::raw('EXTRACT(MONTH FROM date)'), $request->get('month'));
            }

            // dd($articles->toSql());
            $articles = $articles->where('category_id', $category->id)->orderBy('date', 'desc')->paginate(10);

            $page_num = 1;

            return view('frontend.article.index', compact('articles', 'tags', 'pages', 'dates', 'category', 'products', 'page_num'));
        } else {
            $article = Article::with('tags')->where('slug', $slug2)->first();

            if ($article != null) {


                return view('frontend.article.show', compact('article', 'tags', 'pages', 'dates', 'products'));
            } else {
                // dd(strpos($slug2, 'stranica-'));

                $articles = Article::with('tags');


                if ($request->has('year') && $request->has('month')) {

                    $articles->where(DB::raw('EXTRACT(YEAR FROM date)'), $request->get('year'));
                    $articles->where(DB::raw('EXTRACT(MONTH FROM date)'), $request->get('month'));
                }


                // dd($articles->toSql());
                $articles = $articles->where('category_id', $category->id)->orderBy('date', 'desc')->paginate(10, ['*'], 'page', $slug2[strlen($slug2) - 1]);
                $page_num = $slug2[strlen($slug2) - 1];
                return view('frontend.article.index', compact('articles', 'tags', 'pages', 'dates', 'category', 'products', 'page_num'));
            }
        }
    }

}
