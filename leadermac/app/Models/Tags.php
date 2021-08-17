<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class Tags extends Model {
   
    public $timestamps=false;

    protected $guarded = ['id'];

    
    public function articles() {
        return $this->belongsToMany('App\Models\Article', 'articles_tags', 'tag_id',  'article_id');
    }

   

}
