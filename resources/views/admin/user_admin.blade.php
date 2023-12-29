@extends('partials.layout')

@section('content')
@if(session('success'))
    <div class="alert alert-success mt-3 mx-3">
        {{ session('success') }}
    </div>
@endif
@if(session('danger'))
    <div class="alert alert-danger mt-3 mx-3">
        {{ session('danger') }}
    </div>
@endif

  <section id="list">
    <div class="container">
      <a href="{{ url('/admin/user/create') }}" class ="btn btn-sm mt-3" title = "Add User" style = "background-color: #8B0C0C ; color : #FFFFFF"><i class = " fa fa-plus-circle px-1"></i>Add User</a>
      @if (count($user) > 0)
        <div class="table-responsive">
          <table class="table-striped table">
            <thead>
              <tr>
                <th>id</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $user)
                <tr>
                  <td>{{ $loop->iteration}}</td>
                  <td>{{ $user->email}}</td>
                  <td>{{ $user->password}}</td>
                  <td>
                  <a href="{{route ('admin.user.edit', ['id' => $user->id])}}"><button class = "btn btn-primary btn-sm mb-1"><i class = "fa fa-pencil-square-o px-1"></i>Edit</button></a>
                    <form action="{{route ('admin.user.delete', ['id' => $user->id])}}" method="post">
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
        <p>Tidak ada data user</p>
      @endif
    </div>
  </section>

  @endsection