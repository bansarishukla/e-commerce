<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name',
      'image',
      'description',
      'full_description',
      'price'
    ];
    public function categories()
    {
      return $this->belongsToMany('App\Category');
    }
}
