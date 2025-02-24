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
                <span class="bc-current-page">All Industries</span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page hero section -->
            <div class="inner-page-hero">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>Industry Training courses for professional development.</h3>
                        </span>
                    </div>
                </div>
            </div>
            <!-- END page hero section -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-brief-desc" id="">
                        <p>We have training experience the areas of professional services, automobile, agriculture, fast moving consumer goods, trade outlets, Information technology, Financial services, Travel & Tourism, Real estate, Pharma among others.
                        </p>
                    </div>
                    <!-- categories column -->
                    <div class="ip-categories-col" id="">
                        <!-- columns -->
                        <div class="col-md-8">
                            @forelse ($industries as $industry)
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="ip-cat-img-new">
                                            <h5>
                                                <a href="{{ route('course.industry.show-industry', $industry->slug) }}">
                                                    {{ $loop->iteration }}. {{ $industry->name }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <b>No industries available</b>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!-- END page content -->

            <!-- view all button -->
            <div class="col-md-12 d-flex justify-content-center">
                <div>
                    {{ $industries->links() }}
                </div>
            </div>

        </div>
        <!-- END page container -->

    </div>
@endsection
