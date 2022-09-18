@extends('layouts.master')
@section('content')

<h2>Save Contact</h2>
@include('errors.error')

<p>User ID: {{\Illuminate\Support\Facades\Auth::user()->username}}</p>
<a href="{{route('user.logout')}}">Logout</a>
{{--One Time Session--}}
@if(session('addSuccess'))
    <li>{{session('addSuccess')}}</li>
@endif

            <form action="{{route('user.contact')}}" method="POST">
                {{csrf_field()}}

                <input type="text" name="name">
                <input type="text" name="phone">
                <input type="submit" value="Add" >
            </form>

            <table border="1px" width="50%">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>
                            <a href="{{route('user.contact.update.show',$contact->id)}}">Edit</a>
                            <a onclick="return confirm('sure?')" href="{{route('user.contact.delete',$contact->id)}}">Delete</a>


                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        {{$contacts->links()}}
    </div>

</div>
@endsection

