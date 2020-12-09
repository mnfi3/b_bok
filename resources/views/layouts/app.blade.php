<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
</head>
<body class="rtl">
<div id="app">
    <div class='thetop'></div>
    @include('include.header')

    <main class="bg-texture">
        <div class="text-center py-2">
            <span style="font-size: 1.3em" class="alert alert-success p-1">ارسال رایگان <i class="fa fa-truck text-info"></i></span>
        </div>
        @yield('content')
    </main>
    @include('include.footer')
</div>
</body>
</html>
