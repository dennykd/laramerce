@extends('layouts.base-layout')
@section('base_head')
    <link rel="stylesheet" href="{{ asset('dist/css/_app.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('image/catalog/urban.png') }}" />
@endsection
@section('base_body')
    <div class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Register Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="" class="w-40" src="{{ asset('/image/catalog/urban.png') }}">
                    </a>
                    <div class="my-auto">
                        <img alt="" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            A few more clicks to
                            <br>
                            Register your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your
                            e-commerce accounts in one place</div>
                    </div>
                </div>
                <!-- END: Register Info -->
                <!-- BEGIN: Register Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div
                        class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <form action="{{ route('attempt_register') }}" method="POST">
                            @csrf
                            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                                Register
                            </h2>
                            <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to Register
                                your account. Manage all your e-commerce accounts in one place</div>
                            <div class="intro-x mt-8">
                                <div class="mt-4">
                                    <input type="text" name="name" class="intro-x form-control py-3 px-4"
                                        placeholder="Full Name">
                                    @error('name')
                                        <small class="text-xs text-red-500 ml-1 mt-1">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <input type="email" name="email" class="intro-x form-control py-3 px-4"
                                        placeholder="Email">
                                    @error('email')
                                        <small class="text-xs text-red-500 ml-1 mt-1">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <input type="text" name="phone" class="intro-x form-control py-3 px-4"
                                        placeholder="Phone Number (+62xxxxxxxx)">
                                    @error('phone')
                                        <small class="text-xs text-red-500 ml-1 mt-1">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <input type="text" name="address" class="intro-x form-control py-3 px-4"
                                        placeholder="Address">
                                    @error('address')
                                        <small class="text-xs text-red-500 ml-1 mt-1">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <input type="password" name="password" class="intro-x form-control py-3 px-4"
                                        placeholder="Password">
                                    @error('password')
                                        <small class="text-xs text-red-500 ml-1 mt-1">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <input type="password" name="password_confirm" class="intro-x form-control py-3 px-4"
                                        placeholder="Password Confirmation">
                                    @error('password_confirm')
                                        <small class="text-xs text-red-500 ml-1 mt-1">{{ '*' . $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <input id="redirect_login" name="redirect_login" type="checkbox"
                                        class="form-check-input border mr-2">
                                    <label class="cursor-pointer select-none" for="redirect_login">Login Dirrectly</label>
                                </div>
                                <a href="">Forgot Password?</a>
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit"
                                    class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                                <a href="{{ route('login') }}"
                                    class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Login</a>
                            </div>
                            <div class="intro-x mt-10 text-slate-600 dark:text-slate-500 text-center xl:text-left"> By
                                signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms
                                    and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy
                                    Policy</a> </div>
                        </form>

                    </div>
                </div>
                <!-- END: Register Form -->
            </div>
        </div>
    </div>
@endsection
