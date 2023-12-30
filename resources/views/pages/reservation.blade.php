@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="card" style="margin:60px;">
        <div class="card-header" style="background-color: #8B0C0C;">
            <h1 style="color:white; text-align: center;">Fill the Form</h1>
            <h2 style="color:white; font-size:medium; text-align: center;">we will confirm your reservation via e-mail or phone</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.store_reservation') }}" method= "post">
            {!! csrf_field() !!}
            @if(Session::has('status'))
                <div class="alert alert-success alert-lg">
                    {{Session::get('status')}}</div>
            @endif
            <form action="{{ route('pages.store_reservation') }}" method= "post" enctype="multipart/form-data">
            {!! csrf_field() !!}
                <div class="row">
                    <div class="mb-3 col">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>  
                <div class="row">
                    <div class="mb-3 col">
                        <label class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number">
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label">Person(s)</label>
                        <input type="number" class="form-control" id="person" name="person">
                    </div>
                </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="check1">
                        <label class="form-check-label" for="check1">Are you sure to reserve?</label>
                    </div>
                <div class="text-center">
                    <button type="submit" value ="Save" class="btn" style="background-color: #8B0C0C; color:white;">Find a Table</button>
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