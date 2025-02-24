@extends('front.master')

@section('title', "Professional Certification Bundles")

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
                <span class="bc-current-page">Professional Certification Bundles</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page hero section -->
            <div class="inner-page-hero">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>Browse our professional certification bundles</h3>
                        </span>
                    </div>
                </div>
            </div>
            <!-- END page hero section -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- category description -->
                    <div class="ip-brief-desc" id="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <!-- categories column -->
                    <div class="ip-categories-col">
                        <!-- columns -->
                        <div class="row">
                            @forelse ($bundles as $bundle)
                                <div class="col-sm-3 ip-st-col">
                                    <div class="ip-cat-img-new">
                                        <a href="{{ route('certification.bundle.show', $bundle) }}">
                                            <img src="{{ asset('storage/'.$bundle->cover) }}" alt="$bundle->cover">
                                        </a>
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h6>
                                                    <a href="{{ route('certification.bundle.show', $bundle) }}">
                                                        {{ $bundle->name }}
                                                    </a>
                                                </h6>
                                                <span class="bundle-course-no">
                                                    {{ $bundle->certifications_count }}
                                                    {{ ngettext('certification', 'certifications', $bundle->certifications_count) }}
                                                </span>
                                            </div>
                                            <button class="btn btn-primary float-right" type="button" onclick="window.location.href = `{{ route('certification.bundle.show', $bundle) }}`">
                                                View
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <b>No professional certification bundles available</b>
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
