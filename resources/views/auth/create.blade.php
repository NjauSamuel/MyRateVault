@extends('base')

@section('title', 'Login')

@section('content')

    <div class="content p-6">

        <h1 class="heading">Login</h1>

        @if (session('error'))
            <div class=" w-full my-6 justify-center flex">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative inline-block max-w-[180px]" role="alert">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <form action="{{route('auth.store')}}" method="POST">
            @csrf
            <div class="mb-8">
                <label for="email" class="font-bold min-w-[90px] inline-block">E-mail: </label>
                <input name="email" class="pl-2 py-0.5"/>

                @error('email')
                <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-8">
                <label for="password" class="font-bold min-w-[90px] inline-block">Password: </label>
                <input name="password" type="password" class="pl-2 py-0.5"/>

                @error('password')
                <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">

                <div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" class="rounded-sm border border-slate-400" name="remember">
                        <label for="remember">Remember Me!</label>
                    </div>
                </div>

                <div class="text-indigo-600 hover:underline">
                    <a href="#">Sign-Up?</a>
                </div>

            </div>

            <button class="w-full bg-green-600 hover:bg-green-800 font-bold text-white py-0.5">Login</button>

        </form>

    </div>

@endsection