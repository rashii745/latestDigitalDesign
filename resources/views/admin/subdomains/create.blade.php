@extends('master.layout')
@section('title')
    Create Sub Domains
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">Create Sub Domain</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-primary py-2 px-4"  href="{{ route('subdomains.index') }}"> Back</a>
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
    <form action="{{ route('subdomains.store') }}" method="POST">
        @csrf
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sub Domain Name:</strong>
                        <input type="text" name="subdomain_name" class="form-control mb-2" placeholder="Enter Subdomain Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 " style="text-align:center;">
                        <button class="btn btn-sm btn-primary py-2 px-4 " type="submit" id="">Create</button>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection
