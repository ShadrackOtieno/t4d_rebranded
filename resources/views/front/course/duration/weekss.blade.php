@extends('front.projects.master')

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
            <span>
                <a href="{{ route('course.category.subcategory.index', $category) }}">
                    {{ $category->name }}
                </a>
            </span>
            <span class="bc-sep"></span>
            <span>
                <a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}">
                    {{ $subcategory->name }}
                </a>
            </span>
            <span class="bc-sep"></span>
            <span class="bc-current-page">{{ $topic->name }}</span>
        </div>
        <!-- END page breadcrumbs -->

        @include('front/partials/alert')

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <span class="ip-heading">
                            <h1>Training Courses for Professional Development in {{ $topic->name }}.</h1>
                        </span>
                    <!-- categories column -->
                    <div class="ip-brief-desc" id="">
                        <p>{!! $topic->description !!}</p>

                    </div>
                    <div class="ip-categories-col" id="">
                        <div class="ip-inner-header">
                            <h2>{{ $topic->name }}</h2>
                            <hr/>
                        </div>
                        <!-- columns -->
                        <div class="row">
                            <div class="col-sm-4 ip-sub-col">
                                @include('front.course.category.subcategory.topic.sidebar')
                            </div>
                            <div class="col-md-8">
                                @forelse ($schedules as $course)
                                @if($course->duration > 5)
                                <div class="row">
                                    @include('front.course.duration.schedule-view')
                                </div>
                                @endif

                                @empty
                                <b>No courses available</b>
                                @endforelse
                                {{ $schedules->links() }}

                            </div>
                        </div>
                    </div>

                    <!-- view all button -->
                    <div class="bc-btn ip-all-btn">
                        <a class="btn" href="{{ route('course.schedule', compact('category', 'subcategory', 'topic')) }}">View All Scheduled Dates</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END page content -->

    </div>
    <!-- END page container -->

</div>
@endsection
