<!DOCTYPE doctype html>
<html lang="en">
    <head>
        <title>
            Task Manager
        </title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
            <!-- Bootstrap CSS -->
            <link href="vendor/simple-taskmanager/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <link href="vendor/simple-taskmanager/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
            <link href="vendor/simple-taskmanager/css/style.css" rel="stylesheet" type="text/css"/>
        </meta>
    </head>
    <body>
        @yield('content')
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="{{ asset('vendor/simple-taskmanager/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{ asset('vendor/simple-taskmanager/js/bootstrap.min.js')}}"></script>
       
    </body>
</html>