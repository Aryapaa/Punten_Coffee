@extends('admin.main')

@section('content')

<section id="list">
    <div class="container">
      <a href="" class ="btn btn-sm" title = "Add New Item" style = "background-color: #8B0C0C ; color : #FFFFFF">Add New Item</a>
      @if (count($items) > 0)
        <div class="table-responsive">
          <table class="table-striped table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Photo</th>
                <th>Subcategory</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td>{{ $item->id}}</td>
                  <td>{{ $item->name}}</td>
                  <td>{{ $item->price}}</td>
                  <td>{{ $item->stock}}</td>
                  <td>{{ $item->photo}}</td>
                  <td>{{ $item->subcategory->name}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <p>Tidak ada mobil di showroom ini.</p>
      @endif
    </div>
  </section>



@endsection