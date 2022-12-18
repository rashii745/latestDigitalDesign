@extends('master.layout')
@section('title')
    Service Provider List
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">All Service Providers List</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb"></div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">S#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($serviceproviders as $serviceprovider)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $serviceprovider->first_name }}</td>
                                    <td>{{ $serviceprovider->last_name }}</td>
                                    <td>{{ $serviceprovider->email }}</td>
                                    <td>
                                        <form action="{{ route('serviceproviders.destroy',$serviceprovider->id) }}" method="POST">

                                            <a class="btn btn-sm btn-info py-2 px-4" href="{{ route('serviceproviders.show',$serviceprovider->id) }}">Show</a>

                                            <a class="btn btn-sm btn-primary py-2 px-4" href="{{ route('serviceproviders.edit',$serviceprovider->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
