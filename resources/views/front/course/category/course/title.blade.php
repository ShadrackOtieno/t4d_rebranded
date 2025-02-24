@extends('front.master')

@section('title', "$category->name Courses")

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
                    <a href="{{ route('course.category.index') }}">
                        All Categories
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">{{ $category->name }}</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h1>
                                Grow your future, expand your knowledge, with our expertly developed training courses.
                            </h1>
                        </span>
                    </div>
                    <!-- category description -->
                    <div class="ip-brief-desc" id="">
                        <p>{!! $category->description !!}</p>
                    </div>
                    <!-- course tables -->
                    <div class="ip-courses-sum">
                        <div class="ip-inner-header">
                            <h2>Pick your course</h2>
                            <hr/>
                        </div>
                        <!-- courses -->

                        @include('front/course/category/course/partials/filter')

                        <table class="table table-sm table-responsive ires-table">
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td>
                                            {{ $course->name }}
                                        </td>
                                        <td>
                                            <a class="btn btn-dark text-white btn-sm float-right" href="{{ route('course.show', $course) }}">
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
