@extends('master.layout')
@section('title')
    Show Request
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">Show Request</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-primary py-2 px-4"  href="{{ route('requests.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $UserRequest->first_name }}" class="form-control mb-3"
                               placeholder="Name" disabled>
                        <strong>Email:</strong>
                        <input type="text" name="email" value="{{ $UserRequest->email }}" class="form-control mb-3"
                               placeholder="email" disabled>
                        <strong>Description:</strong>
                        <input type="text" name="description" value="{{ $UserRequest->description }}" class="form-control mb-3"
                               placeholder="description" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
