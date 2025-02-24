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
                            <h3>Pick your preferred date for your preferred course</h3>
                            <hr/>
                        </div>
                        <!-- courses -->

                        @include('front/course/physical/partials/filter')

                        @forelse ($venues as $venue)

                            @foreach ($venue->cities as $city)

                                @php
                                    $city_schedules = $city->physicalClasses->filter(function ($schedule) {

                                        return strtotime('today') <= strtotime($schedule->booking_end);
                                    });
                                @endphp

                                @if ( $city_schedules->isEmpty() )
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
                                            <th scope="col">Duration</th>
                                            <th scope="col">Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($city_schedules as $schedule)
                                            <tr>
                                                <td>{{ @$schedule->course->code }}</td>
                                                <td>
                                                    <a href="{{ route('course.show', $schedule->course ?? '') }}#face-to-face">
                                                        {{ @$schedule->course->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ date('j F Y', strtotime($schedule->from)) }}
                                                    &nbsp; - &nbsp;
                                                    {{ date('j F Y', strtotime($schedule->to)) }}
                                                </td>
                                                <td>
                                                    {{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}
                                                </td>
                                                <td>
                                                    {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }}

                                                    &vert;

                                                    USD {{ number_format( @$schedule->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
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
