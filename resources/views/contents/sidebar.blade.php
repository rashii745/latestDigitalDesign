<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{URL('index1')}}." class="navbar-brand mx-4 mb-3">
            <h5 class="text-primary">Digital Design Agency</h5>
        </a>
        @if(Auth::user())

            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{asset('img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <div class="ms-3">
                        <h6 class="mb-0">{{Auth::user()->first_name}}</h6>
                        <span>{{Auth::user()->role}}</span>
                    </div>
                </div>
            </div>

            @if(Auth::user()->role=='Admin')
                <div class="navbar-nav w-100">
                    <a href="{{URL('index1')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-bounding-box"></i>Manage Tool</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{URL('domains')}}" class="dropdown-item"> Manage Domains</a>
                            <a href="{{URL('subdomains')}}" class="dropdown-item"> Manage SubDomains</a>
                            <a href="{{URL('components')}}" class="dropdown-item"> Manage Components</a>
                        </div>
                    </div>
                    <a href="{{URL('serviceproviders')}}" class="nav-item nav-link"><i class="bi bi-people"></i> Manage S-P's</a>
                    <a href="{{URL('clients')}}" class="nav-item nav-link"><i class="bi bi-people"></i> Manage Clients </a>
                    <a href="{{URL('requests')}}" class="nav-item nav-link"><i class="bi bi-layout-text-sidebar-reverse"></i>View Requests</a>
                    <a href="{{URL('order_services')}}" class="nav-item nav-link"><i class="bi bi-menu-down"></i>View Services</a>
                    <a href="{{URL('orders')}}" class="nav-item nav-link"><i class="bi bi-grid-1x2"></i>View Orders</a>
                    <a href="{{URL('feedbacks')}}" class="nav-item nav-link"><i class="bi bi-bar-chart-line"></i>View Feedbacks</a>
                </div>
            @elseif(Auth::user()->role=='Service-Provider')

                <div class="navbar-nav w-100">
                    <a href="{{URL('index1')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{URL('viewrequests')}}" class="nav-item nav-link"><i class="bi bi-layout-text-sidebar-reverse"></i>Job Requests</a>
                    <a href="{{URL('vieworders')}}" class="nav-item nav-link"><i class="bi bi-grid-1x2"></i>All Orders</a>
                    <a href="{{URL('viewfeedbacks')}}" class="nav-item nav-link"><i class="bi bi-bar-chart-line"></i>Feedbacks</a>
                </div>
                @else
                    <a> </a>
            @endif
        @endif
    </nav>
</div>
<!-- Sidebar End -->

