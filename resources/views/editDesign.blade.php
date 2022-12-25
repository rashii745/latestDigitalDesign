@include('includes.head')


<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.11.3.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="tool/jquery.ui.rotatable.js"></script>
<script type="text/javascript" src="tool/html2canvas.js"></script>
<link rel="stylesheet" href="tool/jquery.ui.rotatable.css">

<script src="tool/jquery.textover.min.js"></script>


<body>

@include('includes.header')

   @include('includes.navbar')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Create Design</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Design</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <main class="site-main">

    <!--page Content-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container" id="container">

            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4">

                    <div class="section-intro pb-60px">
                        <h2>Generic <span class="section-intro__style">Components</span></h2>
                        <br><p>Click the component to load it</p>
                    </div>
                    @foreach ($components as $comp)
                        <img src="{{ asset('templates/' . $comp->image) }}" id="{{($comp->id) }}" style="width: 50px; height: 50px;" onclick="test({{$comp->id }})" />
                    @endforeach

                </div>

                <div class="col-md-6 col-lg-6 col-xl-4">

                    @if($template == "")

                        <div class="section-intro pb-60px">
                        <h2>Your <span class="section-intro__style">Design</span></h2>
                        <br><p>Custom Design</p>
                    </div>
                        <div style="background-color: black; width: 1vw;height: 1vw" onclick="changeColor(1)"></div>
                        <div style="background-color: red; width: 1vw;height: 1vw" onclick="changeColor(2)"></div>
                        <div style="background-color: orange; width: 1vw;height: 1vw" onclick="changeColor(3)"></div>

                        <div id="screen">
                        <img id="color-img" src="{{ asset('templates/blankpic.jpeg') }}" width="300px" height="450px" style="border: 1px solid black" class="drag-image mx-auto d-block" id="draggable" />
                    </div>
                   @else
                        <div class="section-intro pb-60px">
                            <h2>Your <span class="section-intro__style">Design</span></h2>
                            <br><p>{{$template->name}}</p>
                        </div>
                        <div id="screen">
                            <img id="color-img" src="{{ asset('templates/' . $template->image) }}" width="300px" height="450px" class="drag-image mx-auto d-block" id="draggable" />
                        </div>
                    @endif
                    <div class="checkout_btn_inner  d-flex align-items-center">

                        <button class="btn btn-sm btn-primary" onclick="doCapture()">Save</button>
                    </div>
                </div>



                <div class="col-md-4 col-lg-4 col-xl-4">

                    <div class="section-intro pb-60px">
                        <h2>Loaded <span class="section-intro__style">Components</span></h2>
                        <br><p>Drag the component to the picture</p>
                    </div>
                    <div id="screen1">
                        <!--    The area where image will be dragged.   -->
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- ================ trending product section end ================= -->



</main>


    @include('includes.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

{{--@ include('includes.scripts')--}}

{{--<script type="text/javascript">
    jQuery(function($){

        var textover_api;

        $('#screen').TextOver({}, function() {
            textover_api = this;
        });

    });

</script>--}}


<script type="text/javascript">


    function changeColor(flag){

        var public = '{{ asset('templates/') }}';
        var img = '';

        if(flag == 1)
        {
            img = 'black.jpg';
        }
        else if(flag == 2)
        {
            img = 'red.jpg';
        }
        else if(flag == 3)
        {
            img = 'orange.jpg';
        }else{
            img = 'blankpic.jpeg';
        }

        $("#color-img").attr("src", public+"/"+img);

    }
    function test(idImg){
        var menuID = idImg + new Date().getUTCMilliseconds();
        var x = document.getElementById(idImg).src;
        var funId="draggable_"+menuID;

        var img = '<div id="draggable_'+menuID+'" > <div id="img_'+menuID+'" ><a id="draggablei_'+menuID+'" onclick="removeComponent(this)" style="cursor:pointer; top:-10px; right:-10px; color: red;   float: right;">x</a></div></div>';


        $("#screen1").append(img);
        $("#img_"+menuID).css("background-image", "url(" + x + ")");
        $("#img_"+menuID).css("background-size", "contain");
        $("#img_"+menuID).css("background-repeat", "no-repeat");
        $("#img_"+menuID).css("height", "70px");
        $("#img_"+menuID).css("width", "70px");
        $("#draggable_"+menuID).draggable();
        $("#img_"+menuID).resizable().rotatable();

    }

    function remove(aRemove){
        console.log(aRemove);
        var divid = aRemove.id.replace("eliminacorso_","corso_");
        $("#" + divid).remove();
    }

    function removeComponent(iremove){
        //$("#"+id).remove();
        var divid = iremove.id.replace("draggablei_","draggable_");
        $("#" + divid).remove();
    }

    function doCapture(){
        window.scrollTo(0,0);
        html2canvas(document.getElementById("container")).then(
            function(canvas){
                $dataOfImg=canvas.toDataURL("image/png",0.9);
                console.log($dataOfImg);
                //Ajax to prevent page from reload
                $.ajax({
                    url:"/movePic",
                    type:"POST",
                    data:{
                        _token : '{{csrf_token()}}',
                        image: canvas.toDataURL("image/png",0.9)
                    },
                    success:function(response) {

                        if(response == "Done"){

                        } else {}},
                    error:function(jqXHR, exception){
                        alert(jqXHR);//display error log
                        alert("error occured while deleting");}});//ajax ends here

            });

    }

</script>

</body>

</html>
