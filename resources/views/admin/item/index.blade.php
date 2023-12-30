@extends('admin.template.app')
@section('title', 'Item')
@section('item', 'active')

@section('content')
<div class="card">

    <div class="card-body">
        {{-- flashdata --}}
        {!! session('sukses') !!}
        <div class="d-flex justify-content-between">
            <h1 class="card-title fw-semibold mb-3 fs-6">Data Items</h1>
            <a href="/item/create" class="btn btn-primary btn-md mb-5 fs-3"><i class="fas fa-plus"></i> Tambah
                item</a>
        </div>

        <div class="card">
            <div class="card-body">
                @if(count($item) > 0)
                <div class="table-responsive">
                    <table class="table mt-4" id="tabel-data">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Photo</th>
                                <th>Sub Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($item as $item)
                            <tr class="text-center">
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>
                                    <img src="{{ asset('asset/front-end/img/' . $item->photo) }}"
                                        alt="Photo item {{ $item->name }}" width="150">
                                </td>
                                <td>{{ $item->subcategory->name }}</td>
                                <td>
                                    <a href="/item/{{$item->id}}/edit" class="btn btn-success btn-sm mb-1"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <form action="/item/{{$item->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Anda yakin menghapus data ?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12">Tidak ada data item saat ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @else
                <p>Tidak ada data item saat ini.</p>
                @endif
            </div>
        </div>

    </div>

</div>
@endsection
