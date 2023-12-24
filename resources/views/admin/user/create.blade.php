@extends('layouts.layoutwonavbar')

@section('content')

<div class = "card" style = "margin : 20px;">
    <div class = "card-header" style = "background-color: #8B0C0C ; color : white">Create User</div>
    <div class = "card-body">
        <form action="{{ route('admin.user.store') }}" method= "post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id = "name" class="form-control"></br>
        <label>Email</label></br>
        <input type="email" name="email" id = "email" class="form-control"></br>
        <label>Password</label></br>
        <input type="password" name="password" id = "password" class="form-control"></br>
        <input type="submit" value= "Submit" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF "></br>
        </form>
    </div>  
</div>

@endsection



