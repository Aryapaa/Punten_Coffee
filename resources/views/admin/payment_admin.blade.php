@extends('partials.layout')

@section('content')
@if(session('success'))
<div class="alert alert-success mt-3 mx-3">
    {{ session('success') }}
</div>
@endif
@if(session('danger'))
<div class="alert alert-danger mt-3 mx-3">
    {{ session('danger') }}
</div>
@endif
<section id="list">
    <div class="container">
        @if (count($payments) > 0)
        <div class="table-responsive">
            <table class="table-striped table mt-5">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Order ID</th>
                        <th>Payment Type</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->date}}</td>
                        <td>{{ $payment->order_id}}</td>
                        <td>{{ $payment->jenis_pembayaran}}</td>
                        <td>{{ $payment->status}}</td>
                        <td>{{ $payment->nilai}}</td>
                        <td>{{ $payment->email}}</td>
                        <td>
                            <a href="{{route ('admin.payment.edit', ['id' => $payment->id])}}"><button class="btn btn-primary btn-sm mb-1"><i class="fa fa-pencil-square-o px-1"></i>Edit</button></a>
                            <form action="{{route ('admin.payment.delete', ['id' => $payment->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ?')"><i class="fa fa-trash-o px-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="mt-5">No payment available</p>
        @endif
    </div>
</section>

<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + recipient
        modalBodyInput.value = recipient
    })
</script>

@endsection