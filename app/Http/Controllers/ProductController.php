<?php
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::with('categories')->get();
      return view('admin.add_product', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $this->validate($request, [
      //   'name'=>'required',
      //   'image'=>'required',
      //   'category'=> 'required',
      //   'description'=>'required',
      //   'full_description'=>'required',
      //   'price'=>'required'
      // ]);

      $product= new Product;

      $imagePath = '';
      if ($request->has('image')) {
        $image = $request->file('image');
        $name = rand(00000,99999).'-'.$image->getClientOriginalName();
        $destinationPath = public_path('/uploads/products');
        $imagePath = $destinationPath . "/" .  $name;
        $image->move($destinationPath, $name);
        $product->image = $imagePath;
      }

      $product->name = $request->name;
      $product->description = $request->description;
      $product->full_description = $request->full_description;
      $product->price = $request->price;
      $product->save();
      $product->categories()->attach(json_decode($request->categories));
      $product->categories;

      return response()->json([
        'product' => $product
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
