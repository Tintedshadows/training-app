<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class RolesController extends Controller
{

    public function index()
    {
      $canViewRoles = User::canViewRoles();
      if($canViewRoles == 1){
        $roles = DB::table('roles')->get();

        return view('roles.index')->with('roles', $roles);
      }else{
        return view('dashboard');
      }

    }

    public function show()
    {
        $roles = DB::table('roles')->get();

        return view('roles.index')->with('roles', $roles);
    }

    public function editRole($id){

      $canEditRoles = User::canEditRoles();
      if($canEditRoles == 1){

      $roles = DB::table('roles')->where('id', $id)->get();

      //return $role;
      return view('roles.edit')->with('roles', $roles);
    }else{
      return view('dashboard');
    }


    }

    public function updateRole(Request $request, $id){
      function checkifNull($arg){
        if($arg == '' || $arg == null){
          return '0';
        }else{
          return '1';
        }
      }


      $roles = DB::table('roles')
      ->where('id', $id)
      ->update([
        'createEm' => checkifNull($request->input('createEm')),
        'createRole' => checkifNull($request->input('createRole')),
        'deleteEm' => checkifNull($request->input('deleteEm')),
        'deleteRole' => checkifNull($request->input('deleteRole')),
        'deleteUsers' => checkifNull($request->input('deleteUsers')),
        'editEm' => checkifNull($request->input('editEm')),
        'editRole' => checkifNull($request->input('editRole')),
        'editUsers' => checkifNull($request->input('editUsers')),
        'updateEm' => checkifNull($request->input('updateEm')),
        'updateRole' => checkifNull($request->input('updateRole')),
        'viewEm' => checkifNull($request->input('viewEm')),
        'viewRole' => checkifNull($request->input('viewRole')),
      ]);

      return redirect('/roles')->with('success','Role Updated');
    }
}
