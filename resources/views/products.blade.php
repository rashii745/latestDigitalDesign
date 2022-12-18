{{--{{$products}}--}}
@include('includes.head')


<body>


@include('includes.header')

@include('includes.navbar')
<!-- service providers -->
<div class="container-fluid pt-4 px-4">
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Designs Available</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">designs</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
            <tr class="text-dark">
                <th scope="col">Design Name</th>
                <th scope="col">Custom Design</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $pro)
                <tr>
                    <td>{{$pro->product_name}}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{ url('/editDesign') }}" >Create Design</a></td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- service providers End -->

@include('includes.footer')

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('includes.scripts')
</body>

</html>
