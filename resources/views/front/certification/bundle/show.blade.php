@extends('front.master')

@section('title', "$bundle->name | Certification Bundles")

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
                    <a href="{{ route('certification.bundle.index') }}">
                        Certification Bundles
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">{{ $bundle->name }}</span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page hero section -->
            <div class="inner-page-hero" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1)), url({{ $bundle->cover ? asset('storage/'.$bundle->cover) : '../img/cover.jpg' }});">
                <div class="container">
                    <div class="ip-content-one">
                        <!--<span class="ip-tagline">
                            <h5>Training Categories</h5>
                            <hr/>
                        </span>-->
                        <span class="ip-heading">
                            <h3>{{ $bundle->name }} Certification Bundle.</h3>
                        </span>
                    </div>
                </div>
            </div>
            <!-- END page hero section -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">

                    <div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" id="nav-face-to-face-tab" data-toggle="tab" href="#face-to-face" role="tab" aria-controls="nav-face-to-face" aria-selected="true">Face to Face</a>
                                <a class="nav-item nav-link" id="nav-virtual-tab" data-toggle="tab" href="#virtual" role="tab" aria-controls="nav-virtual" aria-selected="false">Virtual</a>
                                <a class="nav-item nav-link" id="nav-elearning-tab" data-toggle="tab" href="#elearning" role="tab" aria-controls="nav-elearning" aria-selected="false">E-learning</a>
                            </div>
                        </nav>

                        <div class="tab-content">
                            <div class="tab-pane fade" id="face-to-face" role="tabpanel" aria-labelledby="nav-face-to-face-tab">
                                <table class="table table-sm table-responsive table-striped ires-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Fees</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bundle->physicalClasses->load('currencies')->filter(function ($schedule) {

                                            return strtotime('today') <= strtotime($schedule->booking_end);

                                        }) as $schedule)
                                            <tr>
                                                <td>{{ $bundle->code }}</td>
                                                <td>{{ date('j F Y', strtotime($schedule->from)) }} - {{ date('j F Y', strtotime($schedule->to)) }}</td>
                                                <td>{{ "{$schedule->city->name}, {$schedule->city->venue->country}" }}</td>
                                                <td>
                                                    ${{ number_format( @$schedule->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
                                                </td>
                                                <td>
                                                    <a class="td-reg-btn" href="{{ route('certification.bundle.booking.create',  [

                                                        'bundle' => $bundle,
                                                        'class' => 'physical',
                                                        'schedule' => $schedule->id,

                                                    ]) }}">
                                                        Register
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="virtual" role="tabpanel" aria-labelledby="nav-virtual-tab">
                                <table class="table table-sm table-responsive table-striped ires-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Fees</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bundle->virtualClasses->load('currencies')->filter(function ($schedule) {

                                            return strtotime('today') <= strtotime($schedule->booking_end);

                                        }) as $schedule)
                                            <tr>
                                                <td>{{ $bundle->code }}</td>
                                                <td>{{ date('j F Y', strtotime($schedule->from)) }} - {{ date('j F Y', strtotime($schedule->to)) }}</td>
                                                <td>
                                                    ${{ number_format( @$schedule->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
                                                </td>
                                                <td>
                                                    <a class="td-reg-btn" href="{{ route('certification.bundle.booking.create',  [

                                                        'bundle' => $bundle,
                                                        'class' => 'virtual',
                                                        'schedule' => $schedule->id,

                                                    ]) }}">
                                                        Register
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="elearning" role="tabpanel" aria-labelledby="nav-elearning-tab">
                                Follow Website Link:

                                @if ($bundle->elearningClass)
                                    <a href="{{ strpos($bundle->elearningClass->website, 'http') ? strreplace('http://', 'https://', $bundle->elearningClass->website) : "https://{$bundle->elearningClass->website}" }}" target="_blank">
                                        {{ $bundle->elearningClass->website }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- course description -->
                    <div class="ip-course-desc">
                        <!-- Tabs Section -->
                        <div>
                            <nav>
                                <div class="nav nav-tabs ip-cdesc-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-cdesc-tab" data-toggle="tab" href="#nav-cdesc" role="tab" aria-controls="nav-cdesc" aria-selected="true">Description</a>
                                    <a class="nav-item nav-link" id="nav-cout-tab" data-toggle="tab" href="#nav-cout" role="tab" aria-controls="nav-cout" aria-selected="false">Outline</a>
                                    <a class="nav-item nav-link" id="nav-cmod-tab" data-toggle="tab" href="#nav-cmod" role="tab" aria-controls="nav-cmod" aria-selected="false">Modules</a>
                                    <a class="nav-item nav-link" id="nav-cdld-tab" data-toggle="tab" href="#nav-cdld" role="tab" aria-controls="nav-cdld" aria-selected="false">Downloads</a>
                                    <a class="nav-item nav-link" id="nav-ctrn-tab" data-toggle="tab" href="#nav-ctrn" role="tab" aria-controls="nav-ctrn" aria-selected="false">Associated Certifications</a>
                                    <a class="nav-item nav-link" id="nav-exam-tab" data-toggle="tab" href="#nav-exam" role="tab" aria-controls="nav-exam" aria-selected="false">Exam and Certification</a>
                                    <a class="nav-item nav-link" id="nav-certifying-body-tab" data-toggle="tab" href="#nav-certifying-body" role="tab" aria-controls="nav-certifying-body" aria-selected="false">Certifying Body</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-cdesc" role="tabpanel" aria-labelledby="nav-cdesc-tab">
                                    {!! $bundle->description !!}
                                </div>
                                <div class="tab-pane fade" id="nav-cout" role="tabpanel" aria-labelledby="nav-cout-tab">
                                    {!! $bundle->outline !!}
                                </div>
                                <div class="tab-pane fade" id="nav-cmod" role="tabpanel" aria-labelledby="nav-cmod-tab">
                                    {!! $bundle->module !!}
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
                                            @forelse ($bundle->documents as $document)
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
                                                        No documents available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="nav-ctrn" role="tabpanel" aria-labelledby="nav-ctrn-tab">
                                    <table class="table table-sm table-responsive table-striped ires-table tb-download">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bundle->certifications as $certification)
                                                <tr>
                                                    <td>{{ $certification->id }}</td>
                                                    <td>{{ $certification->name }}</td>
                                                    <td>
                                                        <a class="td-reg-btn" href="{{ route('certification.show', $certification) }}" target="_blank">
                                                            View Details
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">
                                                        No certifications available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="nav-exam" role="tabpanel" aria-labelledby="nav-exam-tab">
                                    {!! $certification->exam !!}
                                </div>

                                <div class="tab-pane fade" id="nav-certifying-body" role="tabpanel" aria-labelledby="nav-certifying-body-tab">
                                    <h4>{{ $certification->certifyingBody->name }}</h4>
                                    {{ $certification->certifyingBody->description }}
                                </div>
                            </div>

                        </div>
                        <hr/>
                        <!-- (social) share -->
                        <div class="c-desc-share">
                            <!-- download modal -->
                            <div class="modal fade" id="popDownload" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('certification.bundle.document') }}" method="POST" class="modal-content">
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
                                                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Phone Number</small>
                                                    <input type="tel" class="form-control" placeholder="Phone Number" name="phone" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Email Address</small>
                                                    <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Organization</small>
                                                    <input type="text" class="form-control" placeholder="organization" name="organization" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <small class="form-text text-muted">Designation</small>
                                                    <input type="text" class="form-control" placeholder="Designation" name="designation" required>
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

                            <!-- social share -->
                            <div class="c-desc-social">
                                <p>Share this course:<br/></p>
                                <a class="fb" href="http://www.facebook.com/sharer.php?u={{ route('certification.bundle.show', $bundle) }}" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                                <a class="tw" href="https://twitter.com/share?url={{ route('certification.bundle.show', $bundle) }}" target="_blank" title="Share on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a class="in" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('certification.bundle.show', $bundle) }}" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a class="wa" href="https://wa.me/?text={{ route('certification.bundle.show', $bundle) }}" target="_blank" title="Share on WhatsApp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- END (social) share -->
                    </div>

                    @php
                        $other_bundles = App\CertificationBundle::where('id', '<>', $bundle->id)->withCount('certifications')->inRandomOrder()->take(4)->get();
                    @endphp

                    @if ( $other_bundles->count() > 0 )
                        <!-- related courses section -->
                        <div class="c-desc-related c-desc-extra" id="">
                            <div class="ip-inner-header">
                                <h4>We thought you might be interested</h4>
                                <hr/>
                            </div>
                            <!-- columns -->
                            <div class="row">
                                @foreach ($other_bundles as $other_bundle)

                                    <div class="col-sm-3 ip-st-col">
                                        <div class="ip-cat-img-new">
                                            <img src="{{ asset('storage/'.$other_bundle->cover) }}" alt="$other_bundle->cover">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <h6>
                                                        <a href="{{ route('certification.bundle.show', $other_bundle) }}">
                                                            {{ $other_bundle->name }}
                                                        </a>
                                                    </h6>
                                                    <span class="bundle-course-no">
                                                        {{ $other_bundle->certifications_count }}
                                                        {{ ngettext('certification', 'certifications', $other_bundle->certifications_count) }}
                                                    </span>
                                                </div>
                                                <button class="btn btn-primary float-right" type="button" onclick="window.location.href = `{{ route('certification.bundle.show', $other_bundle) }}`">
                                                    View
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <!-- END related courses section -->
                    @endif

                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection

@push('script')
    <script>
        let schedule_tab = (window.location.hash || '#face-to-face').substr(1);

        document.getElementById(`nav-${schedule_tab}-tab`).className += ' active';
        document.getElementById(schedule_tab).className += ' show active';
    </script>
@endpush
