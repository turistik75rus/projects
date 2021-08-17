<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model {

    


    public $timestamps = false;
    protected $guarded = ['id'];
    public $table = 'menu';

    public function children() {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderBy('order_id', 'asc');
    }

}
