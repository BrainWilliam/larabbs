<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title> @yield('title','laraBBS') -Laravel官网BBS系统 </title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <meta name="csrf_token" content="{{csrf_token()}}">
        @yield('styles')
        <meta name="description" content="@yield('description','BBS论坛')">
    </head>
    <body>
        <div id='app' class="{{route_class()}}-page">
            @include('layouts/_header')
                <div class="container">
                    @include('layouts._message')
                    @yield('content')
                </div>
            @include('layouts/_footer')
        </div>
        <script src="{{asset('js/app.js')}}">
        </script>
         @yield('scripts')
    </body>
</html>
