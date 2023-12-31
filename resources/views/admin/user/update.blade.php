@extends('layouts.layoutwonavbar')

@section('content')

<div class = "card" style = "margin : 20px;">
    <div class = "card-header" style = "background-color: #8B0C0C ; color : white">Update User</div>
    <div class = "card-body">
        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method= "post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Name</label></br>
        <input type="text" name="name"  class="form-control" id="Name" value="{{$user->name}}"></br>

        <label>Email</label></br>
        <input type="text" name="email"  class="form-control" id="Email" value="{{$user->email}}"></br>

        <label>Password</label></br>
        <input type="text" name="password"  class="form-control" id="Password" value="{{$user->password}}"></br>
        </select></br>

        <button type="submit" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF "> Update </button>
        
        </form>
    </div>  
</div>

@endsection