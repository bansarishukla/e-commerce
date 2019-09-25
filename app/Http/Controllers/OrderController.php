<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $orders = Order::all();
    return view('users.order', compact(['orders']));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    $product = Product::where('id', $request->id)->first();
    $orders = Order::all();

    return view('users.order', compact(['orders', 'product']));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $order = new Order;

    $order->name = $request->name;
    $order->mobile = $request->mobile;
    $order->pincode = $request->pincode;
    $order->locality = $request->locality;
    $order->address = $request->address;
    $order->city = $request->city;
    $order->state = $request->state;
    $order->landmark = $request->landmark;
    $order->alternate_mobile = $request->alternate_mobile;
    $order->address_type = $request->address_type;
    $order->name_on_card = $request->name_on_card;
    $order->card_number = $request->card_number;
    $order->user_id = Auth::user()->id;
    $order->product_id = $request->product_id;
    $order->price = $request->price;
    $order->save();

    return response()->json([
      'order' => $order,
      'succsess' => 'add product'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show(Order $order)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Order $order)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $orders = Order::findOrFail($id);
    $orders->delete();
    return response()->json([
      'status' => 'Delete'
    ]);
  }
  public function displayOrder(Request $request)
  {
    $orders = Order::all();
    return view('admin.order_list', compact(['orders']));
  }
}
