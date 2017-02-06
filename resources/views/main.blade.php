<!DOCTYPE html>
<html lang="en">
    <head>

        @include('partials._head')
        @yield('styles')
        
    </head>
    <body>

        @include('partials._nav')
        <div class="container">
    
            @yield('content')
            @include('partials._foot')
        </div><!-- end container -->
    </body>
</html>