@extends('layouts.app')

@section('content')
 <h2>Hello, {{ Auth::user()->fname }}</h2>
@endsection
