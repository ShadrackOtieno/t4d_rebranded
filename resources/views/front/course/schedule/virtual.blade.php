@extends('front.Projects.master')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs mt16 py-3 pl-5 bg-[#1ea19d] h-10 text-white" id="tp">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                <span class="bc-current-page">Courses Schedule</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page hero section -->
            {{-- <div class="inner-page-hero">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>
                                Courses Schedule.
                            </h3>
                        </span>
                    </div>
                </div>
            </div> --}}
            <!-- END page hero section -->

            <!-- page content -->
            <div class="lg:w-[1024px] mx-auto py-4">
                <div class="container mx-auto px-4">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3 class="text-4xl text-[#00a651] font-bold">
                                Courses Schedule
                            </h3>
                        </span>
                    </div>
                    <!-- Course Description -->
                    <div class="ip-courses-sum mt-6">
                        <div class="ip-inner-header mb-4">
                            <h3 class="text-xl font-medium">Pick your preferred date for your preferred course</h3>
                            <hr class="border border-[#00a651] my-4"/>
                        </div>

                        @include('front/course/schedule/partials/filter', compact('category'))

                        @if ( $schedules->isEmpty() )

                            <p class="text-gray-500">No results found.</p>

                        @else

                            @foreach( $schedules->groupBy('schedule_year') as $year => $year_schedule )

                                @for ($month = 1; $month <= 12; $month++)

                                    @php
                                        $month_schedule = $year_schedule->filter( function ($schedule) use ($month) {
                                            return date('n', strtotime($schedule->from)) == $month;
                                        })->filter(function ($schedule) {
                                            return strtotime('today') <= strtotime($schedule->booking_end);
                                        });
                                    @endphp

                                    @if ( $month_schedule->isEmpty() )
                                        @continue
                                    @endif

                                    <h4 class="text-2xl text-[#00a651] font-semibold my-6">
                                        {{ date('F', mktime(0, 0, 0, $month, 1, date('Y')) ) }} {{ $year }}
                                    </h4>

                                    <div class="overflow-x-auto">
                                        <table class="w-full bg-white table-auto border">
                                            <thead>
                                                <tr class="bg-gray-200">
                                                    <th class="px-4 py-2 max-md:hidden">Code</th>
                                                    <th class="px-1 md:px-4 py-2">Title</th>
                                                    <th class="px-1 md:px-4 py-2">Date</th>
                                                    <th class="px-4 py-2">Duration</th>
                                                    <th class="px-1 md:px-4 py-2 max-md:hidden">Period</th>
                                                    <th class="px-1 md:px-4 py-2">Fees (VAT Exclusive)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($month_schedule as $schedule)

                                                    @if ( empty($schedule->course) )
                                                        @continue
                                                    @endif

                                                    <tr class="border-b">
                                                        <td class="px-4 py-2 border max-md:hidden">{{ $schedule->course->code }}</td>
                                                        <td class="px-1 md:px-4 py-2 border text-[#1ea19d]">
                                                            <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}" class="hover:underline">
                                                                {{ $schedule->course->name }}
                                                            </a>
                                                        </td>
                                                        <td class="px-1 md:px-4 py-2 border">
                                                            {{ date('j M', strtotime($schedule->from)) }} - {{ date('j M', strtotime($schedule->to)) }}
                                                        </td>
                                                        <td class="px-4 py-2 border">{{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}</td>
                                                        <td class="px-1 md:px-4 py-2 border max-md:hidden">
                                                            {{ $schedule->period }}
                                                        </td>
                                                        <td class="px-1 md:px-4 py-2 border">
                                                            @if ( request()->getHttpHost() == config('domains.rwanda') )
                                                                {{ ($rwf = @$schedule->currencies->firstWhere('code', 'RWF')) ? 'RWF ' . number_format($rwf->pivot->amount) : '' }}
                                                            @else
                                                                {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '' }}
                                                            @endif
                                                            USD {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                        </td>
                                                    </tr>

                                                    @env('local')
                                                        @if($loop->iteration == 20)
                                                            @break
                                                        @endif
                                                    @endenv
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center py-4 text-gray-500">
                                                            No courses available
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                @endfor
                            @endforeach

                        @endif
                    </div>
                </div>
            </div>

            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
