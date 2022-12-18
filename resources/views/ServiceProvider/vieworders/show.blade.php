@extends('master.layout')
@section('title')
    Show Orders
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">View All Order</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-primary py-2 px-4" href="{{ route('vieworders.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Order By:</strong>
                        <input type="text" name="first_name" value="{{ $order->first_name }}" class="form-control mb-3"
                               placeholder="Order By" disabled>

                        <strong>Email:</strong>
                        <input type="text" name="email" value="{{ $order->email }}" class="form-control mb-3"
                               placeholder="Email" disabled>

                        <strong>Phone Number:</strong>
                        <input type="text" name="mob_no" value="{{ $order->mob_no }}" class="form-control mb-3"
                               placeholder="Phone Number" disabled>

                        <strong>Description:</strong>
                        <input type="text" name="description" value="{{ $order->description }}" class="form-control mb-3"
                               placeholder="Description" disabled>

                        <form action="{{ route('vieworders.update',$order->order_id) }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <strong>Status:</strong>

                            <select id="status" name="status" class="form-control mb-3">
                                <option value="In progress" @if ($order->status=='In progress')  selected @endif >In progress</option>
                                <option value="End" @if ($order->status=='End') selected @endif>End</option>
                            </select>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3" id="file-area" style="display:none;">
                                <input type="file" name="avatar" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-12" style="text-align: center;">
                                    <button class="btn btn-sm btn-primary py-2 px-4 " type="submit" id="">Update</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        $('#status').on('change', function() {
            // alert( this.value );

            if(this.value == 'End'){
                $("#file-area").show();
            }else{
                $("#file-area").hide();
            }
        });
    </script>
@endsection
