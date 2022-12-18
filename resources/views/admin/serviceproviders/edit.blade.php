@extends('master.layout')
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">Edit Service Provider's Data</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-primary py-2 px-4"  href="{{ route('serviceproviders.index') }}"> Back</a>
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

        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> First Name:</strong>
                        <input type="text" name="first_name" value="{{ $serviceprovider->first_name }}" class="form-control mb-3"
                               placeholder="Enter First Name">
                        <strong>Last Name:</strong>
                        <input type="text" name="last_name" value="{{ $serviceprovider->last_name }}" class="form-control mb-3"
                               placeholder="Enter Last Name">
                        <strong>Email:</strong>
                        <input type="text" name="email" value="{{ $serviceprovider->email }}" class="form-control mb-3"
                               placeholder="Enter Email">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-sm btn-primary py-2 px-4">Edit</button>
                </div>
            </div>
        </div>
    </form>
@endsection
