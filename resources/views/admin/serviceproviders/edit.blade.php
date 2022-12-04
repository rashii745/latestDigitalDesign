@extends('master.layout')
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Edit Service Provider's Data</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('serviceproviders.index') }}"> Back</a>
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

    <form action="{{ route('serviceproviders.update',$serviceprovider->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> First Name:</strong>
                    <input type="text" name="first_name" value="{{ $serviceprovider->first_name }}" class="form-control"
                           placeholder="Enter First Name">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" value="{{ $serviceprovider->last_name }}" class="form-control"
                           placeholder="Enter Last Name">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $serviceprovider->email }}" class="form-control"
                           placeholder="Enter Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
