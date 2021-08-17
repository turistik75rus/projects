<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model {

    use Sluggable;

    //   public $timestamps=false;

    protected $guarded = ['id'];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function category() {
        return $this->hasOne('App\Models\ArticleCategory', 'id', 'category_id');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tags', 'articles_tags', 'article_id', 'tag_id');
    }

    public function getUrlAttribute() {

        return '/'.$this->category->slug.'/' . $this->slug;
    }

    public function getDateDmyAttribute() {

        return date('d.m.Y', strtotime($this->date));
    }

    public function getDateMonthYearAttribute() {

        $arr = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь',
        ];



        return $arr[(date('n', strtotime($this->date)) - 1)] . ' ' . date('Y', strtotime($this->date));
    }
    
    public function getDateDayMonthYearAttribute() {
          return date('d', strtotime($this->date)). ' '. $this->date_month_year;
    }
    

}
