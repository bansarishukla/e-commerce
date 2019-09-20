<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'user_id',
    'product_id',
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
    'card_number',
    'price'
  ];
  public function users()
  {
    return $this->belongsTo('App\User');
  }
  public function products()
  {
    return $this->hasOne('App\Product');
  }
}
