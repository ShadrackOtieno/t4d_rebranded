@extends('front.Projects.master')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs pt-2 pb-3 pl-5 bg-[#1ea19d] h-10 text-white" id="tp">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"></svg>

                <span class="text-white">Training Calendar</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="">
                <div class="w-full lg:w-2/3 lg:mx56 container px-4 lg:mx-auto">
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
                                    <select class="block w-full bg-[#1ea19d] border border-gray-400 text-white py-3 px-4 rounded focus:outline-none focus:border-[#1ea19d]" name="languages" id="lang">
                                        <optgroup class="text-left " label="By Category">
                                            <option class="text-left text-white" value="">All Course Categories</option>
                                            @foreach (App\Subcategory::all() as $subcategory)
                                            @if ($subcategory->courses->count() > 0)
                                                <option class="text-left"
                                                        value="{{ route('training_calendar.index', ['category' => $subcategory->id]) }}"
                                                    {{ $subcategory->id == $category ? 'selected' : '' }} >
                                                    {{ $subcategory->name }}
                                                </option>
                                                {{-- {{ route('training_calendar.index', request()->only(['year', 'duration'])) }} --}}
                                            @endif
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <a class="block w-full bg-[#1ea19d] border border-gray-400 text-white py-3 px-4 rounded focus:outline-none focus:ring focus:border-[#1ea19d]" href="{{ route('training_calendar.export', request()->query()) }}" target="_blank">
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
                                        <tr class="bg-gray-100 *:border text-[#1ea19d]">
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

                                            <tr class="*:border">
                                                {{-- <td class="px-4 py-2">{{ $schedule->course->code }}</td> --}}
                                                <td class="w-1/4 px-4 py-2  hover:text-[#1ea19d]">
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
                                                        <span class="border border-[#1ea19d] hover:bg-[#00a651] hover:text-white w-max  p-3">Details & more dates...</span>
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
                                        <tr class="bg-gray-100 *:border text-[#1ea19d]">
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
                                                <td class="w-1/3 px-4 py-2  hover:text-[#1ea19d]">
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
                                                        <span class="border border-[#1ea19d] hover:bg-[#00a651] hover:text-white w-max  p-3">Details & more dates...</span>
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

            <div class="my-20 px-44 w-max">
                {{ $schedules->links('front.partials.pagination') }}
             </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
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
