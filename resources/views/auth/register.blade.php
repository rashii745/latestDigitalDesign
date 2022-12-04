@include('includes.head')

<body>

@include('includes.header')

   @include('includes.navbar')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Register</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Register</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <x-slot name="logo">

                <a href="#">

                    <img class="img-fluid" src="{{asset('img/logo-3.png')}}" alt="Image" style="width: 120px; height: auto;">
                </a>

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

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- FirstName -->
                        <div>
                            <x-label for="first_name" :value="__('First Name')" />

                            <x-input id="first_name" class="form-control block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                        </div>

                        <!-- LastName -->
                        <div>
                            <x-label for="last_name" :value="__('Last Name')" />

                            <x-input id="last_name" class="form-control block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
                        </div>



                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Users role -->
                        <div  class="form-control block mt-4  w-full">
                            <x-label  for="role" :value="__('Role')" />

                            <input  type="radio" name="role" id="" value="Service-Provider" />
                            <label for="role">Service Provider</label>

                            <input class=" block mt-1 w-full" type="radio" name="role" id="" value="Client" />
                            <label for="role">Client</label>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-input id="password_confirmation" class="form-control block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">{{ __('Already registered?') }} </a>
                            <x-button class="ml-3" style="color:black!important;">{{ __('Register') }} </x-button>
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
