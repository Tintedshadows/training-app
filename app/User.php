<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;


class User extends Authenticatable
{

    //protected $table = 'aspnetusers';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function Permitions(){
      $permitions = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.*')
            ->where('users.id', Auth::user()->id)
            ->get();
      return $permitions;
    }

    static function canEditEm(){
      $permition = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.editEm')
            ->where('users.id', Auth::user()->id)
            ->value('editEm');
      return $permition;
    }

    static function canCreateUsers(){

      $permition = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.createUsers')
            ->where('users.id', Auth::user()->id)
            ->pluck('createUsers');


      return $permition;
    }

    static function canEditUsers(){

      $permition = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.editUsers')
            ->where('users.id', Auth::user()->id)
            ->pluck('editUsers');


      return $permition;
    }

    static function canDeleteUsers(){

      $permition = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.deleteUsers')
            ->where('users.id', Auth::user()->id)
            ->pluck('deleteUsers');


      return $permition;
    }

    static function canViewRoles(){
      $permition = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.viewRole')
            ->where('users.id', Auth::user()->id)
            ->value('viewRoles');
      return $permition;
    }

    static function canEditRoles(){
      $permition = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.editRole')
            ->where('users.id', Auth::user()->id)
            ->value('editRoles');
      return $permition;
    }

    static function canViewEmployees(){
      $permition = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.viewEm')
            ->where('users.id', Auth::user()->id)
            ->value('viewEm');
      return $permition;
    }

    static function canCreateEmployees(){
      $permition = DB::table('users')
            ->join('roles', 'users.role', '=', 'roles.role')
            ->select('roles.createEm')
            ->where('users.id', Auth::user()->id)
            ->value('createEm');
      return $permition;
    }

}
