@extends('base')

@section('title', 'Register')

@section('content')

    <div class="content p-6 min-h-[100vh]">

        <h1 class="heading">Register</h1>

        @if (session('error'))
            <div class=" w-full my-6 justify-center flex">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative inline-block max-w-[180px]" role="alert">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <div>
      
            <div class="min-w-[314px]">               
                <a class=" text-black font-semibold hover:text-gray-900 flex items-center justify-center space-x-5 border rounded-full border-slate-400 shadow-xl bg-white text px-3 py-1" href="{{ route('auth.google.redirect') }}">
                    <svg class="mr-2" width="25px" height="25px" viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Google-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-401.000000, -860.000000)"> <g id="Google" transform="translate(401.000000, 860.000000)"> <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05"> </path> <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335"> </path> <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853"> </path> <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4"> </path> </g> </g> </g> </g></svg>
                    Sign up with Google
                </a>

                <p class="font-bold my-5">Or</p>
            </div>

            <form action="{{route('register.store')}}" method="POST" class="shadow-xl p-2 pt-5 border border-slate-200">
                @csrf
                <!-- Name field -->
                <div class="mb-8">
                    <label for="name" class="font-bold min-w-[90px] inline-block">Name: </label>
                    <input name="name" class="pl-2 py-0.5" value="{{ old('name') }}" />

                    @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- E-mail field -->
                <div class="mb-8">
                    <label for="email" class="font-bold min-w-[90px] inline-block">E-mail: </label>
                    <input name="email" class="pl-2 py-0.5" value="{{ old('email') }}" />

                    @error('email')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password field -->
                <div class="mb-8">
                    <label for="password" class="font-bold min-w-[90px] inline-block">Password: </label>
                    <input name="password" type="password" class="pl-2 py-0.5" value="{{ old('password') }}" />

                    @error('password')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password field -->
                <div class="mb-8">
                    <label for="password_confirmation" class="font-bold min-w-[90px] inline-block">Confirm Password: </label>
                    <input name="password_confirmation" type="password" class="pl-2 py-0.5"/>

                    @error('password_confirmation')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember me and Sign-Up link -->
                <div class="mb-8 flex justify-between text-sm font-medium">
                    <div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" class="rounded-sm border border-slate-400" name="remember">
                            <label for="remember">Remember Me!</label>
                        </div>
                    </div>

                    <div class="text-indigo-600 hover:underline">
                        <a href="{{ route('auth.create') }}">Login?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button class="w-full bg-green-600 hover:bg-green-800 font-bold text-white py-0.5">Register</button>
            </form>

        </div>
    </div>    

@endsection
