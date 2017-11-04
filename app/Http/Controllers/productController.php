<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Session;

use App\Http\Requests;
use App\Type as Type;
use App\Product as Product;
use App\Cart;

class productController extends Controller
{
  //Get Product add view
  public function productAddView(){
    $types = Type::all();
    return view('product-add', array('types'=>$types));
  }

  //Add new Products
  public function postProductAdd(Request $request){

    // Validate
    $this->validate($request, [
      'name' => 'required|max:120',
      'type_id' => 'required',
      'price' => 'required|numeric'
    ]);

    //Products Object
    $product = new Product();

    //Add Product Info
    $product->type_id = $request['type_id'];
    $product->name = $request['name'];
    $product->price = $request['price'];

    //Save Product
    if($product->save()){
      return redirect()->route('products-add')->with(['message'=>'Product Successfully Added']);
    }else{
      return redirect()->route('products-add')->with(['message'=>'Somthing Went Wrong Please Check']);
    }
  }

  //Admin Get All Products
  public function getProducts(){
    $products = Product::paginate(5);
    return view('view-products', array('products'=>$products));
  }

  //Member Get Product
  public function memberGetProducts(){
    $products = Product::paginate(8);
    $types = Type::all();
    return view('member-product-view', array('products'=>$products))->with('types',$types);
  }

  //Member Get Products by type
  public function memberGetProductsType($id){
    $products = Type::find($id)->product()->paginate(8);
    //$products = Product::where('type_id','=', $id)->get();
    $get_type= Type::find($id);
    $get_type_name = $get_type->name;
    $types = Type::all();
    return view('member-product-view', array('products'=>$products))->with('types',$types)->with('get_type_name',$get_type_name);

  }

  //Edit Products view
  public function editProducts($id){
    $types = Type::all();
    $product = Product::find($id);
    return view('edit-products', array('product'=>$product))->with('types',$types);
  }

  // Edit Products
  public function postProductEdit(Request $request){
    $this->validate($request, [
      'name' => 'required|max:120',
      'type_id' => 'required',
      'price' => 'required|numeric'
    ]);

    $product_id = $request['product_id'];
    $product = Product::find($product_id);
    $product->type_id = $request['type_id'];
    $product->name = $request['name'];
    $product->price = $request['price'];

    if($product->update()){
      return back()->with(['message'=>'Successfully Updated']);
    }else{
      return back()->with(['message'=>'Somthing Went Wrong Please Check']);
    }
  }

  //Delete Products
  public function deleteProduct($id){
    $product = Product::where('id', $id)->first();
    $product->delete();
    return back()->with(['message'=>'Successfully Deleted']);
  }

}
