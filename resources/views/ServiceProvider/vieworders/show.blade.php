@extends('master.layout')
@section('title')
    Show Orders
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Show requests</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vieworders.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <form action="{{ route('vieworders.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order By:</strong>
                    <input type="text" name="first_name" value="{{ $order->first_name }}" class="form-control"
                           placeholder="Order By">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $order->email }}" class="form-control"
                           placeholder="Email">
                    <strong>Phone Number:</strong>
                    <input type="text" name="mob_no" value="{{ $order->mob_no }}" class="form-control"
                           placeholder="Phone Number">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $order->description }}" class="form-control"
                           placeholder="Description">
                    <strong>Status:</strong>
                    {{--<input type="text" name="status" value="{{ $order->status }}" class="form-control"
                           placeholder="Status">--}}
                    <select id="status" name="status" class="form-control">
                        <option value="In progress" @php $order->status=='In progress'?'seelected':'' @endphp>In progress</option>
                        <option value="End" @php $order->status=='End'?'seelected':'' @endphp>End</option>

                    </select>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" id="file-area" style="display:none;">
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </form>

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
