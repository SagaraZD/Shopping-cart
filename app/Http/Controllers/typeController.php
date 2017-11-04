<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
//Include Type Model
use App\Type as Type;

class typeController extends Controller
{

  //Get All Types
  public function typeGet(){
    $type = Type::paginate(5);
    return view('product-type-add', array('types'=>$type));
  }

  //Add New Type
  public function postTypeAdd(Request $request){
    //Validations Input
    $this->validate($request,[
      'name' => 'required'
    ]);
    $type = new Type();
    $type->name = $request['name'];
    if($type->save()){
      return redirect()->route('types-add')->with(['message'=>'Successfully Added']);
    }else{
      return redirect()->route('types-add')->with(['message'=>'Somthing Went Wrong Please Check']);
    }
  }

//Edit Type
  public function postTypeEdit(Request $request){
    //Validations Input
    $this->validate($request,[
      't_name' => 'required'
    ]);

    $typeId = $request['tid'];
    $cname= $request['t_name'];

    $type = Type::find($typeId);
    $type->name = $cname;

    if($type->update()){
      return back()->with(['message'=>'Successfully Updated']);
    }else{
      return back()->with(['message'=>'Somthing Went Wrong Please Check']);
    }

  }

  //Delete Type
  public function typeDelete($id){
    $typeCountByid = Type::find($id)->product()->count();
    if($typeCountByid > 0){
      return redirect()->route('types-add')->with(['alert'=>'You cannot delete this Type, "Products are Belongs"']);
    }else{
      $type = Type::where('id', $id)->first();
      if($type->delete()){
        return back()->with(['message'=>'Successfully Deleted']);
      }else{
        return back()->with(['message'=>'Somthing Went Wrong Please Try again']);
      }
    }
  }


}
