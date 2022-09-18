@extends('layouts.master')
@section('content')
<h2>Sign Up Here:::</h2>
@include('errors.error')

{{--One Time Session--}}
@if(session('createdSuccess'))
    <li>{{session('createdSuccess')}}</li>
@endif
<form action="{{route('user.register')}}" method="POST">
    {{csrf_field()}}

    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" value="Register" >
</form>
@endsection
