@extends('master.layout')
@section('title')
    Service Provider Profile
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4"> My Profile </h3>
            <div class="row">
                <div class="col-lg-12 margin-tb"></div>
            </div>
            {{--<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('$serviceproviderprofile.index') }}"> Back</a>
            </div>--}}

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form action="{{ route('serviceproviderprofile.update', $serviceproviderprofile->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>First Name:</strong>
                            <input type="text" name="first_name" value="{{ $serviceproviderprofile->first_name }}" class="form-control"
                                   placeholder="Enter First Name">
                            <strong>Last Name:</strong>
                            <input type="text" name="last_name" value="{{ $serviceproviderprofile->last_name }}" class="form-control"
                                   placeholder="Enter Last Name">
                            <strong>Email:</strong>
                            <input type="text" name="email" value="{{ $serviceproviderprofile->email }}" class="form-control"
                                   placeholder=" Enter Email">
                            <strong>Phone Number:</strong>
                            <input type="text" name="mob_no" value="{{ $serviceproviderprofile->mob_no }}" class="form-control"
                                   placeholder="Enter Phone Number">
                            <strong>Specialization:</strong>
                            <input type="text" name="specialization" value="{{ $serviceproviderprofile->specialization }}" class="form-control"
                                   placeholder="Tell Client About your specialization and services">
                            <strong>Experience:</strong>
                            <input type="text" name="experience" value="{{ $serviceproviderprofile->experience }}" class="form-control"
                                   placeholder="How many years of work experience do you have?">

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary"> Save </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
