<?php
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    $product = Product::with('categories')->get();
    return view('admin.display_product', compact(['product']));
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
    //   'description'=>'required',
    //   'full_description'=>'required',
    //   'price'=>'required'
    // ]);

    $product= new Product;

    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
    $request->image->move(public_path('/uploads/'), $imageName);
    $imagePath = '/uploads/'. $imageName;
    $product->image = $imagePath;

    $product->name = $request->name;
    $product->description = $request->description;
    $product->full_description = $request->full_description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
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
  public function edit($id)
  {
    $products = Product::with('categories')->findOrFail($id);
  /*   return response()->json([
      'products' => $products
    ]); */
    return view('admin.edit_product', compact('products'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
     $productData = Product::findOrFail($id);

    if($request->hasFile('image')) {
      $imagePath = public_path('/uploads/{$productData->image}');
      if(file_exists($imagePath)) {
        unlink($imagePath);
      }
      $imageName = time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move(public_path('/uploads/'), $imageName);
      $imagePath = '/uploads/'. $imageName;
      $productData->image = $imagePath;
      $productData->save();
    }

    $productData->name = $request->name;
    $productData->description = $request->description;
    $productData->full_description = $request->full_description;
    $productData->price = $request->price;
    $productData->quantity = $request->quantity;
    $productData->save();
    $productData->categories()->sync(json_decode($request->categories));
    return response()->json([
      'product' => $productData
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $products = Product::findOrFail($id);
    $products->delete();
    return response()->json([
      'status' => 'Delete'
    ]);
  }
  public function displayProduct()
  {
    $products = Product::all();
    return view('admin.display_product', compact(['products']));
  }
  public function getProduct(Request $request)
  {
    $products = Product::all();
    return view('home', compact('products'));
  }
}
