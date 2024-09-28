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

        <!-- Alpine JavaScript Framework -->
        <script src="//unpkg.com/alpinejs" defer></script>

        @vite('resources/css/app.css')


        <title> @yield('title', 'MyRateVault') </title>

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
            <a class="text-xl font-black text-gray-800" href="">
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
                <a class="hidden lg:inline text-xl font-black text-gray-800" href="">
                    My Rate Vault
                </a>

                <!-- Navigation links -->
                <ul class="flex flex-col space-y-4 items-center lg:flex-row lg:space-x-6 lg:space-y-0">
                    @guest
                    <li>
                        <a class="text-gray-700 hover:text-gray-900" href="">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-700 hover:text-gray-900" href="">
                            Login
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-700 hover:text-gray-900" href="">
                            Register
                        </a>
                    </li>
                    @else
                    <li>
                        <a class="text-gray-700 hover:text-gray-900" href="#">
                            <i class="fa fa-bell text-xl"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-700 hover:text-gray-900" href="">
                            <i class="fa fa-shopping-cart text-xl"></i>
                        </a>
                    </li>

                    <!-- Dropdown -->
                    <li class="relative">
                        <a class="text-gray-700 hover:text-gray-900 flex items-center space-x-2 cursor-pointer"
                            @click="dropdownOpen = !dropdownOpen">
                            <i class="fa fa-user-circle text-xl"></i>
                            <svg width="15px" height="15px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>drop-down</title> <desc>Created with sketchtool.</desc> <g id="directional" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="drop-down" fill="#000000"> <polygon id="Shape" points="5 8 12 16 19 8"> </polygon> </g> </g> </g></svg>
                            <span>User Name</span>
                        </a>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20" x-show="dropdownOpen" @click.away="dropdownOpen = false">
                            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="">
                                Orders
                            </a>
                            @if(Auth::user()->is_admin)
                            <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="">
                                Admin
                            </a>
                            @endif
                            <a class="block px-4 py-2 text-red-600 hover:bg-gray-100" href="">
                                Logout
                            </a>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


        @yield('content')

    </body>
</html>
