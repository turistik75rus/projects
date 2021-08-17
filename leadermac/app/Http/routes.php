<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */



$middleware = array_merge(\Config::get('lfm.middlewares'), [
    '\Unisharp\Laravelfilemanager\middlewares\MultiUser',
    '\Unisharp\Laravelfilemanager\middlewares\CreateDefaultFolder'
]);
$prefix = \Config::get('lfm.prefix', 'laravel-filemanager');
$as = 'unisharp.lfm.';
$namespace = '\Unisharp\Laravelfilemanager\controllers';

// make sure authenticated
Route::group(compact('middleware', 'prefix', 'as', 'namespace'), function () {

    // Show LFM
    Route::get('/', [
        'uses' => 'LfmController@show',
        'as' => 'show'
    ]);

    // Show integration error messages
    Route::get('/errors', [
        'uses' => 'LfmController@getErrors',
        'as' => 'getErrors'
    ]);

    // upload
    Route::any('/upload', [
        'uses' => 'UploadController@upload',
        'as' => 'upload'
    ]);

    // list images & files
    Route::get('/jsonitems', [
        'uses' => 'ItemsController@getItems',
        'as' => 'getItems'
    ]);

    // folders
    Route::get('/newfolder', [
        'uses' => 'FolderController@getAddfolder',
        'as' => 'getAddfolder'
    ]);
    Route::get('/deletefolder', [
        'uses' => 'FolderController@getDeletefolder',
        'as' => 'getDeletefolder'
    ]);
    Route::get('/folders', [
        'uses' => 'FolderController@getFolders',
        'as' => 'getFolders'
    ]);

    // crop
    Route::get('/crop', [
        'uses' => 'CropController@getCrop',
        'as' => 'getCrop'
    ]);
    Route::get('/cropimage', [
        'uses' => 'CropController@getCropimage',
        'as' => 'getCropimage'
    ]);

    // rename
    Route::get('/rename', [
        'uses' => 'RenameController@getRename',
        'as' => 'getRename'
    ]);

    // scale/resize
    Route::get('/resize', [
        'uses' => 'ResizeController@getResize',
        'as' => 'getResize'
    ]);
    Route::get('/doresize', [
        'uses' => 'ResizeController@performResize',
        'as' => 'performResize'
    ]);

    // download
    Route::get('/download', [
        'uses' => 'DownloadController@getDownload',
        'as' => 'getDownload'
    ]);

    // delete
    Route::get('/delete', [
        'uses' => 'DeleteController@getDelete',
        'as' => 'getDelete'
    ]);

    Route::get('/demo', 'DemoController@index');

    // Get file when base_directory isn't public
    $images_url = '/' . \Config::get('lfm.images_folder_name') . '/{base_path}/{image_name}';
    $files_url = '/' . \Config::get('lfm.files_folder_name') . '/{base_path}/{file_name}';
    Route::get($images_url, 'RedirectController@getImage')
        ->where('image_name', '.*');
    Route::get($files_url, 'RedirectController@getFIle')
        ->where('file_name', '.*');
});

Route::post('contact', 'Frontend\FormController@contact');
Route::post('callback', 'Frontend\FormController@callback');

Route::get('admin/login', 'Admin\LoginController@getIndex');
Route::post('admin/login', 'Admin\LoginController@postIndex');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware'=> 'auth'], function() {
    
   
    Route::get('articles', 'ArticleController@getIndex');

    Route::get('articles/create', 'ArticleController@getCreate');
    Route::post('articles/create', 'ArticleController@postCreate');

    Route::get('articles/{id}/edit', 'ArticleController@getEdit');
    Route::post('articles/{id}/edit', 'ArticleController@postEdit');
    
     Route::get('articles/{id}/delete', 'ArticleController@getDelete');


    Route::get('articles_categories', 'ArticlesCategoryController@getIndex');

    Route::get('articles_categories/create', 'ArticlesCategoryController@getCreate');
    Route::post('articles_categories/create', 'ArticlesCategoryController@postCreate');

    Route::get('articles_categories/{id}/edit', 'ArticlesCategoryController@getEdit');
    Route::post('articles_categories/{id}/edit', 'ArticlesCategoryController@postEdit');
    
    
    Route::get('articles_categories/{id}/delete', 'ArticlesCategoryController@getDelete');

    Route::post('articles_categories/order', 'ArticlesCategoryController@postOrder');
      
    Route::get('catalog_categories', 'CatalogCategoryController@getIndex');

    Route::get('catalog_categories/create', 'CatalogCategoryController@getCreate');
    Route::post('catalog_categories/create', 'CatalogCategoryController@postCreate');

    Route::get('catalog_categories/{id}/edit', 'CatalogCategoryController@getEdit');
    Route::post('catalog_categories/{id}/edit', 'CatalogCategoryController@postEdit');
    
    Route::post('catalog_categories/order', 'CatalogCategoryController@postOrder');


    Route::get('products', 'ProductController@getIndex');

    Route::get('products/create', 'ProductController@getCreate');
    Route::post('products/create', 'ProductController@postCreate');

    Route::get('products/{id}/edit', 'ProductController@getEdit');
    Route::post('products/{id}/edit', 'ProductController@postEdit');

    
     Route::get('products/{id}/delete', 'ProductController@getDelete');

    Route::get('slides', 'SlideController@getIndex');

    Route::get('slides/create', 'SlideController@getCreate');
    Route::post('slides/create', 'SlideController@postCreate');

    Route::get('slides/{id}/edit', 'SlideController@getEdit');
    Route::post('slides/{id}/edit', 'SlideController@postEdit');
    
      Route::get('slides/{id}/delete', 'SlideController@getDelete');
    
         Route::get('slides/order', 'SlideController@getOrder');
         Route::post('slides/order', 'SlideController@postOrder');
    
    Route::get('pages', 'PageController@getIndex');

    Route::get('pages/create', 'PageController@getCreate');
    Route::post('pages/create', 'PageController@postCreate');

    Route::get('pages/{id}/edit', 'PageController@getEdit');
    Route::post('pages/{id}/edit', 'PageController@postEdit');
    
     Route::get('pages/{id}/delete', 'PageController@getDelete');
    
    
    Route::get('documents', 'DocumentController@getIndex');

    Route::get('documents/create', 'DocumentController@getCreate');
    Route::post('documents/create', 'DocumentController@postCreate');

    Route::get('documents/{id}/edit', 'DocumentController@getEdit');
    Route::post('documents/{id}/edit', 'DocumentController@postEdit');
    
    
    Route::get('services', 'ServiceController@getIndex');

    Route::get('services/create', 'ServiceController@getCreate');
    Route::post('services/create', 'ServiceController@postCreate');

    Route::get('services/{id}/edit', 'ServiceController@getEdit');
    Route::post('services/{id}/edit', 'ServiceController@postEdit');
    
    
    
    Route::get('blocks', 'BlockController@getIndex');

    Route::get('blocks/create', 'BlockController@getCreate');
    Route::post('blocks/create', 'BlockController@postCreate');

    Route::get('blocks/{id}/edit', 'BlockController@getEdit');
    Route::post('blocks/{id}/edit', 'BlockController@postEdit');
    
       Route::get('blocks/{id}/delete', 'BlockController@getDelete');
    
    
        Route::get('menu', 'MenuController@getIndex');

    Route::get('menu/create', 'MenuController@getCreate');
    Route::post('menu/create', 'MenuController@postCreate');

    Route::get('menu/{id}/edit', 'MenuController@getEdit');
    Route::post('menu/{id}/edit', 'MenuController@postEdit');
    
      Route::get('menu/{id}/delete', 'MenuController@getDelete');
    
    
        Route::get('tags', 'TagController@getIndex');

    Route::get('tags/create', 'TagController@getCreate');
    Route::post('tags/create', 'TagController@postCreate');

    Route::get('tags/{id}/edit', 'TagController@getEdit');
    Route::post('tags/{id}/edit', 'TagController@postEdit');
    
    
    Route::get('tags/{id}/delete', 'TagController@getDelete');
    
    
    
            Route::get('customers', 'CustomerController@getIndex');

    Route::get('customers/create', 'CustomerController@getCreate');
    Route::post('customers/create', 'CustomerController@postCreate');

    Route::get('customers/{id}/edit', 'CustomerController@getEdit');
    Route::post('customers/{id}/edit', 'CustomerController@postEdit');
    
    Route::get('customers/{id}/delete', 'CustomerController@getDelete');
    
    
    
    Route::get('settings', 'SettingsController@getIndex');
    Route::post('settings', 'SettingsController@postPhrases');
    
    Route::post('settings/user', 'SettingsController@postUser');
    
    Route::get('home', 'PageController@getIndex');
    
    Route::post('home', 'HomeController@postIndex');
    
});


Route::group(['namespace' => 'Frontend'], function() {


    Route::get('/', 'HomeController@getIndex');
    Route::get('/en', 'HomeController@getEnIndex');

    Route::get('customers', 'CustomerController@getIndex');
      Route::get('customers/{slug}', 'CustomerController@getShow');
   Route::get('/{slug1}/{slug2?}', 'HomeController@resolveURL');

    //Route::get('/press/{slug_category?}/{slug_article?}', 'ArticleController@getIndex');

    //Route::get('/{slug_category}/{slug_product?}', 'CatalogController@getIndex');

});
