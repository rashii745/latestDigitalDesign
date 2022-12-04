@extends('master.layout')
@section('title')
    Show Domains
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Show Domains</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('domains.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Domain Name:</strong>
{{--                {{ $domain->domain_name }}--}}
                <input type="text" name="domain_name" value="{{ $domain->domain_name }}" class="form-control"
                       placeholder="Domain Name">
            </div>
        </div>
    </div>
@endsection
