@extends('master.layout')
@section('title')
    Sub Domains List
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">All Sub Domains List</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-secondary py-2 px-4" href="{{ route('subdomains.create') }}"> Create New Sub Domain</a>
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

                                            <a class="btn btn-sm btn-info py-2 px-4" href="{{ route('subdomains.show',$subdomain->subdomain_id) }}">Show</a>

                                            <a class="btn btn-sm btn-primary py-2 px-4" href="{{ route('subdomains.edit',$subdomain->subdomain_id) }}">Edit</a>

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
