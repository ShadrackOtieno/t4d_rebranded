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

                        @forelse ($venues as $venue)

                            @foreach ($venue->cities as $city)

                                @if ( $city->physicalClasses->isEmpty() )
                                    {{-- skip the current iteration --}}
                                    @continue
                                @endif

                                <h4>{{ "$city->name, $venue->country" }}</h4>

                                <table class="table table-sm table-responsive ires-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($city->physicalClasses as $schedule)
                                            <tr>
                                                <td>{{ $schedule->id }}</td>
                                                <td>
                                                    <a href="{{ route('course.show', $schedule->course) }}#face-to-face">
                                                        {{ $schedule->course->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ date('j F Y', strtotime($schedule->from)) }}
                                                    &nbsp; - &nbsp;
                                                    {{ date('j F Y', strtotime($schedule->to)) }}
                                                </td>
                                                <td>
                                                    {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }}

                                                    &vert;

                                                    USD {{ number_format($schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @endforeach

                            @empty

                                <h6>No courses available</h6>

                        @endforelse
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
