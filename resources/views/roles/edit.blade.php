@extends('layouts.app')

 @section('content')
  <div class="row filters">

  </div>
  <div class="row">
    <div class="col-md-12">
      @foreach($roles as $data)
        <h2>Update {{$data->role}}</h2>
      <form method="POST" action="http://localhost:8080/training/public/roles/edit/{{$data->id}}" accept-charset="UTF-8"><input name="_token" type="hidden" value="M2r2P3RpYQvXqSeK8iNmOBToWUX7IEDSIkOzFcmm">
        <label for="roleName">Role name</label>
        <input type="text" name="roleName" value="{{$data->role}}"><br/>

        <label for="createEm">Create Employees</label>
        <input name="createEm" type="checkbox" @if($data->createEm === 1)checked value="1" else value="0" @endif>

        <label for="createRol">Create Roles</label>
        <input name="createRole" type="checkbox" @if($data->createRole === 1)checked value="1" else value="0" @endif><br/>

        <label for="deleteEm">Delete Employees</label>
        <input name="deleteeEm" type="checkbox" @if($data->deleteEm === 1)checked value="1" else value="0" @endif>

        <label for="deleteRole">Delete Roles</label>
        <input name="deleteeRole" type="checkbox" @if($data->deleteRole === 1)checked value="1" else value="0" @endif><br/>

        <label for="deleteUsers">Delete Users</label>
        <input name="deleteeUsers" type="checkbox" @if($data->deleteUsers === 1)checked value="1" else value="0" @endif>

        <label for="editEm">Edit Employees</label>
        <input name="editEm" type="checkbox" @if($data->editEm === 1)checked value="1" else value="0" @endif><br/>

        <label for="editRole">Edit Roles</label>
        <input name="editRole" type="checkbox" @if($data->editRole === 1)checked value="1" else value="0" @endif>

        <label for="editUsers">Edit Users</label>
        <input name="editUsers" type="checkbox" @if($data->editUsers === 1)checked value="1" else value="0" @endif><br/>

        <label for="updateEm">Update Employees</label>
        <input name="updateEm" type="checkbox" @if($data->updateEm === 1)checked value="1" else value="0" @endif>

        <label for="updateRole">Update Roles</label>
        <input name="updateRole" type="checkbox" @if($data->updateRole === 1)checked value="1" else value="0" @endif><br/>

        <label for="viewEm">View Employees</label>
        <input name="viewEm" type="checkbox" @if($data->viewEm === 1)checked value="1" else value="0" @endif>

        <label for="viewRole">View Roles</label>
        <input name="viewRole" type="checkbox" @if($data->viewRole === 1)checked value="1" else value="0" @endif><br/>

      <input class="btn btn-primary" type="submit" value="Save Changes">
      </form>
      @endforeach
    </div>
  </div>

 @endsection
