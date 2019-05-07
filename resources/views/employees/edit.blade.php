@extends('layouts.app')

 @section('content')
  <h2>Update User</h2>
  <div class="row filters">

  </div>
  <div class="row">
    <div class="col-md-12">
      <a href="{{ url('/users') }}" class="btn btn-default">All Users</a>
      {!! Form::open([ 'action' => ['UsersController@updateUser', $user->id ], 'method' => 'POST']) !!}
      <table class="table">
        <thead>
          <tr>
            <th scope="col">{{Form::label('email', 'Email')}}</th>
            <th scope="col">{{Form::label('fname', 'First Name')}}</th>
            <th scope="col">{{Form::label('lname', 'Last Name')}}</th>
            <th scope="col">{{Form::label('phone', 'Phone')}}</th>
            <th scope="col">{{Form::label('postal', 'Postal')}}</th>
            <th scope="col">{{Form::label('confirmedEmail', 'Email Confirmed')}}</th>
            <th scope="col">{{Form::label('role', 'Role')}}</th>
            <th scope="col">{{Form::label('status', 'Status')}}</th>
          </tr>
        </thead>
        <tbody class="users-container">
            <tr>
              <td>{{$user->email}}</td>
              <td>{{$user->fname}}</td>
              <td>{{$user->lname}}</td>
              <td>{{$user->phone}}</td>
              <td>{{$user->postal}}</td>
              <td>{{Form::select('confirmedEmail', ['1' =>'Confirmed','0' => 'Not Confirmed'] , ['class' => 'form-control'])}}</td>
              <td><select id="role" name="role">
                @foreach($roles as $role)
                  <option value="{{ $role->id }}">{{ $role->role }}</option>
                @endforeach
              </select></td>
              <td>{{Form::select('status', ['Active' =>'Active','Inactive' => 'Inactive'] , ['class' => 'form-control'])}}</td>
            </tr>

        </tbody>
      </table>
      {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
      {!! Form::close() !!}
    </div>
  </div>

 @endsection
