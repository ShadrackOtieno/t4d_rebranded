@extends('front.master')

@section('title', "Courses Search Result")

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
                <span class="bc-current-page">Courses Search Result</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page hero section -->
            {{-- <div class="inner-page-hero">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>
                                Courses Search Results
                            </h3>
                        </span>
                    </div>
                </div>
            </div> --}}
            <!-- END page hero section -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- course tables -->
                    <div class="ip-courses-sum">

                        @include('front/partials/search')

                        <div class="ip-inner-header">
                            <h3>Pick your preferred date for your preferred course</h3>
                            <hr/>
                        </div>
                        <!-- courses -->

                        @if ( $schedules->isEmpty() )

                            <p>No results found.</p>

                        @else

                            @for ($month = 1; $month <= 12; $month++)

                                @php
                                    $month_schedule = $schedules->filter( function ($schedule) use ($month) {

                                        return date('n', strtotime($schedule->from)) == $month;

                                    })->filter(function ($schedule) {

                                        return strtotime('today') <= strtotime($schedule->booking_end);
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
                                            <th scope="col">Duration</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Fees (VAT Exclusive)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($month_schedule as $schedule)
                                            <tr>
                                                <td>{{ $schedule->course->code }}</td>
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
                                                    {{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}
                                                </td>
                                                <td>
                                                    {{ $schedule->city ? "{$schedule->city->name}, {$schedule->city->venue->country}" : 'Virtual class' }}
                                                </td>
                                                <td>
                                                    {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }}

                                                    &vert;

                                                    USD {{ number_format( @$schedule->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    No courses found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            @endfor

                        @endif
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
