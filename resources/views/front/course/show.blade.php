@extends('front.Projects.master')

@section('title', 'Sub-category')

@section('content')

@section('css')

<style>
/* Custom CSS for floating navigation */
.floating-nav {
            display: none; /* Hide by default */
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: #a11e22;
            color: white;
            padding: 10px 0;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        .floating-nav .nav-item {
            flex: 1;
            text-align: center;
            color: white;
        }

        /* Show floating navigation on small screens */
        @media (max-width: 768px) {
            .floating-nav {
                display: flex;
            }
            .scroll_menu {
                display: none; /* Hide the original menu */
            }
        }

    @media (min-width: 1201px) {
        .tabs-mobile {
            display: none;
        }
    }

    @media (max-width: 1200px) {
        .tabs-desktop {
            display: none;

        }
    }

    .table {
        display: flex;
        flex-direction: column;
        width: 100%;
        border-collapse: collapse;
    }

    .table-header,
    .table-body {
        display: flex;
        flex-direction: column;
    }

    .table-row {
        display: flex;
        width: 100%;
    }

    .table-cell {
        flex: 1;
        padding: 2px;
        border: 1px solid #f4f4f4;
        box-sizing: border-box;
    }

    .table-header .table-cell {
        font-weight: bold;
        background-color: #f4f4f4;
    }

    @media (max-width: 600px) {
        .table-row {
            flex-direction: row;
            font-size: 12px;
        }

        .table-cell {
            border: none;
            border-bottom: 1px solid #ddd;
        }

        .table-cell:last-child {
            border-bottom: none;
        }
    }

    /* .tab-button.outline-inactive { */
        /* border: 2px solid #198783; */
        /* Outline for inactive tabs indicating an image */
        /* background-color: #f8f9fa; */
        /* Light background to differentiate */
        /* color: #198783;
    } */

    /* .tab-button:hover {
        background-color: #a11e22;
        color: #f4f4f4
    } */

    /* .tab-buttons {
        gap: 10px;
        margin-bottom: 5px
    } */
    *{
        /* outline: solid blue 1px;  */
    }

    .module ul {
        list-style-type: disc !important; /* Custom bullet style */
        padding-left: 20px;  /* Custom padding */
        margin-bottom: 4px !important;
    }

  ul li{
    /* list-style-type: disc !important; Custom bullet style */
    /* padding-left: 20px;  Custom padding */
    margin-bottom: 4px !important;
  }

  ul p{
    /* list-style-type: disc !important; /* Custom bullet style */
    /* padding-left: 20px;  Custom padding */ */
    margin-bottom: 4px !important;
  }

</style>

@endsection

<div class="bg-white">
    <div class="breadcrumbs mt16 py-3 pl-5 bg-[#1ea19d] h-10 text-white" id="tp">
        <span>
            <a href="{{ route('home') }}" class="fa fa-home"></a>
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

        <span>
            <a href="{{ route('course.category.index') }}">
                All Categories
            </a>
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

        <span>
            <a href="{{ route('course.category.subcategory.index', $course->category) }}">
                {{ $course->category->name }}
            </a>
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

        <span>
            <a
                href="{{ route('course.category.subcategory.show', [
                    'category' => $course->category,
                    'subcategory' => $course->subcategory,
                ]) }}">
                {{ $course->subcategory->name }}
            </a>
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

        {{-- Only show topic if the topic is set for the course --}}
        @if ($course->topic && isset($course->topic->name))
            <span>
                <a href="{{ route('course.topic.show', $course->topic->slug) }}">
                    {{ $course->topic->name }}
                </a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

        @endif
        <span class="bc-current-page">{{ $course->name }}</span>
    </div>

    <div class=" lg:w-[1280px] mx-auto">
        

        @include('front/partials/alert')
        {{-- added heroes section --}}
     
        <div class="w-full px-10 lg:px-44 mb-6 py-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="mt-10 md:w-7/12 text-left gap-4">
                    <h1 class="text-3xl">{{ ucfirst($course->name) }}</h1><br>
                    <div class="mt-4 mb-10 flex flex-col md:flex-row items-start md:items-center">
                        <div class="mb-2 md:mb-0 md:mr-2">
                            <a href="#enroll" class="bg-[#1ea19d] text-white rounded-full px-5 py-2 text-base m-0 inline-flex items-center">
                                <i class="fa fa-registered mr-1" aria-hidden="true"></i> Register For This Course
                            </a>
                        </div>
                        <div class="hidden lg:block">
                            <a href="#overview" class="bg-[#1ea19d] text-white rounded-full px-5 py-2 text-base m-0 inline-flex items-center">
                                <div class="mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="0.86em" height="1em" viewBox="0 0 1536 1792"><path fill="currentColor" class="mr-1 size-3 " d="M1468 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28H96q-40 0-68-28t-28-68V96q0-40 28-68T96 0h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22m384 1528V640H992q-40 0-68-28t-28-68V128H128v1536zm-514-593q33 26 84 56q59-7 117-7q147 0 177 49q16 22 2 52q0 1-1 2l-2 2v1q-6 38-71 38q-48 0-115-20t-130-53q-221 24-392 83q-153 262-242 262q-15 0-28-7l-24-12q-1-1-6-5q-10-10-6-36q9-40 56-91.5t132-96.5q14-9 23 6q2 2 2 4q52-85 107-197q68-136 104-262q-24-82-30.5-159.5T657 552q11-40 42-40h22q23 0 35 15q18 21 9 68q-2 6-4 8q1 3 1 8v30q-2 123-14 192q55 164 146 238m-576 411q52-24 137-158q-51 40-87.5 84t-49.5 74m398-920q-15 42-2 132q1-7 7-44q0-3 7-43q1-4 4-8q-1-1-1-2q-1-2-1-3q-1-22-13-36q0 1-1 2zm-124 661q135-54 284-81q-2-1-13-9.5t-16-13.5q-76-67-127-176q-27 86-83 197q-30 56-45 83m646-16q-24-24-140-24q76 28 124 28q14 0 18-1q0-1-2-3"/></svg> 
                                </div>
                                <div><p>Course Info</p></div> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:w-5/12 mt-3 md:mt-0">
                    <img src="{{ asset('storage/' . $course->cover) }}" class="w-full h-auto rounded-lg" alt="Course Cover">
                </div>
            </div>
        </div>
        {{-- end --}}

        
        {{-- added --}}
        <div id="scroll_app_menu" class="px-44 solution-tabs sticky top-12 py-6 scroll_menu z-50 bg-white border-t border-b">
            <div class="w-full ">
                <nav class="flex-nowrap bg-white w-full flex h-10 justify-start border-0 pb-0">
                    <a class="nav-link-taps  rounded-full px-5 py-2 text-lg m-0 inline-flex items-center active bg-[#1ea19d] text-white" href="#enroll">Register Now</a>
                    <a class="nav-link-taps  rounded-full px-5 py-2 text-lg m-0 inline-flex items-center" href="#overview">Overview</a>
                    <a class="nav-link-taps  rounded-full px-5 py-2 text-lg m-0 inline-flex items-center" href="#outline">Outline</a>
                    <a class="nav-link-taps  rounded-full px-5 py-2 text-lg m-0 inline-flex items-center" href="#administration">Administration</a>
                </nav>
            </div>
        </div>
        
        {{-- <div id="scroll_app_menu" class="solution-tabs scroll_menu z-5 bg-white border-top border-bottom">
            <div class="container">
                <nav class="nav navbar flex-nowrap bg-white w-100 d-flex h-10 justify-content-start border-0 pb-0">
                    <a class="nav-link-taps rounded-pill px-4 fs-5 m-0 active" href="#enroll">Register Now</a>
                    <a class="nav-link-taps rounded-pill px-4 fs-5 m-0" href="#overview">Overview</a>
                    
                    <a class="nav-link-taps rounded-pill px-4 fs-5 m-0" href="#outline">Outline</a>
                    <a class="nav-link-taps rounded-pill px-4 fs-5 m-0" href="#administration">Administration</a>
                </nav>
            </div>

        </div> --}}

        <!-- Floating Navigation for Mobile -->
       <nav class="floating-nav flex justify-around shadow-lg py-2 bg-gray-800 fixed bottom-0 w-full md:hidden">
    <a class="flex flex-col items-center text-white hover:text-[#1ea19d] transition duration-300 ease-in-out" href="#enroll">
        <i class="fas fa-clipboard-check text-lg sm:text-xl"></i>
        <span class="mt-1 text-xs sm:text-sm">Register</span>
    </a>
    <a class="flex flex-col items-center text-white hover:text-[#1ea19d] transition duration-300 ease-in-out" href="#overview">
        <i class="fas fa-info-circle text-lg sm:text-xl"></i>
        <span class="mt-1 text-xs sm:text-sm">Overview</span>
    </a>
    <a class="flex flex-col items-center text-white hover:text-[#1ea19d] transition duration-300 ease-in-out" href="#outline">
        <i class="fas fa-list-alt text-lg sm:text-xl"></i>
        <span class="mt-1 text-xs sm:text-sm">Outline</span>
    </a>
    <a class="flex flex-col items-center text-white hover:text-[#1ea19d] transition duration-300 ease-in-out" href="#administration">
        <i class="fas fa-cogs text-lg sm:text-xl"></i>
        <span class="mt-1 text-xs sm:text-sm">Admin</span>
    </a>
</nav>


        {{-- end --}}
        <div class="clearfix" id="enroll"></div>
        <div class="w-full px20">
            <div class="text-left mb-4">
                <div class="w-full md:w-5/6 lg:my-10 mx-auto relative">
                    <hr class="hidden lg:block absolute top-1/2 left-1/2 w-2/5 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full">
                    <h3 class="text-left md:text-center text-[#a11e22] text-xl sm:text-2xl capitalize font-bold relative z-10 bg-white w-max px-10 lg:px-2 lg:mx-auto p-4 rounded-5xl">Register for this course</h3>
                </div>

                <p class=" px-10 lg:px-20 text-[16px]">
                    We are proud to offer this course in a variety of training formats to suit your needs.
                    We use the highest quality learning facilities to make sure your experience is as comfortable as
                    possible. Our face to face calendar allows you to choose any classroom course of your choice to be delivered at any venue of your choice - offering you the ultimate in convenience and value for money.
                </p>
            </div>
        
            <div class="tabs tabs-desktop lg:w rounded-[5px] tabs-desktop lg:mx2 border px-5 py-6 bg-[#f9f9f9] hidden md:block">
                <div class="tab-buttons flex lg:w-full w-1/2 border-b pb-6 space-x-4 text-white">
                    <button class="tab-button text-center lg:w-1/2 rounded-full px-0 py-2 lg:px-10 bg-[#a11e22] border border-[#1ea19d] active cursor-pointer" data-tab="table2">
                        Register For Virtual Zoom Classes
                    </button>
                    <button class="tab-button text-center lg:w-1/2 rounded-full py-2 px-0 lg:px-10 border border-[#1ea19d] text-[#1ea19d] cursor-pointer" data-tab="table1">
                        Register For Face-to-Face Classes
                    </button>
                    <hr >
                </div>

                

                <div class="tab-content mt-4">
                     <!--Physical Schedules-->

                    <div class="hidden tab-pane" id="table1">
                        @php
                            $monthly_schedules = $course->physicalClasses
                                ->load('currencies')
                                ->filter(function ($schedule) {
                                    return strtotime('today') <= strtotime($schedule->booking_end);
                                })
                                ->groupBy(function ($schedule) {
                                    return date('F Y', strtotime($schedule->from));
                                })
                                ->sortBy(function ($group, $key) {
                                    return strtotime($key);
                                });
        
                            $current_month = date('F Y');
                            $no_schedules = $monthly_schedules->isEmpty();
                        @endphp

                        @if ($no_schedules)
                            <p>Unfortunately, we do not have any dates scheduled at this time. Do you have a date in mind when you would like to take your training?</p><br>
                            <p class="mb-4">Contact us at:</p>
                            <ul class="list-none">
                                <li><i class="fas fa-envelope mr-2"></i>Email: <a class="text-blue-500" href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a></li>
                                <li><i class="fas fa-phone mr-2"></i>Phone: <a class="text-blue-500" href="tel:+254715077817">+254715 077 817</a></li>
                            </ul>
                            <a href="#"  data-toggle="modal" data-target="#customizeDates" onclick="document.getElementById('custom-date').showModal()"  class="inline-block bg-[#1ea19d] text-white rounded-full px-5 py-2 mt-4">Request Custom Schedule</a>
                            @else
                                @foreach ($monthly_schedules as $month => $schedules)
                                        <div>
                                            <h3 class="text-lg my-6 text-[#a11e22] font-bold">{{ $month }}</h3>
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full border text-sm text-left">
                                                    <thead class="border-b text-[#1ea19d]">
                                                        <tr>
                                                            {{-- <th class="px-4 py-2">Code</th> --}}
                                                            <th class="px-2 py-2">Date</th>
                                                            <th class="px-2 py-2">Duration</th>
                                                            <th class="px-2 py-2">Location</th>
                                                            <th class="px-2 py-2">Fee</th>
                                                            <th class="px-2 py-2">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($schedules as $schedule)
                                                            @if (empty($schedule->course))
                                                                @continue
                                                            @endif
                                                            <tr class="border-b">
                                                                {{-- <td class="px-4 py-2">{{ $schedule->course->code }}</td> --}}
                                                                <td class="px-2 py-2">{{ date('j M ', strtotime($schedule->from)) }} - {{ date('j M ', strtotime($schedule->to)) }}</td>
                                                                <td class="px-2 py-2">{{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}</td>
                                                                <td class="px-2 py-2">{{ "{$schedule->city->name}, {$schedule->city->venue->country}" }}</td>
                                                                <td class="px-2 py-2">
                                                                    @if (request()->getHttpHost() == config('domains.rwanda'))
                                                                        {{ ($rwf = @$schedule->currencies->firstWhere('code', 'RWF')) ? 'RWF ' . number_format($rwf->pivot->amount) . ' |' : '' }}
                                                                    @else
                                                                        {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) . ' |' : '' }}
                                                                    @endif
                                                                    ${{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                                </td>
                                                                <td class="px- py-2">
                                                                    <a class="inline-block bg-[#1ea19d] text-white rounded-full px-5 py-1"
                                                                        href="{{ route('course.booking.create', ['course' => $course, 'class' => 'physical', 'schedule' => $schedule->id]) }}">
                                                                        Register
                                                                    </a>
                                                                    {{-- <div class="grid grid-cols-2 gap-2">
                                                                        <a href="{{ route('packages.show', 'individual') }}" class="inline-block bg-[#1ea19d] text-white rounded-full px-5 w-max py-1">Register as Individual</a>
                                                                        <a href="{{ route('packages.show', 'corporate') }}" class="inline-block bg-[#1ea19d] text-white rounded-full px-5 w-max py-1">Register as a Group</a>
                                                                    </div> --}}


                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6" class="px-4 py-2 text-center">No schedules available for this month.</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                @endforeach
                        @endif 
                    </div>

                    <!--Virtual Schedules-->

                    <div class="tab-pane" id="table2">
                        @php
                            $monthly_schedules = $course->virtualClasses
                                ->load('currencies')
                                ->filter(function ($schedule) {
                                    return strtotime('today') <= strtotime($schedule->booking_end);
                                })
                                ->groupBy(function ($schedule) {
                                    return date('F Y', strtotime($schedule->from));
                                });
        
                            $current_month = date('F Y');
                            $no_schedules = $monthly_schedules->isEmpty();
                        @endphp
                        
        
                        <div id="schedule-container">
                            @if ($no_schedules)
                                <p>Unfortunately, we do not have any dates scheduled at this time. Do you have a date in mind when you would like to take your training?</p><br>
                                <p class="mb-4">Contact us at:</p>
                                <ul class="list-none">
                                    <li><i class="fas fa-envelope mr-2"></i>Email: <a class="text-blue-500" href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a></li>
                                    <li><i class="fas fa-phone mr-2"></i>Phone: <a class="text-blue-500" href="tel:+254715077817">+254715 077 817</a></li>
                                </ul>
                                <a href="#"  data-toggle="modal" data-target="#customizeDates" onclick="document.getElementById('custom-date').showModal()"  class="inline-block bg-[#1ea19d] text-white rounded-full px-5 py-2 mt-4">Request Custom Schedule</a>
                            @else
                                @foreach ($monthly_schedules as $month => $schedules)
                                    <div>
                                        <h3 class="text-lg font-bold text-[#a11e22] my-6">{{ $month }}</h3>
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full text-sm text-left border">
                                                @if ($schedules->count() > 0)
                                                    <thead class="border-b text-[#1ea19d]">
                                                        <tr>
                                                            <th class="px-4 py-2">Code</th>
                                                            <th class="px-4 py-2">Date</th>
                                                            <th class="px-4 py-2">Duration</th>
                                                            <th class="px-4 py-2">Mode</th>
                                                            <th class="px-4 py-2">Standard Fee</th>
                                                            <th class="px-4 py-2">Action</th>
                                                        </tr>
                                                    </thead>
                                                @endif
                                                <tbody>
                                                    @forelse ($schedules as $schedule)
                                                        <tr class="border-b">
                                                            <td class="px-4 py-2">{{ $course->code }}</td>
                                                            <td class="px-4 py-2">{{ date('j M Y', strtotime($schedule->from)) }} - {{ date('j M Y', strtotime($schedule->to)) }}</td>
                                                            <td class="px-4 py-2">{{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}</td>
                                                            <td class="px-4 py-2">{{ $schedule->period }}</td>
                                                            <td class="px-4 py-2">
                                                                {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }} &vert; USD {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                            </td>
                                                            <td class="px-4 py-2">
                                                                <a class="inline-block bg-[#1ea19d] text-white rounded-full px-5 py-1"
                                                                    href="{{ route('course.booking.create', ['course' => $course, 'class' => 'virtual', 'schedule' => $schedule->id]) }}">
                                                                    Register
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="px-4 py-2 text-center">No schedules available for this month.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div id="overview" class="clearfix mt-4"></div>
                    </div>
                    
                </div>
                
            </div>
        
            {{-- Mobile Tabs --}}
            <div class="tabs tabs-mobile px-6 border mx-4 py-6 bg-[#f9f9f9] block md:hidden">
                <div class="tab-buttons flex flex-row space-x-2 text-white">
                    <button class="tab-button text-center lg:w-1/2 rounded-full px-3 py-2 lg:px-4 bg-[#a11e22] border border-[#1ea19d] text-[12px] active cursor-pointer" data-tab="table4">
                        Register for Virtual Zoom Classes
                    </button>
                    <button class="tab-button text-center lg:w-1/2 rounded-full py-2 px-3 lg:px-4 text-[12px] border border-[#1ea19d] text-[#1ea19d] cursor-pointer" data-tab="table3">
                        Register for Face-to-Face Classes
                    </button>
                </div>
        
                <div class="tab-content mt-4">
                    <div class="hidden tab-pane" id="table3">

                        @php
                            // Collect and group schedules by month
                            $monthly_schedules = $course->physicalClasses
                                ->load('currencies')
                                ->filter(function ($schedule) {
                                    return strtotime('today') <= strtotime($schedule->booking_end);
                                })
                                ->groupBy(function ($schedule) {
                                    return date('F Y', strtotime($schedule->from)); // Group by month and year
                                });

                            // Get the current month and year
                            $current_month = date('F Y');
                        @endphp

                         {{-- testing divs --}}

                        @foreach ($monthly_schedules as $month => $schedules)
                            <div>
                                <h3 class="text-lg text-[#a11e22] my-6 font-bold">{{ $month }}</h3>
                               
                            
                                <div class="overflow-x-auto">
                                    <table class="flex flex-col min-w-full text-sm text-left ">
                                        <tbody class="border-b ">
                                            <tr class="border-b text-[12px] text-[#1ea19d]">
                                                <th class="p-[10px]">Date</th>
                                                <th class="p-[8px]">Duration</th>
                                                <th class="p-[8px]">Location</th>
                                                <th class="p-[10px]">Standard Fee</th>
                                                <th class="p-[10px]">Action</th>
                                            </tr>
                                        {{-- </tbody>
                                        <tbody> --}}
                                            @forelse ($schedules as $schedule)
                                                @if (empty($schedule->course))
                                                    @continue
                                                @endif
                                                <tr class=" text-[10px] py-2 border-b"  >
                                                    <td class="px-[6px] text-center"> {{ date('j M', strtotime($schedule->from)) }} -
                                                        {{ date('j M', strtotime($schedule->to)) }}</td>
                                                    <td class="px-[4px] text-center">{{ $schedule->duration }}
                                                        {{ ngettext('day', 'days', $schedule->duration) }}</td>
                                                    <td class="px-[6px] text-center">{{ "{$schedule->city->name}" }}</td>
                                                    <td class="px-[6px] text-center">
                                                        @if (request()->getHttpHost() == config('domains.rwanda'))
                                                        {{ ($rwf = @$schedule->currencies->firstWhere('code', 'RWF')) ? 'RWF ' . number_format($rwf->pivot->amount) : '' }}
                                                    @else
                                                        {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '' }}
                                                        @if (!empty($kes))
                                                            &vert;
                                                        @else
                                                            
                                                        @endif
                                                    @endif
                                                    ${{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                    </td>
                                                    <td class="px-[6px] text-center">
                                                        <a class="inline-block ires-primary-btn text-white rounded-full px-2 py-1"
                                                            href="{{ route('course.booking.create', ['course' => $course, 'class' => 'physical', 'schedule' => $schedule->id]) }}">
                                                            Register
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="px-4 py-2 text-center">No schedules available for this month.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
        
                    <div class="tab-pane active" id="table4">
                        @php
                            // Collect and group schedules by month
                            $monthly_schedules = $course->virtualClasses
                                ->load('currencies')
                                ->filter(function ($schedule) {
                                    return strtotime('today') <= strtotime($schedule->booking_end);
                                })
                                ->groupBy(function ($schedule) {
                                    return date('F Y', strtotime($schedule->from)); // Group by month and year
                                });

                            // Get the current month and year
                            $current_month = date('F Y');

                            // Check if there are no schedules available
                            $no_schedules = $monthly_schedules->isEmpty();
                        @endphp 

                        <div id="schedule-container">
                            @if ($no_schedules)
                                <p>Unfortunately, we do not have any dates scheduled at this time. Do you have a date in mind when you would like to take your training?</p>
                                <p>Contact us at:</p>
                                <ul class="list-none">
                                    <li><i class="fas fa-envelope mr-2"></i>Email: <a class="text-blue-500" href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a></li>
                                    <li><i class="fas fa-phone mr-2"></i>Phone: <a class="text-blue-500" href="tel:+254715077817">+254715 077 817</a></li>
                                </ul>
                                <a href="#"  data-toggle="modal" data-target="#customizeDates" onclick="document.getElementById('custom-date').showModal()"  class="inline-block bg-[#1ea19d] text-white rounded-full px-5 py-2 mt-4">Request Custom Schedule</a>
                            @else
                                @foreach ($monthly_schedules as $month => $schedules)
                                    <div>
                                        <h3 class="text-lg font-bold">{{ $month }}</h3>
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full text-sm text-left">
                                                @if ($schedules->count() > 0)
                                                    <thead class="border-b">
                                                        <tr>
                                                            
                                                            <th class="p-[2px]">Date</th>
                                                            <th class="p-[2px]">Duration</th>
                                                            <th class="p-[2px]">Mode</th>
                                                            <th class="p-[2px]">Standard Fee</th>
                                                            <th class="p-[2px]">Action</th>
                                                        </tr>
                                                    </thead>
                                                @endif
                                                <tbody>
                                                    @forelse ($schedules as $schedule)
                                                    @if (empty($schedule->course))
                                                            {{-- Skip the current iteration if the course is empty {{ $schedule->course->code }}--}}
                                                            @continue
                                                        @endif
                                                        <tr class="border-b">
                                                        
                                                            <td class="p-[2px]">{{ date('j M', strtotime($schedule->from)) }} -
                                                                {{ date('j M', strtotime($schedule->to)) }}</td>
                                                            <td class="p-[2px]">{{ $schedule->duration }}
                                                                {{ ngettext('day', 'days', $schedule->duration) }}</td>
                                                            <td class="p-[2px]">{{ $schedule->period }}</td>
                                                            <td class="p-[2px]">
                                                                {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }}
                                                                &vert;
                                                                $
                                                                {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                            </td>
                                                            <td class="p-[2px]">
                                                                <a class="inline-block bg-[#1ea19d] text-white rounded-full px-5 py-1"
                                                                    href="{{ route('course.booking.create', ['course' => $course, 'class' => 'virtual', 'schedule' => $schedule->id]) }}">
                                                                    Register
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="px-4 py-2 text-center">No schedules available for this month.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
          {{-- end --}}
        {{-- end mobile schedules --}}


        <!--Course content-->

        <div class="container w-/ mx-auto ">
            <div class="text-[16px] flex mt-14 lg:px-20 xl:px[176px] flex-wrap" id="main-row">
                
                <div class="w[110%] pl-10 md:w-3/4 mb-12">
                    <!-- course description  id="overview" -->
                    <div class="bg-white py-6 pr-6  *:mb-1">
                        <hr class="border-gray-300">
                        <div class="mt-6 *:mb-4">
                           {!! $course->description !!}
                            
                        </div>
                        <hr class="border-black mt-3">
                        <div id="level" class="mt-4 module">
                            <h6 class="text-[#a11e22]"> <strong>Course Level:</strong>  <label>{{ $course->level }}</label></h6>
                            <div id="outline" class="clearfix mt-4"></div>
                        </div>
                        
                        <!-- END course dates -->
        
                        <div class="mt-4 module">
                            {!! $course->outline !!}
                        </div>
                        <hr class="border-secondary mt-4">
                        <div class="mt-6 module">
                            {!! $course->module !!}
                            <hr class="border-secondary mt-4">
                        </div>

                        <div id="administration" class="clearfix mt-4"></div>

                        <h6 class="mt-4 text-[#a11e22]">Related Courses</h6>
                        <hr class="border-secondary mt-4">
                        <div class="mt-4">
                            @if ($course->subcategory)
                                @php
                                    $other_courses = $course->subcategory->courses()
                                                            ->where('courses.id', '<>', $course->id)
                                                            ->inRandomOrder()
                                                            ->take(6)
                                                            ->get();
                                @endphp
        
                                @if ($other_courses->isNotEmpty())
                                    @foreach ($other_courses as $other_course)
                                        <ul class="list-disc *:mb-3 pl-12">
                                            <li>
                                                <a href="{{ route('course.show', $other_course) }}" class="text-[#007bff] hover:text-[#0056b3]">
                                                    {{ $other_course->name }}
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @else
                                    <p>No related courses found in the same sub-category.</p>
                                @endif
                            @endif
                        </div>
                        <hr class="border-secondary mt-4">
                        
                        <div class="mt-4">
                            <h4  class="text-2xl font-bold text-[#a11e22]">Course Administration Details:</h4>
                            <h5 class=" text-lg text-[#a11e22] mt-3">METHODOLOGY</h5>
                            <p class="mt-2">The instructor-led trainings are delivered using a blended learning approach and comprise presentations, guided sessions of practical exercise, web-based tutorials, and group work. Our facilitators are seasoned industry experts with years of experience, working as professionals and trainers in these fields.
                            All facilitation and course materials will be offered in English. The participants should be reasonably proficient in English.</p>

                            <h5 class="text-lg text-[#a11e22] mt-3">ACCREDITATION</h5>
                            <p class="mt-2">Upon successful completion of this training, participants will be issued an Indepth Research Institute (IRES) certificate certified by the National Industrial Training Authority (NITA).</p>

                            <h5 class="text-lg text-[#a11e22] mt-3">TRAINING VENUE</h5>
                            <p class="mt-2">The training will be held at IRES Training Centre. The course fee covers the course tuition, training materials, two break refreshments, and lunch. All participants will additionally cater to their travel expenses, visa application, insurance, and other personal expenses.</p>

                            <h5 class="text-lg text-[#a11e22] mt-3">ACCOMMODATION AND AIRPORT PICKUP</h5>
                            <p class="mt-2">Accommodation and airport pickup are arranged upon request. For reservations contact the Training Officer.</p>
                            <ul class="list-none ml-8 mt-2">
                                <li class="text-[13px] lg:text-[16px] flex items-center">
                                    <i class="fa fa-envelope mr-2"></i>
                                    <strong>Email: <a class="text-blue-500 hover:underline" href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a></strong>
                                </li>
                                <li class="text-[13px] lg:text-[16px] flex items-center mt-2">
                                    <i class="fa fa-phone mr-2"></i>
                                    <strong>Phone: <a class="text-blue-500 hover:underline" href="tel:+254715077817">+254715 077 817</a></strong>
                                </li>
                            </ul>

                            <h5 class="text-lg text-[#a11e22] mt-3">TAILOR-MADE</h5>
                            <p class="mt-2">This training can also be customized to suit the needs of your institution upon request. You can have it delivered in our IRES Training Centre or at a convenient location. For further inquiries, please contact us on:</p>
                            <ul class="list-none ml-8 mt-2">
                                <li class="text-[13px] lg:text-[16px] flex items-center">
                                    <i class="fa fa-envelope mr-2"></i>
                                    <strong>Email: <a class="text-blue-500 hover:underline" href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a></strong>
                                </li>
                                <li class="text-[13px] lg:text-[16px] flex items-center mt-2">
                                    <i class="fa fa-phone mr-2"></i>
                                    <strong>Phone: <a class="text-blue-500 hover:underline" href="tel:+254715077817">+254715 077 817</a></strong>
                                </li>
                            </ul>

                            <h5 class="text-lg text-[#a11e22] mt-3">PAYMENT</h5>
                            <p class="mt-2">Payment should be transferred to the IRES account through a bank on or before the start of the course. Send proof of payment to <strong><a class="text-blue-500 hover:underline" href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a></strong></p>
                        </div>
                        <a href="http://www.copyscape.com/" class="block mt-4">
                            <img src="//banners.copyscape.com/img/copyscape-banner-black-200x25.png" width="200" height="25" alt="Protected by Copyscape" title="Protected by Copyscape - Do not copy content from this page." />
                        </a>
                        <hr class="border-[#a11e22] mt-6">
                    </div>
                </div>
                <div class="w-full text-sm px-10 sticky top-50 md:w-1/4 ">
                    <div class="w-55% lg:w-[110%] 2xl:w-[180%]  bg-[#cccccc] shadow-lg rounded-lg mb-16">
                        <div class="bg-[#1ea19d] text-white text-center font-bold p-4">
                            Course Registration
                        </div>
                        <div class="p-4">
                            <p class="mb-4 text-center">Click here to register for this course.</p>
                            <a href="#enroll" class="bg-[#1ea19d] text-white rounded-full px-5 py-2 block text-center">Register Now</a>
                        </div>
                    </div>
                    <div class="w-55% lg:w-[110%] 2xl:w-[180%] bg-[#cccccc] shadow-lg rounded-lg mb-16">
                        <div class="bg-[#1ea19d] text-white text-center font-bold p-4">
                            Customize Attendance Dates
                        </div>
                        <div class="p-4">
                            <p class="mb-4 text-center">Customized Schedule is available for all courses irrespective of dates on the Calendar. Please get in touch with us for details.</p>
                            <button href="#" data-toggle="modal" data-target="#customizeDates" class="bg-[#1ea19d] text-white rounded-full px-5 py-2 w-full mx-auto block text-center" onclick="document.getElementById('custom-date').showModal()">Customize Attendance</button>
                        </div>
                    </div>
                    <div class="w-55% lg:w-[110%] 2xl:w-[180%] bg-[#cccccc] shadow-lg rounded-lg">
                        <div class="bg-[#1ea19d] text-white text-center font-bold p-4">
                            Information Request
                        </div>
                        <div class="p-4">
                            <p class="mb-4 text-center">Do you need more information on our courses? Talk to us.</p>
                            <button href="#" class="bg-[#1ea19d] w-full mx-auto text-white rounded-full px-5 py-2 block text-center" data-toggle="modal" data-target="#course-enquiry" onclick="document.getElementById('course-enquiry').showModal()">Inquire Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- social share -->

        <div class="w-full mt-10 lg:mt-0 px-10 lg:mx-20 2xl:px[200px] ">
            <h4 class="text-left text-[22px] pb-10 text-[#a11e22]">Share this course:</h4>
            {{-- <hr class="border-gray-300  my-4" /> --}}
            <div class="flex flex-wrap w-full gap-2">
                <a class=" items-center justify-center bg-transparent border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white rounded-full w-full lg:w-max text-center lg:px-7 py-2 text-sm"
                    href="http://www.facebook.com/sharer.php?u={{ route('course.show', $course) }}" target="_blank"
                    title="Share on Facebook">
                    <i class="fab fa-facebook-square mr-2"></i> Share
                </a>
                <a class=" items-center justify-center bg-transparent border border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white rounded-full w-full lg:w-max text-center lg:px-7 py-2 text-sm"
                    href="https://twitter.com/share?url={{ route('course.show', $course) }}" target="_blank"
                    title="Share on Twitter">
                    <i class="fab fa-twitter mr-2"></i> Tweet
                </a>
                <a class="inline-flex items-center justify-center bg-transparent border border-blue-700 text-blue-700 hover:bg-blue-700 hover:text-white rounded-full w-full lg:w-max text-center lg:px-7 py-2 text-sm"
                    href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('course.show', $course) }}"
                    target="_blank" title="Share on LinkedIn">
                    <i class="fab fa-linkedin-in mr-2"></i> Share
                </a>
                <a class="inline-flex items-center justify-center text-center lg:px-7 bg-transparent border border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded-full w-full lg:w-max  py-2 text-sm"
                    href="https://wa.me/?text={{ route('course.show', $course) }}" target="_blank"
                    title="Share on WhatsApp">
                    <i class="fab fa-whatsapp mr-2"></i> Share
                </a>
                <a class=" items-center justify-center text-center lg:px-7 py-2 bg-transparent border border-gray-500 text-black hover:bg-black hover:text-white rounded-full w-full lg:w-max text-sm"
                    href="mailto:?subject={{ urlencode('Check out this course: ' . $course->title) }}&body={{ urlencode('I found this interesting course and thought you might like it. Check it out here: ' . route('course.show', $course)) }}"
                    target="_blank" title="Share via Email">
                    <i class="fas fa-envelope mr-2"></i> Share via Email
                </a>
                <a class=" items-center justify-center bg-transparent border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded-full w-full lg:w-max text-center lg:px-7 py-2 text-sm"
                    href="https://www.reddit.com/submit?url={{ route('course.show', $course) }}" target="_blank"
                    title="Share on Reddit">
                    <i class="fab fa-reddit-alien mr-2"></i> Share
                </a>
            </div>
        </div>
        <hr class="lg:hidden block border-gray-300 mt-10">
          
        <!-- END (social) share -->

        <!-- other applicants section -->
        <div class="w-full mt-12">
            @php
                $course_bookings = App\CourseBooking::whereCourseId($course->id)
                    ->when(Auth::check() and Gate::check('customer'), function ($query) {
                        $query->whereHas('customer', function ($query) {
                            $query->where('id', '<>', App\Customer::whereUserId(Auth::id())->first()->id);
                        });
                    })
                    ->with('customer')
                    ->inRandomOrder()
                    ->take(5)
                    ->get();
            @endphp
        
            @if ($course_bookings->count() > 0)
                <div class=" lg:border px-6 lg:mx-20 pb-12 rounded-md lg:shadow-lg">
                    <div class="my-4">
                        <h4 class="text-[24px] text-[#a11e22] ">Who else has taken this course?</h4>
                        <hr class="border-gray-300 my-2">
                    </div>
                    <div>
                        <table class="w-full lg:min-w-full text-[13px] lg:text-[16px]   bg-white border border-gray-200 rounded-md">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <th class="py-2 px-3 lg:px-4 border border-gray-300">#</th>
                                    <th class="py-2 px-3 lg:px-4 border border-gray-300">Job Title</th>
                                    <th class="py-2 px-3 lg:px-4 border border-gray-300">Organisation</th>
                                    <th class="py-2 px-3 lg:px-4 border border-gray-300">Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course_bookings as $course_booking)
                                    <tr class="border-t">
                                        <td class="py-2 px-3 lg:px-4 border border-gray-200">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-3 lg:px-4 border border-gray-200">{{ ucfirst($course_booking->customer->designation ?? '') }}</td>
                                        <td class="py-2 px-3 lg:px-4 border border-gray-200">{{ $course_booking->customer->company->name ?? '' }}</td>
                                        <td class="py-2 px-3 lg:px-4 border border-gray-200">{{ ucfirst($course_booking->customer->country ?? '') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
       
        <!-- END other applicants section -->

        <!-- Related Courses Section -->
        <div class="w-full  py-4">
            <div class="w-full md:w-5/6 lg:my-10 mx-auto relative">
                <hr class="hidden lg:block absolute top-1/2 left-1/2 w-2/5 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full">
                <h5 class="text-left md:text-center text-[#a11e22] text-xl sm:text-2xl capitalize font-bold relative z-10 bg-white w-max px-10 lg:px-2 lg:mx-auto p-4 rounded-5xl">Related Courses</h5>
            </div>
            <p class="px-10 text-left lg:text-center lg:px-20 xl:px-88 mb-4 lg:mb-10 ">People who took this course also viewed:</p>
            {{-- <hr class="border-t mx-10  lg:mx-40 xl:mx-[88px] border-gray-300 mb-4" /> --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-16 lg:gap-x-8 px-10 lg:mx-20 2xl:px[88px] mt-8 lg:mt-4 pt-2 pb-6 lg:pb-16 ">
                {{-- Show courses that belong to the same sub-category --}}
                @if ($course->subcategory)
                    @php
                        $other_courses = $course->subcategory->courses()
                                            ->where('courses.id', '<>', $course->id)
                                            ->inRandomOrder()
                                            ->take(4)
                                            ->get();
                    @endphp
        
                    @if ($other_courses->isNotEmpty())
                        @foreach ($other_courses as $other_course)
                            <div class="h-[300px] bg-white shadow-lg rounded-lg transform transition-transform duration-300 hover:scale-105 overflow-hidden">
                                <a href="{{ route('course.show', $other_course) }}">
                                    <img src="{{ asset('storage/' . $other_course->cover) }}" class="w-full h-40 object-cover" alt="{{ $other_course->name }}">
                                </a>
                                <div class="p-4 ">
                                    <a href="{{ route('course.show', $other_course) }}">
                                        <h5 class="text-sm hover:text-[#1ea19d] font-normal">{{ $other_course->name }}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No related courses found in the same sub-category.</p>
                    @endif
                @endif
            </div>
        </div>
        
        <!-- End Related Courses Section -->

         <!-- custom date modal -->
         <dialog id="custom-date">
            
            @include('front.Projects.custom_date')

        </dialog>
        
        <!-- course enquire modal -->
        <dialog id="course-enquiry">

            @include('front.Projects.course_enquiry')

        </dialog>
        
        
        {{-- end --}}

        @component('schema')
            "@type": "Course",
            "name": "{{ $course->name }}",
            "image": "{{ $course->cover }}",
            "description": "{{ $course->description }}",
            "provider": {
            "@type": "Organization",
            "name": "Indepth Research Institute - IRES",
            "sameAs": [
            "https://twitter.com/Indepthresearch",
            "https://www.facebook.com/indepthresearch",
            "https://www.instagram.com/indepthresearchinstitute/",
            "https://www.linkedin.com/company/indepth-research-services",
            "https://www.youtube.com/@indepthresearchinstitute"
            ]
            },
            "hasCourseInstance": {
            "@type": "CourseInstance",
            "courseMode": "offline",
            "startDate": "{{ $course->start_date }}",
            "endDate": "{{ $course->end_date }}"
            }
        @endcomponent
    </div>
</div>

@section('js_content')

    {{-- js script for floating button --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

    <script>
        function closeModal() {
            document.getElementById('customizeDates').classList.add('hidden');
        }
    </script>


    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.tab-button');
            const panes = document.querySelectorAll('.tab-pane');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    buttons.forEach(btn => {
                        btn.classList.remove('active')
                        btn.classList.toggle('bg-[#a11e22]')
                        btn.classList.toggle('text-[#1ea19d]')
                    });
                    panes.forEach(pane => pane.classList.toggle('hidden'));

                    button.classList.add('active');
                    // document.getElementById(button.dataset.tab).classList.add('active');
                });
            });
        });
    </script>

<script>
    // JavaScript to toggle between individuals and corporate packages
    document.getElementById('explore-individuals').addEventListener('click', function() {
        document.getElementById('individual-packages').classList.remove('hidden');
        document.getElementById('corporate-packages').classList.add('hidden');

        // Change button colors
        this.classList.add('bg-[#a11e22]', 'text-white');
        document.getElementById('explore-corporate').classList.remove('bg-[#a11e22]', 'text-white');
        document.getElementById('explore-corporate').classList.add( 'text-black');
    });

    document.getElementById('explore-corporate').addEventListener('click', function() {
        document.getElementById('corporate-packages').classList.remove('hidden');
        document.getElementById('individual-packages').classList.add('hidden');

        // Change button colors
        this.classList.add('bg-[#a11e22]', 'text-white');
        document.getElementById('explore-individuals').classList.remove('bg-[#a11e22]', 'text-white');
        document.getElementById('explore-individuals').classList.add( 'text-black');
    });
</script>

    
   <!--JS for the sticky scroll  menu-->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-link-taps');
            const sections = document.querySelectorAll('section');
    
            function activateLink(link) {
                navLinks.forEach((a) => {
                    a.classList.remove('active', 'bg-[#1ea19d]', 'text-white');
                });
                link.classList.add('active', 'bg-[#1ea19d]', 'text-white');
            }
    
            navLinks.forEach((link) => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();  // Prevent default jump to the section
    
                    activateLink(link);
    
                    // Scroll smoothly to the selected section
                    const targetSection = document.querySelector(link.getAttribute('href'));
                    targetSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
    
            // Set "Register Now" as active by default on page load
            const defaultActiveLink = document.querySelector('.nav-link-taps[href="#enroll"]');
            activateLink(defaultActiveLink);
        });
    </script>
    
    {{-- <script>
        const packages = {
            'gold': ['Benefit 1', 'Benefit 2', 'Benefit 3'],
            'bronze': ['Benefit 1', 'Benefit 2', 'Benefit 3', 'Benefit 4'],
            'platinum': ['Benefit 1', 'Benefit 2', 'Benefit 3', 'Benefit 4', 'Benefit 5']
        };
    
        const goldCard = document.getElementById('gold-card');
        const bronzeCard = document.getElementById('bronze-card');
        const platinumCard = document.getElementById('platinum-card');
        const cardsContainer = document.getElementById('cards-container');
        const benefitsList = document.getElementById('benefits-list');
    
        // Handle card clicks to display the corresponding package and its benefits
        function displayPackage(packageName) {
            let selectedPackage = packages[packageName];
    
            // Clear existing benefits
            benefitsList.innerHTML = '';
    
            // Add the selected package benefits
            selectedPackage.forEach(benefit => {
                let li = document.createElement('li');
                li.textContent = benefit;
                benefitsList.appendChild(li);
            });
    
            // Move the selected card to the front
            cardsContainer.classList.remove('gold-active', 'bronze-active', 'platinum-active');
            cardsContainer.classList.add(`${packageName}-active`);
    
            // Reorder the cards visually
            if (packageName === 'gold') {
                cardsContainer.style.transform = 'translateX(0)';
            } else if (packageName === 'bronze') {
                cardsContainer.style.transform = 'translateX(-100%)';
            } else {
                cardsContainer.style.transform = 'translateX(-200%)';
            }
        }
    
        // Add event listeners to the package cards
        goldCard.addEventListener('click', () => displayPackage('gold'));
        bronzeCard.addEventListener('click', () => displayPackage('bronze'));
        platinumCard.addEventListener('click', () => displayPackage('platinum'));
    </script> --}}
    

@endsection
@endsection