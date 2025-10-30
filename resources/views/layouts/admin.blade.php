<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration | @yield('title')</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>

<body>
    {{-- @include('admin.partials.search-modal') --}}
    <div class="main-container">
        @include('components.admin.sidebar')
        <main>
            <div class="main-content">
                @include('components.admin.header')
                <div class="grid-default px-4 pb-3 gap-4">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>

</html>
