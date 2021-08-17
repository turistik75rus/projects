<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;



class Page extends Model {

    use Sluggable;
    


    protected $guarded = ['id'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function getUrlAttribute() {
        return  '/'.$this->slug;
    }
 
        public function tags() {
        return $this->belongsToMany('App\Models\Tags', 'pages_tags', 'page_id', 'tag_id');
    }
 

}
