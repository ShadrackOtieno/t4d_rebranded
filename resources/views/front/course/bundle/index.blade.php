@extends('front.master')

@section('title', "Professional Certifications")

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
                <span class="bc-current-page">Professional Certifications</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page hero section -->
            {{-- <div class="inner-page-hero">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>Browse our professional certifications</h3>
                        </span>
                    </div>
                </div>
            </div> --}}
            <!-- END page hero section -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>Browse our professional certifications</h3>
                        </span>
                    </div>
                    <!-- category description -->
                    {{-- <div class="ip-brief-desc" id="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div> --}}
                    <!-- categories column -->
                    <div class="ip-categories-col">
                        <!-- columns -->
                        <div class="row">
                            @forelse ($bundles as $bundle)
                                <div class="col-sm-3 ip-st-col">
                                    <div class="ip-cat-img-new">
                                        <img src="{{ asset('storage/'.$bundle->cover) }}">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h6>
                                                    <a href="{{ route('course.certification.show', $bundle) }}">
                                                        {{ $bundle->name }}
                                                    </a>
                                                </h6>
                                                <span class="bundle-course-no">
                                                    {{ $bundle->courses_count }}
                                                    {{ ngettext('course', 'courses', $bundle->courses_count) }}
                                                </span>
                                            </div>
                                            <button class="btn btn-primary float-right" type="button" onclick="window.location.href = `{{ route('course.certification.show', $bundle) }}`">
                                                View
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <b>No professional certifications available</b>
                            @endforelse
                        </div>

                        {{ $bundles->links() }}
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
