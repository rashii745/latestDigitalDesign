@include('includes.head')


<body>


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
                                <input class="form-control" type="hidden" name="request_id" value="{{$request_id}}">
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <label for="description" class="control-label">{{ trans('Message') }}</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div >
                            <button class="btn btn-primary py-2 px-4" type="submit" id="saveBtn">Send
                                message</button>
                            <p class="help-block text-danger"></p>
                        </div>
            </div>
                </div>
    </div>
        </form>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>

        var getMessage = function() {

            $.ajax({
                type:'GET',
                url:'/getmsg',
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    //console.log(data);

                    if(data){

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


<!-- Page Header End -->
{{--<div class="table-responsive">
    <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
        <tr class="text-dark">
            <th scope="col">  Sender</th>
            <th scope="col">  Receiver</th>
            <th scope="col"> Content</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($message as $meg)
            <tr>

                <td>{{ $meg->sender_name }}</td>
                <td>{{ $meg->receiver_name }}</td>
                <td>{{ $meg->content }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>--}}
</div>
</div>

@include('includes.footer')

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('includes.scripts')
</body>

</html>
