@include('includes.head')

<body>

@include('includes.header')

   @include('includes.navbar')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Login</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">login</p>
        </div>
    </div>
</div>
<!-- Page Header End -->



<!-- Loging Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <x-slot name="logo">

                <a href="#"><img class="img-fluid" src="{{asset('img/logo-3.png')}}" alt="Image" style="width: 120px; height: auto;"></a>

            </x-slot>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-4 mb-5"></div>
            <div class="col-lg-4 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <div class="logo" style="text-align: center;">
                        <a href="#">

                            <img class="img-fluid" src="{{asset('img/logo-3.png')}}" alt="Image" style="width: 120px; height: auto;">
                        </a>
                    </div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="control-group">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="control-group mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="form-control block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ml-3" style="color:black!important;">{{ __('Log in') }} </x-button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 mb-5"></div>
        </div>
    </div>
    <!-- Contact End -->


    @include('includes.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

@include('includes.scripts')
</body>

</html>
