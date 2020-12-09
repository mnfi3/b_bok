<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'category_id', 'name', 'author', 'translator', 'description', 'publisher', 'publication_date',
      'price', 'discount_percent', 'stock', 'image_path', 'is_important', 'page_count', 'demo_file'
    ];


    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function orderContents(){
      return $this->hasMany('App\OrderContent');
    }
}
