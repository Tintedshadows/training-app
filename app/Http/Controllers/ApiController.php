<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use App\User;
use App\UsersModel;
use Illuminate\Foundation\Auth\RegistersUsers;

class ApiController extends Controller
{
  public function getUsers(){
    $users = User::all();
    return $users;
  }
}
