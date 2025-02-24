@extends('front.master')
@section('content')
<div class="main-body">
  <div>
    <div id="carouselndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image:linear-gradient(rgba(255, 0, 0, 0.158),rgba(255, 0, 0, 0.158)), url('/images/bg1.webp')">
                <div class="carousel-caption d-md-block">
                    @include('front/partials/alert')

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h4>Please fix below errors</h4>
                            <ul style="list-style: none">
                                @foreach ($errors->all() as $error)
                                    <li><strong>Oh Snap! </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="ip-content-one">
                        <span class="ip-tagline">
                            <h1>{{ $page->subcategory->name }}</h1>
                            <hr/>
                        </span>
                        <p>{!!$page->banner_description!!}</p>
                        <span class="bc-btn">
                            <a class="btn theme-btn" href="#" data-toggle="modal" data-target="#submitEnquiry">
                                Download Course Catalogue
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END slider section -->
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                
                <h2 class="text-center">{{ $page->description_title }}</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="lead mb-0">
                            {!!$page->description!!}
                        </p>
                        <br>
                        <span class="bc-btn">
                            <a class="btn theme-btn" href="#" data-toggle="modal" data-target="#submitEnquiry">
                                Download Course Catalogue
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image Showcases-->
        <section class="showcase">
            <div class="container">
                <h2 class="text-center pt-5">BENEFITS</h2>
                <div class="row">
                    @foreach($page->features as $feature)
                        <div class="col-lg-4">
                            <div class="px-3 py-3 shadow bg-white rounded mx-auto mb-5 mb-lg-0">
                                <img class="img-fluid mb-3" src="{{asset('front/landing-page/images/gis-bg1.webp')}}" alt="gis course image" />
                                <h5>{{ $feature->title}}</h5>
                                <p class="font-weight-light mb-0">
                                {!! $feature->description !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="pt-3">
        @include('front.partials.learning-modes')
        </div>
        <!-- Testimonials-->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">INTRODUCING OUR TESTIMONIALS</h2>
                <p>
                    Don't just take our word for it. Hear from our delighted learners who have experienced
                    tremendous growth and success with our GIS and Remote Sensing courses
                </p>
                <div class="row">
                    @foreach($page->testimonials as $testimonial)
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{asset('storage/'.$testimonial->banner_image)}}" alt="..." />
                            <h5>{{ $testimonial->name_organization}}</h5>
                            <p class="font-weight-light mb-0">
                                {!!$testimonial->message!!}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="py-4">
            <div class="container">
                <h3 class="text-center">OUR RECENT CLIENTS</h3>

                <div class="slider">
                    <div class="slide-track">
                        @foreach(App\Company::where('status', 'Approved')->get() as $client)
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
        <!-- Call to Action-->

        <div class="ip-content">
          <div class="container"> 
                    <h2 class="mb-4 text-center">Ready to Upskill? Contact Us</h2>
                    @include('front.partials.contact_form')
                </div>
            </div>
</div>
</div>
<!-- submit enquiry modal -->
<div class="modal fade" id="submitEnquiry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('category.enquiry', $page->subcategory) }}" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Download Course Catalogue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <small class="form-text text-muted">Full Name</small>
                        <input type="text" class="form-control" placeholder="Full Name" name="full_name" value="{{ old('full_name', @$customer->name) }}" required>
                    
                        <small class="form-text text-muted">Email Address</small>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', @$customer->account->email) }}" required>

                        <small class="form-text text-muted">Phone</small>
                        <input type="phone" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone', @$customer->account->phone) }}" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Download</button>
            </div>
        </form>
    </div>
</div>
@endsection
