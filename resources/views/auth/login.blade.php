<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('imgs/logo-app.png') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Login</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('template/dist/css/app.css') }} " />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-40" src="{{ asset('imgs/logo-app.png') }}">
                        {{-- <span class="text-white text-lg ml-3"> Mid<span class="font-medium">One</span> </span> --}}
                    </a>
                    <div class="my-auto">
                        {{-- <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('imgs/logo.png') }}"> --}}
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Digital Invitation
                            <br>
                            Application
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">www.weddinginvitation.online</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign In
                        </h2>


                        
                        <form method="POST" action="{{ route('login') }}" id="login-form">
                            {{-- {{ csrf_field() }} --}}
                            @csrf
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Fashion Show</div>
                        @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif

                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                         @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                        @endif

                        <div class="intro-x mt-8">
                            <input name="username" type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Username">
                            <input name="password" type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password">
                        </div>
                        
                        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href="">Forgot Password?</a> 
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Login</button>
                            {{-- <a href="{{ route('register') }}"><button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign up</button></a> --}}
                        </div>
                        </form>
                        <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                            By signin up, you agree to our 
                            <br>
                            <a class="text-theme-1" href="">Terms and Conditions</a> & <a class="text-theme-1" href="">Privacy Policy</a> 
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('template/dist/js/app.js') }} "></script>
        <!-- END: JS Assets-->
    </body>
</html>