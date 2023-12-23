@extends('layouts.layoutAdmin')

@section('content')

<div class = "card" style = "margin : 20px;">
    <div class = "card-header" style = "background-color: #8B0C0C ; color : white">Create New Items</div>
    <div class = "card-body">
        <form action="{{ route('admin.store') }}" method= "post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id = "name" class="form-control"></br>
        <label>Price</label></br>
        <input type="text" name="price" id = "price" class="form-control"></br>
        <label>Stock</label></br>
        <input type="text" name="stock" id = "stock" class="form-control"></br>
        <label>Photo</label></br>
        <input type="text" name="photo" id = "photo" class="form-control"></br>
        <label>Subcategory</label></br>
        <input type="text" name="subcategory_id" id = "subcategory_id" class="form-control"></br>
        <input type="submit" value= "Save" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF "></br>
        </form>
    </div>  
</div>

@endsection



