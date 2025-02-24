@extends('front.master')

@section('content')
<div class="main-body">
    <!-- page breadcrumbs -->
    <div class="breadcrumbs">
        <span>
            <a href="{{ route('home') }}" class="fa fa-home"></a>
        </span>
        {{-- <span class="bc-sep"></span>
        <span>
            <a href="{{ $course->industry->name }}">
            </a>
        </span> --}}
        <span class="bc-sep"></span>
        <span class="bc-current-page">{{ $course->name }}</span>
    </div>
    <!-- END page breadcrumbs -->

    @include('front/partials/alert')

    <!-- Page hero -->
    <div class="inner-page-hero" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1)), url({{ $course->cover ? asset('storage/'.$course->cover) : '/images/background1.webp' }});">
        <div class="container">
            <div class="ip-content-one">
                <span class="ip-heading">
                    <h3>{{ ucfirst($course->name) }} </h3>
                </span>
            </div>
            <div class="">
                {!! $course->banner_description !!}<br>
                <div class="col-md-4 col-sm-4 margin-bottom-40">
                    <a href="{{ route('contact') }}" class="btn btn-mod btn-cta btn-medium animation-one">
                        <span>Get Your Custom Offer</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End page hero -->

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 order-2" id="sticky-sidebar">
                <div class="sticky-top" style="padding-top: 50px">
                    <h5 class="text-center">Frequently Asked Questions</h5>

                    <div class="accordion shadow p-2 bg-light rounded" id="FAQ">
                        @forelse($faqs as $faq)
                            @php $faq_id = substr(str_replace(' ', '', $faq->title), 0, 12); @endphp
                            <h6 class="btn btn-sm text-danger" data-toggle="collapse" data-target="#F{{$faq_id}}" aria-expanded="true" aria-controls="F{{$faq_id}}" id="{{$faq_id}}">
                                {{$faq->title}}</a> <span class="has-child fa fa-chevron-down"></span>
                            </h6>

                            <div id="F{{$faq_id}}" class="collapse hide" aria-labelledby="{{$faq_id}}" data-parent="#FAQ">
                                <div class="faq-desc">
                                    {!! $faq->description !!}
                                </div>
                            </div>
                        @empty
                            <p>No FAQs added</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col" id="main">
                <!-- course description -->
                <div class="ip-course-desc">
                    <div class="ip-course-desc">
                        <div class="">
                            {!! $course->description !!}
                        </div>
                        <div>
                            <h6>COURSE LEVEL: <label>{{ $course->level }}</label></h6>
                        </div>
                        <div class="card">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 py-3">
                                        <h2 class="card-title h5">Who should attend?</h2>
                                        <p class="card-text">{!! $course->who_should_attend !!}</p>
                                        <div class="text-center px-5 mx-5">
                                        <a href="{{ route('contact') }}" class="btn btn-outline-danger btn-block">Get Your Custom Offer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="bg-danger">

                        <div>
                            {!! $course->outline !!}
                        </div>

                        <hr class="bg-danger">

                        <div>
                            {!! $course->module !!}
                        </div>

                        <hr class="bg-danger">

                        <div>
                            <h6>Course Administration Details:</h6>
                            {!! $course->adminstration_details !!}
                        </div>

                        <hr class="bg-danger">

                        <div>
                            <h6>DOWNLOADABLE DOCUMENTS:</h6>
                            <table class="table table-sm table-responsive table-striped ires-table tb-download">
                                @if($course->documents->count() > 0)
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                @endif
                                <tbody>
                                @forelse ($course->documents as $document)
                                    <tr>
                                        <td>{{ $document->id }}</td>
                                        <td>{{ $document->name }}</td>
                                        <td>
                                            <a class="td-reg-btn" href="#" data-toggle="modal" data-target="#popDownload" onclick="document.getElementById('document_id').value={{ $document->id }}">
                                                Download
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            No documents uploaded
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <ul>
                                @foreach ($course->trainers as $trainer)
                                    <li>
                                        <b>{{ $trainer->name }}</b>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <hr/>
                    <!-- (social) share -->
                    <div class="c-desc-share">
                        <!-- direct share -->
                        <div class="c-desc-btn">
                            <a class="btn" href="{{ route('contact') }}">
                                Get Your Custom Offer
                            </a>
                            <a class="btn" href="#" data-toggle="modal" data-target="#referFriend">Send to colleague</a>
                        </div>

                        <!-- download modal -->
                        <div class="modal fade" id="popDownload" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ route('course.document.download') }}" method="POST" class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Complete form to download</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        @csrf

                                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                                        <input type="hidden" name="document_id" id="document_id">

                                        <div class="form-group">
                                            <small class="form-text text-muted">Full Name</small>
                                            <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name', @$course->name) }}" required>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Phone Number</small>
                                                <input type="tel" class="form-control" placeholder="Phone Number" name="phone" value="{{ old('phone', @$customer->phone) }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Email Address</small>
                                                <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email', @$customer->account->email) }}" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Organization</small>
                                                <input type="text" class="form-control" placeholder="organization" name="organization" value="{{ old('organization', @$customer->company->name) }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Designation</small>
                                                <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{ old('designation', @$customer->designation) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Download</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- referral modal -->
                        <div class="modal fade" id="referFriend" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ route('course.referral', $course) }}" method="POST" class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >Send to Colleague</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @csrf

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Full Name</small>
                                                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Email Address</small>
                                                <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small class="form-text text-muted">Your message</small>
                                            <textarea class="form-control" id="courseEnquiry" rows="3" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- social share -->
                        <div class="c-desc-social">
                            <p>Share this course:<br/></p>
                            <a class="fb" href="http://www.facebook.com/sharer.php?u={{ route('course.show', $course) }}" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a class="tw" href="https://twitter.com/share?url={{ route('course.show', $course) }}" target="_blank" title="Share on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a class="in" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('course.show', $course) }}" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a class="wa" href="https://wa.me/?text={{ route('course.show', $course) }}" target="_blank" title="Share on WhatsApp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- END (social) share -->

                </div>
            </div>
        </div>

        <!-- other applicants section -->
        @php
            $course_bookings = App\CourseBooking::whereCourseId($course->id)->when(Auth::check() and Gate::check('customer'), function ($query) {
                $query->whereHas('customer', function ($query) {
                    $query->where('id', '<>', App\Customer::whereUserId( Auth::id() )
                    ->first()->id);
                });
            })->with('customer')->inRandomOrder()->take(5)->get();
        @endphp

        @if ( $course_bookings->count() > 0 )
            <div class="c-desc-applicants c-desc-extra" id="">
                <div class="ip-inner-header">
                    <h4>Other people who have applied for this course</h4>
                    <hr/>
                </div>
                <!-- table -->
                <div>
                    <table class="table table-sm table-responsive table-striped ires-table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Organisation</th>
                            <th scope="col">Country</th>
                        </thead>
                        <tbody>
                        @foreach ($course_bookings as $course_booking)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>{{ ucfirst($course_booking->customer->designation ?? '') }}</td>
                                <td>{{ @$course_booking->customer->company->name ?? '' }}</td>
                                <td>{{ ucfirst($course_booking->customer->country ?? '') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <!-- END other applicants section -->
    </div>

</div>
@endsection
