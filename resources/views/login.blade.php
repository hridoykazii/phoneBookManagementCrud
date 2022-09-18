@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 d-flex justify-content-center">

            <form method="POST" action="{{route('user.login')}}" >
                {{csrf_field()}}
                <h2 class="mr-auto p-2">Login Page</h2>
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="name" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a target="_blank" href="{{route('user.register')}}">Register</a>
            </form>
        </div>
    </div>
</div>

@endsection
