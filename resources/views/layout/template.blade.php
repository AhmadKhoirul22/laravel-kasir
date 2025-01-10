<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        @include('layout._css')
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        @include('layout._mobile')
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        @include('layout._top_bar')
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        @include('layout._nav')
        <!-- END: Top Menu -->
        <!-- BEGIN: Content -->
            <div class="content">
                    @yield('content')
            </div>


        <!-- END: Content -->
        <!-- BEGIN: JS Assets-->
        @include('layout._js')
        <!-- END: JS Assets-->
    </body>
</html>
