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
                <a class="btn btn-primary" href="{{ route('requests.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $UserRequest->first_name }}" class="form-control"
                       placeholder="Name">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $UserRequest->email }}" class="form-control"
                       placeholder="email">
                <strong>Description:</strong>
                <input type="text" name="description" value="{{ $UserRequest->description }}" class="form-control"
                       placeholder="description">
            </div>
        </div>
    </div>
@endsection
