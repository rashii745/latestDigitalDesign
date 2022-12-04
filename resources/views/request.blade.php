@include('includes.head')

<body>

@include('includes.header')

   @include('includes.navbar')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Request Us</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Request</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Request Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Request for Order</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="request-form">
                    <div id="success"></div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('requestStore') }}">
                        @csrf

                        <!-- Name -->
                        <div class="col-md-15 form-group">
                            <label>Name</label>
                            <input class="form-control" type="text"  name="name" placeholder="">
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-15 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text"  name="email" placeholder="">
                        </div>

                        <!-- Description -->
                        <div class="col-md-15 form-group">
                            <label>Description</label>
                            <input class="form-control" type="text" name="description" placeholder=" ">
                        </div>

                        <div >
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendRequestButton">Send
                                Request</button>
                            <p class="help-block text-danger"></p>
                        </div>

                    </form>
                </div>
            </div>



    @include('includes.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('includes.scripts')
</body>

</html>
