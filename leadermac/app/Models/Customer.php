<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Customer extends Model {

    use Sluggable;

     public $timestamps=false;

    protected $guarded = ['id'];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
  
    

}
