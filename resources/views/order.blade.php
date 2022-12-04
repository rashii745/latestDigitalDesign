@include('includes.head')
<body>
   @include('includes.header')

    @include('includes.navbar')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Order</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Order</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- order Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Place Order</h4>
                    <div class="row">
                        <form method="POST" action="{{ route('forOrder') }}" >
                            @csrf
                            <div class="col-md-20 form-group" >
                            <label>Name</label>
                            <input class="form-control" type="text"  name="name" placeholder="">
                        </div>

                        <div class="col-md-20 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text"  name="email" placeholder="">
                        </div>
                        <div class="col-md-20 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text"  name="mob_no" placeholder=" ">
                        </div>
                        <div class="col-md-20 form-group">
                            <label>Description</label>
                            <input class="form-control" type="text" name="description" placeholder=" ">
                        </div>


                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
    <!-- order End -->

@include('includes.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('includes.scripts')
</body>

</html>
