<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>
            @yield('title') | {{ config('app.name') }}
        </title>
        <!-- Favicon-->
        <link rel="icon" href="../../favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="{{ asset('backoffice/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="{{ asset('backoffice/assets/plugins/node-waves/waves.css') }}" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="{{ asset('backoffice/assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="{{ asset('backoffice/assets/css/style.css') }}" rel="stylesheet">
    </head>

    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">{{ config('app.name') }}</a>
            </div>
            <div class="card">
                <div class="body">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="{{ asset('backoffice/assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Core Js -->
        <script src="{{ asset('backoffice/assets/plugins/bootstrap/js/bootstrap.js') }}"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="{{ asset('backoffice/assets/plugins/node-waves/waves.js') }}"></script>

        <!-- Validation Plugin Js -->
        <script src="{{ asset('backoffice/assets/plugins/jquery-validation/jquery.validate.js') }}"></script>

        <!-- Custom Js -->
        <script src="{{ asset('backoffice/assets/js/admin.js') }}"></script>
        <script src="{{ asset('backoffice/assets/js/pages/examples/sign-in.js') }}"></script>
        
        @php
            $reCaptha_key = '6LehW9kZAAAAAI4UG1VFBtqvd4GtjAh-fcjv6rD1';
        @endphp
        
        <script src="https://www.google.com/recaptcha/api.js?render={{ $reCaptha_key }}"></script>

        <script>
                
            function onSubmit(e) {
                e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute( @json($reCaptha_key), {action: 'submit'}).then(function(token) {
                        
                        e.target.submit()
                    });
                });
            }
            
            jQuery(document).ready( function ($) {
                
                $('form[method="post"]').submit(onSubmit)
            })
        </script>
    </body>

</html>