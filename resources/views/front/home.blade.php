@extends('front.master')
@section('content')
<div class="main-body">
    <!-- slider section -->
    <div id="carouselndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselndicators" data-slide-to="1"></li>
            <li data-target="#carouselndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image:linear-gradient(rgba(255, 0, 0, 0.158),rgba(255, 0, 0, 0.158)), url('/images/light-bulb.webp')">
                <div class="carousel-caption d-md-block">
                    <div class="ip-content-one">
                        <span class="ip-tagline">
                            <h1 style="color: white;">Industry Solutions</h1>
                            <hr class="ip-tagline" style="align-items: left;" />
                        </span>
                        <span class="ip-heading">
                            <p style="color: white; font-size:24px !important;">Empower your future with IRES through our innovative industry solutions.</p>
                        </span>
                        <span class="bc-btn">
                            <a class="btn bc-btn btn-primary rounded-pill px-5 fs-6 m-0" href="{{  route('sector') }}">
                                Learn More
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: linear-gradient(rgba(255, 0, 0, 0.158),rgba(255, 0, 0, 0.158)), url('/images/backround.webp')">
                <div class="carousel-caption d-md-block">
                    <div class="ip-content-one">
                        <span class="ip-tagline">
                            <h2 style="color: white;">Our Capabilities</h2>
                            <hr class="ip-tagline" style="align-items: left;" />
                        </span>
                        <span class="ip-heading">
                            <p style="color: white; font-size:24px !important;">We utilize an integrated approach to help you achieve your objectives.</p>
                        </span>
                        <span class="bc-btn">
                            <a class="btn bc-btn btn-primary rounded-pill px-5 fs-6 m-0" href="{{ route('capability') }}">
                                Learn More
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: linear-gradient(rgba(255, 0, 0, 0.158),rgba(255, 0, 0, 0.158)), url('/images/back.webp')">
                <div class="carousel-caption d-md-block">
                    <div class="ip-content-one">
                        <span class="ip-tagline">
                            <h2 style="color: white;">Intake Programs</h2>
                            <hr class="ip-tagline" style="align-items: left;" />
                        </span>
                        <span class="ip-heading">
                            <p style="color: white; font-size:24px !important;">Elevate yourself through tailor-made innovative training programs.</p>
                        </span>
                        <span class="bc-btn">
                            <a class="btn bc-btn btn-primary rounded-pill px-5 fs-6 m-0" href="{{ route('course.category.index') }}">
                                Browse Programs
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider -->

        <a class="carousel-control-prev" href="#carouselndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- END slider section -->

    @include('front.partials.services-section')

    <!-- featured courses -->
    <div class="container my-5">
        <div class="ip-tagline">
            <h3>Popular Courses at IRES</h3>
            <hr class="ip-inner-header" />
            <p>Whether you're looking to enhance leadership capabilities, elevate communication strategies, or cultivate a culture of innovation within your team, our tailored programs are crafted to deliver tangible and lasting results.</p>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                        <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                        <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row equal">
                                @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                <div class="col-lg-3 col-md-3 mb-3 d-flex align-items-stretch">
                                    <div class="card">
                                        <a href="{{ route('course.show', $course) }}">
                                            <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                        </a>
                                        <div class="card-body d-flex flex-column">
                                            <a href="{{ route('course.show', $course) }}">
                                                <h5 class="card-title">{{ $course->name }}</h5>
                                            </a>
                                        </div>
                                        <div class="row" style="padding-left: 5px; padding-bottom: 10px;">
                                            <div class="col-auto" style="align-content: space-around; align-items: center;">
                                                <a href="{{ route('course.show', $course) }}" class="btn btn-primary text-center text-white mt-auto align-self-start rounded-pill fs-6 m-0">
                                                    Details &amp; Registration
                                                </a>
                                                <a class="btn btn-primary rounded-pill text-white wishlist-button" data-toggle="modal" title="Add to Wishlist" data-target="#wishlist" data-course-id="{{ $course->id }}" data-course-name="{{ $course->name }}">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>                               
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- new -->
                        <div class="carousel-item">
                            <div class="row equal">
                                @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                <div class="col-lg-3 col-md-3 mb-3 d-flex align-items-stretch">
                                    <div class="card">
                                        <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                        <div class="card-body d-flex flex-column">
                                            <a href="{{ route('course.show', $course) }}">
                                                <h5 class="card-title">{{ $course->name }}</h5>
                                            </a>
                                        </div>
                                        <div class="row" style="padding-left: 5px; padding-bottom: 10px;">
                                            <div class="col-auto" style="align-content: space-around; align-items: center;">
                                                <a href="{{ route('course.show', $course) }}" class="btn btn-primary text-center text-white mt-auto align-self-start rounded-pill fs-6 m-0">
                                                    Details &amp; Registration
                                                </a>
                                                <a class="btn btn-primary rounded-pill text-white wishlist-button" data-toggle="modal" title="Add to Wishlist" data-target="#wishlist" data-course-id="{{ $course->id }}" data-course-name="{{ $course->name }}">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- end -->
                        <div class="carousel-item">
                            <div class="row equal">
                                @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                <div class="col-lg-3 col-md-3 mb-3 d-flex align-items-stretch">
                                    <div class="card">
                                        <img src="{{ asset('storage/'.$course->cover) }}" class="card-img-top" alt="{{ $course->name }}">
                                        <div class="card-body d-flex flex-column">
                                            <a href="{{ route('course.show', $course) }}">
                                                <h5 class="card-title">{{ $course->name }}</h5>
                                            </a>
                                        </div>
                                        <div class="row" style="padding-left: 5px; padding-bottom: 10px;">
                                            <div class="col-auto" style="align-content: space-around; align-items: center;">
                                                <a href="{{ route('course.show', $course) }}" class="btn btn-primary text-center text-white mt-auto align-self-start rounded-pill fs-6 m-0">
                                                    Details &amp; Registration 
                                                </a>
                                                <a class="btn btn-primary rounded-pill text-white wishlist-button" data-toggle="modal" title="Add to Wishlist" data-target="#wishlist" data-course-id="{{ $course->id }}" data-course-name="{{ $course->name }}">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>             
                        
                        @include('front.partials.wishlist')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- lead brief -->
    <div class="dark-bg-sec lead-brief">
        <div class="container">
            <span class="ip-tagline">
                <h2>Why Choose IRES?</h2>
                <hr class="ip-inner-header" />
                <p>Tech For Development(IRES) has a firm belief that every organization has a unique purpose only they can fulfill in this world.
                    We work with you in organizing your resources to exploit opportunities so that you can fulfill your purpose and realize full potential.</p>
            </span>
            <div class="row">
                <div class="col-sm-6">
                    <div class="lead-brief-c">
                        <img src="{{ asset('images/steptodown.webp') }}" class="img-central" alt="Integrated Expertise">
                        <br>
                        <h3>Integrated Expertise</h3>
                        <p>We combine our extensive industry experience with specialized professional services.
                            This unique approach refined by over 15 years if mastery enables us to equip professionals with essential and provide strategic insights and technical management solutions that drive organizational success.</p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="lead-brief-c">
                        <img src="{{ asset('images/inventory.webp') }}" class="img-central" alt="Proven Impact on Performance">
                        <br>
                        <h3>Proven Impact on Performance</h3>
                        <p>We offer consultancy-backed services that are designed to enhance performance and address real-world challenges.
                            Our track record showcases the tangible impact we’ve had on individuals and organizations alike.
                            These services empower professionals to apply newfound knowledge directly to their roles, resulting in enhanced productivity and sustainable growth.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="lead-brief-c">
                        <img src="{{ asset('images/Team Member.webp') }}" class="img-central" alt="Customized Industry Solutions">
                        <br>
                        <h3>Customized Industry Solutions</h3>
                        <p>Recognizing the distinct challenges and goals of every organization, we go beyond a one-size-fits-all approach.
                            This commitment to providing customized solutions guarantees that every client receives tailored technical and managerial services, addressing their challenges directly and effectively.</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="lead-brief-c">
                        <img src="{{ asset('images/pension.webp') }}" class="img-central" alt="Client-Centric Approach">
                        <br>
                        <h3>Client-Centric Approach</h3>
                        <p>At IRES, the satisfaction of our clients is paramount.
                            Our commitment goes beyond the service delivery; we offer 6 months post-service consultation period to ensure continued delivery and support.
                            This approach guarantees an impactful experience, reflecting our dedication to your long-term success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END lead brief  -->

    {{-- Client Testimonials   style="padding-top: 10px;"--}}
    <section id="testim" class="light-bg-sec testim container">
        <span class="ip-tagline">
            <h2>What Our Clients Say About Us</h2>
            <hr class="ip-inner-header" />
            <p>Don't take our word for it, here's what some of our clients had to say about us.</p>
        </span>
        <div class="wrap">
            <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
            <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
            <ul id="testim-dots" class="dots">
                <li class="dot active"></li>
                <li class="dot"></li>
                <li class="dot"></li>

            </ul>
            <div id="testim-content" class="cont">
                <div class="active">
                    <h2>Abubacarr Ceesay</h2>
                    <p>"I would like to express gratitude to the management of Tech For Developmentfor successfully organizing and hosting me for the Workshop on Report Writing Skills and Presentation Techniques.
                        I must say that for the first time in my over a decade of experience in overseas training, workshops, meetings, conferences, etc.
                        I had the best quality of a professional engagement derived from one-on-one sessions."</p>
                </div>
                <div>
                    <h2>Virgile Ngabo</h2>

                    <p>"Tech For Developmentis highly professional and I want to thank them for inculcating in me sustainability best practices through the climate finance workshop.
                        This will go a long way in helping me provide sustainable finance solutions."</p>
                </div>
                <div>
                    <h2>Bridget Tuei</h2>
                    <p>"The fraud and internal control training workshop I attended was very helpful.
                        Moreover, the facilitator was very engaging. I would highly recommend this course to colleagues because it is relevant to the day-to-day operations of organizations."</p>
                </div>

            </div>
        </div>
    </section>

    {{-- Alumni py-4 section --}}
    <div class="dark-bg-sec">
        <div class="container">
            <span class="ip-tagline">
                <h2>Our Alumni</h2>
                <hr class="ip-inner-header" />
            </span>

            <p>Our Alumni works in over 3,000 companies</p>

            <div class="slider">
                <div class="slide-track">
                    @foreach($clients as $client)
                    <div class="slide">
                        <img href="" src="{{asset('storage/'.$client->logo)}}" style="max-width:230px;
                            max-height:100px;
                            width: auto;
                            height: auto;" alt="" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://use.fontawesome.com/1744f3f671.js"></script>

</div>
@component('schema')
<style>
    .modal {
        z-index: 1050; /* Ensure it's above the navbar */
    }
    .modal-backdrop {
        z-index: 1040; /* Ensure the backdrop is below the modal */
    }

</style>


<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Indepth Research Institute",
    "url": "https://www.indepthresearch.org/",
    "logo": "https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+254715077817",
        "contactType": "Customer Service",
        "email": "outreach@indepthresearch.org"
    },
    "sameAs": [
        "https://twitter.com/Indepthresearch",
        "https://www.facebook.com/indepthresearch",
        "https://www.instagram.com/indepthresearchinstitute/",
        "https://www.linkedin.com/company/indepth-research-services",
        "https://www.youtube.com/@indepthresearchinstitute"
    ],
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "Tala Road, Off Kiambu Road, Runda",
        "addressLocality": "Nairobi",
        "addressCountry": "KE"
    }
}
</script>

@endcomponent

@endsection