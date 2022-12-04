@extends('master.layout')
@section('title')
    Edit Client
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Edit Client's Data</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb"></div>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update',$client->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> First Name:</strong>
                        <input type="text" name="first_name" value="{{ $client->first_name }}" class="form-control"
                               placeholder="Enter First Name">
                        <strong>Last Name:</strong>
                        <input type="text" name="last_name" value="{{ $client->last_name }}" class="form-control"
                               placeholder="Enter Last Name">
                        <strong>Email:</strong>
                        <input type="text" name="email" value="{{ $client->email }}" class="form-control"
                               placeholder="Enter Email">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
