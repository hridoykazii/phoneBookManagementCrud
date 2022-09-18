@extends('layouts.master')
@section('content')
<h2>Edit Here:::</h2>
@include('errors.error')

{{--One Time Session--}}
@if(session('updatedSuccess'))
    <li>{{session('updatedSuccess')}}</li>
@endif
<form action="{{route('user.contact.update', $contacts->id)}}" method="POST">
    {{csrf_field()}}

    <input type="text" name="name" value="{{$contacts -> name}}">
    <input type="text" name="phone" value="{{$contacts -> phone}}">
    <input type="submit" value="update" >
</form>
@endsection
