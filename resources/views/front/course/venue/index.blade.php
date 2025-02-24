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
</style>


@endsection

@section('content')
    <div class="main-body">

        <!-- page container -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs mt16 py-3 pl-5 bg-[#1ea19d] h-10 text-white">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
    
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                <!-- current page -->
                <span class="bc-current-page">
                    Training Courses in {{ $city->name }}
                </span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="w-full lg:w-5/6 lg:mx56 container px-4 mx-auto">
                <div class="container">
                    <!-- course tables -->
                    <div class="ip-courses-sum">
                        <div class="mt-20 mb-16 ip-inner-header">
                           <h1 class="text-[#a11e22] text-3xl">Choose your preferred Date and Course for<br> <span>Training in 
                                <a class="text-[#1ea19d]" href="{{ route('course.venue.show', ['city' => $city->name]) }}">
                                    {{ $city->name }}
                                </a></span>
                            </h1> 
                        
                        </div>
                        <!-- courses -->

                        <!-- filter courses -->
                        <div class="ires-tb-filter px2 lg:px-0 w-full" id="tp">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div class="mb-2">
                                    
                                    {{-- <select class="block w-full bg-[#1ea19d] border border-gray-400 text-white py-3 px-4 rounded focus:outline-none focus:border-[#1ea19d]" name="categories" id="lang">
                                        <optgroup label="By Category">
                                            <option>All Course Categories</option>
                                            @foreach (App\Subcategory::all() as $subcategory)
                                                @if ($subcategory->courses->count() > 0)
                                                    <option class="text-black" value="{{ route('course.venue.index', ['city' => $city ?? '', 'category' => $subcategory->id]) }}" {{ $category == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    </select> --}}

                                    {{-- <form method="GET" action="{{ route('course.venue.index') }}">
                                        <select class="block w-full bg-[#1ea19d] border border-gray-400 text-white py-3 px-4 rounded focus:outline-none focus:border-[#1ea19d]" name="category" id="lang" onchange="this.form.submit()">
                                            <optgroup label="By Category">
                                                <option value="" class="text-black">All Course Categories</option>
                                                @foreach (App\Subcategory::all() as $subcategory)
                                                    @if ($subcategory->courses->count() > 0)
                                                    <option class="text-black" value="{{ route('course.venue.index', ['city' => $city->name ?? '', 'category' => $subcategory->id]) }}" {{ $category == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->name }}
                                                    </option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </form> --}}

                                    <div class="dropdown ires-tb-filter block relative">
                                        <!-- Dropdown Button -->
                                        <div id="dropdownButton" class="w-full flex justify-between bg-[#1ea19d] border border-gray-400 text-white py-3 px-4 rounded cursor-pointer" name="category" id="lang">
                                            <span>All Course Categories</span>
                                            <div class="ml-2 transform transition-transform duration-500 ease-in-out">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <!-- Dropdown Content -->
                                        
                                        <div id="dropdownContent" class="max-h-[24rem] lg bg-[#1ea19d] text-white dropdowncontent absolute lg:w-[170%] hidden border border-gray-300 mt-1 z-10">
                                            <div class="block px-4 py-2 text-white font-bold">By Category</div>
                                            @foreach (App\Subcategory::all() as $subcategory)
                                                @if ($subcategory->courses->count() > 0)
                                                    <a href="{{ route('course.venue.index', ['city' => $city ?? '', 'category' => $subcategory->id]) }}" {{ $category == $subcategory->id ? 'selected' : '' }} class="block px-8 py-2 text-white hover:bg-gray-500">
                                                        {{ $subcategory->name }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    


                                </div>
                                <div class="mb-2">
                                    <a class="block w-full bg-[#1ea19d] border border-gray-400 text-white py-3 px-4 rounded focus:outline-none focus:ring focus:border-[#1ea19d]" href="{{ route('training_calendar.export', request()->query()) }}" target="_blank">
                                        Export to Excel
                                    </a>
                                </div>
                            </div>
                            
                        </div>

                        <!-- END filter courses -->

                        @if ($schedules->isEmpty())
                            <p>No schedules available for this location.</p>
                        @else
                            @for ($month = 1; $month <= 12; $month++)
                                @php
                                    $month_schedule = $schedules->filter(function ($schedule) use ($month) {
                                        return date('n', strtotime($schedule->from)) == $month;
                                    });
                                @endphp

                                @if ($month_schedule->isEmpty())
                                    {{-- skip the current iteration --}}
                                    @continue
                                @endif

                                <h4 class="text-[#a11e22] my-6 text-2xl">
                                    {{ date('F', mktime(0, 0, 0, $month, 1, date('Y'))) }}

                                    {{ request()->query('year') ?? date('Y') }}
                                </h4>

                                {{-- Table for large screens --}}
                                <div class="hidden bg-white lg:block">
                                    <table class="table-auto border w-full text-left">
                                        <thead>
                                            <tr class="bg-gray-100 *:border text-[#1ea19d]">
                                                {{-- <th scope="col">Code</th> --}}
                                                <th class="w-1/3 px-4 py-2">Title</th>
                                                <th class="px-4 py-2">Date</th>
                                                <th class="px-4 py-2">Duration</th>
                                                {{-- <th scope="col">Location/Period</th> --}}
                                                <th class="px-4 py-2">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border-l">
                                            @forelse ($month_schedule as $schedule)
                                                @if (empty($schedule->course))
                                                    @continue
                                                @endif
                                
                                                <tr class="*:border">
                                                    {{-- <td>{{ $schedule->course->code }}</td> --}}
                                                    <td class=" px-4 py-2 w-1/4">
                                                        <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}"
                                                            class="">
                                                            {{ $schedule->course->name }}
                                                        </a>
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        {{ date('j M', strtotime($schedule->from)) }} -
                                                        {{ date('j M', strtotime($schedule->to)) }}
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        {{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        <a class="bg-[#1ea19d] text-white px-3 py-1 rounded-md"
                                                            href="{{ route('course.booking.create', ['course' => $schedule->course, 'class' => 'physical', 'schedule' => $schedule->id]) }}">
                                                            Register
                                                        </a>
                                                        <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}"
                                                            class="bg-[#a11e22] text-white px-3 py-1 rounded-md ml-2">
                                                            More Details...
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="px-4 py-2 text-center">No courses available</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    
                                </div>
                                

                                <!-- Cards for small screens -->
                                <div class="block lg:hidden">
                                    <!-- Table for large screens -->
                                    {{-- <div class="hidden lg:block">
                                        <table class="table-auto border w-full text-left">
                                            <thead>
                                                <tr class="border-b">
                                                    <th class="px-4 py-2">Title</th>
                                                    <th class="px-4 py-2">Date</th>
                                                    <th class="px-4 py-2">Duration</th>
                                                    <th class="px-4 py-2">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($month_schedule as $schedule)
                                                    @if (empty($schedule->course))
                                                        @continue
                                                    @endif
                                                    <tr class="border-b">
                                                        <td class="w-1/4 px-4 py-2">
                                                            <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}" class="">
                                                                {{ $schedule->course->name }}
                                                            </a>
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            {{ date('j M', strtotime($schedule->from)) }} - {{ date('j M', strtotime($schedule->to)) }}
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            {{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}
                                                        </td>
                                                        <td class="px-4 py-2">
                                                            <a class="bg-[#1ea19d] text-white px-3 py-1 rounded-md" href="{{ route('course.booking.create', ['course' => $schedule->course, 'class' => 'physical', 'schedule' => $schedule->id]) }}">
                                                                Register
                                                            </a>
                                                            <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}" class="bg-[#a11e22] text-white px-3 py-1 rounded-md ml-2">
                                                                More Details...
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="px-4 py-2 text-center">No courses available</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div> --}}

                                    <!-- Cards for small screens -->
                                    <div class="block bg-white lg:hidden">
                                        <div class="flex flex-col mb-3">
                                            <!-- Table Headers -->
                                            <div class="flex justify-between font-bold border-b pb-2 mb-2 bg-gray-100">
                                                <div class="w-1/3 px-2">Title</div>
                                                <div class="w-1/4 px-2">Date</div>
                                                <div class="w-1/4 px-2">Duration</div>
                                                <div class="w-1/4 px-2">Actions</div>
                                            </div>
                                            <!-- Table Rows -->
                                            @forelse ($month_schedule as $schedule)
                                                @if (empty($schedule->course))
                                                    @continue
                                                @endif
                                                <div class="flex justify-between border-b pb-2 mb-2 even:bg-gray-100">
                                                    <!-- Title -->
                                                    <div class="w-1/3 pl-2 pr-6 text-[14px] text-[#1ea19d]">
                                                        <a href="{{ route('course.show', $schedule->course) }}{{ $schedule->type == 'virtual' ? '#virtual' : '#face-to-face' }}" class="">
                                                            {{ $schedule->course->name }}
                                                        </a>
                                                    </div>
                                                    <!-- Date -->
                                                    <div class="w-1/4 px-1">
                                                        {{ date('j M', strtotime($schedule->from)) }} - {{ date('j M', strtotime($schedule->to)) }}
                                                    </div>
                                                    <!-- Duration -->
                                                    <div class="w-1/4 px-1">
                                                        {{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}
                                                    </div>
                                                    <!-- Actions -->
                                                    <div class="w-1/4 px-1">
                                                        <a class="text-[#1ea19d]" href="{{ route('course.booking.create', ['course' => $schedule->course, 'class' => 'physical', 'schedule' => $schedule->id]) }}">
                                                            Register
                                                        </a>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center">
                                                    <p>No courses available</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                <!-- Stripe styles -->
                                <style>
                                    .stripe:nth-child(even) {
                                        background-color: #f8f9fa;
                                    }
                                </style>




                                {{-- grid end --}}
                            @endfor
                        @endif
                    </div>
                    
                            
                            
                     
                </div>
                
            </div>
            <!-- END page content -->

        </div>

        
        <!-- END page container -->

    </div>

    <div class="my-20 w-max lg:px-44">
        {{ $schedules->links('front.partials.pagination') }}
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
        select.addEventListener('change', function() {
            // Get the selected option's value (URL)
            const selectedValue = this.value;

            // Check if a valid URL is selected
            if (selectedValue && selectedValue !== 'select') {
                // Redirect to the selected URL
                window.location.href = selectedValue;
            }
        });
    </script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdownButton = document.getElementById('dropdownButton');
        var dropdownContent = document.getElementById('dropdownContent');

        // Toggle the dropdown visibility on button click
        dropdownButton.addEventListener('click', function(event) {
            dropdownContent.classList.toggle('hidden');
        });

        // Optional: Close the dropdown when clicking outside
        window.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
                dropdownContent.classList.add('hidden');
            }
        });
    });
</script> --}}

@endpush
