@extends('layouts.app')

@section('content')
 <h2>Employees Page</h2>
 <div class="row filters">

 </div>

 <div class="row">
   @if(Auth::user()->role === 'Admin')
   <br><a class="btn btn-primary" href="{{ url('/employees/create') }}">Create Employee</a><br/>
   @endif
   <div class="col-md-12">

     <table class="table">
       <thead>
         <tr>
           <th scope="col">Email</th>
           <th scope="col">First Name</th>
           <th scope="col">Last Name</th>
           <th scope="col">Phone</th>
           <th scope="col">Postal</th>
           <th scope="col">Email Confirmed</th>
           <th scope="col">Status</th>
           <!-- <th scope="col">Role</th> -->
         </tr>
       </thead>
       <tbody class="users-container">
         @if(count($users) > 0)
          @foreach($users as $user)
           <tr>
             <td>{{$user->email}}</td>
             <td>{{$user->fname}}</td>
             <td>{{$user->lname}}</td>
             <td>{{$user->phone}}</td>
             <td>{{$user->postal}}</td>
             @if($user->confirmedEmail > 0)
             <td>Yes</td>
             @else
             <td>No</td>
             @endif
             <td>{{$user->status}}</td>
             <!-- <td>{{$user->role}}</td> -->

           </tr>
           @endforeach
         @else
         <tr>
           <td>None Found</td>
         </tr>
         @endif

       </tbody>
     </table>
   </div>

 </div>
@endsection
