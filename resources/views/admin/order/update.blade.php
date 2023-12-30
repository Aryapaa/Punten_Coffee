@extends('layouts.layoutwonavbar')
@section('content')
<div class="card" style="margin : 20px;">
    <div class="card-header" style="background-color: #8B0C0C ; color : white">Update Orders</div>
    <div class="card-body">
        
        @foreach ($errors->all() as $item)
                    {{ $item }}
        @endforeach   
        <form action="{{ route('admin.order.update', ['id' => $order->id]) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method('PUT')
            <label>Order Number</label></br>
            <input type="text" name="order_number" id="order_number" value="{{$order->order_number}}" class="form-control"></br>

            <label>Email</label></br>
            <input type="email" name="email" id="email" value="{{$order->email}}" class="form-control"></br>

            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$order->name}}" class="form-control"></br>

            <label>Total Order</label></br>
            <input type="number" name="total_order" id="total_order" value="{{$order->total_order}}" class="form-control"></br>

            <label>Total Amount</label></br>
            <input type="number" name="total_amount" id="total_amount" value="{{$order->total_amount}}" class="form-control"></br>

            <label>Status Payment</label></br>
            <select class="form-select" name="status_payment" id="status_payment">
                <option value="paid" {{ $order->status_payment == 'paid' ? 'selected' : '' }}>
                    Paid
                </option>
                <option value="unpaid" {{ $order->status_payment == 'unpaid' ? 'selected' : '' }}>
                    Unpaid
                </option>
            </select></br>
            <input type="submit" value="Update" class="btn" style="background-color: #8B0C0C ; color : #FFFFFF ">
            <a href="{{ url('admin/order') }}" type="submit" value="Back" class="btn" style="background-color: #8B0C0C ; color : #FFFFFF ">Back</a></br>
        </form>
    </div>
</div>
@endsection