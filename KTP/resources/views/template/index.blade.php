<!DOCTYPE html>
<!--
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/
-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="" name="description" />
        <meta content="webthemez" name="author" />
        <title>Sistem Pelaporan KTP</title>
        <!-- Bootstrap Styles-->
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
            <!-- FontAwesome Styles-->
        <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
            <!-- Custom Styles-->
        <link href="{{ asset('assets/css/custom-styles.css') }}" rel="stylesheet" />


        <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" />

        <!-- Google Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        @stack('style')
    </head>
    <body>
    <div id="wrapper">
        @yield('body')
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->

    <!-- jQuery Js -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
        <!-- Bootstrap Js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    

    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

    @if (Session::has('typeToast') && Session::has('messageToast'))
        <script>
            toastr.options = {
                closeButton : true
            }
            var type = "{{ Session::get('typeToast', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('messageToast') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messageToast') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messageToast') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messageToast') }}");
                    break;
            }
        </script>
    @endif

    @stack('script')

    </body>
</html>
