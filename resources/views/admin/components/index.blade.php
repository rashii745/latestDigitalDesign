@extends('master.layout')
@section('title')
   Components List
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">All Components List</h3>
            <div class="pull-right"  style="display:inline; float: right">
                    <a class="btn btn-sm btn-secondary py-2 px-4" href="{{ route('components.create') }}"> Add New Component</a>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <br>
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">S#</th>
                                <th scope="col">Component</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($components as $component)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $component->name }}</td>
                                <td>
                                    <form action="{{ route('components.destroy',$component->id) }}" method="POST">

                                        <a class="btn btn-sm btn-info py-2 px-4" href="{{ route('components.show',$component->id) }}">Show</a>

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
