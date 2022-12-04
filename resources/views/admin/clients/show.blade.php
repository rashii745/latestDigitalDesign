@extends('master.layout')
@section('title')
    Show Client
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-12">Show Client's Data</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb"></div>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="bg-light rounded h-100 p-4">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                <strong>First Name:</strong>
                <input type="text" name="first_name" value="{{ $client->first_name }}" class="form-control"
                       placeholder="First Name">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" value="{{ $client->last_name }}" class="form-control"
                       placeholder="Last Name">
                <strong>Email:</strong>
                <input type="text" email="email" value="{{ $client->email }}" class="form-control"
                       placeholder="email">

            </div>
        </div>
    </div>
@endsection
