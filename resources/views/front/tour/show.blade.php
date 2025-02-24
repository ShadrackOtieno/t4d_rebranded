@extends('front.master')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <span class="bc-sep"></span>
                <span>
                    <a href="{{ route('tour.index') }}">
                        All Tours
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">{{ $tour->name }}</span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>{{ $tour->name }}</h3>
                        </span>
                    </div>
                    <div class="ip-inner-header">
                        <h3>Book tour</h3>
                        <a class="btn btn-success" href="{{ route('tour.booking.create', $tour) }}">
                            Book Tour
                        </a>
                    </div>
                    <!-- course description -->
                    <div class="ip-course-desc">
                        <!-- Tabs Section -->
                        <div>
                            <nav>
                                <div class="nav nav-tabs ip-cdesc-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-cdesc-tab" data-toggle="tab" href="#nav-cdesc" role="tab" aria-controls="nav-cdesc" aria-selected="true">Description</a>
                                    <a class="nav-item nav-link" id="nav-titn-tab" data-toggle="tab" href="#nav-titn" role="tab" aria-controls="nav-titn" aria-selected="false">Itinerary</a>
                                    <a class="nav-item nav-link" id="nav-tgal-tab" data-toggle="tab" href="#nav-tgal" role="tab" aria-controls="nav-titn" aria-selected="false">Gallery</a>
                                    <a class="nav-item nav-link" id="nav-cdld-tab" data-toggle="tab" href="#nav-cdld" role="tab" aria-controls="nav-cdld" aria-selected="false">Downloads</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-cdesc" role="tabpanel" aria-labelledby="nav-cdesc-tab">
                                    {!! $tour->description !!}
                                </div>
                                <div class="tab-pane fade" id="nav-titn" role="tabpanel" aria-labelledby="nav-titn-tab">
                                    {!! $tour->itinerary_desc !!}
                                    <a class="td-reg-btn" href="#" data-toggle="modal" data-target="#popItineraryDownload">
                                        Download Itinerary
                                    </a>
                                </div>
                                <div class="tab-pane fade" id="nav-tgal" role="tabpanel" aria-labelledby="nav-tgal-tab">
                                    @foreach ($tour->gallery as $image)
                                        <img class="tour-gallery-img" src="{{ asset('storage/'.$image->path) }}" alt="{{ "$tour->name gallery image" }}">
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="nav-cdld" role="tabpanel" aria-labelledby="nav-cdld-tab">
                                    <table class="table table-sm table-responsive table-striped ires-table tb-download">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tour->documents as $document)
                                                <tr>
                                                    <td>{{ $document->id }}</td>
                                                    <td>{{ $document->name }}</td>
                                                    <td>
                                                        <a class="td-reg-btn" href="#" data-toggle="modal" data-target="#popDownload" onclick="document.getElementById('document_id').value={{ $document->id }}">
                                                            Download
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <hr/>
                        <!-- (social) share -->
                        <div class="c-desc-share">
                            <!-- direct share -->
                            <div class="c-desc-btn">
                                <a class="btn" href="{{ route('tour.booking.create', $tour) }}">
                                    Book Tour
                                </a>
                                <a class="btn" href="#" data-toggle="modal" data-target="#submitEnquiry">Enquiry</a>
                                <a class="btn" href="#" data-toggle="modal" data-target="#referFriend">Send to colleague</a>
                            </div>

                            <!-- download document modal -->
                            <div class="modal fade" id="popDownload" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('tour.document') }}" method="POST" class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Complete form to download</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div> 

                                        <div class="modal-body">

                                            @csrf

                                            <input type="hidden" name="document_id" id="document_id">

                                            <div class="form-group">
                                                <small class="form-text text-muted">Full Name</small>
                                                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name', @$customer->name) }}" required>
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

                            <!-- download itinerary modal -->
                            <div class="modal fade" id="popItineraryDownload" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('tour.itinerary', $tour) }}" method="POST" class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Complete form to download</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            @csrf

                                            <input type="hidden" name="document_id" id="document_id">

                                            <div class="form-group">
                                                <small class="form-text text-muted">Full Name</small>
                                                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name', @$customer->name) }}" required>
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

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Download</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- END (social) share -->

                        <!-- submit enquiry modal -->
                        <div class="modal fade" id="submitEnquiry" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ route('tour.enquiry', $tour) }}" method="POST" class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Submit Enquiry</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @csrf

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Full Name</small>
                                                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name', @$customer->name) }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <small class="form-text text-muted">Email Address</small>
                                                <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email', @$customer->account->email) }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <small class="form-text text-muted">How can we help you?</small>
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

                        <!-- referral modal -->
                        <div class="modal fade" id="referFriend" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <form action="{{ route('tour.referral', $tour) }}" method="POST" class="modal-content">
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
                            <a class="fb" href="http://www.facebook.com/sharer.php?u={{ route('tour.show', $tour) }}" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a class="tw" href="https://twitter.com/share?url={{ route('tour.show', $tour) }}" target="_blank" title="Share on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a class="in" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('tour.show', $tour) }}" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a class="wa" href="https://wa.me/?text={{ route('tour.show', $tour) }}" target="_blank" title="Share on WhatsApp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </div>

                    </div>

                    @php
                        $other_tours = App\Tour::where([

                            ['id', '<>', $tour->id],
                            ['category_id', $tour->category_id],

                        ])->inRandomOrder()->take(4)->get();
                    @endphp

                    @if ( $other_tours->count() > 0 )

                        <!-- related tours section -->
                        <div class="c-desc-related c-desc-extra" id="">
                            <div class="ip-inner-header">
                                <h4>Other related tours</h4>
                                <hr/>
                            </div>
                            <!-- columns -->
                            <div class="row">
                                @foreach ($other_tours as $other_tour)

                                    <div class="col-sm-3 ip-sub-col">
                                        <div class="ip-sub-img-new">
                                            <a href="{{ route('tour.show', $other_tour) }}">
                                                <img src="{{ asset('storage/'.$other_tour->cover) }}">
                                            </a>
                                            <p>
                                                <a href="{{ route('tour.show', $other_tour) }}">
                                                    {{ $other_tour->name }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <!-- END related tours section -->

                    @endif

                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
