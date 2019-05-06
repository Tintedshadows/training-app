@extends('layouts.app')

@section('content')
 <h2>Users Page</h2>
 <div class="row filters">
   <form class="" action="{{ url('/users') }}" method="post">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <input type="text" name="email-search" placeholder="Search Email">
     <input type="text" name="fname-search" placeholder="Search First Name">
     <input type="text" name="lname-search" placeholder="Search Last Name">
     <input type="submit" name="" value="Search">
   </form>

 </div>

 <div class="row">
   @if(Auth::user()->role === 'Admin')
   <br><a class="btn btn-primary" href="{{ url('/users/create') }}">Create User</a><br/>
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
             @if(Auth::user()->role === 'Admin')
             <td><a href="{{url('/users/')}}/{{$user->id}}" class="btn btn-sm btn-warning">Edit User</a></td>
             @endif
             @if($user->confirmedEmail < 1 and Auth::user()->role === 'Admin')
            <td>
              {!! Form::open(['action' => ['UsersController@destory', $user->id], 'method' => 'POST']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
              {!! Form::close() !!}
            </td>
             @endif
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
   <script>
   $(document).ready(function(){
     fetch_customer_data();

     function fetch_customer_data(query = ''){
       $.ajax({
         url:"{{ url('/api/users') }}",
         method:"GET",
         data:{query:query},
         dataType: 'json'
         success:function(data){
           $('tbody').html(data.table_data);
         }
       })
     }
   })
   </script>
 </div>
@endsection
