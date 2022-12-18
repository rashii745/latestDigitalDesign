@extends('master.layout')
@section('title')
    View All Requests
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">All Requests List</h3>
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
                        <th scope="col">Request By</th>
                        <th scope="col">Email</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($UserRequests as $UserRequest)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $UserRequest->first_name }}</td>
                            <td>{{ $UserRequest->email }}</td>
                            <td>{{ $UserRequest->description }}</td>
                            <td>
                                <form action="{{ route('viewrequests.destroy',$UserRequest->request_id) }}" method="POST">

                                    <a class="btn btn-sm btn-info py-2 px-4" href="{{ route('viewrequests.show',$UserRequest->request_id) }}">Show</a>
                                    <a class="btn btn-sm btn-info py-2 px-4" href="{{ route('viewrequests.edit',$UserRequest->request_id) }}">Message</a>


                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
