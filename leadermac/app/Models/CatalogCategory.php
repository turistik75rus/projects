<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;



class CatalogCategory extends Model {

    use Sluggable;
    
    public $timestamps=false;

    protected $guarded = ['id'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
   
    
    public function children() {
        return $this->hasMany('App\Models\CatalogCategory', 'parent_id', 'id')->orderBy('order_id', 'asc');
    }

    
    public function products() {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
    
    public function parent_category() {
        
        return $this->hasOne('App\Models\CatalogCategory', 'id', 'parent_id');
        
    }

}
