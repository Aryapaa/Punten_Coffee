@extends('layouts.layoutwonavbar')

@section('content')
<div class="container">
    <div class="text">
        <h1 style="color: #392105; font-size: larger;">Fill the Form</h1>
        <h2 style="color: #8E8282; font-size:medium;">we will confirm your reservation via e-mail or phone</h2>
    </div>
    <hr color="#965C19" size="75%">
    <form action="#">
        <div class="form-row">
            <div class="input-data">
                <input type="text" required>
                <div class="underline"></div>
                <label class="name" style="color:#8E8282;">Your Name</label>
            </div>
            <div class="input-data">
                <input type="text" required>
                <div class="underline"></div>
                <label name="email" style="color:#8E8282;">E-mail</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input type="text" required>
                <div class="underline"></div>
                <label for="number" style="color:#8E8282;">Phone Number</label>
            </div>
            <div class="input-data">
                <input type="text" required>
                <div class="underline"></div>
                <label for="date" style="color:#8E8282;">Date</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input type="text" required>
                <div class="underline"></div>
                <label for="time" style="color:#8E8282;">Time</label>
            </div>
            <div class="input-data">
                <input type="text" required>
                <div class="underline"></div>
                <label for="person" style="color:#8E8282;">Person(s)</label>
            </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-row submit-btn">
                <div class="input-data">
                    <div class="inner"></div>
                    <button class="table">Find a Table</button>
                </div>
            </div>
    </form>
</div>
@endsection