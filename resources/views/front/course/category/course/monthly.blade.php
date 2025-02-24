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
                    <!-- category description -->
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h1>Training courses for professional development in {{ $category->name }}.</h1>
                        </span>
                    </div>
                    <div class="ip-brief-desc" id="">
                        <p>{!! $category->description !!}</p>
                    </div>
                    <!-- course tables -->
                    <div class="ip-courses-sum">
                        <div class="ip-inner-header">
                            <h2>Pick your preferred date for your preferred course</h2>
                            <hr/>
                        </div>
                        <!-- courses -->

                        @include('front/course/category/course/partials/filter')

                        @for ($month = 1; $month <= 12; $month++)

                            @php
                                $month_schedule = $schedules->filter( function ($schedule) use ($month) {

                                    return date('n', strtotime($schedule->from)) == $month;
                                });
                            @endphp

                            @if ( $month_schedule->isEmpty() )
                                {{-- skip the current iteration --}}
                                @continue
                            @endif

                            <h4>
                                {{ date('F', mktime(0, 0, 0, $month, 1, date('Y')) ) }}
                                {{ date('Y') }}
                            </h4>

                            <table class="table table-sm table-responsive ires-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Format</th>
                                        <th scope="col">Fees</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($month_schedule as $schedule)
                                        <tr>
                                            <td>{{ $schedule->id }}</td>
                                            <td>
                                                <a href="{{ route('course.show', $schedule->course) }}#{{ $schedule->city ? 'face-to-face' : 'virtual' }}">
                                                    {{ $schedule->course->name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ date('j F Y', strtotime($schedule->from)) }}
                                                &nbsp; - &nbsp;
                                                {{ date('j F Y', strtotime($schedule->to)) }}
                                            </td>
                                            <td>
                                                {{ $schedule->city ? 'Face to Face' : 'Virtual' }}
                                            </td>
                                            <td>
                                                {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }}

                                                &vert;

                                                USD {{ number_format($schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                No courses available
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endfor
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
