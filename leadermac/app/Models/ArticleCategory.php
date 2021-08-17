<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ArticleCategory extends Model {

    
    use Sluggable;

    public $timestamps = false;
    protected $guarded = ['id'];
    public $table = 'articles_categories';

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
