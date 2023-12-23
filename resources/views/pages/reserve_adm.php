@extends('layouts.layoutwonavbar')

@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <h4 class="title"><b>Reservations</b></h4>
            <hr>
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Person(s)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
        </div>
    </div>  
</div>   

