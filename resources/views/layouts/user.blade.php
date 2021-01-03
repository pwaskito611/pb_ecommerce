<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}}</title>
    @include('includes.style')
    @include('includes.js')
</head>
<body>
    @include('includes.header')
    @include('includes.navbar')
    @yield('content')
    @include('includes.newsletter')
    @include('includes.footer')    
</body>
</html>