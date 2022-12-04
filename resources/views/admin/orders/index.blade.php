@extends('master.layout')
@section('title')
    View All Orders
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">All Orders List</h3>
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
                    <th scope="col">Order By</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->first_name }}</td>
                        <td>{{ $order->description }}</td>
                        <td>
                           <form action="{{ route('orders.destroy',$order->order_id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('orders.show',$order->order_id) }}">Show Detail</a>
                                @csrf
                           </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection


