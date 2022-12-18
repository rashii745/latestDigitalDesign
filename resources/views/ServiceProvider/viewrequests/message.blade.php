@extends('master.layout')
@section('title')
    Message
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4" style="display:inline;">Message Board</h3>
            <div class="pull-right"  style="display:inline; float: right">
                <a class="btn btn-sm btn-primary py-2 px-4" href="{{ url('viewrequests') }}"> Back</a>
            </div>
        </div>
    </div>

    <form action="{{route('viewrequests.store')}}" method="POST">
        @csrf
        <div class="bg-light rounded h-100 p-4">
            <div class="row mb-2l">
                <input type="hidden" name="req_id" value="{{$request_id}}">
                <div class="form-group">
                    <strong>Message:</strong>
                    <input type="text" name="content" value="" class="form-control mb-2" placeholder="Enter your message">
                </div>
            </div>

            <div class="row">
                <div class="col-12" style="text-align: right;">
                    <button class="btn btn-sm btn-primary py-2 px-4 " type="submit" id="">Send message</button>
                </div>
            </div>
        </div>

    </form>

    </br>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <h5 class="mb-4">All Messages</h5>

                            <tbody id="msg-tbl">
                            @foreach ($message as $meg)
                                <tr>
                                    @if(Auth::user()->id == $meg->sender_id)
                                        <td style="background-color: #b3e2f1;">{{ $meg->content }}</td>
                                    @else
                                        <td></td>
                                    @endif

                                    @if(Auth::user()->id == $meg->receiver_id)
                                        <td></td>
                                    @else
                                        <td style="background-color: #63bdda;">{{ $meg->content }}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>

        var req_id = {!! $request_id; !!};
        //console.log(req_id);
        var getMessage = function() {

            $.ajax({
                type:'POST',
                url:'/getmsg/'+req_id,
                data:{'_token' : '{{csrf_token()}}'},
                success:function(data) {
                    //console.log(data);

                    if(data){

                        $("#msg-tbl").empty();
                        var message = jQuery.parseJSON( data );
                        // console.log(message);

                        var newMessages = '';
                        for (let i = 0; i < message.length; i ++ ){

                            var content = message[i]['content'];
                            newMessages += '<tr>'+
                                '<td></td>'+
                                '<td style="background-color: #63bdda;">'+content+'</td>'+
                                '</tr>';
                        }

                        $("#msg-tbl").append(newMessages);
                    }
                    //$("#msg").html(data.msg);
                }
            });
        };

        setInterval(getMessage, 10000); //30000

    </script>

@endsection
