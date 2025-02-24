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
                <a href="{{ route('course.industry.index') }}">
                    All Industries
                </a>
            </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">{{ $industry->name }} </span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page hero section -->
            <div class="inner-page-hero">
                <div class="container">
                        <span class="ip-heading">
                            <h3>{{ $industry->name }} Industry</h3>
                        </span>
                    <p>{!! $industry->description !!}</p>

                    {{-- <div class="col-lg-12">
                        <p class="lead mb-0">{!! $industry->description !!}</p>
                        <br>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 margin-bottom-40 breadcrumbs mx-3">
                                <a href="#" class="btn btn-mod btn-cta btn-medium animation-one">
                                    <span>Download Course Catalogue</span>
                                </a>
                            </div>

                            <div class="col-md-4 col-sm-4 margin-bottom-40 breadcrumbs mx-3">
                                <a href="#" class="btn btn-mod btn-cta btn-medium animation-one">
                                    <span>Download Services Brochure</span>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- END page hero section -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- categories column -->

                    @if($courses->count() > 0)
                    <div class="ip-categories-col" id="">
                        <div class="ip-inner-header">
                            <h2 class="h4">Training and capacity development</h2>
                            <hr/>
                        </div>
                        <!-- columns -->
                        <div class="row">
                            @foreach ($courses as $course)
                                <div class="col-sm-3 ip-sub-col-l card px-3 py-3 mb-1 shadow bg-white rounded">
                                    <div class="ip-sub-img-new">
                                        <a href="{{ route('course.industry.view', $course->slug) }}">
                                            <img src="{{asset('storage/'.$course->cover)}}">
                                        </a>
                                        <p>
                                            <a href="{{ route('course.industry.view', $course->slug) }}">
                                                {{ $course->name }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($industry->services->count() > 0)
                        <div class="ip-inner-header pt-5">
                            <h3 class="h4">Industry Solutions</h3>
                            <hr/>
                        </div>
                        <div class="col-md-12">
                            @foreach($industry->services as $service)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="ip-cat-img-new">
                                            <h5>{{ $loop->iteration }}. <a href="#"> {{ $service->name }}</a></h5>
                                            <p>{!! substr($service->description, 0, 250) !!} ...</p>
                                        </div>

                                        <div class="c-desc-btn">
                                            <a class="btn" href="{{ route('course.industry.service', $service->slug) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!-- END page content -->

            <!-- view all button -->
            <div class="col-md-12 d-flex justify-content-center">
                <div>
                    {{ $courses->links() }}
                </div>
            </div>

        </div>
        <!-- END page container -->

    </div>
@endsection
