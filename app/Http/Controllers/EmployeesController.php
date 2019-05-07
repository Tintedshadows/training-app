<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Hash;

class EmployeesController extends Controller
{

  public function getUsers(){

    $users = DB::table('employees')->get();


    return view('employees.index')->with('users', $users);
  }


    public function index()
    {
      $canViewEm = User::canViewEmployees();
      return $canViewEm;
      if($canViewEm === 1){
        $users = DB::table('employees')->get();

        return view('employees.index')->with('users', $users);
      }else{
        return view('dashboard');
      }

    }

    public function show(Request $request, $id){

      $this->validate($request, [
        'status' => 'required',
      ]);


      //create users
      $user = User::find($id);

      $user->confirmedEmail = $request->input('confirmedEmail');
      $user->status = $request->input('status');

      $user->save();

      return redirect('/employees')->with('success','Employee Updated');
    }

    function editUsers($id){
     $canEdit = User::canEditEm();

      if($canEdit[0] == 1){
        $user = User::find($id);

        $roles = DB::table('employees')->get();
        //return $roles;
        return view('employees.edit')->with(['user' => $user, 'roles' => $roles]);
      }else{
        return redirect('/employees');
      }

    }

    public function createUser(){

      if(User::canCreateEmployees() == 1){
        $roles = DB::table('employees')->get();
        //return $roles;
        return view('employees.create')->with('roles', $roles);
      }else{
        return view('dashboard');
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
      ]);

      $roles = DB::table('employees')
      ->insert([
        'username' =>$request->input('fname').$request->input('lname'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'fname' => $request->input('fname'),
        'lname' => $request->input('lname'),
        'phone' => $request->input('phone'),
        'postal' => $request->input('postal'),
        'role' => 'Employee',
        'status' => 'Active',
        'confirmedEmail' => 0
      ]);

      return redirect('/employees')->with('success','Employee Created');
    }


}
