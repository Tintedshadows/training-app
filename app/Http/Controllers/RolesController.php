<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RolesController extends Controller
{

    public function index()
    {
        $roles = DB::table('roles')->get();

        return view('roles.index')->with('roles', $roles);
    }

    public function show()
    {
        $roles = DB::table('roles')->get();

        return view('roles.index')->with('roles', $roles);
    }

    public function editRole($id){

      $roles = DB::table('roles')->where('id', $id)->get();

      //return $role;
      return view('roles.edit')->with('roles', $roles);


    }

    public function updateRole(Request $request, $id){
      return $request->input('createEm');
    }
}
