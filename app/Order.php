<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'user_id',
    'name',
    'mobile',
    'pincode',
    'locality',
    'address',
    'city',
    'state',
    'landmark',
    'alternate_mobile',
    'address_type',
    'name_on_card',
    'card_number'
  ];
  public function users()
  {
    return $this->belongs('App\User');
  }
  public function products()
  {
    return $this->belongsToMany('App\Product');
  }
}
