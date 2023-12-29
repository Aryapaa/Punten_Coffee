@extends('layouts.layoutwonavbar')

@section('content')

<div class = "card" style = "margin : 20px;">
    <div class = "card-header" style = "background-color: #8B0C0C ; color : white">Update User</div>
    <div class = "card-body">
        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method= "post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Email</label></br>
        <input type="text" name="email"  class="form-control"></br>

        <label>Password</label></br>
        <input type="text" name="password"  class="form-control"></br>
        </select></br>

        <button type="submit" style = "background-color: #8B0C0C ; color : #FFFFFF "> Update </button>
        
        </form>
    </div>  
</div>

@endsection