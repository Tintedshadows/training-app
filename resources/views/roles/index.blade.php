@extends('layouts.app')

@section('content')
 <h2>Roles Page</h2>
 <div class="row filters">
 <div class="row">

   <div class="col-md-12">
     <table class="table">
       <tbody>


      @if(count($roles) > 0)
        @foreach($roles as $role)
        <tr>
        <td>{{$role->role}}</td>
        <td>
						<a href="{{ url('roles/edit')}}/{{$role->id}}" class="btn btn-sm btn-warning">edit</a>
					</td>
        </tr>
        @endforeach
      @endif

  </tbody>
</table>

   </div>

 </div>
@endsection
