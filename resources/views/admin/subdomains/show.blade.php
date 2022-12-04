@extends('master.layout')
@section('title')
    Show Sub Domains
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Show Sub Domain</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subdomains.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sub Domain Name:</strong>
{{--                {{ $subdomain->subdomain_name }}--}}
                <input type="text" name="subdomain_name" value="{{ $subdomain->subdomain_name }}" class="form-control"
                       placeholder="Sub Domain Name">
            </div>

        </div>
    </div>
@endsection
