@extends('admin.template.app')
@section('title', 'order')
@section('order', 'active')

@section('content')
<div class="card">

    <div class="p-5 mb-4 rounded-3">
        <div class="container-fluid">

            <div class="d-flex justify-content-between">
                <h3 class="display-7 fw-bold ">Detail order</h3>
                <a href="/order-masuk" class="btn btn-dark m-1 btn-sm ">Kembali</a>
            </div>

            <div class="card mx-5 mb-2 mt-4">
                <table class="table">
                    <tr>
                        <td class="fw-bold">Nomor Order : </td>
                        
                        <td>{{ $order->order_number }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Nama : </td>
                        
                        <td>{{ $order->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Email : </td>
                        
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Payment Method : </td>
                        
                        <td class="text-uppercase">{{ $order->payment_method }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Status Payment : </td>
                        
                        <td class="text-uppercase">{{ $order->status_payment }}</td>
                    </tr>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Item</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orderDetails as $item)
                        <tr class="">
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->item_price }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp. {{ $item->price * $item->qty }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">Tidak ada data order saat ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot style="font-weight: bold;">
                        <tr>
                            <td>Total Order</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $order->total_order }}
                            </td>
                        </tr>
                        <tr>
                            <td>PPN 10%</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{ $order->total_order * 0.1 }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Total</h5>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>{{ $order->total_order + ($order->total_order * 0.1) }}</h5>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>

    @endsection
