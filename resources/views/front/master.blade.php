<!DOCTYPE html>
<html>

<!-- head -->

<head>

    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->

    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    {{-- <link rel="canonical" href="{{ request()->root() }}" /> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta http-equiv='content-language' content='en-gb'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- <meta name="google-site-verification" content="Zp7Bf_yFVll2Fn5SXqybm3tq9xD_L81GIqGmqJImhwU" /> --}}



    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/3e5f9a0a23.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@700&display=swap"
        rel="stylesheet">

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/bootstrap/css/bootstrap.min.css') }}">

    <!-- main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/mainstyle.css') }}">

    <style>
        div.dataTables_wrapper div.dataTables_processing {
            top: 0;
        }
    </style>

    <!-- slick carousel CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/landing-page/home.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    @yield('css')

    <!-- override css -->
    <style>
        .breadcrumbs a {
            color: white;
            text-decoration: none;
        }

        .nav.nav-tabs {
            flex-wrap: nowrap;
            overflow-x: auto;
        }

        .red {
            color: #00a651;
        }

        .scroll-menu {
            overflow-y: auto;
            height: 100vh
        }

        @media (max-width: 767px) {

            .tb-social-tel a {
                padding-left: 2px !important;
                font-size: 12px !important;
            }
        }
    </style>



</head>
<!-- END head -->





@if (request()->getHttpHost() == config('domains.rwanda'))
    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/5145253.js"></script>
    <!-- End of HubSpot Embed Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142371933-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-142371933-6');
    </script>

    <!-- GetButton.io widget -->
    <script type="text/javascript">
        (function() {
            var options = {
                whatsapp: "(+250) 780 945 790", // WhatsApp number
                // call_to_action: "Message us", // Call to action
                position: "left", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol,
                host = "getbutton.io",
                url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function() {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /GetButton.io widget -->
@else
    <!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4641435.js"></script>
    <!-- End of HubSpot Embed Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142371933-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-142371933-5');
    </script>

    <!-- GetButton.io widget -->
    <script type="text/javascript">
        (function() {
            var options = {
                whatsapp: "+254725966032", // WhatsApp number
                // call_to_action: "Message us", // Call to action
                position: "left", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol,
                host = "getbutton.io",
                url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function() {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /GetButton.io widget -->
@endif

<!--body -->

<body>


    @include('front.partials.header')

    @yield('content')

    @include('front.partials.footer')
</body>
<!-- END body -->

{{-- @php
    $reCaptha_key = '6LehW9kZAAAAAI4UG1VFBtqvd4GtjAh-fcjv6rD1';
@endphp --}}

{{-- <script src="https://www.google.com/recaptcha/api.js?render={{ $reCaptha_key }}"></script> --}}

{{-- <script>
    function onSubmit(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute(@json($reCaptha_key), {
                action: 'submit'
            }).then(function(token) {

                e.target.submit()
            });
        });
    }

    jQuery(document).ready(function($) {

        $('form[method="post"]').submit(onSubmit)

        $('.ires-header .navbar-toggler').click(function() {
            $('.ires-header').toggleClass('scroll-menu')
        })
    })
</script> --}}
@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2').select2({
            placeholder: "Select",
            allowClear: true
        });

    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('front/landing-page/home.js') }}"></script>

</html>
