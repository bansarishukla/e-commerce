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
    'price',
    'quantity'
  ];
  public function categories()
  {
    return $this->belongsToMany('App\Category');
  }
  public function orders()
  {
    return $this->hasOne('App\Order');
  }
}
