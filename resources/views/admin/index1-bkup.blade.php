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
            @isset($counts)
            @if(Auth::user())
                @if(Auth::user()->role=='Admin')
            <!-- Count Start -->

                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">

{{--                        @if(isset($counts['Domains']))--}}
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-pager fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Domains</p>
                                    <h6 class="mb-0">@php echo $counts['Domains']; @endphp</h6>
                                </div>
                            </div>
                        </div>
{{--                        @endif--}}

{{--                        @if(isset($counts['SubDomains']))--}}
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fas fa-layer-group fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total SubDomains</p>
                                    <h6 class="mb-0">@php echo $counts['SubDomains']; @endphp</h6>
                                </div>
                            </div>
                        </div>
{{--                        @endif--}}

{{--                            @if(isset($counts['Clients']))--}}
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-users fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Clients</p>
                                    <h6 class="mb-0">@php echo $counts['Clients']; @endphp</h6>
                                </div>
                            </div>
                        </div>
{{--                            @endif--}}

{{--                            @if(isset($counts['Service Provider']))--}}
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-users fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total S-Ps</p>
                                    <h6 class="mb-0">@php echo $counts['Service Provider']; @endphp</h6>
                                </div>
                            </div>
                        </div>
{{--                            @endif--}}

{{--                            @if(isset($counts['UserRequest']))--}}
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-table fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Requests</p>
                                    <h6 class="mb-0">@php echo $counts['UserRequest']; @endphp</h6>
                                </div>
                            </div>
                        </div>
{{--                            @endif--}}

{{--                            @if(isset($counts['Orders']))--}}
                        <div class="col-sm-6 col-xl-3">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fas fa-list-ul fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Orders</p>
                                    <h6 class="mb-0">@php echo $counts['Orders']; @endphp</h6>
                                </div>
                            </div>
                        </div>
{{--                            @endif--}}
                    </div>
                </div>
                @elseif(Auth::user()->role=='Service-Provider')
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

                @else
                    <a> </a>
                @endif
            @endif
            <!-- Count End -->
            <!-- Chart Start -->

            @isset($chart)
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading my-2">Chart Demo</div>
                            <div class="col-lg-8">
                                <canvas id="userChart" class="rounded shadow"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>--}}
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
            <!-- CHARTS -->
            <script>
                var ctx = document.getElementById('userChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',
// The data for our dataset
                    data: {
                        labels:  {!!json_encode($chart->labels)!!} ,
                        datasets: [
                            {
                                label: 'Count of ages',
                                backgroundColor: {!! json_encode($chart->colours)!!} ,
                                data:  {!! json_encode($chart->dataset)!!} ,
                            },
                        ]
                    },
                    // Configuration options go here
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    callback: function(value) {if (value % 1 === 0) {return value;}}
                                },
                                scaleLabel: {
                                    display: false
                                }
                            }]
                        },
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                fontColor: '#122C4B',
                                fontFamily: "'Muli', sans-serif",
                                padding: 25,
                                boxWidth: 25,
                                fontSize: 14,
                            }
                        },
                        layout: {
                            padding: {
                                left: 10,
                                right: 10,
                                top: 0,
                                bottom: 10
                            }
                        }
                    }
                });
            </script>

            <!-- Chart End-->

            <!-- Orders Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Orders</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Order By</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($counts['OrdersTbl'] as $order)
                                <tr>
                                    <td>{{ $order->first_name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->mob_no }}</td>
                                    <td>{{ $order->description }}</td>
                                    <td>{{ $order->status }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- Order End -->

            @include('contents.footer')
        </div>
        <!-- Content End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('contents.javascript')
</body>
</html>

