@extends('front.Projects.master')

@section('title', "Thank you for Registering")

@section('content')
<div class="main-body">
    <!-- page conainer -->
    <div>
        <!-- page breadcrumbs -->
        <div class="breadcrumbs pb-2 py-1 pl-5 bg-[#1ea19d] text-white">
            <span>
                <a href="{{ route('home') }}" class="fa fa-home"></a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
            <span>
                <a href="{{ route('course.show', $booking->course) }}">
                    {{ $booking->course->name }}
                </a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

            <span class="bc-current-page">
                Registration Feedback
            </span>
        </div>
        <!-- END page breadcrumbs -->

        <!-- page content md:ml-auto -->
        <div class="container-fluid top-area">
            <div class="row my3">
                <div class="section-inner mx8 py-5">
                    <div class="ip-inner-header">
                        <h1 class="font-bold text-[#00a651] text-3xl">Thank You For Choosing IRES!</h1>
                        <br class="ip-inner-header"/>
                    </div>
                    <p>Hello <span class="font-bold">{{ "$booking->salutation $booking->name" }}</span>, </p>&nbsp;
                    <p>Thank you for registering for the <span class="font-bold">{{ $booking->course->name }}.</span>
                        This is to confirm that we have received your registration.</p>&nbsp;
                    <p>We have sent the following documents for your attention as you prepare to attend.
                        Kindly check your email inbox/spam folder for:
                    </p>
                    <div class="md:mx-20">
                        <ul class="list-decimal px-8">
                            <li class="font-bold">A Payment Invoice.</li>
                            <li class="font-bold">A Pre-Training Evaluation Form.</li>
                            <li class="font-bold">An Invitation Letter.</li>
                        </ul>
                    </div>&nbsp;
                    <p>One of our agents will be in touch with you shortly.
                        For queries or requests for assistance, feel free to contact us via:</p>
                    <div class="mx5 md:mx-20">
                        <ul style="list-none">
                            <li><i class="fa fa-envelope"></i>Email: <a class="link text-[20px] md:text-2xl" href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a></li>
                            <li><i class="fa fa-phone"></i>Phone: <a class="link text-[20px] md:text-2xl" href="tel:+254715077817">+254 715 077 817</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-20 mx-auto">
            <div class="grid space-x-4 space-y-4">
                <!-- Section One -->
                <div class="mx-4 mb-[2em] float-left">
                    <!-- Section One content -->
                    <div class="header">
                        <h2 class="font-bold text-[#00a651] text-2xl">Follow Us</h2>
                    </div>
                    <p class="text-[1.2rem]">You can also check out our social media accounts to stay up to date:</p><br>
                    <div class="socials">
                        <a class="social social-facebook" href="https://www.facebook.com/indepthresearch" target="_blank" title="Like our Facebook Page">
                            <div class="front">
                                <i class="fab fa-facebook"></i>
                            </div>
                            <div class="back">
                                <i class="fab fa-facebook"></i>
                            </div>
                        </a>

                        <a class="social social-linkedin" href="https://www.linkedin.com/company/indepth-research-services" target="_blank" title="Follow Us on LinkedIn">
                            <div class="front">
                                <i class="fab fa-linkedin"></i>
                            </div>
                            <div class="back">
                                <i class="fab fa-linkedin"></i>
                            </div>
                        </a>

                        <a class="social social-x-twitter" href="https://twitter.com/Indepthresearch" target="_blank" title="Follow Us on X(Twitter)">
                            <div class="front">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <div class="back">
                                <i class="fab fa-twitter"></i>
                            </div>
                        </a>

                        <a class="social social-whatsapp" href="https://wa.me/254715077817" target="_blank" title="Text Us on WhatsApp">
                            <div class="front">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="back">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                        </a>

                        <a class="social social-instagram" href="https://www.instagram.com/indepthresearchinstitute/" target="_blank" title="Follow Us on Instagram">
                            <div class="front">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div class="back">
                                <i class="fab fa-instagram"></i>
                            </div>
                        </a>

                        <a class="social social-youtube" href="https://www.youtube.com/@indepthresearchinstitute" target="_blank" title="Subscribe to Our YouTube Channel">
                            <div class="front">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <div class="back">
                                <i class="fab fa-youtube"></i>
                            </div>
                        </a>

                        <a class="social social-tiktok" href="https://www.tiktok.com/@indepth_research" title="Follow Us on TikTok" target="_blank">
                            <div class="front">
                                <i class="fab fa-tiktok"></i>
                            </div>
                            <div class="back">
                                <i class="fab fa-tiktok"></i>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="fluid">
                        <a class="btna btn-sm btn-social-outline btn-fb-outline rounded-pill fs-6 m-0"
                            href="https://www.facebook.com/indepthresearch" target="_blank"
                            title="Like our Facebook Page">
                            <i class="fab fa-facebook-square" data-fa-transform="grow-2"> Like</i>
                        </a>
                        <a class="btna btn-sm btn-social-outline btn-tw-outline rounded-pill fs-6 m-0"
                            href="https://twitter.com/Indepthresearch" target="_blank"
                            title="Follow Us on X">
                            <i class="fab fa-twitter" data-fa-transform="grow-2"> Follow</i>
                        </a>
                        <a class="btna btn-sm btn-social-outline btn-in-outline rounded-pill fs-6 m-0"
                            href="https://www.linkedin.com/company/indepth-research-services"
                            target="_blank" title="Follow Us on LinkedIn">
                            <i class="fab fa-linkedin-in" data-fa-transform="grow-2"> Follow</i>
                        </a>
                        <a class="btna btn-sm btn-social-outline btn-wa-outline rounded-pill fs-6 m-0"
                            href="https://wa.me/254715077817" target="_blank"
                            title="Text Us on WhatsApp">
                            <i class="fab fa-whatsapp" data-fa-transform="grow-2"> Text</i>
                        </a>
                        <a class="btna btn-sm btn-social-outline btn-ig-outline rounded-pill fs-6 m-0"
                        href="https://www.instagram.com/indepthresearchinstitute/" target="_blank"
                        title="Follow Us on Instagram">
                        <i class="fab fa-instagram" data-fa-transform="grow-2"> Follow</i>
                        </a>
                        <a class="btna btn-sm btn-social-outline btn-yt-outline rounded-pill fs-6 m-0"
                        href="https://www.youtube.com/@indepthresearchinstitute" target="_blank"
                        title="Subscribe to Our YouTube Channel">
                        <i class="fab fa-youtube" data-fa-transform="grow-4"> Subscribe</i>
                        </a>
                        <a class="btna btn-sm btn-social-outline btn-tt-outline rounded-pill fs-6 m-0"
                        href="https://www.tiktok.com/@indepth_research" target="_blank"
                        title="Follow Us on TikTok">
                        <i class="fab fa-tiktok" data-fa-transform="grow-4"> Follow</i>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Section Two -->
        <div class="container my-20 mx-auto">
            <div class="grid space-x-4 space-y-4">
                <h3 class="font-bold text-[#00a651] text-2xl">Important Links</h3>
                <p class="text-[1.2rem]">You may also be interested in:</p>
                <div class="flex flex-wrap justify-start mx-auto mt-8 mb-4">
                    <a class="ires-primary-btn text-xl text-center" href="{{ route('previousprojects') }}">
                        Previous Projects <i class='fas fa-arrow-right'></i>
                    </a>&nbsp;
                    <a class="ires-primary-btn text-xl text-center" href="{{ route('faqs') }}">
                        FAQs <i class='fas fa-arrow-right'></i>
                    </a>&nbsp;
                    <a class="ires-primary-btn text-xl text-center" href="https://blog.indepthresearch.org/" target="_blank">
                        Industry Insights <i class='fas fa-arrow-right'></i>
                    </a>&nbsp;
                    <a class="ires-primary-btn text-xl text-center" href="{{ route('course.show', $booking->course) }}">
                        Back To Course <i class='fas fa-arrow-right'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END page container -->
</div>

@section('css')
{{-- This stylesheet serves elements on this page only --}}
<style>
    .section-inner {
        transform:
            perspective(800px)
            translate3d(0px, 0px, -250px)
            rotateX(30deg)
            scale(1.1, 1.1);
        border-radius: 20px;
        padding: 20px;
        font-size: 18px;
        border: 5px solid #e6e6e6;
        box-shadow: 0 70px 40px -20px rgba(0, 0, 0, 0.2);
        transition: 0.4s ease-in-out transform;
        background-color: rgba(255, 255, 255, 0.5);
        /* background-blend-mode: ; */
        &:hover {
            transform: translate3d(0px, 0px, -250px);
        }
    }
    .section-inner p, .section-inner li {
        font-size: 1.5rem;
    }
    /* link is a class for styling email & phone */
    .link {
        color: #1ea19d;
        font-weight: bold;
    }
    .link:hover {
        color: #00a651;
        font-weight: bolder;
        text-decoration: underline;
    }
    /* top-area defines the intro section for this page*/
    .top-area {
        background-image: url('{{ asset('images/back-image.webp') }}');
        background-size: cover;
        background-position: left;
        transition: background-position 1s;
        padding: 10px;
    }
    /* section-inner describes the part with text on the page */

    .tab {
        display: inline-block;
        margin-left: 40px;
        }
    .header .links {
        justify-content: space-between;
        color: #1ea19d;
        font-weight: bold;
        padding: 2px;
        margin-top: 2px;
        margin-bottom: 5px;
        display: block;
        font-size: 1.2rem;
    }
    .header .links:hover {
        color: #00a651;
        font-weight: bolder;
        text-decoration: underline;
    }
    .section-one {
        margin-bottom: 2em;
    }

    .section-two {
        border-radius: 8px;
        flex-grow: 1;
        border-style: outset;
        margin: 0 2em 2em 2em;
        height: 100%;
        box-shadow: 5px 5px 15px rgba(0.2, 0.3, 0.4, 0.9);
        background-image: url('{{ asset('images/sticky-note.webp') }}');
        background-size: fit;
        background-repeat: no-repeat;
        background-position: center;
    }

    .socials {
        padding: 0;
        margin: 0;
    }
    .socials a,a:visited { color: #fff; }
    .socials a:hover { color: #fff; }

    .social {
        float: left;
        margin: 1em 1em;
        width: 70px;
        height: 70px;
        display: block;
        text-align: center;
        line-height: 80px;
        color: #fff;
        position: relative;
        transform:rotateY(0deg);
        transition:transform .25s ease-out;
        transform-style:preserve-3d;
    }
    .social > div {
        width: 100px;
        height: 80px;
        /* background: #1ea19d; */
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
    }
    .social >.front {
        transform:translateZ(40px);
    }
    .social >.back {
        /* background: #3B5998;     */
        font-size: 3em;
        transform:rotateY(-100deg) translateZ(40px);
    }

    /*  Social Media Colors
    Facebook #3B5998
    Flickr #FE0883
    Foursquare #8FD400
    Google+ #C63D2D
    Instagram #4E433C
    Linkedin #4875B4
    Tumblr #2B4964
    Twitter #33CCFF
    Vimeo #86B32D
    Youtube #FF3333
    Dribbble #ea4c89
    */
    .social.social-x-twitter > .front { background: #000; }
    .social.social-x-twitter > .back { background: #000; color: #fff; }
    .social.social-whatsapp > .front { background: #25d366; }
    .social.social-whatsapp > .back { background: #25d366; color: #fff; }
    .social.social-instagram > .front { background: #4E433C; }
    .social.social-instagram > .back { background: #4E433C; color: #fff; }
    .social.social-github > .front, .back { background: #f3f3f3; color: #000; }
    .social.social-youtube > .front { background: #FF0000; }
    .social.social-youtube > .back { background: #FF0000; color: #fff; }
    .social.social-tiktok > .front { background: #fe2858; color: #000;}
    .social.social-tiktok > .back { background: #fe2858; color: #000;}
    .social.social-facebook > .front { background: #3B5998; }
    .social.social-facebook > .back { background: #3B5998; color: #fff; }
    .social.social-linkedin > .front { background: #4875B4; }
    .social.social-linkedin > .back { background: #4875B4; color: #fff; }
    /* .social.social-dribbble > .front, .back { background: #ea4c89; }

    /* Hover */
    .social:hover {
        transform: rotateY(100deg);
    }
</style>
@endsection

@endsection


{{-- <div class="container text-left">
    <h3>Course Information</h3>
    <p>Below is your course registration information as submitted:</p>
    <table class="table table-bordered">
        <tr>
            <td>Course</td>
            <td>{{ $booking->course->name }}</td>
        </tr>
        <tr>
            <td>Schedule</td>
            <td>
                <ul>
                    <li>Start: {{ date('F j Y', strtotime($booking->schedule->from)) }}</li>
                    <li>End: {{ date('F j Y', strtotime($booking->schedule->to)) }}</li>
                    @if ($booking->schedule->period)
                        <li>Period: {{ $booking->schedule->period }}</li>
                    @endif
                </ul>
            </td>
        </tr>
        <tr>
            <td>Mode of Learning</td>
            <td>
                @switch($booking->schedule_type)

                    @case('App\PhysicalClass')
                        Face to Face
                        @break

                    @case('App\VirtualClass')
                        Virtual
                        @break

                @endswitch
            </td>
        </tr>
    </table>

    <h5>Personal Information</h5>

    <table class="table table-bordered">
        <tr>
            <td>Name</td>
            <td>{{ "$booking->salutation $booking->name" }}</td>
        </tr>
        <tr>
            <td>Personal E-mail</td>
            <td>{{ $booking->personal_email }}</td>
        </tr>
        <tr>
            <td>Work E-mail</td>
            <td>{{ $booking->work_email }}</td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>{{ $booking->phone ?? '' }}</td>
        </tr>
        <tr>
            <td>Country</td>
            <td>{{ $booking->country ?? '' }}</td>
        </tr>
        <tr>
            <td>Designation</td>
            <td>{{ $booking->designation ?? ''}}</td>
        </tr>
        <tr>
            <td>Company</td>
            <td>{{ $booking->company->name ?? ''}}</td>
        </tr>
    </table>

    <h5>Approving Authority</h5>

    @if ( $booking->approvedAuthority )
        <table class="table table-bordered">
            <tr>
                <td>Name</td>
                <td>{{ $booking->approvedAuthority->name ?? ''}}</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>{{ $booking->approvedAuthority->email  ?? ''}}</td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>{{ $booking->approvedAuthority->phone  ?? ''}}</td>
            </tr>
            <tr>
                <td>Company</td>
                <td>{{ $booking->approvedAuthority->company->name  ?? ''}}</td>
            </tr>
            <tr>
                <td>Designation</td>
                <td>{{ $booking->approvedAuthority->designation  ?? ''}}</td>
            </tr>
        </table>
    @else
        <table class="table table-bordered">
            <tr>
                <td colspan="2">
                    No approving authority
                </td>
            </tr>
        </table>
    @endif

    <h5>Participants</h5>

    <table class="table table-bordered">
        @forelse ($booking->participants as $participant)
            <tr>
                <td colspan="2">
                    {{ $loop->iteration }}
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $participant->name }}</td>
            </tr>
            <tr>
                <td>E-mail Address</td>
                <td>{{ $participant->email }}</td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>{{ $participant->phone }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">
                    No participants
                </td>
            </tr>
        @endforelse
    </table>

    <h5>Recommended Tours</h5>

    <table class="table table-bordered">
        @forelse ($booking->tours as $tour)
            <tr>
                <td colspan="2">
                    {{ $loop->iteration }}
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $tour->name }}</td>
            </tr>
            <tr>
                <td>Participants</td>
                <td>{{ $tour->pivot->participants }}</td>
            </tr>
            <tr>
                <td>Cost per Person</td>
                <td>
                    {{ $booking->currency_code }} {{ number_format($tour->pivot->cost) }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">
                    No tours
                </td>
            </tr>
        @endforelse
    </table>

    <h5>Recommended Software</h5>

    <table class="table table-bordered">
        @forelse ($booking->software as $software)
            <tr>
                <td colspan="2">
                    {{ $loop->iteration }}
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $software->name }}</td>
            </tr>
            <tr>
                <td>Licenses</td>
                <td>{{ $software->pivot->licenses }}</td>
            </tr>
            <tr>
                <td>Cost per License</td>
                <td>{{ $software->pivot->cost ? 'Price will be invoiced' : number_format($software->cost) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">
                    No software
                </td>
            </tr>
        @endforelse
    </table>

    <h5>Payment Details</h5>

    <table class="table table-bordered">
        <tr>
            <td>Payment Method</td>
            <td>{{ ucfirst($booking->payment_method) }}</td>
        </tr>
        <tr>
            <td>
                Training Cost
            </td>
            <td>
                {{ $booking->currency_code }} {{ number_format($booking->booking_cost) }}
            </td>
        </tr>
        <tr>
            <td>Tour Cost</td>
            <td>
                {{ $booking->currency_code }} {{ number_format($booking->tours_cost) }}
            </td>
        </tr>
        <tr>
            <td>Software Cost</td>
            <td>
                {{ $booking->currency_code }} {{ number_format($booking->software_cost) }}
            </td>
        </tr>
        <tr>
            <td>VAT</td>
            <td>
                {{ "{$booking->tax_percentage}%" }}
            </td>
        </tr>
        <tr>
            <td>Total</td>
            <td>
                {{ $booking->currency_code }} {{ number_format($booking->total_cost) }}
            </td>
        </tr>
    </table>
</div> --}}
{{-- </div> --}}
<!-- END page content -->
