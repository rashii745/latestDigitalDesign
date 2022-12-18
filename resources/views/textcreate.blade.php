@include('includes.head')


<body>

{{--<style>
    .bg-color{
        background-color: orange !important;
    }
</style>--}}

@include('includes.header')

@include('includes.navbar')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Message Us</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Message</p>
        </div>
    </div>
</div>

<div>


</div>
<!-- Page Header End -->

<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('messageStore') }}">
            @csrf
            <div class="card card-default">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12 form-group">
                            <div class="col-md-20 form-group" >
                                <input class="form-control" type="hidden" name="req_id" value="{{$request_id}}">
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <strong class=" font-weight-bold border border-white px-0 mr-20">Message</strong>
                            <input type="text" name="content" value="" class="form-control" placeholder="Enter Your Message">
                        </div>
                        <div >
                            <button class="btn btn-primary py-2 px-6 " type="submit" id= "Send message" >Send message</button>
                            <p class="help-block text-danger"></p>
                        </div>
                     </div>
                </div>
             </div>
        </form>


        </br>
        <div class="bg-light rounded h-100 p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <h5 class=" font-weight-bold border border-white px-0 mr-20">All Messages</h5>
                            <thead>
                            </thead>
                            <tbody id="msg-tbl">
                            @if(isset($message))
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
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script>

            var req_id = '<?php echo $request_id;  ?>';
            var getMessage = function() {

                $.ajax({
                    type:'GET',
                    url:'/getmsg/'+req_id,
                    data:'_token = <?php echo csrf_token() ?>',
                    success:function(data) {

                        if(data){

                            var message = jQuery.parseJSON( data );

                            var newMessages = '';
                            for (let i = 0; i < message.length; i ++ ){

                                var content = message[i]['content'];
                                newMessages += '<tr>'+
                                    '<td></td>'+
                                    '<td style="background-color: #D19C97;">'+content+'</td>'+
                                    '</tr>';
                            }

                            $("#msg-tbl").append(newMessages);
                        }
                    }
                });
            };

            setInterval(getMessage, 10000);

        </script>

</div>
</div>

@include('includes.footer')

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('includes.scripts')
</body>

</html>
