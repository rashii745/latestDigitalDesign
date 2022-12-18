@extends('master.layout')
@section('title')
    Show Client
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">Show Client's Data</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-primary py-2 px-4"  href="{{ route('clients.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name:</strong>
                        <input type="text" name="first_name" value="{{ $client->first_name }}" class="form-control mb-3"
                               placeholder="First Name" disabled>
                        <strong>Last Name:</strong>
                        <input type="text" name="last_name" value="{{ $client->last_name }}" class="form-control mb-3"
                               placeholder="Last Name" disabled>
                        <strong>Email:</strong>
                        <input type="text" email="email" value="{{ $client->email }}" class="form-control mb-3"
                               placeholder="email" disabled>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
