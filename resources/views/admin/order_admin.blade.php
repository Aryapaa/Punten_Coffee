@extends('layouts.layoutadmin')

@section('content')

<section id="list">
    <div class="container">

      @if (count($order) > 0)
        <div class="table-responsive">
          <table class="table-striped table">
            <thead>
              <tr>
                <th>Order Number</th>
                <th>Email</th>
                <th>Name</th>
                <th>Total Order</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order as $order)
                <tr>
                  <td>{{ $order->order_number}}</td>
                  <td>{{ $order->email}}</td>
                  <td>{{ $order->name}}</td>
                  <td>{{ $order->total_order}}</td>
                  <td>{{ $order->total_amount}}</td>
                  <td>{{ $order->status_payment}}</td>
                  <td>
                    <a href="{{route ('admin.order.edit', ['id' => $order->id])}}"><button class = "btn btn-primary btn-sm mb-1"><i class = "fa fa-pencil-square-o px-1"></i>Edit</button></a>
                    <form action="{{route ('admin.order.delete', ['id' => $order->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Anda yakin ingin menghapus data ?')"><i class = "fa fa-trash-o px-1"></i>Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <p>Tidak ada order</p>
      @endif

      
    </div>
  </section>

  @endsection