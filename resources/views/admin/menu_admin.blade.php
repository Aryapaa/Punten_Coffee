@extends('layouts.layoutwonavbar')

@section('content')

  <section id="list">
    <div class="container">
      <a href="{{ url('/admin/create') }}" class ="btn btn-sm mt-3" title = "Add New Item" style = "background-color: #8B0C0C ; color : #FFFFFF"><i class = " fa fa-plus-circle px-1"></i>Add New Item</a>
      @if (count($items) > 0)
        <div class="table-responsive">
          <table class="table-striped table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Photo</th>
                <th>Subcategory</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td>{{ $item->name}}</td>
                  <td>{{ $item->price}}</td>
                  <td>{{ $item->stock}}</td>
                  <td>
                    <img src="{{ asset('asset/front-end/img/' . $item->photo) }}"
                         alt="Photo item {{ $item->name }}" width="150">
                  </td>
                  <td>{{ $item->subcategory->name}}</td>
                  <td>
                    <a href="{{route ('admin.menu.edit', ['id' => $item->id])}}"><button class = "btn btn-primary btn-sm mb-1"><i class = "fa fa-pencil-square-o px-1"></i>Edit</button></a>
                    <form action="{{route ('admin.menu.delete', ['id' => $item->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Anda yakin ingin menghapus data ?')"><i class = "fa fa-trash-o px-1"></i>Delete</button>
                    </form>
                        <!-- <a href="update.blade.php"><button class = "btn btn-danger"><i class = "fa fa-trash-o px-1"></i>Delete</button></a> -->
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <p>Tidak ada produk yang tersedia</p>
      @endif
    </div>
  </section>

  @endsection