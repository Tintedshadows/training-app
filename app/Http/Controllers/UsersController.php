<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use DB;
use App\User;
use App\UsersModel;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsersController extends Controller
{

    use RegistersUsers;

    function index(){
      if($user = Auth::user()){
        return view('dashboard');
      }else{
        return view('login');
      }

    }


    public function updateUser(Request $request, $id){
      $this->validate($request, [
        'status' => 'required',
      ]);


      //create users
      $user = User::find($id);

      $user->confirmedEmail = $request->input('confirmedEmail');
      $user->status = $request->input('status');

      $user->save();

      return redirect('/users')->with('success','User Updated');
    }

    public function searchUsers(Request $request){
      $email = $request->input('email-search');
      $fname = $request->input('fname-search');
      $lname = $request->input('lname-search');

      $users = User::all();

      if($email != ''){
        $users = User::where('email', $email )->get();
      }

      if($fname != ''){
        $users = User::where('fname', $fname )->get();
      }

      if($lname != ''){
        $users = User::where('lname', $lname )->get();
      }



      return view('users.index')->with('users', $users);
    }

    public function getUsers(){

        $users = User::all();


      return view('users.index')->with('users', $users);
    }


    function editUsers($id){
      if(Auth::user()->role === 'Admin'){
        $user = User::find($id);

        $roles = DB::table('roles')->get();
        //return $roles;
        return view('users.edit')->with(['user' => $user, 'roles' => $roles]);
      }else{
        return redirect('/users');
      }

    }

    public function store(Request $request){
      $this->validate($request, [
        'email' => 'email|required',
        'password' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        'phone' => 'required',
        'postal' => 'required',
        'confirmedEmail' => 'required',
        'status' => 'required',
      ]);

      //hash the Password
      $password = $request->input('password');
      $hashedPass = Hash::make($password);

      //get username
      $username = $request->input('fname').$request->input('lname');

      //create users
      $user = new User;
      $user->email = $request->input('email');
      $user->username = $username;
      $user->password = $hashedPass;
      $user->fname = $request->input('fname');
      $user->lname = $request->input('lname');
      $user->phone = $request->input('phone');
      $user->postal = $request->input('postal');
      $user->confirmedEmail = $request->input('confirmedEmail');
      $user->status = 'Active';
      $user->role = $request->input('status');
      $user->remember_token = str_random(10);

      $user->save();

      return redirect('/users')->with('success','User Created');
    }

    public function createUser(){
      if(Auth::user()->role === 'Admin'){
        $roles = DB::table('roles')->get();
        //return $roles;
        return view('users.create')->with('roles', $roles);
      }else{
        return redirect('/users');
      }

    }
    public function destory($id){
      $user = User::find($id);
      $user->delete();

      return redirect('/users')->with('success','User Deleted');
    }

}
