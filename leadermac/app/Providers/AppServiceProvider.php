<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Page;
use App\Models\Phrase;

use App\Models\FooterLink;

use App\Models\Article;
use App\Models\Document;
use App\Models\Service;

use App\Models\Block;


use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     
        
        $menu = \App\Models\Menu::where('parent_id',0)->where('id','!=',21)->orderBy('order_id')->get();
       
          view()->share('menu', $menu);
          
            $bot_menu = \App\Models\Menu::where('id',21)->first();
           
       
          view()->share('bot_menu', $bot_menu);
        
        $articles = Article::where('category_id',1)->orderBy('id', 'desc')->limit(4)->get();
        
        view()->share('last_articles', $articles);
        
      /*  
        $documents = Document::where('in_menu', 1)->get();
        
        view()->share('menu_documents', $documents);
        
        $services = Service::where('in_menu', 1)->get();

        view()->share('menu_services', $services);
       * 
       */
        
        $catalog_link = Document::find(1);
        
        view()->share('catalog_link', $catalog_link);
        
        
        $pages = Page::where('in_menu', 1)->get();
        
        view()->share('pages', $pages);
         
        
        $blocks = Block::get()->keyBy('id');
        
        view()->share('blocks', $blocks);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         require_once __DIR__ . '/../Http/helpers.php';
    }
}
