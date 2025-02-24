@extends('front.master')

@section('title', "Face to Face Courses")

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <!-- home -->
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">Face to Face Courses</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page hero section -->
            <div class="inner-page-hero">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>
                                Face to Face Courses.
                            </h3>
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
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna -->
                        <!--    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
                    </div>
                    <!-- course tables -->
                    <div class="ip-courses-sum">
                        <div class="ip-inner-header">
                            <h3>Pick your course</h3>
                            <hr/>
                        </div>
                        <!-- courses -->

                        @include('front/course/physical/partials/filter')

                        <table class="table table-sm table-responsive ires-table">
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td>
                                            {{ $course->name }}
                                        </td>
                                        <td>
                                            <a class="btn btn-dark text-white btn-sm float-right" href="{{ route('course.show', $course) }}#face-to-face">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">
                                            No courses available
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
