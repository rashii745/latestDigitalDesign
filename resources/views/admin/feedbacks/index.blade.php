@extends('master.layout')
@section('title')
   View All Feedbacks
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">All Feedbacks List</h3>
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
                                <th scope="col">Feedback By</th>
                                <th scope="col">Feedback</th>
                                <th scope="col">Feedback To</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $feedback->Sp_name }}</td>
                                    <td>{{ $feedback->description }}</td>
                                    <td>{{ $feedback->Client_name }}</td>
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
