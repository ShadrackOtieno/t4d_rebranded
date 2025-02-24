<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title') - Tech For Development (T4D)</title>
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('front/Projects/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('src/output.css') }}">
    <link rel="shortcut icon" href="{{ asset('front/assets/img/logo/t4d_logo.png') }}" type="image/x-icon">

    <!-- Custom CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        body { font-family: 'Poppins'; scroll-behavior: smooth; }
        .body-full { background-image: url('/images/servicesbg.svg'); background-size: cover; background-attachment: fixed; }
        ul li ul.droplist { display: none; opacity: 1!important; }
        div ul li:hover .droplist { display: block; }

        /* Dropdown Rotation */
        .dropdown-btn { transition: transform 0.3s ease; }
        .toggle-icon.rotate { transform: rotate(180deg); }

        /* Fading Line List */
        .fading-line-list li {
            font-size: 14px;
            color: #0096FF;
            margin-bottom: 10px;
            position: relative;
            padding-left: 20px;
        }
        .fading-line-list li:before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 1px;
            width: 15px;
            background: linear-gradient(to left, #007b83, transparent);
        }
    </style>

    @yield('css')
    @stack('style')

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-539CZ5K" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- JSON-LD Schema Data -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [

            ]
        }
    </script>





</head>



<!-- GetButton.io widget -->
<script type="text/javascript">
    (function() {
        var options = {
            whatsapp: "(+254) 725 966 032", // WhatsApp number
            call_to_action: "Message us", // Call to action
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





<!-- GetButton.io widget -->
<script type="text/javascript">
    (function() {
        var options = {
            whatsapp: "+254725966032", // Wh2atsApp number
            call_to_action: "Message us", // Call to action
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


<body class="relative">
    <div class="w-full h-full body-full">
        @include('front.Projects.header')

        @yield('content')

        @include('front.Projects.footer')

        @include('front.Projects.backtop')
    </div>

    @yield('js_content')

    <script src="{{ asset('front/Projects/js/script.js') }}"></script>
    <script src="{{ asset('js/htmx.min.js') }}"></script>

    <script type="text/javascript">
        <!-- current year -->
        document.getElementById("currentYear").innerHTML = new Date().getFullYear();

        const XClose = document.querySelector('#X_box')
        const HOpen = document.querySelector('#H_box')
        const Menu = document.querySelector('#menu')

        XClose.addEventListener('click', e => {
            hideSeek(XClose, HOpen)

            Menu.classList.toggle('hidden')
        })

        HOpen.addEventListener('click', e => {
            hideSeek(XClose, HOpen)

            Menu.classList.toggle('hidden')
        })
    </script>

    {{-- script for header --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownContainers = document.getElementsByClassName("dropdown-btn");

            function handleHover(isDesktop) {
                for (var i = 0; i < dropdownContainers.length; i++) {
                    var dropdownContent = dropdownContainers[i].nextElementSibling;
                    var icon = dropdownContainers[i].querySelector(".toggle-icon");

                    // Remove any existing event listeners
                    dropdownContainers[i].removeEventListener("click", handleMobileClick);
                    dropdownContainers[i].removeEventListener("mouseenter", handleMouseEnter);
                    dropdownContainers[i].removeEventListener("mouseleave", handleMouseLeave);
                    dropdownContent.removeEventListener("mouseenter", handleMouseEnter);
                    dropdownContent.removeEventListener("mouseleave", handleMouseLeave);

                    if (isDesktop) {
                        // Hover for desktop
                        dropdownContainers[i].addEventListener("mouseenter", handleMouseEnter);
                        dropdownContainers[i].addEventListener("mouseleave", handleMouseLeave);
                        dropdownContent.addEventListener("mouseenter", handleMouseEnter);
                        dropdownContent.addEventListener("mouseleave", handleMouseLeave);
                    } else {
                        // Click for mobile
                        dropdownContainers[i].addEventListener("click", handleMobileClick);
                    }
                }
            }

            function handleMouseEnter() {
                var dropdownContent = this.nextElementSibling || this;
                var icon = this.querySelector(".toggle-icon") || dropdownContent.previousElementSibling.querySelector(".toggle-icon");

                closeOtherDropdowns(this);

                // Ensure the dropdown remains open
                dropdownContent.style.display = "block";
                if (icon) icon.classList.add("rotate");
                clearTimeout(dropdownContent.hideTimeout); // Clear any hide timeout that may be active
            }

            function handleMouseLeave() {
                var dropdownContent = this.nextElementSibling || this;
                var icon = this.querySelector(".toggle-icon") || dropdownContent.previousElementSibling.querySelector(".toggle-icon");

                // Delay closing the menu slightly to ensure smooth transitions
                dropdownContent.hideTimeout = setTimeout(function() {
                    if (!dropdownContent.matches(':hover') && !dropdownContent.previousElementSibling.matches(':hover')) {
                        dropdownContent.style.display = "none";
                        if (icon) icon.classList.remove("rotate");
                    }
                }, 200); // Adjusted delay for closing
            }

            // Mobile click event
            function handleMobileClick(event) {
                event.preventDefault(); // Prevent default action

                var dropdownContent = this.nextElementSibling;
                var icon = this.querySelector(".toggle-icon");

                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                    if (icon) icon.classList.remove("rotate");
                } else {
                    closeOtherDropdowns(this);
                    dropdownContent.style.display = "block";
                    if (icon) icon.classList.add("rotate");
                }
            }

            // Function to close all other dropdowns except the current one
            function closeOtherDropdowns(currentContainer) {
                for (var i = 0; i < dropdownContainers.length; i++) {
                    var container = dropdownContainers[i];
                    var dropdownContent = container.nextElementSibling;
                    var icon = container.querySelector(".toggle-icon");

                    if (container !== currentContainer && dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                        if (icon) icon.classList.remove("rotate");
                    }
                }
            }

            // Initialize the correct behavior based on screen size
            handleHover(window.innerWidth >= 1024);

            // Adjust behavior on screen resize
            window.addEventListener("resize", function() {
                handleHover(window.innerWidth >= 1024);
            });
        });


    </script>

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
    <script src="{{ asset('front/landing-page/home.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>
