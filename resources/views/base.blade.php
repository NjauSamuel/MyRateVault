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

        @vite('resources/css/app.css')


        <title> @yield('title', 'MyRateVault') </title>

    </head>

    <body>

        @yield('content')

    </body>
</html>
