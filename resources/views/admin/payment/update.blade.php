@extends('layouts.layoutwonavbar')

@section('content')

<div class = "card" style = "margin : 20px;">
    <div class = "card-header" style = "background-color: #8B0C0C ; color : white">Update Items</div>
    <div class = "card-body">
        <form action="{{ route('admin.payment.update', ['id' => $payments->id]) }}" method= "post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method('PUT')
        <label>Date</label></br>
        <input type="date" name="date" id = "" value="{{$payments->date}}" class="form-control"></br>

        <label>Order ID</label></br>
        <input type="text" name="order_id" id = "order_id" value="{{$payments->order_id}}" class="form-control"></br>

        <label>Payment Type</label></br>
        <input type="text" name="jenis_pembayaran" id = "jenis_pembayaran" value="{{$payments->jenis_pembayaran}}" class="form-control"></br>

        <label>Status</label></br>
        <input type="text" name="nilai" id = "nilai" value="{{$payments->status}}" class="form-control" aria-label="Disabled input example" disabled readonly></br>

        <label>Total Amount</label></br>
        <input type="number" name="nilai" id = "nilai" value="{{$payments->nilai}}" class="form-control"></br>

        <label>Email</label></br>
        <input type="string" name="email" id = "email" value="{{$payments->email}}" class="form-control"></br>

        <input type="submit" value= "Update" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF ">
        <a href= "{{ url('admin/payment') }}" type="submit" value= "Back" class="btn" style = "background-color: #8B0C0C ; color : #FFFFFF ">Back</a></br>
        </form>
    </div>  
</div>

@endsection



