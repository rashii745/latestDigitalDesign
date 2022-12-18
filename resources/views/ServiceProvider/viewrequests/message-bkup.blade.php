@extends('master.layout')
@section('title')
    Message
@endsection
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h3 class="mb-4">Message Board</h3>
            <div class="row">
                <div class="col-lg-12 margin-tb"></div>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('viewrequests') }}"> Back</a>
            </div>
        </div>
    </div>

    <form id="chat-form" action="">
        @csrf
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <input type="hidden" name="req_id" value="{{$request_id}}">
                <div class="form-group">
                    <strong>Message:</strong>
                    <input type="text" id="content" name="content" value="" class="form-control" placeholder="Enter your message">
                </div>
            </div>
            </br>
            <div >
                <button class="btn btn-primary py-2 px-4" type="submit" id="">Send message</button>
                <p class="help-block text-danger"></p>
            </div>
        </div>

    </form>

    </br>
    <div class="bg-light rounded h-100 p-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <h5 class="mb-4">All Messages</h5>
                        <thead>
                        {{--<tr class="text-dark">
                            <th scope="col">Sender</th>
                            <th scope="col">Receiver</th>
                            <th scope="col">Content</th>
                        </tr>--}}
                        </thead>
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


        $( "#chat-form" ).submit(function( event ) {
            event.preventDefault();

            var mes = $("#content").val();

            // var url = "viewrequests";
            // var storeUrl = url + '/store';
            $.ajax({
                type:'POST',
                url: 'viewrequests',
                data:{
                    '_token' : '{{csrf_token()}}',
                    'content' : mes,
                    'req_id' : req_id
                },
                success:function(data) {
                    //console.log(data);

                    $("#content").val('');
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
        });

    </script>

@endsection
