<?php

namespace App\Http\Controllers;
use App\User as User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;


class userController extends Controller
{
 //Check Log User
  public function sign(){
    if (Auth::check()) {
      return redirect()->action('productController@getProducts');
    }else{
      return view('login');
    }
  }

  //Get members
  public function getMembers(){
    $members = User::whereNotIn('id', [Auth::user()->id])->paginate(5);
    return view('members', array('members'=>$members));
  }

  //Delete member
  public function deleteMember($id){
    if($id != [Auth::user()->id]) {
      $members = User::where('id', $id)->first();
      $members->delete();
      return back()->with(['message'=>'Member Successfully Deleted']);
    }else{
      return back()->with(['message'=>'You Cant Delete your self']);
    }
  }

  //SignIn
  public function postSignIn(Request $request ){
    //Validate
    $this->validate($request,[
      'user_email' => 'required|email',
      'user_password' => 'required',
    ]);

    //Check Username Password
    if(Auth::attempt(['email' => $request['user_email'], 'password'=> $request['user_password'] ])){
      //Check Log User and redirect
      if(Auth::user()->hasRole('Admin')){
        return redirect()->action('productController@getProducts');
      }elseif (Auth::user()->hasRole('Member')) {
        return redirect()->route('member-products');
      }

    }else{
      $alert ="Please Check your Username and Password";
    }
    return redirect()->back()->with(['alert'=>$alert]);
  }

  //Log Out
  public function getLogout(){
    Auth::logout();
    $message ="Thank you..! Come Again.";
    return view('login')->with(['message'=>$message]);
  }

//Add New members
  public function addMember(Request $request){

    $this->validate($request,[
      'first_name' => 'required|max:120',
      'last_name' => 'required|max:120',
      'email' => 'required|email|unique:users',
      'password' => 'required|max:12|min:5'
    ]);

    $email = $request['email'];
    $FirstName = $request['first_name'];
    $LastName = $request['last_name'];
    $password = bcrypt($request['password']);

    $user = new User();

    $user->FirstName = $FirstName;
    $user->LastName = $LastName;
    $user->email = $email;
    $user->password = $password;

    if($user->save()){
      //Assing The Role
      $user->roles()->attach(Role::where('name', 'Member')->first());
      return redirect()->back()->with(['message'=>'Member Successfully Added']);;
    }else {
      return redirect()->back()->with(['message'=>'Somthing Went Wrong Please Check']);
    }

  }


//Update User View
  public function updateProfileView(){
    $user_id = Auth::user()->id;
    $userInfo = User::find($user_id);
    return view('settings', array('userInfo'=>$userInfo));
  }

//Update User
  public function updateUser(Request $request){

    $this->validate($request,[
      'first_name' => 'required|max:120',
      'last_name' => 'required|max:120',
      'email' => 'required|email',
      'password' => 'required|max:12|min:5'
    ]);

    $email = $request['email'];
    $FirstName = $request['first_name'];
    $LastName = $request['last_name'];
    $password = bcrypt($request['password']);

    $user = User::find(Auth::user()->id);
    $user->FirstName = $FirstName;
    $user->LastName = $LastName;
    $user->email = $email;
    $user->password = $password;

    if($user->update()){
      return redirect()->back()->with(['message'=>'Successfully Updated']);;
    }else {
      return redirect()->back()->with(['message'=>'Somthing Went Wrong Please Check']);
    }

  }


}
