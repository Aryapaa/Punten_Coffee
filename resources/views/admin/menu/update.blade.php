@extends('layouts.layoutwonavbar')

@section('content')

<div class = "card" style = "margin : 20px;">
    <div class = "card-header" style = "background-color: #8B0C0C ; color : white">Create New Items</div>
    <div class = "card-body">
        <form action="{{ route('admin.menu.update', ['id' => $items->id]) }}" method= "post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method('PUT')
        <label>Name</label></br>
        <input type="text" name="name" id = "name" value="{{$items->name}}" class="form-control"></br>

        <label>Price</label></br>
        <input type="text" name="price" id = "price" value="{{$items->price}}" class="form-control"></br>

        <label>Stock</label></br>
        <input type="text" name="stock" id = "stock" value="{{$items->stock}}" class="form-control"></br>

        <label for="photo" class="form-label">Photo</label></br>
        <img src="{{ asset('asset/front-end/img/' . $items->photo) }}"
                                alt="Photo item {{ $items->name }}" width="150">
        <input type="file" class="form-control mt-3" name="photo" id="photo" accept="image/*"></br>

        <label>Subcategory</label></br>
        <select class="form-select" name="subcategory_id" id="subcategory_id" value="{{$items->subcategory->id}}">
        <option value="">Pilih Sub Category</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    {{ $subcategory->id == $items->subcategory_id ? 'selected' : '' }}>
                                    {{ $subcategory->name }}
                                </option>
                                @endforeach
        </select></br>

        <input type="submit" value= "Update" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF "></br>
        </form>
    </div>  
</div>

@endsection



