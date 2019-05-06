@extends('layouts.app')

@section('content')
 <h2>Create User</h2>
 <div class="row filters">

 </div>
 <div class="row">
   <div class="col-md-12">
     <a href="{{ url('/users') }}" class="btn btn-default">All Users</a>
     {!! Form::open([ 'action' => 'UsersController@store', 'method' => 'POST']) !!}
     <table class="table">
       <thead>
         <tr>
           <th scope="col">{{Form::label('email', 'Email')}}</th>
           <th scope="col">{{Form::label('password', 'Password')}}</th>
           <th scope="col">{{Form::label('fname', 'First Name')}}</th>
           <th scope="col">{{Form::label('lname', 'Last Name')}}</th>
           <th scope="col">{{Form::label('phone', 'Phone')}}</th>
           <th scope="col">{{Form::label('postal', 'Postal')}}</th>
           <th scope="col">{{Form::label('confirmedEmail', 'Email Confirmed')}}</th>
           <th scope="col">{{Form::label('role', 'Role')}}</th>
         </tr>
       </thead>
       <tbody class="users-container">
           <tr>
             <td>{{Form::text('email', '', ['class' => 'form-control'])}}</td>
             <td>{{Form::text('password', '', ['class' => 'form-control'])}}</td>
             <td>{{Form::text('fname', '', ['class' => 'form-control'])}}</td>
             <td>{{Form::text('lname', '', ['class' => 'form-control'])}}</td>
             <td>{{Form::text('phone', '', ['class' => 'form-control'])}}</td>
             <td>{{Form::text('postal', '', ['class' => 'form-control'])}}</td>
             <td><select id="role" name="role">
               @foreach($roles as $role)
                 <option value="{{ $role->id }}">{{ $role->role }}</option>
               @endforeach
             </select></td>
             <td>{{Form::select('status', ['Admin' =>'Admin','Employee' => 'Employee'] , ['class' => 'form-control'])}}</td>
           </tr>

       </tbody>
     </table>
     {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
     {!! Form::close() !!}
   </div>
 </div>

@endsection
