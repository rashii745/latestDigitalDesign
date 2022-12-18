@extends('master.layout')
@section('title')
    Show Component
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">Show Component</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-primary py-2 px-4"  href="{{ route('components.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Component Name:</strong>
                    <input type="text" name="first_name" value="{{ $component->name }}" class="form-control mt-2 mb-3"
                           placeholder="First Name" disabled>
                    <div class="form-group"><strong>Component:</strong></div>
                        <img class="rounded-circle me-lg-2" src="{{ asset('admin/components/'. $component->image) }}"
                                 alt="{{$component->name}}" style="width: 100px; height: 100px;">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
