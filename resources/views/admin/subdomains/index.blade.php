@extends('master.layout')
@section('title')
    Sub Domains List
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Sub Domains List</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb"></div>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('subdomains.create') }}"> Create New Sub Domain</a>
            </div>
        </div>
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
                        <th scope="col">Sub Domain Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($subdomains as $subdomain)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $subdomain->subdomain_name }}</td>
                            <td>
                                <form action="{{ route('subdomains.destroy',$subdomain->subdomain_id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('subdomains.show',$subdomain->subdomain_id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('subdomains.edit',$subdomain->subdomain_id) }}">Edit</a>

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
@endsection
