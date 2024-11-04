<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.meta')
        <title>{{ config('app.name', 'Laravel') }}</title>
        @include('includes.style')
    </head>
    <body class="index-page">
        @include('includes.header')
        
        <main class="main">
            @yield('content')
        </main>

        @include('includes.footer')
        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        @include('includes.script')
        
    </body>
</html>
