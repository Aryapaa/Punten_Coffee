@extends('admin.main')

@section('content')

<section id="list">
    <div class="container">
      <a href="" class ="btn btn-sm" title = "Add User" style = "background-color: #8B0C0C ; color : #FFFFFF">Add user</a>
      @if (count($user) > 0)
        <div class="table-responsive">
          <table class="table-striped table">
            <thead>
              <tr>
                <th>No</th>
                <th>username</th>
                <th>password</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $user)
                <tr>
                  <td>{{ $user->id}}</td>
                  <td>{{ $user->username}}</td>
                  <td>{{ $user->password}}</td>
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