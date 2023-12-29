@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="card" style="margin:60px;">
        <div class="card-header" style="background-color: #8B0C0C;">
            <h1 style="color:white; text-align: center;">Edit Reservation</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.reserv.update_reservation', ['id' => $reservation->id])}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method('PUT')
                <div class="row">
                    <div class="mb-3 col">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control" name="name" value="{{$reservation->name}}">
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label">E-Mail</label>
                        <input type="email" class="form-control" name="email" value="{{$reservation->email}}">
                    </div>
                </div>  
                <div class="row">
                    <div class="mb-3 col">
                        <label class="form-label">Phone Number</label>
                        <input type="number" class="form-control" name="phone_number" value="{{$reservation->phone_number}}">
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" value="{{$reservation->date}}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label class="form-label">Time</label>
                        <input type="time" class="form-control" name="time" value="{{$reservation->time}}">
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label">Person(s)</label>
                        <input type="number" class="form-control" name="person" value="{{$reservation->person}}">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="background-color: #8B0C0C; color:white;">Edit</button>
                </div>
            </form>
        </div>
        @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }} </p>
                        @endforeach
                    </div>
        @endif
    </div>
</div>
@endsection