<!-- footer -->
<!-- download calendars -->
<style>
    h4 {
        /* font-weight: 300; */
        display: inline-block;
        padding-bottom: 5px;
        position: relative;
    }

    h4:before {
        content: "";
        position: absolute;
        width: 50%;
        height: 1px;
        bottom: 0;
        left: 25%;
        border-bottom: 1px solid #fff;
    }

    .ires-footer-contact a {
        color: #fff;
        /* font-size: 18px; */
        text-decoration: none;

    }

    .ires-footer-contact i {
        /* font-size: 22px */
    }
</style>
@php
    $training_calendars = App\CourseCalendar::latest()->get();
@endphp

@if ($training_calendars->count() > 0)
    <div class="cl-dld-footer">
        <div class="container">
            <div class="cl-dld-fc">
                <h5>Download Training Calendar</h5>
                @foreach ($training_calendars as $calendar)
                    <a class="btn btn-success" href="{{ route('training_calendar.download.form', $calendar) }}">
                        <span class="fa fa-file-pdf-o"></span> {{ $calendar->year }} Calendar
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endif
<div class="breadcrumbs"></div>
<div class="ires-footer" style="background-color: #00a651;">
    <div class="container">
        <!-- main footer elements -->
        <div class="row">
            <div class="ires-footer-content col-md-6 col-lg-3">
                <h4 style="color: white;">Important Links</h4>
                <div class="ires-f-col-2">
                    <div class="ires-f-company">
                        <ul>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="https://blog.indepthresearch.org/" target="_blank">Industry Insights</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('faqs') }}">FAQs</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('our-venues') }}">Our Venues</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('previousprojects') }}">Previous Projects</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('training_calendar.index', ['year' => date('Y')]) }}">Training
                                    Calendar {{ date('Y') }}</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="ires-footer-content col-md-6 col-lg-3">
                <h4 style="color: white; text-align: left;">Opportunities</h4>
                <div class="ires-f-col-2">
                    <div class="ires-f-company">
                        <ul>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('careers') }}">Careers</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('careers') }}">Consultants</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('careers') }}">Internships</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('trainers') }}">Become a Trainer</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="ires-footer-content col-md-6 col-lg-3">
                <h4 style="color: white;">Partner with Us</h4>
                <div class="ires-f-col-4">
                    <div class="ires-f-about">
                        <ul>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('become-an-affiliate') }}">Become an Affiliate</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('become-an-agent') }}">Become an Agent</a></li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;
                                <a href="{{ route('partner-with-us') }}">Franchise with Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ires-footer-content col-md-6 col-lg-3">
                <h4 style="color: white;">Contact Us</h4>
                <div class="ires-f-col-1">
                    <div class="ires-footer-contact">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;
                                <a href="tel:+254715077817">(+254) 715077817</a></li>
                            <li><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;
                                <a href="tel:+254792516000">(+254) 792516000</a></li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;
                                <a href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a></li>
                            {{-- <li><i class="fa fa-globe" aria-hidden="true"></i><a href="https://www.indepthresearch.org/" > www.indepthresearch.org</a></li> --}}
                            <li><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;&nbsp;Tala Road, Off Kiambu Road,
                                Runda - Nairobi.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer bottom credits -->
<div class="ires-footer">
    <!-- <hr/> -->
    <div class="row">
        <div class="col-12 footer-links" style="text-align: center;">
            <small>
                Copyright &copy; 2003 - <span id="currentYear"></span>. Indepth Research Institute. All Rights Reserved.
                |
                <a href="{{ route('privacy-policy') }}">Data Privacy Policy</a> |
                <a href="{{ route('terms-and-conditions') }}">Terms and Conditions</a> |
                <a href="{{ route('sitemap') }}">Sitemap</a> |
            </small>
        </div>
    </div>
</div>

<!-- END footer -->


<!-- fixed header on scroll -->
<script>
    window.onscroll = function() {
        myFunction()
    };

    var header = document.getElementById("stickyMainNav");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky-main-nav");
        } else {
            header.classList.remove("sticky-main-nav");
        }
    }
</script>
<!-- END fixed header on scroll -->

<!-- current year -->
<script type="text/javascript">
    document.getElementById("currentYear").innerHTML = new Date().getFullYear();
</script>
<!-- END current year -->

<!-- tour testimonials -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".testimonial-carousel").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            arrows: true,
            prevArrow: $(".testimonial-carousel-controls .prev"),
            nextArrow: $(".testimonial-carousel-controls .next")
        });
    });
</script>
<!-- END tour testimonials -->

<!-- Bootstrap and Slick Carousel JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="{{ asset('front/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('front/assets/slick/slick.min.js') }}"></script>

@stack('script')
