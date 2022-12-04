<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{URL('index')}}." class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Atiqa Abbasi</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{URL('index')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-bounding-box"></i>Manage Tool</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{URL('domains')}}" class="dropdown-item"><i class="bi bi-cast"></i> Manage Domains</a>
                    <a href="{{URL('subdomains')}}" class="dropdown-item"><i class="bi bi-collection"></i> Manage SubDomains</a>
                </div>
            </div>
            <a href="{{URL('serviceproviders')}}" class="nav-item nav-link"><i class="bi bi-people"></i> Manage S-P's</a>
            <a href="{{URL('clients')}}" class="nav-item nav-link"><i class="bi bi-people"></i> Manage Clients </a>
            <a href="{{URL('requests')}}" class="nav-item nav-link"><i class="bi bi-layout-text-sidebar-reverse"></i>View Requests</a>
            <a href="{{URL('order_services')}}" class="nav-item nav-link"><i class="bi bi-menu-down"></i>View Services</a>
            <a href="{{URL('orders')}}" class="nav-item nav-link"><i class="bi bi-grid-1x2"></i>View Orders</a>
            <a href="{{URL('feedbacks')}}" class="nav-item nav-link"><i class="bi bi-bar-chart-line"></i>View Feedbacks</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
<?php
