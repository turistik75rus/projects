<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;



class Product extends Model {

    use Sluggable;
    
 //   public $timestamps=false;

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
        return '/'.$this->category->slug.'/'.$this->slug;
    }


    public function category() {
        return $this->hasOne('App\Models\CatalogCategory', 'id', 'category_id');
    }
    
    public function specifications() {
        return $this->hasMany('App\Models\ProductsSpecification', 'product_id', 'id')->orderBy('order_id', 'asc');
    }
 
        
    public function photos() {
        return $this->hasMany('App\Models\ProductsPhoto', 'product_id', 'id')->orderBy('order_id','asc');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tags', 'products_tags', 'product_id', 'tag_id');
    }
    
}
