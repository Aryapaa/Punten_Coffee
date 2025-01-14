@extends('layouts.layoutwonavbar')

@section('content')

<div class = "card" style = "margin : 20px;">
    <div class = "card-header" style = "background-color: #8B0C0C ; color : white">Create New Items</div>
    <div class = "card-body">
        <form action="{{ route('admin.menu.store') }}" method= "post" enctype="multipart/form-data">
        {!! csrf_field() !!} 
        <label>Name</label></br>
        <input type="text" name="name" id = "name" class="form-control" required></br>

        <label>Price</label></br>
        <input type="text" name="price" id = "price" class="form-control" required></br>

        <label>Stock</label></br>
        <input type="text" name="stock" id = "stock" class="form-control" required></br>

        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required></br>

        <label>Subcategory</label></br>
        <select class="form-select" name="subcategory_id" id="subcategory_id" required>
            <option>Pilih Sub Category</option>
            @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select></br>

        <input type="submit" value= "Save" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF ">
        <a href= "{{ url('admin/menu') }}" type="submit" value= "Back" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF ">Back</a></br>
        </form>
    </div>  
</div>

@endsection



