@extends('master.layout')
@section('title')
    Show Order
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">Show Order</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-primary py-2 px-4"  href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Order By:</strong>
                        <input type="text" name="first_name" value="{{ $orders->Client_name }}" class="form-control mb-3"
                                disabled>
                        <strong>Order To:</strong>
                        <input type="text" name="first_name" value="{{ $orders->Sp_name }}" class="form-control mb-3"
                                disabled>
                        <strong>Email Of Client:</strong>
                        <input type="text" name="email" value="{{ $orders->email1 }}" class="form-control mb-3"
                               disabled>
                        <strong>Email Of Service Provider:</strong>
                        <input type="text" name="email" value="{{ $orders->email2 }}" class="form-control mb-3"
                                disabled>
                        <strong>Phone Number Of Client:</strong>
                        <input type="text" name="mob_no" value="{{ $orders->mob1 }}" class="form-control mb-3"
                               disabled="">
                        <strong>Phone Number Of Service Provider:</strong>
                        <input type="text" name="mob_no" value="{{ $orders->mob2 }}" class="form-control mb-3"
                               disabled="">
                        <strong>Description:</strong>
                        <input type="text" name="description" value="{{ $orders->description }}" class="form-control mb-3"
                                disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
