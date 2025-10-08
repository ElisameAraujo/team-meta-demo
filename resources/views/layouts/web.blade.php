<!doctype html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | Team Meta Demo</title>
    @vite(['resources/css/web.css', 'resources/js/web.js'])

</head>

<body>
    <div id="transition-overlay"></div>
    <div class="container-app">
        @yield('content')
    </div>
</body>

</html>