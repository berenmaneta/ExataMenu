<!doctype html>
<html>
<head>
    @include('includes.header')
    @include('includes.nav')
</head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('includes.navigation')

                <div class="container">
                    @yield('content')

                </div>


        </div>

    </body>


</html>

@include('includes.footer')