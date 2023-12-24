@extends('layouts.layoutwonavbar')

@section('content')
<div class="container">
    <div class="card" style="margin:20px;">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="card-header" style="background-color: #8B0C0C;">
                    <h3 style="color:white;">Reservations</h3>
                </div><br>
                <div class="card-body">
                    <div>
                        <div class="row" style="margin=20px;">
                            <div class="container-fluid">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Person(s)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservation as $rese)
                                <tr>
                                    <td>{{ $rese->id}}</td>
                                    <td>{{ $rese->name}}</td>
                                    <td>{{ $rese->email}}</td>
                                    <td>{{ $rese->phone_number}}</td>
                                    <td>{{ $rese->date}}</td>
                                    <td>{{ $rese->time}}</td>
                                    <td>{{ $rese->person}}</td>
                                    <td>
                                    <a href="{{route ('admin.reserv.edit_reservation', $rese->id)}}"><button class="btn btn-primary" title="Edit" type="button"><i class = "fa fa-pencil-square-o px-1"></i></button></a>
                                    <form action="{{route ('admin.reserv.delete_reservation', ['id' => $rese->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Anda yakin ingin menghapus data?')" title="Delete"><i class = "fa fa-trash-o px-1"></i></button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    
                </div>
            </div>
        </div>  
    </div>
</div>   

