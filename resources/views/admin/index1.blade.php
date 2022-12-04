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




            @if(Auth::user())
                @if(Auth::user()->role=='Admin')
            <!-- Count Start -->
                @isset($counts)
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-pager fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total Domains</p>
                                        <h6 class="mb-0">@php echo $counts['Domains']; @endphp</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fas fa-layer-group fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total SubDomains</p>
                                        <h6 class="mb-0">@php echo $counts['SubDomains']; @endphp</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-users fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total Clients</p>
                                        <h6 class="mb-0">@php echo $counts['Clients']; @endphp</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-users fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total S-Ps</p>
                                        <h6 class="mb-0">@php echo $counts['Service Provider']; @endphp</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fa fa-table fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total Requests</p>
                                        <h6 class="mb-0">@php echo $counts['UserRequest']; @endphp</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                    <i class="fas fa-list-ul fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <p class="mb-2">Total Orders</p>
                                        <h6 class="mb-0">@php echo $counts['Orders']; @endphp</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bg-light text-center rounded p-4">
                                        <h6 class="mb-0">Total Domains And Sub Domains</h6>
                                        <canvas id="admin_domains" style="width:100%;max-width:600px"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-light text-center rounded p-4">
                                        <h6 class="mb-0">Total Users</h6>
                                        <canvas id="admin_users" style="width:100%;max-width:600px"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-light text-center rounded p-4">
                                        <h6 class="mb-0">Total Orders</h6>
                                        <canvas id="admin_total_orders" style="width:100%;max-width:600px"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bg-light text-center rounded p-4">
                                        <h6 class="mb-0">Total Requests</h6>
                                        <canvas id="admin_total_requests" style="width:100%;max-width:600px"></canvas>
                                    </div>
                                </div>
                    </div>
                </div>
                @endisset
                @elseif(Auth::user()->role=='Service-Provider')
                    @isset($counts)
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
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bg-light text-center rounded p-4">
                                    <h6 class="mb-0">Total Orders</h6>
                                    <canvas id="sp_total_orders" style="width:100%;max-width:600px"></canvas>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="bg-light text-center rounded p-4">
                                    <h6 class="mb-0">Total Feedbacks</h6>
                                    <canvas id="sp_total_feedbacks" style="width:100%;max-width:600px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endisset
                @else
                    <a> </a>
                @endif
            @endif

            <!-- Count End -->

            <!-- Orders Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Orders</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        @isset($counts)
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
                        @endisset
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

    @if(Auth::user()->role=='Admin')
    <script>
        var xValues = ["Domains", "Sub Domains"];

        var domains = @json($counts['Domains'] ?? 0 );
        var sub_domains = @json($counts['SubDomains'] ?? 0 );

        var yValues = [domains, sub_domains];
        var barColors = [
            "#a1f3d9",
            "#00aba9",

        ];

        new Chart("admin_domains", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,

                }
            }
        });

        var x1Values = ["Clients", "Service Providers"];
        var Clients = @json($counts['Clients'] ?? 0 );
        var ServiceProvider = @json($counts['Service Provider'] ?? 0 );
        var y1Values = [Clients, ServiceProvider];
        var barColors = [
            "#2b5797",
            "#05d2ee"

        ];

        new Chart("admin_users", {
            type: "pie",
            data: {
                labels: x1Values,
                datasets: [{
                    backgroundColor: barColors,
                    data: y1Values
                }]
            },
            options: {
                title: {
                    display: true,

                }
            }
        });
        let months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        var sp_total_orders = @json($counts['sp_total_orders'] ?? '' );
        let sp_total_ordersCounts = [0,0,0,0,0,0,0,0,0,0,0,0];

        for(let i = 0; i < sp_total_orders.length; i++ ){
            let month_name = sp_total_orders[i]['month_name'];
            let count = sp_total_orders[i]['count'];
            let exists = months.indexOf(month_name);
            sp_total_ordersCounts[exists] = count;
        }

        new Chart("admin_total_orders", {
            type: "line",
            data: {
                labels: months,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: sp_total_ordersCounts
                }]
            },
            options: {
                legend: {display: false},
                scales: {
                    yAxes: [{ticks: {min: 0, max:16}}],
                }
            }
        });

        var sp_total_requests = @json($counts['sp_total_requests'] ?? '' );
        let sp_total_requestsCounts = [0,0,0,0,0,0,0,0,0,0,0,0];

        for(let i = 0; i < sp_total_requests.length; i++ ){
            let month_name = sp_total_requests[i]['month_name'];
            let count = sp_total_requests[i]['count'];
            let exists = months.indexOf(month_name);
            sp_total_requestsCounts[exists] = count;
        }

        new Chart("admin_total_requests", {
            type: "line",
            data: {
                labels: months,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: sp_total_requestsCounts,
                }]
            },
            options: {
                legend: {display: false},
                scales: {
                    yAxes: [{ticks: {min: 0, max:16}}],
                }
            }
        });

    </script>

    @elseif(Auth::user()->role=='Service-Provider')
        <script>

            let months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            var sp_total_orders = @json($counts['sp_total_orders'] ?? '' );
            let sp_total_ordersCounts = [0,0,0,0,0,0,0,0,0,0,0,0];

            for(let i = 0; i < sp_total_orders.length; i++ ){
                let month_name = sp_total_orders[i]['month_name'];
                let count = sp_total_orders[i]['count'];
                let exists = months.indexOf(month_name);
                sp_total_ordersCounts[exists] = count;
            }

            new Chart("sp_total_orders", {
                type: "line",
                data: {
                    labels: months,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.1)",
                        data: sp_total_ordersCounts,
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                        yAxes: [{ticks: {min: 0, max:16}}],
                    }
                }
            });


            var sp_total_feedbacks = @json($counts['sp_total_feedbacks'] ?? '' );
            let sp_total_feedbacksCounts = [0,0,0,0,0,0,0,0,0,0,0,0];

            for(let i = 0; i < sp_total_feedbacks.length; i++ ){
                let month_name = sp_total_feedbacks[i]['month_name'];
                let count = sp_total_feedbacks[i]['count'];
                let exists = months.indexOf(month_name);
                sp_total_feedbacksCounts[exists] = count;
            }

            new Chart("sp_total_feedbacks", {
                type: "line",
                data: {
                    labels: months,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.1)",
                        data: sp_total_feedbacksCounts,
                    }]
                },
                options: {
                    legend: {display: false},
                    scales: {
                        yAxes: [{ticks: {min: 0, max:16}}],
                    }
                }
            });
        </script>

    @else
        <a> </a>
    @endif

</body>

</html>
