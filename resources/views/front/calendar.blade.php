@extends('front.Projects.master')


@section('css')
<style>
/* Optional transition for dropdown */
    #dropdownContent {
        transition: all 0.3s ease;
    }

.dropdowncontent {
        max-height: 24rem; /* Sets the maximum height to 48px x 4 = 192px */
        overflow-y: auto;  /* Allows vertical scrolling */
    }

    /* *{
        outline: solid limegreen 1px;
    } */
</style>


@endsection





@section('content')
    <div class=" main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs pt-2 pb-3 pl-5 bg-[#0096FF] h-10 text-white" id="tp">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"></svg>

                <span class="text-white">Training Calendar</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="">
                <div class="w-full lg:w-5/6 lg:mx56 container px-4 mx-auto">
                    <div class="mt-16">
                        <span class="ip-heading">
                            <h3 class="text-[#00a651] text-3xl">
                                Training Calendar.
                            </h3>
                        </span>
                    </div>
                    <!-- course tables -->
                    <div class="ip-courses-sum">
                        <div class="my-10">
                            <h3 class="text-[#00a651] text-xl">Pick your preferred date for your preferred course</h3>
                            {{-- <hr/> --}}
                        </div>
                        <!-- courses -->

                        <!-- filter courses -->
                        <div class="ires-tb-filter px2 lg:px-0 w-full dropdown" id="tp">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div class="mb-2">

                                    <div class="dropdown ires-tb-filter block relative">
                                        <!-- Dropdown Button -->
                                        <div id="dropdownButton" class="w-full flex justify-between bg-[#0096FF] border border-gray-400 text-white py-3 px-4 rounded cursor-pointer" name="category" id="lang">
                                                <span>All Course Categories</span>
                                                <div class="ml-2 transform transition-transform duration-500 ease-in-out">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                        </div>
                                        <!-- Dropdown Content -->

                                        <div id="dropdownContent" class="max-h-[24rem] lg bg-[#0096FF] text-white dropdowncontent absolute lg:w-[170%] hidden border border-gray-300 mt-1 z-10">
                                            <div class="block px-4 py-2 text-white font-bold">By Category</div>
                                            @foreach (App\Subcategory::all() as $subcategory)
                                                @if ($subcategory->courses->count() > 0)
                                                    <a href=" {{ route('training_calendar.index', ['category' => $subcategory->id]) }}" {{ $subcategory->id == $category ? 'selected' : '' }} class="block px-8 py-2 text-white hover:bg-gray-500">
                                                        {{ $subcategory->name }}
                                                    </a>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                                <div class="mb-2">
                                    <a class="block w-full bg-[#0096FF] border border-gray-400 text-white py-3 px-4 rounded focus:outline-none focus:ring focus:border-[#0096FF]" href="{{ route('training_calendar.export', request()->query()) }}" target="_blank">
                                        Export to Excel
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- END filter courses -->

                        @if ( $schedules->isEmpty() )

                            <p>No results found.</p>

                         @else

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

                                <h4 class="text-[#00a651] my-6 text-2xl">
                                    {{ date('F', mktime(0, 0, 0, $month, 1, date('Y')) ) }}

                                    {{ request()->query('year') ?? date('Y') }}
                                </h4>

                                <div class="hidden bg-white lg:block">
                                    <table class="table-auto table-responsive border *:text-[14px] w-full text-left">
                                        <thead >
                                            <tr class="bg-gray-100 *:border text-[#0096FF]">
                                                {{-- <th class="px-4 py-2">Code</th> --}}
                                                <th class="w-1/3 px-4 py-2">Title</th>
                                                <th class="px-4 py-2">Date</th>
                                                <th class="px-4 py-2">Duration</th>
                                                <th class="px-4 py-2">Location</th>
                                                <th class=""></th>
                                            </tr>
                                        </thead>
                                        <tbody class="border-l">
                                            @forelse ($month_schedule as $schedule)

                                                @if ( empty($schedule->course) )
                                                    {{-- skip the current iteration --}}
                                                    @continue
                                                @endif

                                                <tr class="lg:h-20 *:border">
                                                    {{-- <td class="px-4 py-2">{{ $schedule->course->code }}</td> --}}
                                                    <td class="w-1/4 px-4 py-2  hover:text-[#0096FF]">
                                                        <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}">
                                                            {{ $schedule->course->name }}
                                                        </a>
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        {{ date('j M', strtotime($schedule->from)) }}
                                                        &nbsp; - &nbsp;
                                                        {{ date('j M', strtotime($schedule->to)) }}
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        {{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        @if ($schedule->type == 'virtual')
                                                            Virtual
                                                        @else
                                                            {{ "{$schedule->city->name}" }}
                                                        @endif
                                                    </td>
                                                    <td class=" text-[12px] hover:scale-110 transition duration-500 pl-5 fontbold  py-2 border ">
                                                        <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}" class="animation-one">
                                                            <span class="border border-[#0096FF] hover:bg-[#00a651] hover:text-white wmax  p-3">Details & more dates...</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        No courses available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                               <!--Table for Small Screen-->

                                <div class="lg:hidden bg-white block">
                                    <table class="table-auto table-responsive border *:text-[12px] w-full text-left">
                                        <thead >
                                            <tr class="bg-gray-100 *:border text-[#0096FF]">
                                                {{-- <th class="px-4 py-2">Code</th> --}}
                                                <th class="w-1/3 px-4 py-2">Title</th>
                                                <th class="w-1/4 px-4 py-2">Date</th>
                                                <th class="w-1/4 px-4 py-2">Duration</th>
                                                <th class="w-1/4 px-4 py-2">Location</th>
                                                {{-- <th class="w-1/4 hidden lg:block"></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="border-l">
                                            @forelse ($month_schedule as $schedule)

                                                @if ( empty($schedule->course) )
                                                    {{-- skip the current iteration --}}
                                                    @continue
                                                @endif

                                                <tr class="*:border">
                                                    {{-- <td class="px-4 py-2">{{ $schedule->course->code }}</td> --}}
                                                    <td class="w-1/3 px-4 py-2  hover:text-[#0096FF]">
                                                        <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}">
                                                            {{ $schedule->course->name }}
                                                        </a>
                                                    </td>
                                                    <td class="w-1/4 px-4 py-2">
                                                        {{ date('j M', strtotime($schedule->from)) }}
                                                        &nbsp; - &nbsp;
                                                        {{ date('j M', strtotime($schedule->to)) }}
                                                    </td>
                                                    <td class="w-1/4 px-4 py-2">
                                                        {{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}
                                                    </td>
                                                    <td class="w-1/4 px-4 py-2">
                                                        @if ($schedule->type == 'virtual')
                                                            Virtual
                                                        @else
                                                            {{ "{$schedule->city->name}" }}
                                                        @endif
                                                    </td>
                                                    {{-- <td class="w-1/4  text-[12px] hover:scale-110 transition duration-500 pl-5 fontbold  py-2 border ">
                                                        <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}" class="animation-one">
                                                            <span class="border border-[#0096FF] hover:bg-[#00a651] hover:text-white w-max  p-3">Details & more dates...</span>
                                                        </a>
                                                    </td> --}}
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        No courses available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                          @endfor

                        @endif
                    </div>
                </div>



                <div class="my-20 lg:px-44 w-max">
                    {{ $schedules->links('front.partials.pagination') }}
                </div>
                <!-- END page content -->
            </div>

            <!-- END page container -->

        </div>

    </div>
@endsection


@section('js_content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdownButton = document.getElementById('dropdownButton');
        var dropdownContent = document.getElementById('dropdownContent');

        // Toggle dropdown visibility on button click
        dropdownButton.addEventListener('click', function(event) {
            event.stopPropagation();  // Stop propagation to prevent the window click listener from immediately closing the dropdown
            dropdownContent.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside of it
        window.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target)) {
                dropdownContent.classList.add('hidden');
            }
        });
    });
</script>






@endsection




@push('script')
<script>
    // Get the select element
    const select = document.getElementById('lang');

    // Add a change event listener to the select element
    select.addEventListener('change', function () {
        // Get the selected option's value (URL)
        const selectedValue = this.value;

        // Check if a valid URL is selected
        if (selectedValue && selectedValue !== 'select') {
            // Redirect to the selected URL
            window.location.href = selectedValue;
        }
    });
</script>
@endpush
