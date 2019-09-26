<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedInteger('user_id')->nullable();
      $table->unsignedInteger('product_id')->nullable();
      // $table->foreign('user_id')->references('id')->on('users');
      $table->string('name');
      $table->bigInteger('mobile');
      $table->integer('pincode');
      $table->string('locality');
      $table->string('address');
      $table->string('city');
      $table->string('state');
      $table->string('landmark')->nullable();
      $table->bigInteger('alternate_mobile')->nullable();
      $table->string('address_type');
      $table->string('name_on_card');
      $table->string('card_number');
      $table->integer('price')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('orders');
  }
}
