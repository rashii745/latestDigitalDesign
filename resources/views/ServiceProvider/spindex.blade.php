<!DOCTYPE html>
<html lang="en">

@include('contents.head')

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        @include('contents.sidebar')


        <!-- Content Start -->
        <div class="content">
            @include('contents.navbar')

            <!-- Count Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-pager fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Requests</p>
                                <h6 class="mb-0">@php echo $counts['UserRequest']; @endphp</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-layer-group fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Orders</p>
                                <h6 class="mb-0">@php echo $counts['Orders']; @endphp</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-table fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Feedbacks</p>
                                <h6 class="mb-0">@php echo $counts['Feedbacks']; @endphp</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Count End -->

            @include('contents.footer')
        </div>
        <!-- Content End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('contents.javascript')
</body>

</html>
