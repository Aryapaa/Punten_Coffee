@extends('admin.template.app')
@section('title', 'Order Masuk')
@section('order', 'active')

@section('content')
<div class="card">

    <div class="card-body">
        <h1 class="card-title fw-semibold mb-3 fs-6">Data order Masuk</h1>

        {{-- flashdata --}}
        {!! session('sukses') !!}

        <div class="card">
            <div class="card-body">
                @if(count($order) > 0)
                <div class="table-responsive">
                    <table class="table mt-4" id="tabel-data">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Total Order</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order as $item)
                            <tr class="">
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $item->order_number }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>Rp. {{ $item->total_order }}</td>
                                <td>Rp. {{ $item->total_amount }}</td>
                                <td class="text-uppercase">{{ $item->payment_method }}</td>
                                <td class="text-uppercase">{{ $item->status_payment }}</td>
                                <td>
                                    <a href="/order-masuk/{{$item->id}}/detail" class="btn btn-info btn-sm mb-1"><i
                                            class="fas fa-eye"></i> Detail</a>
                                      @if ($item->status_payment == 'paid')
                                            <button class="btn btn-success btn-sm mb-1" disabled>
                                                <i class="fas fa-eye"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm mb-1" disabled>
                                                <i class="fas fa-eye"></i> Delete
                                            </button>
                                        @else
                                            <a href="/order-masuk/{{ $item->id }}/edit" class="btn btn-success btn-sm mb-1">
                                                <i class="fas fa-eye"></i> Edit
                                            </a>
                                            <a href="/order-masuk/{{ $item->id }}/delete" class="btn btn-danger btn-sm mb-1">
                                                <i class="fas fa-eye"></i> Delete
                                            </a>
                                        @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12">Tidak ada data order saat ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @else
                <p>Tidak ada data order saat ini.</p>
                @endif
            </div>
        </div>

    </div>

</div>
@endsection
