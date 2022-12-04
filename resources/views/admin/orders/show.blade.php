@extends('master.layout')
@section('title')
    Show Domains
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Show requests</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order By:</strong>
                <input type="text" name="first_name" value="{{ $order->first_name }}" class="form-control"
                       placeholder="Order By">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $order->email }}" class="form-control"
                       placeholder="Email">
                <strong>Phone Number:</strong>
                <input type="text" name="mob_no" value="{{ $order->mob_no }}" class="form-control"
                       placeholder="Phone Number">
                <strong>Description:</strong>
                <input type="text" name="description" value="{{ $order->description }}" class="form-control"
                       placeholder="Description">
            </div>
        </div>
    </div>
@endsection
