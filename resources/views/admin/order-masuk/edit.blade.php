@extends('admin.template.app')
@section('title', 'order')
@section('order', 'active')

@section('content')

<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        width: 30%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

</style>

<div class="card">

    <div class="p-5 mb-4 rounded-3">
        <div class="container-fluid">

            <div class="d-flex justify-content-between">
                <h3 class="display-7 fw-bold ">Edit order</h3>
                <a href="/order-masuk" class="btn btn-dark m-1 btn-sm ">Kembali</a>
            </div>

            <div class="pt-3 px-2">
                {{-- flashdata --}}
                {!! session('sukses') !!}
            </div>

            <div class="card mx-5 mb-2 mt-4">
                <form action="/order-masuk/{{$order->id}}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <tr>
                            <td class="fw-bold">Nomor Order : </td>

                            <td>{{ $order->order_number }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nama : </td>

                            <td>
                                <input type="text" name="name" class="form-control" value="{{ $order->name }}"
                                    placeholder="customer name">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email : </td>

                            <td>
                                <input type="email" name="email" class="form-control" value="{{ $order->email }}"
                                    placeholder="customer@mail">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Payment Method : </td>

                            <td class="text-uppercase">
                                <select class="form-select" name="payment_method" id="payment_method">
                                    <option value="">Pilih Payment Method</option>
                                    <option value="cash" {{ $order->payment_method == 'cash' ? 'selected' : '' }}>
                                        Cash
                                    </option>
                                    <option value="qris" {{ $order->payment_method == 'qris' ? 'selected' : '' }}>
                                        QRIS
                                    </option>
                                </select>
                                @error('payment_method')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </td>

                        </tr>
                        <tr>
                            <td class="fw-bold">Status Payment : </td>

                            <td class="text-uppercase">
                                <select class="form-select" name="status_payment" id="status_payment">
                                    <option value="">Pilih Status Payment</option>
                                    <option value="paid" {{ $order->status_payment == 'paid' ? 'selected' : '' }}>
                                        Paid
                                    </option>
                                    <option value="unpaid" {{ $order->status_payment == 'unpaid' ? 'selected' : '' }}>
                                        Unpaid
                                    </option>
                                </select>
                                @error('status_payment')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn btn-primary btn-sm">Update Order</button></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <h6 class="display-7 fw-bold ">Rincian</h6>

                <button type="button" class="btn btn-dark m-1 btn-sm" onclick="openModal()">
                    Tambah item
                </button>
            </div>



            <!-- Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="d-flex justify-content-between">
                        <h5>Tambah item</h5>
                        <span class="close" onclick="closeModal()">&times;</span>
                    </div>
                    <div>
                        <form action="/order-masuk/add-item" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $idOrder }}">
                            <div class="mb-3">
                                <select class="form-select" name="item_id" id="item_id">
                                    <option value=""><b>Pilih Item</b></option>
                                    <option value="">------------------------</option>
                                    @foreach ($items as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }} | Rp. {{ $item->price }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('item_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="number" name="qty" class="form-control" placeholder="qty" min="1" value="1">
                                @error('qty')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </form>
                    </div>
                </div>
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
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orderDetails as $od)
                        <form action="/order-masuk/{{$od->order_detail_id}}/update-detail" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="item_id" value="{{ $od->item_id }}">
                            <tr class="">
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $od->item_name }}</td>
                                <td>{{ $od->item_price }}</td>
                                <td width="10">
                                    <input type="number" name="qty" class="form-control" value="{{ $od->qty }}" min="1"
                                        placeholder="Quantity">
                                    @error('qty')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </td>
                                <td>Rp. {{ $od->price * $od->qty }}</td>
                                <td width="150">
                                    <button type="submit" class="btn btn-info btn-sm mb-1"> Update QTY</button>
                                    <a href="/order-masuk/{{$od->order_detail_id}}/delete-detail"
                                        class="btn btn-danger btn-sm mb-1"> Delete</a>
                                </td>
                            </tr>
                        </form>
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

    <script>
        function openModal() {
            document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        // Menutup modal jika user mengklik di luar modal
        window.onclick = function (event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                closeModal();
            }
        }

    </script>


    @endsection
