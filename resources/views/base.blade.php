<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700"
        />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Poppins:300,400,700"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
            integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/js/app.js') }}">

        <!-- Link to the favicon icon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Alpine JavaScript Framework -->
        <script src="//unpkg.com/alpinejs" defer></script>

        @vite('resources/css/app.css')


        <title> @yield('title', 'MyRateVault') </title>

        {{-- blade-formatter-disable --}}
            <style type="text/tailwindcss">
                .nav-link {
                    @apply text-gray-700 hover:text-gray-900 font-semibold;
                }
            </style>
        {{-- blade-formatter-enable --}}

    </head>

    <body>

    <nav class="bg-gray-100 p-4 shadow-md top-0 z-10"
        x-data="{ open: false, dropdownOpen: false, lastScrollY: window.scrollY, sticky: false }"
        x-init="let scrollTimeout;
            window.addEventListener('scroll', () => {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    if (window.scrollY < lastScrollY || window.scrollY <= 0) {
                        sticky = true;
                    } else {
                        sticky = false;
                    }
                    lastScrollY = window.scrollY;
                }, 50);  // Debounce time of 50ms
            })"
        :class="{ 'sticky': sticky }"
    >
        <div class="container mx-auto flex justify-between items-center lg:hidden">
            <!-- Brand For Mobile View -->
            <a class="text-xl font-black text-gray-800 flex items-center border p-2 bg-slate-50" href="">
                <svg class="mr-2" width="25px" height="25px" viewBox="0 0 256.00 256.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" fill="#3276c3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill-rule="evenodd"> <path d="M142.842667,110.741333 L157.68,110.741333 L157.68,95.8986667 L142.842667,95.8986667 L142.842667,110.741333 Z M142.714667,88.48 L157.552,88.48 L157.552,73.6373333 L142.714667,73.6373333 L142.714667,88.48 Z M120.581333,66.2186667 L135.418667,66.2186667 L135.418667,51.376 L120.576,51.376 L120.576,66.2186667 L120.581333,66.2186667 Z M120.581333,88.48 L135.418667,88.48 L135.418667,73.6373333 L120.576,73.6373333 L120.576,88.48 L120.581333,88.48 Z M120.581333,110.741333 L135.418667,110.741333 L135.418667,95.8933333 L120.576,95.8933333 L120.576,110.736 L120.581333,110.741333 L120.581333,110.741333 Z M120.581333,133.002667 L135.418667,133.002667 L135.418667,118.16 L120.576,118.16 L120.576,132.997333 L120.581333,133.002667 Z M98.32,66.2133333 L113.162667,66.2133333 L113.162667,51.376 L98.32,51.376 L98.32,66.2186667 L98.32,66.2133333 Z M98.32,88.4746667 L113.162667,88.4746667 L113.162667,73.632 L98.32,73.632 L98.32,88.4746667 Z M98.32,110.736 L113.162667,110.736 L113.162667,95.8933333 L98.32,95.8933333 L98.32,110.736 Z M142.714667,66.2133333 L157.552,66.2133333 L157.552,51.376 L142.714667,51.376 L142.714667,66.2186667 L142.714667,66.2133333 Z M0,0 L127.536,256 L256,0 L0,0 Z" fill="#3276c3"> </path> </g> </g></svg>
                My Rate Vault
            </a>

            <!-- Toggler for mobile view -->
            <button class="block lg:hidden text-gray-500 focus:outline-none" @click="open = !open">
                <i class="fa fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Collapsible content -->
        <div class="lg:flex lg:items-center lg:space-x-4" :class="{ 'hidden': !open, 'block': open }">
            <div class="container mx-auto flex flex-col lg:flex-row lg:items-center lg:justify-between">

                <!-- Brand For Desktop View -->
                <a class="hidden lg:flex lg:items-center border p-2 bg-slate-50 text-xl font-black text-gray-800" href="">
                    <svg class="mr-2" width="30px" height="30px" viewBox="0 0 256.00 256.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" fill="#3276c3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill-rule="evenodd"> <path d="M142.842667,110.741333 L157.68,110.741333 L157.68,95.8986667 L142.842667,95.8986667 L142.842667,110.741333 Z M142.714667,88.48 L157.552,88.48 L157.552,73.6373333 L142.714667,73.6373333 L142.714667,88.48 Z M120.581333,66.2186667 L135.418667,66.2186667 L135.418667,51.376 L120.576,51.376 L120.576,66.2186667 L120.581333,66.2186667 Z M120.581333,88.48 L135.418667,88.48 L135.418667,73.6373333 L120.576,73.6373333 L120.576,88.48 L120.581333,88.48 Z M120.581333,110.741333 L135.418667,110.741333 L135.418667,95.8933333 L120.576,95.8933333 L120.576,110.736 L120.581333,110.741333 L120.581333,110.741333 Z M120.581333,133.002667 L135.418667,133.002667 L135.418667,118.16 L120.576,118.16 L120.576,132.997333 L120.581333,133.002667 Z M98.32,66.2133333 L113.162667,66.2133333 L113.162667,51.376 L98.32,51.376 L98.32,66.2186667 L98.32,66.2133333 Z M98.32,88.4746667 L113.162667,88.4746667 L113.162667,73.632 L98.32,73.632 L98.32,88.4746667 Z M98.32,110.736 L113.162667,110.736 L113.162667,95.8933333 L98.32,95.8933333 L98.32,110.736 Z M142.714667,66.2133333 L157.552,66.2133333 L157.552,51.376 L142.714667,51.376 L142.714667,66.2186667 L142.714667,66.2133333 Z M0,0 L127.536,256 L256,0 L0,0 Z" fill="#3276c3"> </path> </g> </g></svg>
                    My Rate Vault
                </a>

                <!-- Navigation links -->
                <ul class="flex flex-col space-y-4 items-center lg:flex-row lg:space-x-6 lg:space-y-0">
                    
                    <li>
                        <a class="nav-link" href="{{ route('movies.index') }}">
                            Trending
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('my-movies.index') }}">
                            My Vault
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('movies.liked')}}">
                            Liked
                        </a>
                    </li>

                    <!-- Dropdown -->
                    <li class="relative">
                        <a class="text-gray-700 hover:text-gray-900 flex items-center space-x-2 cursor-pointer"
                            @click="dropdownOpen = !dropdownOpen">
                            @auth
                                @if (auth()->user()->google_avatar)
                                    <!-- Display user's Google avatar if available -->
                                    <img src="{{ auth()->user()->google_avatar }}" 
                                        alt="User Avatar" 
                                        class="w-8 h-8 rounded-full">
                                @else
                                    <!-- Display Font Awesome icon if Google avatar is not available -->
                                    <i class="fa fa-user-circle text-xl"></i>
                                @endif
                            @else
                                <!-- Display Font Awesome icon if user is not authenticated -->
                                <i class="fa fa-user-circle text-xl"></i>
                            @endauth
                            <svg width="15px" height="15px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>drop-down</title> <desc>Created with sketchtool.</desc> <g id="directional" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="drop-down" fill="#000000"> <polygon id="Shape" points="5 8 12 16 19 8"> </polygon> </g> </g> </g></svg>                            
                        </a>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20" x-show="dropdownOpen" @click.away="dropdownOpen = false">
                            
                            @guest
                                
                                    <a class="text-gray-700 hover:text-gray-900 flex items-center justify-center space-x-5 bg-white text px-3 py-1" href="{{ route('auth.create') }}">
                                        <svg class="mr-4" width="20px" height="20px" viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Google-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-401.000000, -860.000000)"> <g id="Google" transform="translate(401.000000, 860.000000)"> <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05"> </path> <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335"> </path> <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853"> </path> <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4"> </path> </g> </g> </g> </g></svg>
                                        Login
                                    </a>
                                    <a class="text-gray-700 hover:text-gray-900 flex items-center justify-center space-x-5 bg-white text px-3 py-1" href="{{ route('register.create') }}">
                                        <svg class="mr-1" width="20px" height="20px" viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Google-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-401.000000, -860.000000)"> <g id="Google" transform="translate(401.000000, 860.000000)"> <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05"> </path> <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335"> </path> <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853"> </path> <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4"> </path> </g> </g> </g> </g></svg>
                                        Register
                                    </a>
                            @else
                        
                                <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <span>{{auth()->user()->name}}</span>
                                </a>
                                <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="">
                                    Liked
                                </a>
                                <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="">
                                    My Vault
                                </a>
                                @if(Auth::user()->is_admin)
                                <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="">
                                    Admin
                                </a>                            
                                @endif

                                <form action="{{ route('auth.destroy') }}" method="POST" class="block px-4 py-2 text-red-600 hover:bg-gray-100">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" >
                                        Logout
                                    </button>
                                </form>

                            @endguest
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>


        @yield('content')

        <!-- The applications Footer -->
        <footer class="bg-white text-center font-semibold shadow-lg border border-t-2 mt-8">
            <div class="text-center p-3">
                © {{ now()->year }} Copyright: My Rate Vault
            </div>
        </footer>

    </body>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const currentUrl = window.location.pathname; // Get current URL path
            const navLinks = document.querySelectorAll('.nav-link'); // Select all nav-link elements
            
            navLinks.forEach(link => {
                const linkUrl = new URL(link.href, window.location.origin).pathname; // Get pathname of the link
                
                // Check if the link's path matches the current URL path
                if (linkUrl === currentUrl) {
                    link.classList.add('nav-link-active'); // Add active class
                }
            });
        });
    </script>

</html>
