@extends('master.layout')
@section('title')
    View All Services
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">All Services List</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb"></div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Service Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order_services as $order_service)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $order_service->service_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
