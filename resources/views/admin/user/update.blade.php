@extends('layouts.layoutwonavbar')

@section('content')

<div class = "card" style = "margin : 20px;">
    <div class = "card-header" style = "background-color: #8B0C0C ; color : white">Update User</div>
    <div class = "card-body">
        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method= "post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method('PUT')
        <label>Email</label></br>
        <input type="text" name="name" id = "name" value="{{$user->email}}" class="form-control"></br>

        <label>Password</label></br>
        <input type="text" name="price" id = "price" value="{{$user->password}}" class="form-control"></br>
        </select></br>

        <input type="submit" value= "Update" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF "></br>
        </form>
    </div>  
</div>

@endsection



