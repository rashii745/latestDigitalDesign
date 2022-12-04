<!-- Navbar Start -->

<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="{{URL('index1')}}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        @if(Auth::user())
            @if(Auth::user()->role=='Service-Provider')

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">{{Auth::user()->first_name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="{{URL('serviceproviderprofile')}}" class="dropdown-item">My Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                   this.closest('form').submit();">
                                {{('Log Out')}}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            @elseif(Auth::user()->role=='Admin')
               {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notification</span>
                    </a>
                </div>--}}
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                    {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            @else
               <a></a>
            @endif
        @endif
    </div>
</nav>



