@include('includes.head')

<body>

@include('includes.header')


<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Domains</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">

                    <div
                        class="nav-item dropdown">
                    </div>
                    <div
                        @foreach ($domains as $dom)

                                @if($dom->subdomains)

                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link" data-toggle="dropdown">{{ $dom->domain_name }} <i class="fa fa-angle-down float-right mt-1"></i></a>
                                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">

                                            @foreach ($dom->subdomains as $subdom)
                                                <a href="{{ url('/products',$subdom->subdomain_id) }}" class="dropdown-item">{{ $subdom->subdomain_name }}</a>
                                            @endforeach

                                        </div>
                                    </div>

                                @else
                                    <a href="" class="nav-item nav-link"data-toggle="dropdown">{{ $dom->domain_name }}</a>
                                @endif
                        @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        @auth
                           <a href="{{url('/')}}"class="nav-item nav-link active">Home</a>
                           <a href="{{ url('/providers') }}"class="nav-item nav-link">Service Providers</a>
                           <a href="{{ url('/contact') }}"class="nav-item nav-link">Contact Us</a>
                           <a href="{{ url('/support') }}"class="nav-item nav-link">Support</a>

                        @else
                            <a href="{{url('/')}}"class="nav-item nav-link active">Home</a>
                            <a href="{{ url('/contact') }}"class="nav-item nav-link">Contact Us</a>
                            <a href="{{ url('/support') }}"class="nav-item nav-link">Support</a>
                        @endauth
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                          @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Professional Designs</h3>
                                <a href="{{ url('/editDesign') }}" class="btn btn-light py-2 px-3">create Design</a>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                <a href="{{ url('/editDesign') }}" class="btn btn-light py-2 px-3">Create Design</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->



<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-2 pb-5">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding:50px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Designs</h5>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 50px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">7-Day Revisions</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 50px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding:50px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Best Services</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->



<!-- desigs Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You Might want to Try</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">

        @if(isset($templates))

            @foreach ($templates as $temp)

                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img  width="250px" height="400px" class="drag-image mx-auto d-block" src="templates/{{$temp->image}}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$temp->name}}</h6>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            @auth()
                                <a href="{{ url('/editDesign',$temp->id) }}"class="nav-item nav-link" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Edit Design</a>
                                <a href="{{ url('/providers') }}"class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Order Now</a>
                            @else
                                <a href="{{ url('/editDesign',$temp->id) }}"class="nav-item nav-link" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Edit Design</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        @endif


@include('includes.footer')



<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('includes.scripts')


</body>

</html>
