<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'user_id',
    'billing_email',
    'billing_name',
    'billing_address',
    'billing_city',
    'billing_postalcode',
    'billing_phone',
    'billing_name_on_card',
    'billing_subtotal',
    'billing_total',
    'payment_gateway',
    'shipped',
    'error'
  ];
  public function users()
  {
    return $this->belongs('App\User');
  }
  // public function products()
  // {
  //   return $this->belongsToMany('App\Product')->withPivot('quantity');
  // }
}
