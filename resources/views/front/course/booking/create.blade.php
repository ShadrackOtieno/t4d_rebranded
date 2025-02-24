@extends('front.Projects.master')

@section('title', 'Course Registration Form')

@section('css')
    <style>
        *{
        /* outline: 1px solid limegreen; */
    }
    input, select{
        outline: 0.5px solid #1ea19d;
        &:focus{
            outline: 2px solid blue;
        }
        &:user-valid{
            outline: 2px solid #1ea19d;
            background-color: rgb(231, 248, 252);
        }
        &:user-invalid{
            outline: 2px solid red;
            background-color: #f59999;
        }
    }
    ol{
        list-style-type: decimal !important;
        background-color: #f5f4f4;
    }
    </style>
@endsection

@section('content')
    <div class="">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs py-3 pl-5 bg-[#1ea19d] h-10 text-white">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                <span >
                    <a href="{{ route('course.show', $course) }}">
                        {{ $course->name }}
                    </a>
                </span>
            </div>
            <!-- END page breadcrumbs -->

            {{-- <section class="py-16 mt-12 mb-16 mx-10">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold mb-4">Course Packages</h2>
                    <!-- Explore Buttons -->
                    <div class="space-x-4">
                        <button id="explore-individuals" class="bg-[#00a651] text-white font-bold py-2 px-6 rounded-full">
                            Explore for Individuals
                        </button>
                        <button id="explore-corporate" class=" font-bold py-2 px-6 rounded-full">
                            Explore for Corporate
                        </button>
                    </div> 
                </div>
                
                
                <!--Individual Package Cards -->
                <div id="individual-packages" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Basic Package (Bronze equivalent) -->
                    <div class=" border rounded-lg shadow-2xl transform scale-105 transition-all duration-300 p-6 bg-[#00a651]">
                        <div class="py-2 text-center text-white font-bold text-xl mb-4">STANDARD</div>
                        <div class="text-center text-4xl font-bold mb-2">15</div>
                        <div class="text-center mb-4">Course Benefits</div>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Tuition fee included
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Tea and lunch snacks
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="/register" class="ires-primary-btn text-white font-bold py-2 px-4 rounded-full">Register</a>
                        </div>
                    </div>
            
                    <!-- Advanced Package (Silver equivalent) -->
                    <div class="border rounded-lg shadow-lg p-6 " style="background-color:#CD7F32">
                        <div class=" py-2 text-center text-white font-bold text-xl mb-4">BRONZE</div>
                        <div class="text-center text-4xl font-bold mb-2">30</div>
                        <div class="text-center mb-4">Course Benefits</div>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Laptops included
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Study tours
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="/register" class="ires-primary-btn text-white font-bold py-2 px-4 rounded-full">Register</a>
                        </div>
                    </div>
            
                    <!-- Premium Package (Gold equivalent) -->
                    <div class="border rounded-lg shadow-lg p-6" style="background-color: #D4af37">
                        <div class=" py-2 text-center text-white font-bold text-xl mb-4">GOLD</div>
                        <div class="text-center text-4xl font-bold mb-2">80</div>
                        <div class="text-center mb-4">Course Benefits</div>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Laptops included
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                   
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Study tours
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Exclusive workshops
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="/register" class="ires-primary-btn text-white font-bold py-2 px-4 rounded-full">Register</a>
                        </div>
                    </div>
            
                    <!-- Diamond Package -->
                    <div class="border rounded-lg shadow-lg p-6 " style="background-color:#E5E4E2">
                        <div class=" py-2 text-center text-white font-bold text-xl mb-4">PLATINUM</div>
                        <div class="text-center text-4xl font-bold mb-2">500</div>
                        <div class="text-center mb-4">Course Benefits</div>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Laptops included
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                International study tours
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Mentorship programs
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="/register" class="ires-primary-btn text-white font-bold py-2 px-4 rounded-full">Register</a>
                        </div>
                    </div>
                </div>
    
                <!-- Corporate Package Cards (Initially Hidden) -->
                <div id="corporate-packages" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 hidden">
                    <!-- Corporate Standard Package -->
                    <div class="border rounded-lg shadow-2xl p-6 bg-[#00a651]">
                        <div class="py-2 text-center text-white font-bold text-xl mb-4">Corporate STANDARD (5+ Members - 20% OFF)</div>
                        <div class="text-center text-4xl font-bold mb-2">15</div> <!-- Discounted price -->
                        <div class="text-center mb-4">Course Benefits</div>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Tuition fee included
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Tea and lunch snacks
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="/register" class="ires-primary-btn text-white font-bold py-2 px-4 rounded-full">Register</a>
                        </div>
                    </div>
    
                    <div class="border rounded-lg shadow-lg p-6 " style="background-color:#CD7F32">
                        <div class=" py-2 text-center text-white font-bold text-xl mb-4">Corporate BRONZE (5+ Members - 20% OFF)</div>
                        <div class="text-center text-4xl font-bold mb-2">30</div> <!-- Discounted price -->
                        <div class="text-center mb-4">Course Benefits</div>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Laptops included
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Study tours
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="/register" class="ires-primary-btn text-white font-bold py-2 px-4 rounded-full">Register</a>
                        </div>
                    </div>
    
                    <div class="border rounded-lg shadow-lg p-6" style="background-color: #D4af37">
                        <div class=" py-2 text-center text-white font-bold text-xl mb-4">Corporate GOLD (5+ Members - 20% OFF)</div>
                        <div class="text-center text-4xl font-bold mb-2">80</div> <!-- Discounted price -->
                        <div class="text-center mb-4">Course Benefits</div>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Laptops included
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                   
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Study tours
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Exclusive workshops
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="/register" class="ires-primary-btn text-white font-bold py-2 px-4 rounded-full">Register</a>
                        </div>
                    </div>
    
                    <div class="border rounded-lg shadow-lg p-6 " style="background-color:#E5E4E2">
                        <div class=" py-2 text-center text-white font-bold text-xl mb-4">CORPORATE PLATINUM(5+ Members - 20% OFF)</div>
                        <div class="text-center text-4xl font-bold mb-2">500</div>
                        <div class="text-center mb-4">Course Benefits</div>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Laptops included
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                International study tours
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                Mentorship programs
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="/register" class="ires-primary-btn text-white font-bold py-2 px-4 rounded-full">Register</a>
                        </div>
                    </div>
                    <!-- Corporate BRONZE, GOLD, PLATINUM Packages with discounts for larger teams -->
                </div>
            
            </section> --}}
            
            <!-- page content -->
            <div class="lg:w-[1080px] lg:mx-auto my-4 px-2">
                <div class="">
                    <!-- course schedule -->
                    <div class="py-3">
                        <p>
                            Fill in the details below to complete the registration for <br>
                            <span>
                                <strong class="text-2xl text-[#00a651]">{{ $course->name }}.</strong>
                            </span>
                        </p>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h4>Please fix below errors</h4>
                            <ul style="list-style: none">
                                @foreach ($errors->all() as $error)
                                    <li><strong>Oh Snap! </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="outline-2 outline-[#1ea19d]">
                        <form @submit="save" action="{{ route('course.booking.store', $course) }}" 
                        method="POST" id="booking-form" onsubmit="handleSubmit()">
                            @csrf

                            <!-- course details -->
                            <h4 class="text-[#1ea19d] text-2xl font-bold p-2">Course Details</h4>
                            <div class="bg-white border border-[#1ea19d] p-4 mb-3 sm:rounded-2xl">
                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Course Code</small><br>
                                        <input type="text" class="rounded-md w-full bg-blue-200 p-2 text-gray-400 shadow-lg" placeholder="Course Code" value="{{ $course->code }}" readonly disabled pattern="">
                                    </div><!-- this is prefilled with the course code (uneditable) -->
                                
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Course Title</small><br>
                                        <input type="text" class="rounded-md w-full bg-blue-200 p-2 text-gray-400 shadow-lg" placeholder="Course Name" value="{{ $course->name }}" readonly>
                                    </div><!-- prefilled with course name, uneditable -->
                                </div>
                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Select Mode of Learning</small><br>
                                        <select class="rounded-md w-full @error('schedule_type') {{ 'text-red-700 border-2' }} @else  {{ 'text-gray-400' }} @enderror border-red-700 p-2 shadow-lg" name="schedule_type" v-model="schedule_type" onchange="updateSearchParam(event, 'class')" required>
                                            <option value="physical">
                                                Face to Face
                                            </option>
                                            <option value="virtual">
                                                Virtual
                                            </option>
                                        </select>
                                    </div>

                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Pick a Date</small><br>
                                        <select class="rounded-md w-full @error('schedule_id') {{ 'text-red-700 border-2' }} @else  {{ 'text-gray-400' }} @enderror p-2 shadow-lg" name="schedule_id" v-model="schedule" onchange="updateSearchParam(event, 'schedule')" required>
                                            <option v-for="(schedule, index) in classes" :key="index" :value="schedule.id">
                                                @{{ schedule.from | date_format }} - @{{ schedule.to | date_format }}
                                                @{{ schedule.period ? '(' + schedule.period + ' Class)' : '' }}
                                            </option>
                                        </select>
                                    </div><!-- selected date is prefilled, can be changed to a different date range -->
                                </div>
                                @include('front/partials/form_error', ['field' => 'schedule_id'])
                            </div>

                            <!-- personal details -->
                            <h4 class="text-[#1ea19d] text-2xl font-bold p-2">Personal Information</h4>
                            <div class="bg-white border border-[#1ea19d] p-4 mb-3 sm:rounded-2xl">
                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                            Salutation <span class="text-[#1ea19d]"><span class="text-[#00a651]">(required*)</span></span>
                                        </small><br>

                                        <select class="rounded-md w-full p-2 shadow-lg @error('salutation') {{ 'text-red-700 border-2' }} @enderror" name="salutation" required>

                                            @foreach ([
                                                'Mr.', 'Mrs.', 'Dr.', 'Engr.', 'Prof.', 'Miss'
                                            ] as $salutation)

                                                <option
                                                @if ( old('salutation') == $salutation )
                                                    selected
                                                @endif>

                                                    {{ $salutation }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @include('front/partials/form_error', ['field' => 'salutation'])
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                          First Name <span class="text-[#1ea19d]">(required*)</span>
                                        </small><br>
                                        <input type="text" class="rounded-md w-full bg-gray-100 p-2 shadow-lg @error('first_name') {{ 'text-red-700 border-2' }} @enderror" placeholder="Your First Name" name="first_name" value="{{ old('first_name', @$customer->first_name) }}" pattern="[A-Za-z]+" title="You should enter letters only" required>

                                        @include('front/partials/form_error', ['field' => 'first_name'])
                                    </div>
                                </div>

                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                           Last Name <span class="text-[#1ea19d]">(required*)</span>
                                        </small><br>
                                        <input type="text" class="rounded-md w-full p-2 shadow-lg @error('last_name') {{ 'text-red-700 border-2' }} @enderror" placeholder="Your Last Name" name="last_name" value="{{ old('last_name', @$customer->last_name) }}" pattern="[A-Za-z]+" title="You should enter letters only" required>

                                        @include('front/partials/form_error', ['field' => 'last_name'])
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                           Designation<span class="text-[#1ea19d]">(required*)</span>
                                        </small><br>
                                        <input type="text" class="rounded-md w-full p-2 shadow-lg @error('designation') {{ 'text-red-700 border-2' }} @enderror" placeholder="Your Designation" name="designation" value="{{ old('designation', @$customer->designation) }}" pattern="[0-9A-Za-z\s]+" title="You should enter letters and numbers only" required>
                                    </div>
                                </div>

                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                           Department
                                        </small><br>
                                        <input type="text" class="rounded-md w-full p-2 shadow-lg @error('department') {{ 'text-red-700 border-2' }} @enderror" placeholder="Your Department" name="department" pattern="[0-9A-Za-z\s]+" title="You should enter letters and numbers only">
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                            No. of People in your Department
                                         </small><br>
                                         <input type="number" class="rounded-md w-full p-2 shadow-lg @error('no_department') {{ 'text-red-700 border-2' }} @enderror" min="1" placeholder="No. of people in your Department" name="no_department"  pattern="[0-9]+" title="You should enter numbers only">
                                    </div>
                                </div>

                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                           Company <span class="text-[#1ea19d]">(required*)</span>
                                        </small><br>
                                        <input class="rounded-md w-full p-2 shadow-lg @error('company') {{ 'text-red-700 border-2' }} @enderror" name="company" list="companies" value="{{ old('company', @$customer->company->name) }}" placeholder="Your Company" pattern="[0-9A-Za-z\s&]+" title="You should enter letters and numbers only" required>

                                        {{-- <datalist id="companies">
                                            @foreach (App\Company::where('status', 'Approved')->get() as $company)
                                                <option value="{{ $company->name }}">
                                            @endforeach
                                        </datalist> --}}

                                        @include('front/partials/form_error', ['field' => 'company'])
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                            No. of People in your Company
                                         </small> <br>
                                         <input type="number" class="rounded-md w-full p-2 shadow-lg @error('no_company') {{ 'text-red-700 border-2' }} @enderror" min="1" placeholder="No. of people in your Company" name="no_company" pattern="[0-9]+" title="You should enter numbers only">
                                    </div>

                                </div>

                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                            Select Your Country <span class="text-[#1ea19d]">(required*)</span>
                                        </small><br>
                                        <select class="rounded-md w-full p-2 shadow-lg @error('country') {{ 'text-red-700 border-2' }} @enderror" name="country" @change="setCountryCode" required>
                                            @foreach ([
                                                "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"

                                            ] as $country)

                                                <option value="{{ $country }}"
                                                @if ( old('country', $user_country) == $country )
                                                    selected
                                                @endif>

                                                    {{ $country }}

                                                </option>

                                            @endforeach
                                        </select>

                                        @include('front/partials/form_error', ['field' => 'country'])
                                    </div>
                                    <!-- dropdown of all countries in the world -->
                                    <div class="mb-4 sm:mb-0">
                                        <small class="col-md-12  ">
                                           Your Phone Number <span class="text-[#1ea19d]">(required*)</span>
                                        </small><br>
                                        <div class="grid grid-cols-11 gap-1">
                                            <div class="col-span-2">
                                                <select class="rounded-md w-full p-2 shadow-lg @error('country_code') {{ 'text-red-700 border-2' }} @enderror" name="country_code" id="country_code" v-model="selectedCountryCode" required>
                                                    <option v-for="(code, index) in countryCode" :key="index" :value="code">
                                                        @{{ code }}
                                                    </option>
                                                </select>
                                            </div>
    
                                            <div class="col-span-9">
                                                <input type="tel" id="phone" required class="rounded-md w-full p-2 shadow-lg @error('phone') {{ 'text-red-700 border-2' }} @enderror" placeholder="712345678 (without country code)" name="phone" value="{{ old('phone', @$customer->phone) }}" maxlength="17" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="[0-9]{4,17}" title="Enter a valid phone number.">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            @include('front/partials/form_error', ['field' => 'country_code'])
                                            @include('front/partials/form_error', ['field' => 'phone'])
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                           Personal Email Address <span class="text-[#1ea19d]">(required*)</span>
                                        </small><br>
                                        <input type="email" class="rounded-md w-full p-2 shadow-lg @error('email') {{ 'text-red-700 border-2' }} @enderror" placeholder="Your Personal Email Address" name="email" value="{{ old('email', @$customer->account->email) }}" pattern="[a-z0-9._]+@[a-z0-9]+\.[a-z.]{2,6}" title="should look like abc123@yahoo123.co.ke " required>

                                        @include('front/partials/form_error', ['field' => 'email'])
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Work Email Address</small><br>
                                        <input type="email" class="rounded-md w-full p-2 shadow-lg @error('work_email') {{ 'text-red-700 border-2' }} @enderror" placeholder="Your Work Email Address" name="work_email" value="{{ old('work_email', @$customer->work_email) }}" pattern="[a-z0-9._]+@[a-z0-9]+\.[a-z.]{2,6}" title="should look like abc123@yahoo123.co.ke ">
                                    </div>
                                </div>
                            </div>

                            <!-- number of participants -->
                            <h4 class="text-[#1ea19d] text-2xl font-bold px-2 pt-2">Other Participants (*Optional)</h4>
                            <small class=" text-black italic p-2 sm:mb-4">
                                Fill in the details of other people coming with you if applicable. Leave blank if you are the only one coming.
                            </small>

                            <hr>

                            <div class="p-4 rounded-xl m-1 bg-[#1ea19d]">
                            <ol class="mx-2">
                                <li v-for="(participant, index) in participants" class=" ">
                                    @{{ participant.name }}, @{{ participant.email }}, @{{ participant.phone }}

                                    &nbsp; &VerticalBar; &nbsp;

                                    <button type="button" class="bg-red-600" @click="removeParticipant(index)" style="padding: 1px 4px; font-size: 10px; font-weight: bold">
                                        &times; remove
                                    </button>
                                </li>
                            </ol>
                            </div>

                            <div class="bg-white border border-[#1ea19d] p-4 mb-3 sm:rounded-2xl" id="participants">
                                <!-- additional participant -->
                                <div class="sm:grid grid-cols-3 gap-3 sm:mb-4" id="participant-form">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Full Name</small><br>
                                        <input type="text" class="rounded-md w-full p-2 shadow-lg @error('participant-name') {{ 'text-red-700 border-2' }} @enderror" placeholder="Their Full Name" name="participant-name" pattern="[A-Za-z ]+" title="You should enter letters and space only">
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Phone Number</small><br>
                                        <input type="tel" id="phone" class="rounded-md w-full p-2 shadow-lg @error('salutation') {{ 'text-red-700 border-2' }} @enderror" placeholder="712345678 (without country code)" name="participant-phone" pattern="[0-9]{4,17}" title="Enter a valid phone number.">
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">E-mail Address</small><br>
                                        <input type="email" class="rounded-md w-full p-2 shadow-lg @error('participant-email') {{ 'text-red-700 border-2' }} @enderror" placeholder="Their Email Address" name="participant-email"pattern="[a-z0-9._]+@[a-z0-9]+\.[a-z.]{2,6}" title="should look like abc123@yahoo123.co.ke ">
                                    </div>
                                </div> <!-- END additional participant -->

                                <div class="my-2">
                                    <button type="button" class="ires-pri-btn px-12 py-2" @click="addParticipant">
                                        <small>Add</small>
                                    </button>
                                </div>
                            </div>
{{-- 
                            @if ( $course->software->count() > 0 )

                                <!-- recommended software -->
                                <h4>Recommended Software</h4>
                                <small class=" text-gray-400">We recommend <span>software one, software to</span> for the training.</small>

                                <div class="reg-sec" style="border-color: #1ea19d;">
                                    <!-- software radio button -->
                                    <p>Would you like to purchase a software licence?</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="no"  name="toggle-software-form" @click="clearSoftware">
                                        <label class="form-check-label">
                                            No
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" value="yes" name="toggle-software-form" checked onclick="document.getElementById('software-form').style.display = 'block'">
                                        <label class="form-check-label">
                                            Yes
                                        </label>
                                    </div><!-- END software radio button -->
                                    <!-- if yes is selected the form below becomes visible -->

                                    <div id="software-form">

                                        <hr/>

                                        <ol>
                                            <li v-for="(software, index) in recommendedSoftware">
                                                @{{ software.name }}, @{{ software.licenses }} @{{ software.licenses > 1 ? 'licenses' : 'license' }}

                                                &nbsp; &VerticalBar; &nbsp;

                                                <button type="button" class="btn btn-warning" @click="removeSoftware(index)" style="padding: 1px 4px; font-size: 10px; font-weight: bold">
                                                    &times; remove
                                                </button>
                                            </li>
                                        </ol>

                                        <div class="form-row">
                                            <div class="">
                                                <small class=" text-gray-400">Software</small>
                                                <select class="border border-[#1ea19d] w-full bg-gray-100" name="software-id">
                                                    <option v-for="(software, index) in courseSoftware" :key="index" :value="software.id">
                                                        @{{ software.name }}
                                                    </option>
                                                </select><!-- list displays only recommended software from admin dashboard -->
                                            </div>

                                            <div class="">
                                                <small class=" text-gray-400">Number of licences</small>
                                                <input type="number" class="border border-[#1ea19d] w-full bg-gray-100" name="software-licenses"> <!-- this can be a field like what we have at ADME price estimate // if its more than one, the form below opens for each additional number // default (minimum) is one -->
                                            </div>
                                        </div>
                                        <!-- add another software. replicates the software form above this section -->
                                        <div>
                                            <button type="button" class="btn btn-primary rounded-pill px-5 fs-6 m-0" @click="addSoftware">
                                                <small>Add</small>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            @endif

                            @if ( $course->tours->count() > 0 )

                                <!-- add tour -->
                                <h4>Select Tour</h4>
                                <small class=" text-gray-400">View all the Tours <a href="#" target="_blank">here</a> <span class="fa fa-external-link"></span></small>
                                <div class="reg-sec" style="border-color: #1ea19d;">
                                    <!-- tour radio button -->
                                    <small class=" text-gray-400">Would you like to attend an educational tour after training?</small>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="no" name="toggle-tour-form" @click="clearTour">
                                        <label class="form-check-label">
                                            No
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" value="yes" name="toggle-tour-form" checked onclick="document.getElementById('tour-form').style.display = 'block'">
                                        <label class="form-check-label">
                                            Yes
                                        </label>
                                    </div><!-- END tour radio button -->
                                    <!-- if yes is selected the form below becomes visible -->

                                    <div id="tour-form">

                                        <hr/>

                                        <ol>
                                            <li v-for="(tour, index) in recommendedTours">
                                                @{{ tour.name }}, @{{ tour.participants }} @{{ tour.participants > 1 ? 'participants' : 'participant' }}

                                                &nbsp; &VerticalBar; &nbsp;

                                                <button type="button" class="btn btn-warning" @click="removeTour(index)" style="padding: 1px 4px; font-size: 10px; font-weight: bold">
                                                    &times; remove
                                                </button>
                                            </li>
                                        </ol>

                                        <div class="form-row">
                                            <div class="">
                                                <small class=" text-gray-400">Select tour</small>
                                                <select class="border border-[#1ea19d] w-full bg-gray-100" name="tour-id">
                                                    <option value="" v-for="(tour, index) in courseTours" :key="index" :value="tour.id">
                                                        @{{ tour.name }}
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="">
                                                <small class=" text-gray-400">Participants</small>
                                                <input type="number" class="border border-[#1ea19d] w-full bg-gray-100" name="tour-participants"> <!-- this can be a field like what we have at ADME price estimate // if its more than one, the form below opens for each additional number // default (minimum) is one -->
                                            </div>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-primary rounded-pill px-5 fs-6 m-0" @click="addTour">
                                                <small>Add</small>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            @endif

                            <!-- add tour -->
                            <h4>Select Tour</h4>
                            <small class=" text-gray-400">View all the Tours <a href="#" target="_blank">here</a> <span class="fa fa-external-link"></span></small>
                            <div class="reg-sec" style="border-color: #1ea19d;">
                                <!-- tour radio button -->
                                <small class=" text-gray-400">Would you like to attend an educational tour after training?</small>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="no" name="toggle-tour-form" @click="clearTour">
                                    <label class="form-check-label">
                                        No
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" value="yes" name="toggle-tour-form" checked onclick="document.getElementById('tour-form').style.display = 'block'">
                                    <label class="form-check-label">
                                        Yes
                                    </label>
                                </div><!-- END tour radio button -->
                                <!-- if yes is selected the form below becomes visible -->

                                <div id="tour-form">

                                    <hr/>

                                    <ol>
                                        <li v-for="(tour, index) in recommendedTours">
                                            @{{ tour.name }}, @{{ tour.participants }} @{{ tour.participants > 1 ? 'participants' : 'participant' }}

                                            &nbsp; &VerticalBar; &nbsp;

                                            <button type="button" class="btn btn-warning" @click="removeTour(index)" style="padding: 1px 4px; font-size: 10px; font-weight: bold">
                                                &times; remove
                                            </button>
                                        </li>
                                    </ol>

                                    <div class="form-row">
                                        <div class="">
                                            <small class=" text-gray-400">Select tour</small>
                                            <select class="border border-[#1ea19d] w-full bg-gray-100" name="tour-id">
                                                <option value="" v-for="(tour, index) in courseTours" :key="index" :value="tour.id">
                                                    @{{ tour.name }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="">
                                            <small class=" text-gray-400">Participants</small>
                                            <input type="number" class="border border-[#1ea19d] w-full bg-gray-100" name="tour-participants"> <!-- this can be a field like what we have at ADME price estimate // if its more than one, the form below opens for each additional number // default (minimum) is one -->
                                        </div>
                                    </div>

                                    <div>
                                        <button type="button" class="btn btn-primary rounded-pill px-5 fs-6 m-0" @click="addTour">
                                            <small>Add</small>
                                        </button>
                                    </div>

                                </div>
                            </div>

                            @endif --}}
                    
                            <!-- approving authority -->
                            <h4 class="text-[#1ea19d] text-2xl font-bold p-2">Approving Authority</h4>
                            <div class="bg-white border border-[#1ea19d] p-4 mb-3 sm:rounded-2xl">
                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Full Name</small>
                                        <input type="text" class="rounded-md w-full p-2 shadow-lg @error('authority_name') {{ 'text-red-700 border-2' }} @enderror" placeholder="Full Name" name="authority_name" value="{{ old('authority_name') }}"  pattern="[A-Za-z ]+" title="You should enter letters and space only">

                                        @include('front/partials/form_error', ['field' => 'authority_name'])
                                    </div>
                                    
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">
                                            Phone Number
                                        </small><br>
                                        <div class="grid grid-cols-11 gap-1">
                                            <div class="col-span-2">
                                                <select class="rounded-md w-full p-2 shadow-lg @error('authority_code') {{ 'text-red-700 border-2' }} @enderror" name="authority_code" id="authority_code">
                                                    <option v-for="(code, index) in countryCode" :key="index" :value="code">
                                                        @{{ code }}
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-span-9">
                                                <input type="tel" id="phone" class="rounded-md w-full p-2 shadow-lg @error('authority_phone') {{ 'text-red-700 border-2' }} @enderror" placeholder="712345678 (without country code)" name="authority_phone" value="{{ old('authority_phone') }}" maxlength="17" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="[0-9]{4,17}" title="Enter a valid phone number.">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Email Address</small><br>
                                        <input type="email" class="rounded-md w-full p-2 shadow-lg @error('authority_email') {{ 'text-red-700 border-2' }} @enderror" placeholder="Email Address" name="authority_email" value="{{ old('authority_email') }}" pattern="[a-z0-9._]+@[a-z0-9]+\.[a-z.]{2,6}" title="should look like abc123@yahoo123.co.ke " >

                                        @include('front/partials/form_error', ['field' => 'authority_email'])
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Designation (Job Title)</small>
                                        <input type="text" class="rounded-md w-full p-2 shadow-lg @error('authority_designation') {{ 'text-red-700 border-2' }} @enderror" placeholder="Designation" name="authority_designation" value="{{ old('authority_designation') }}"  pattern="[0-9A-Za-z ]+" title="You should enter letters, numbers and spaces only">
                                    </div>
                                </div>
                            </div>

                            <!-- additionals -->
                            <h4 class="text-[#1ea19d] text-2xl font-bold p-2">Additional Details</h4>
                            <div class="bg-white border border-[#1ea19d] p-4 mb-3 sm:rounded-2xl">
                                <div class="sm:grid grid-cols-2 gap-3 sm:mb-4">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Choose currency</small><br>
                                        <select class="rounded-md w-full p-2 shadow-lg @error('currency') {{ 'text-red-700 border-2' }} @enderror" name="currency" v-model="currency" required>
                                            <option v-for="(currency, index) in currencies" :key="index" :value="currency.code">
                                                @{{ currency.code }}
                                            </option>
                                        </select>

                                        @include('front/partials/form_error', ['field' => 'currency'])
                                    </div>

                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">How did you hear about us?</small>
                                        <select class="rounded-md w-full p-2 shadow-lg @error('learn_about_us') {{ 'text-red-700 border-2' }} @enderror" name="learn_about_us">
                                            <option>
                                                -- Select Option --
                                            </option>
                                            <option
                                            @if ( old('learn_about_us') == 'Google' )
                                                selected
                                            @endif>
                                                Google Search
                                            </option>
                                            <option
                                            @if ( old('learn_about_us') == 'Social Media' )
                                                selected
                                            @endif>
                                                Social Media
                                            </option>                                            
                                            <option
                                            @if ( old('learn_about_us') == 'Email' )
                                                selected
                                            @endif>
                                                Email
                                            </option>
                                            <option
                                            @if ( old('learn_about_us') == 'Paid Ads' )
                                                selected
                                            @endif>
                                                Paid Ads
                                            </option>
                                            <option
                                            @if ( old('learn_about_us') == 'Event' )
                                                selected
                                            @endif>
                                                Event/ Expo
                                            </option>
                                            <option
                                            @if ( old('learn_about_us') == 'Referral' )
                                                selected
                                            @endif>
                                                Referral
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- summary -->
                            <div class="border border-[#1ea19d] p-4 mb-3">
                                <h4 class="text-[#00a651] text-xl p-4 pt-0">Summary</h4>

                                <table class="">
                                    <thead>
                                        <tr class="bg-[#00a651]/80 *:px-2 divide-x divide-black">
                                            <th scope="col">Item</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <tr class="odd:bg-[#00a651]/50 even:bg-[#00a651]/80 *:px-2 divide-x divide-black">
                                            <td>Training fee (@{{ totalParticipants }} @ @{{ currency }} @{{ scheduleCost }})</td>
                                            <td>@{{ currency }} @{{ scheduleCost * totalParticipants }}</td>
                                        </tr>
                                        <tr class="odd:bg-[#00a651]/50 even:bg-[#00a651]/80 *:px-2 divide-x divide-black">
                                            <td>Tour cost (@{{ recommendedTours.length || 'no' }} @{{ recommendedTours.length == 1 ? 'tour' : 'tours' }})</td>
                                            <td>@{{ currency }} @{{ this.toursCost.toLocaleString('en-US') }}</td>
                                        </tr>
                                        <tr class="odd:bg-[#00a651]/50 even:bg-[#00a651]/80 *:px-2 divide-x divide-black">
                                            <td>Software cost</td>
                                            <td>We will invoice the price</td>
                                        </tr>
                                        <tr class="odd:bg-[#00a651]/50 even:bg-[#00a651]/80 *:px-2 divide-x divide-black">
                                            <td>VAT (@{{ scheduleTaxPercentage }}%)</td>
                                            <td>@{{ currency }} @{{ this.scheduleTaxCost.toLocaleString('en-US') }}</td>
                                        </tr>
                                        <tr class="odd:bg-[#00a651]/50 even:bg-[#00a651]/80 *:px-2 divide-x divide-black">
                                            <td>TOTAL</td>
                                            <td>@{{ currency }} @{{ this.totalCost.toLocaleString('en-US') }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6 px20">
                                    <!-- Card 1 -->
                                    <div class="bg-white border border-[#00a651] shadow-black shadow-md rounded-lg p-6 text-center">
                                        <h3 class="text-2xl text-[#00a651] font-bold mb-4">Bronze</h3>
                                        <p class="text-3xl font-semibold mb-4">$5.99<span class="text-sm text-gray-500"></span></p>
                                        
                                        <!-- Features -->
                                        <ul class="list-none border-t border-gray-300 pt-4 text-left px10 textwhite mb-4 space-y-2">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                10 GB Storage</li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                Unlimited Bandwidth</li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                Free SSL Certificate</li>
                                        </ul>
                    
                                        <!-- Add to Basket Button -->
                                        <button class="bg-[#1ea19d] text-white font-bold py-2 px-4 rounded w-full hover:bg-[#00a651]" >
                                            Choose Plan
                                        </button>
                                    </div>
                    
                                    <!-- Card 2 -->
                                    <div class="bg-white border border-[#CD7F32] shadow-black shadow-md rounded-lg p-6 text-center">
                                        <h3 class="text-2xl text-[#CD7F32] font-bold mb-4">Silver</h3>
                                        <p class="text-3xl font-semibold mb-4">$9.99<span class="text-sm text-gray-500"></span></p>
                    
                                        <!-- Features -->
                                        <ul class="list-none border-t border-gray-300 pt-4 text-left px10 textwhite mb-4 space-y-2">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                50 GB Storage</li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                Unlimited Bandwidth</li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                Free SSL Certificate</li>
                                        </ul>
                    
                                        <!-- Add to Basket Button -->
                                        <button class="bg-[#1ea19d] text-white font-bold py-2 px-4 rounded w-full hover:bg-[#00a651]">
                                            Choose Plan
                                        </button>
                                    </div>
                    
                                    <!-- Card 3 -->
                                    <div class="bg-white border border-[#D4af37] shadow-black shadow-md rounded-lg p-6 text-center">
                                        <h3 class="text-2xl text-[#D4af37] font-bold mb-4">Gold</h3>
                                        <p class="text-3xl font-semibold mb-4">$19.99<span class="text-sm text-gray-500"></span></p>
                    
                                        <!-- Features -->
                                        <ul class="list-none border-t border-gray-300 pt-4 text-left px10 textwhite mb-4 space-y-2">
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                100 GB Storage</li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                Unlimited Bandwidth</li>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                Free SSL Certificate</li>
                                        </ul>
                    
                                        @include('front.Projects.wishlist') 
                    
                                        <!-- Add to Basket Button -->
                                        <button class="bg-[#1ea19d] text-white font-bold py-2 px-4 rounded w-full hover:bg-[#00a651]">
                                            Choose Plan
                                        </button>
                                    </div>
                    
                                    <!--card 4-->
                                    <div class="bg-white border border-[#7300AB] shadow-black shadow-md rounded-lg p-6 text-center">
                                        <h3 class="text-2xl text-[#7300AB] font-bold mb-4">Platinum</h3>
                                        <p class="text-3xl font-semibold mb-4">$19.99<span class="text-sm text-gray-500"></span></p>
                    
                                        <!-- Features -->
                    
                                            <ul class="list-none border-t border-gray-300 pt-4 text-left px10 textwhite mb-4 space-y-2">
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                    100 GB Storage</li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                    Unlimited Bandwidth</li>
                                                <li>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="green" d="M19.495 3.133a1 1 0 0 1 1.352.309l.99 1.51a1 1 0 0 1-.155 1.279l-.003.004l-.014.013l-.057.053l-.225.215a84 84 0 0 0-3.62 3.736c-2.197 2.416-4.806 5.578-6.562 8.646c-.49.856-1.687 1.04-2.397.301l-6.485-6.738a1 1 0 0 1 .051-1.436l1.96-1.768A1 1 0 0 1 5.6 9.2l3.309 2.481c5.169-5.097 8.1-7.053 10.586-8.548m.21 2.216c-2.29 1.432-5.148 3.509-9.998 8.358A1 1 0 0 1 8.4 13.8l-3.342-2.506l-.581.524l5.317 5.526c1.846-3.07 4.387-6.126 6.49-8.438a86 86 0 0 1 3.425-3.552l-.003-.005Z"/></g></svg>
                                                    Free SSL Certificate</li>
                                            </ul>
                    
                                        @include('front.Projects.wishlist') 
                    
                                        <!-- Add to Basket Button -->
                                        <button class="bg-[#1ea19d] text-white font-bold py-2 px-4 rounded w-full hover:bg-[#00a651]">
                                            Choose Plan
                                        </button>
                                    </div>
                    
                                </div> --}}

                                
                            </div>

                            <!-- payment method -->
                            <h4 class="text-[#1ea19d] text-2xl font-bold p-2">Payment Method</h4>

                            <div class="bg-[#00a651] text-white p-4 mb-3 sm:rounded-2xl">
                                <!-- payment radio button -->
                                <p>Choose your payment method?</p>

                                <div class="form-check">
                                    <input class="form-check-input !outline-none" type="radio" value="offline" checked name="payment_method"
                                    @if ( old('payment_method') == 'offline' )
                                        checked
                                    @endif>
                                    <label class="form-check-label">
                                        Offline
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input !outline-none" type="radio" value="paypal" name="payment_method"
                                    @if ( old('payment_method') == 'paypal' )
                                        checked
                                    @endif>
                                    <label class="form-check-label">
                                        PayPal/Card
                                    </label>
                                </div><!-- END payment radio button -->

                                @include('front/partials/form_error', ['field' => 'payment_method'])
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input !outline-none" id="tocs" name="tocs" required>
                                <label class="tocs" for="tocs">By checking this you agree to our <a href="{{ route('terms-and-conditions') }}" target="_blank" class="text-[#1ea19d]">Terms and Conditions</a> and <a href="{{ route('privacy-policy') }}" target="_blank" class="text-[#1ea19d]">Privacy Policy.</a></label>
                            </div>
                            <br>
                            <div class="flex flex-wrap gap-1">
                                <a class="ires-pri-btn px-12 py-1" href="{{ route('course.show', $course) }}">
                                    <span class="fa fa-arrow-left">&nbsp;</span>
                                    Back
                                </a>
                                &nbsp;
                                <button class="ires-sec-btn px-12 py-1" type="reset">
                                    <span class="fa fa-refresh">&nbsp;</span>
                                    Reset
                                </button>
                                &nbsp;
                                <button id="myButton" class="ires-pri-btn px-12 py-1" type="submit" value="">
                                    Complete Registration
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection

@section('js_content')

    {{-- @push('script') --}}

        {{-- Script to prevent multiple registration submissions --}}
        <script>
            function handleSubmit() {
                var button = document.getElementById('myButton');
                button.disabled = true;
                button.textContent = 'Submitting, please wait...';
            }
        </script>
        <!-- vue js -->
        <script src="{{ asset('front/assets/js/vue-2.6.11.js') }}"></script>
        <!-- moment -->
        <script src="{{ asset('front/assets/js/moment.js') }}"></script>
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

        <!-- URL Query String Update -->
        <script>
            function updateSearchParam(event, param) {

                // Construct URLSearchParams object instance from current URL querystring.
                var queryParams = new URLSearchParams(window.location.search);

                // Set new or modify existing parameter value.
                queryParams.set(param, event.target.value);

                // Replace current querystring with the new one.
                history.replaceState(null, null, "?" + queryParams.toString());
            }
        </script>

        <script>
            new Vue({
                el: '#booking-form',

                data: () => ({
                    schedule_type: "{{ request()->query('class', 'physical') }}",
                    virtualClasses: @json($course->virtualClasses->load('currencies')->filter(function ($schedule) {

                        return strtotime('today') <= strtotime($schedule->booking_end);
                    })),
                    physicalClasses: @json($course->physicalClasses->load('currencies')->filter(function ($schedule) {

                        return strtotime('today') <= strtotime($schedule->booking_end);
                    })),
                    schedule: "{{ old('schedule_id', request()->query('schedule')) }}",
                    participants: [],
                    courseSoftware: @json($course->software),
                    recommendedSoftware: [],
                    courseTours: @json($course->tours->load('currencies')),
                    recommendedTours: [],
                    currency: "{{ old('currency', 'USD') }}",
                    countries: {!! json_encode([
                        'AD'=>array('name'=>'ANDORRA','code'=>'376'),
                        'AE'=>array('name'=>'UNITED ARAB EMIRATES','code'=>'971'),
                        'AF'=>array('name'=>'AFGHANISTAN','code'=>'93'),
                        'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'1268'),
                        'AI'=>array('name'=>'ANGUILLA','code'=>'1264'),
                        'AL'=>array('name'=>'ALBANIA','code'=>'355'),
                        'AM'=>array('name'=>'ARMENIA','code'=>'374'),
                        'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'599'),
                        'AO'=>array('name'=>'ANGOLA','code'=>'244'),
                        'AQ'=>array('name'=>'ANTARCTICA','code'=>'672'),
                        'AR'=>array('name'=>'ARGENTINA','code'=>'54'),
                        'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'1684'),
                        'AT'=>array('name'=>'AUSTRIA','code'=>'43'),
                        'AU'=>array('name'=>'AUSTRALIA','code'=>'61'),
                        'AW'=>array('name'=>'ARUBA','code'=>'297'),
                        'AZ'=>array('name'=>'AZERBAIJAN','code'=>'994'),
                        'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'387'),
                        'BB'=>array('name'=>'BARBADOS','code'=>'1246'),
                        'BD'=>array('name'=>'BANGLADESH','code'=>'880'),
                        'BE'=>array('name'=>'BELGIUM','code'=>'32'),
                        'BF'=>array('name'=>'BURKINA FASO','code'=>'226'),
                        'BG'=>array('name'=>'BULGARIA','code'=>'359'),
                        'BH'=>array('name'=>'BAHRAIN','code'=>'973'),
                        'BI'=>array('name'=>'BURUNDI','code'=>'257'),
                        'BJ'=>array('name'=>'BENIN','code'=>'229'),
                        'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'590'),
                        'BM'=>array('name'=>'BERMUDA','code'=>'1441'),
                        'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'673'),
                        'BO'=>array('name'=>'BOLIVIA','code'=>'591'),
                        'BR'=>array('name'=>'BRAZIL','code'=>'55'),
                        'BS'=>array('name'=>'BAHAMAS','code'=>'1242'),
                        'BT'=>array('name'=>'BHUTAN','code'=>'975'),
                        'BW'=>array('name'=>'BOTSWANA','code'=>'267'),
                        'BY'=>array('name'=>'BELARUS','code'=>'375'),
                        'BZ'=>array('name'=>'BELIZE','code'=>'501'),
                        'CA'=>array('name'=>'CANADA','code'=>'1'),
                        'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'61'),
                        'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'243'),
                        'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'236'),
                        'CG'=>array('name'=>'CONGO','code'=>'242'),
                        'CH'=>array('name'=>'SWITZERLAND','code'=>'41'),
                        'CI'=>array('name'=>'COTE D IVOIRE','code'=>'225'),
                        'CK'=>array('name'=>'COOK ISLANDS','code'=>'682'),
                        'CL'=>array('name'=>'CHILE','code'=>'56'),
                        'CM'=>array('name'=>'CAMEROON','code'=>'237'),
                        'CN'=>array('name'=>'CHINA','code'=>'86'),
                        'CO'=>array('name'=>'COLOMBIA','code'=>'57'),
                        'CR'=>array('name'=>'COSTA RICA','code'=>'506'),
                        'CU'=>array('name'=>'CUBA','code'=>'53'),
                        'CV'=>array('name'=>'CAPE VERDE','code'=>'238'),
                        'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'61'),
                        'CY'=>array('name'=>'CYPRUS','code'=>'357'),
                        'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'420'),
                        'DE'=>array('name'=>'GERMANY','code'=>'49'),
                        'DJ'=>array('name'=>'DJIBOUTI','code'=>'253'),
                        'DK'=>array('name'=>'DENMARK','code'=>'45'),
                        'DM'=>array('name'=>'DOMINICA','code'=>'1767'),
                        'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'1809'),
                        'DZ'=>array('name'=>'ALGERIA','code'=>'213'),
                        'EC'=>array('name'=>'ECUADOR','code'=>'593'),
                        'EE'=>array('name'=>'ESTONIA','code'=>'372'),
                        'EG'=>array('name'=>'EGYPT','code'=>'20'),
                        'ER'=>array('name'=>'ERITREA','code'=>'291'),
                        'ES'=>array('name'=>'SPAIN','code'=>'34'),
                        'ET'=>array('name'=>'ETHIOPIA','code'=>'251'),
                        'FI'=>array('name'=>'FINLAND','code'=>'358'),
                        'FJ'=>array('name'=>'FIJI','code'=>'679'),
                        'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'500'),
                        'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'691'),
                        'FO'=>array('name'=>'FAROE ISLANDS','code'=>'298'),
                        'FR'=>array('name'=>'FRANCE','code'=>'33'),
                        'GA'=>array('name'=>'GABON','code'=>'241'),
                        'GB'=>array('name'=>'UNITED KINGDOM','code'=>'44'),
                        'GD'=>array('name'=>'GRENADA','code'=>'1473'),
                        'GE'=>array('name'=>'GEORGIA','code'=>'995'),
                        'GH'=>array('name'=>'GHANA','code'=>'233'),
                        'GI'=>array('name'=>'GIBRALTAR','code'=>'350'),
                        'GL'=>array('name'=>'GREENLAND','code'=>'299'),
                        'GM'=>array('name'=>'GAMBIA','code'=>'220'),
                        'GN'=>array('name'=>'GUINEA','code'=>'224'),
                        'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'240'),
                        'GR'=>array('name'=>'GREECE','code'=>'30'),
                        'GT'=>array('name'=>'GUATEMALA','code'=>'502'),
                        'GU'=>array('name'=>'GUAM','code'=>'1671'),
                        'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'245'),
                        'GY'=>array('name'=>'GUYANA','code'=>'592'),
                        'HK'=>array('name'=>'HONG KONG','code'=>'852'),
                        'HN'=>array('name'=>'HONDURAS','code'=>'504'),
                        'HR'=>array('name'=>'CROATIA','code'=>'385'),
                        'HT'=>array('name'=>'HAITI','code'=>'509'),
                        'HU'=>array('name'=>'HUNGARY','code'=>'36'),
                        'ID'=>array('name'=>'INDONESIA','code'=>'62'),
                        'IE'=>array('name'=>'IRELAND','code'=>'353'),
                        'IL'=>array('name'=>'ISRAEL','code'=>'972'),
                        'IM'=>array('name'=>'ISLE OF MAN','code'=>'44'),
                        'IN'=>array('name'=>'INDIA','code'=>'91'),
                        'IQ'=>array('name'=>'IRAQ','code'=>'964'),
                        'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'98'),
                        'IS'=>array('name'=>'ICELAND','code'=>'354'),
                        'IT'=>array('name'=>'ITALY','code'=>'39'),
                        'JM'=>array('name'=>'JAMAICA','code'=>'1876'),
                        'JO'=>array('name'=>'JORDAN','code'=>'962'),
                        'JP'=>array('name'=>'JAPAN','code'=>'81'),
                        'KE'=>array('name'=>'KENYA','code'=>'254'),
                        'KG'=>array('name'=>'KYRGYZSTAN','code'=>'996'),
                        'KH'=>array('name'=>'CAMBODIA','code'=>'855'),
                        'KI'=>array('name'=>'KIRIBATI','code'=>'686'),
                        'KM'=>array('name'=>'COMOROS','code'=>'269'),
                        'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'1869'),
                        'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'850'),
                        'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'82'),
                        'KW'=>array('name'=>'KUWAIT','code'=>'965'),
                        'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'1345'),
                        'KZ'=>array('name'=>'KAZAKSTAN','code'=>'7'),
                        'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'856'),
                        'LB'=>array('name'=>'LEBANON','code'=>'961'),
                        'LC'=>array('name'=>'SAINT LUCIA','code'=>'1758'),
                        'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'423'),
                        'LK'=>array('name'=>'SRI LANKA','code'=>'94'),
                        'LR'=>array('name'=>'LIBERIA','code'=>'231'),
                        'LS'=>array('name'=>'LESOTHO','code'=>'266'),
                        'LT'=>array('name'=>'LITHUANIA','code'=>'370'),
                        'LU'=>array('name'=>'LUXEMBOURG','code'=>'352'),
                        'LV'=>array('name'=>'LATVIA','code'=>'371'),
                        'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'218'),
                        'MA'=>array('name'=>'MOROCCO','code'=>'212'),
                        'MC'=>array('name'=>'MONACO','code'=>'377'),
                        'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'373'),
                        'ME'=>array('name'=>'MONTENEGRO','code'=>'382'),
                        'MF'=>array('name'=>'SAINT MARTIN','code'=>'1599'),
                        'MG'=>array('name'=>'MADAGASCAR','code'=>'261'),
                        'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'692'),
                        'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'389'),
                        'ML'=>array('name'=>'MALI','code'=>'223'),
                        'MM'=>array('name'=>'MYANMAR','code'=>'95'),
                        'MN'=>array('name'=>'MONGOLIA','code'=>'976'),
                        'MO'=>array('name'=>'MACAU','code'=>'853'),
                        'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'1670'),
                        'MR'=>array('name'=>'MAURITANIA','code'=>'222'),
                        'MS'=>array('name'=>'MONTSERRAT','code'=>'1664'),
                        'MT'=>array('name'=>'MALTA','code'=>'356'),
                        'MU'=>array('name'=>'MAURITIUS','code'=>'230'),
                        'MV'=>array('name'=>'MALDIVES','code'=>'960'),
                        'MW'=>array('name'=>'MALAWI','code'=>'265'),
                        'MX'=>array('name'=>'MEXICO','code'=>'52'),
                        'MY'=>array('name'=>'MALAYSIA','code'=>'60'),
                        'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'258'),
                        'NA'=>array('name'=>'NAMIBIA','code'=>'264'),
                        'NC'=>array('name'=>'NEW CALEDONIA','code'=>'687'),
                        'NE'=>array('name'=>'NIGER','code'=>'227'),
                        'NG'=>array('name'=>'NIGERIA','code'=>'234'),
                        'NI'=>array('name'=>'NICARAGUA','code'=>'505'),
                        'NL'=>array('name'=>'NETHERLANDS','code'=>'31'),
                        'NO'=>array('name'=>'NORWAY','code'=>'47'),
                        'NP'=>array('name'=>'NEPAL','code'=>'977'),
                        'NR'=>array('name'=>'NAURU','code'=>'674'),
                        'NU'=>array('name'=>'NIUE','code'=>'683'),
                        'NZ'=>array('name'=>'NEW ZEALAND','code'=>'64'),
                        'OM'=>array('name'=>'OMAN','code'=>'968'),
                        'PA'=>array('name'=>'PANAMA','code'=>'507'),
                        'PE'=>array('name'=>'PERU','code'=>'51'),
                        'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'689'),
                        'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'675'),
                        'PH'=>array('name'=>'PHILIPPINES','code'=>'63'),
                        'PK'=>array('name'=>'PAKISTAN','code'=>'92'),
                        'PL'=>array('name'=>'POLAND','code'=>'48'),
                        'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'508'),
                        'PN'=>array('name'=>'PITCAIRN','code'=>'870'),
                        'PR'=>array('name'=>'PUERTO RICO','code'=>'1'),
                        'PT'=>array('name'=>'PORTUGAL','code'=>'351'),
                        'PW'=>array('name'=>'PALAU','code'=>'680'),
                        'PY'=>array('name'=>'PARAGUAY','code'=>'595'),
                        'QA'=>array('name'=>'QATAR','code'=>'974'),
                        'RO'=>array('name'=>'ROMANIA','code'=>'40'),
                        'RS'=>array('name'=>'SERBIA','code'=>'381'),
                        'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'7'),
                        'RW'=>array('name'=>'RWANDA','code'=>'250'),
                        'SA'=>array('name'=>'SAUDI ARABIA','code'=>'966'),
                        'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'677'),
                        'SC'=>array('name'=>'SEYCHELLES','code'=>'248'),
                        'SD'=>array('name'=>'SUDAN','code'=>'249'),
                        'SE'=>array('name'=>'SWEDEN','code'=>'46'),
                        'SG'=>array('name'=>'SINGAPORE','code'=>'65'),
                        'SH'=>array('name'=>'SAINT HELENA','code'=>'290'),
                        'SI'=>array('name'=>'SLOVENIA','code'=>'386'),
                        'SK'=>array('name'=>'SLOVAKIA','code'=>'421'),
                        'SL'=>array('name'=>'SIERRA LEONE','code'=>'232'),
                        'SM'=>array('name'=>'SAN MARINO','code'=>'378'),
                        'SN'=>array('name'=>'SENEGAL','code'=>'221'),
                        'SO'=>array('name'=>'SOMALIA','code'=>'252'),
                        'SR'=>array('name'=>'SURINAME','code'=>'597'),
                        'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'239'),
                        'SV'=>array('name'=>'EL SALVADOR','code'=>'503'),
                        'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'963'),
                        'SZ'=>array('name'=>'SWAZILAND','code'=>'268'),
                        'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'1649'),
                        'TD'=>array('name'=>'CHAD','code'=>'235'),
                        'TG'=>array('name'=>'TOGO','code'=>'228'),
                        'TH'=>array('name'=>'THAILAND','code'=>'66'),
                        'TJ'=>array('name'=>'TAJIKISTAN','code'=>'992'),
                        'TK'=>array('name'=>'TOKELAU','code'=>'690'),
                        'TL'=>array('name'=>'TIMOR-LESTE','code'=>'670'),
                        'TM'=>array('name'=>'TURKMENISTAN','code'=>'993'),
                        'TN'=>array('name'=>'TUNISIA','code'=>'216'),
                        'TO'=>array('name'=>'TONGA','code'=>'676'),
                        'TR'=>array('name'=>'TURKEY','code'=>'90'),
                        'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'1868'),
                        'TV'=>array('name'=>'TUVALU','code'=>'688'),
                        'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'886'),
                        'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'255'),
                        'UA'=>array('name'=>'UKRAINE','code'=>'380'),
                        'UG'=>array('name'=>'UGANDA','code'=>'256'),
                        'US'=>array('name'=>'UNITED STATES','code'=>'1'),
                        'UY'=>array('name'=>'URUGUAY','code'=>'598'),
                        'UZ'=>array('name'=>'UZBEKISTAN','code'=>'998'),
                        'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'39'),
                        'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'1784'),
                        'VE'=>array('name'=>'VENEZUELA','code'=>'58'),
                        'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'1284'),
                        'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'1340'),
                        'VN'=>array('name'=>'VIET NAM','code'=>'84'),
                        'VU'=>array('name'=>'VANUATU','code'=>'678'),
                        'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'681'),
                        'WS'=>array('name'=>'SAMOA','code'=>'685'),
                        'XK'=>array('name'=>'KOSOVO','code'=>'381'),
                        'YE'=>array('name'=>'YEMEN','code'=>'967'),
                        'YT'=>array('name'=>'MAYOTTE','code'=>'262'),
                        'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'27'),
                        'ZM'=>array('name'=>'ZAMBIA','code'=>'260'),
                        'ZW'=>array('name'=>'ZIMBABWE','code'=>'263')
                    ]) !!},

                    selectedCountryCode: "{{ old('country_code', @$customer->phone ? substr($customer->phone, 1, strlen($customer->phone) - 10) : '') }}"
                }),

                computed: {

                    currencies() {

                        const selectedSchedule = this.classes.find(({id}) => id == this.schedule);

                        return selectedSchedule ? selectedSchedule.currencies : []
                    },

                    countryCode() {

                        return Object.values(this.countries).map(country => country.code)
                    },

                    classes() {

                        switch (this.schedule_type) {

                            case 'physical':
                                schedules = Object.values({...this.physicalClasses});
                                break;

                            case 'virtual':
                                schedules =  Object.values({...this.virtualClasses});
                                break;

                            default:
                                schedules = [];
                                break;
                        }

                        return schedules;
                    },

                    totalParticipants() {

                        return 1 + this.participants.length;
                    },

                    scheduleCost() {

                        let schedule = this.classes.find(class_schedule => class_schedule.id == this.schedule);

                        if (schedule) {

                            let currency = schedule.currencies.find(currency => currency.code == this.currency);

                            return Math.floor(currency ? currency.pivot.amount : 0);
                        }
                        else
                            return 0;
                    },

                    scheduleTaxPercentage() {

                        let schedule = this.classes.find(class_schedule => class_schedule.id == this.schedule);

                        if (schedule) {

                            return schedule.tax;
                        }
                        else
                            return 0;
                    },

                    scheduleTaxCost() {

                        return Math.floor(this.scheduleTaxPercentage / 100 * this.scheduleCost);
                    },

                    toursCost() {

                        return this.recommendedTours.reduce((accumulator, selectedTour) => {

                            return Math.floor(selectedTour.cost) * selectedTour.participants + accumulator;

                        }, 0);
                    },

                    totalCost() {

                        let total = (this.scheduleCost + this.scheduleTaxCost) * this.totalParticipants + this.toursCost;

                        return Math.floor(total);
                    }
                },

                watch: {

                    currency(value) {

                        this.recommendedTours = this.recommendedTours.map(selectedTour => {

                            selectedTour.cost = this.courseTours.find(tour => tour.id == selectedTour.id).currencies.find(currency => currency.code == value).pivot.amount;

                            return selectedTour;
                        });
                    }
                },

                filters: {

                    date_format: (value) => moment(value).format("MMM D YYYY")
                },

                methods: {

                    setCountryCode(e) {

                        let country = Object.values(this.countries).find(country => country.name == e.target.value.toLocaleUpperCase());

                        this.selectedCountryCode = country ? country.code : '';
                    },

                    addParticipant() {

                        const participant = {
                            name: jQuery('input[name="participant-name"]').val(),
                            email: jQuery('input[name="participant-email"]').val(),
                            phone: jQuery('input[name="participant-phone"]').val(),
                        };

                        this.participants.push(participant);

                        Object.keys(participant).forEach(key => jQuery(`input[name="participant-${key}"]`).val(''));
                    },

                    removeParticipant(id) {

                        this.participants = this.participants.filter((participant, index) => index != id);
                    },

                    addSoftware() {

                        let id = jQuery('select[name="software-id"]').val();

                        const software = {
                            id,
                            name: this.courseSoftware.find(software => software.id == id).name,
                            licenses: jQuery('input[name="software-licenses"]').val(),
                        };

                        this.recommendedSoftware.push(software);

                        Object.keys(software).forEach(key => jQuery(`input[name="software-${key}"]`).val(''));
                    },

                    removeSoftware(id) {

                        this.recommendedSoftware = this.recommendedSoftware.filter((software, index) => index != id);
                    },

                    clearSoftware() {

                        document.getElementById('software-form').style.display = 'none'

                        this.recommendedSoftware = [];
                    },

                    addTour() {

                        let id = jQuery('select[name="tour-id"]').val();
                        let cost = this.courseTours.find(tour => tour.id == id).currencies.find(currency => currency.code == this.currency).pivot.amount;

                        const tour = {
                            id,
                            cost,
                            name: this.courseTours.find(tour => tour.id == id).name,
                            participants: jQuery('input[name="tour-participants"]').val(),
                        };

                        this.recommendedTours.push(tour);

                        Object.keys(tour).forEach(key => jQuery(`input[name="tour-${key}"]`).val(''));
                    },

                    removeTour(id) {

                        this.recommendedTours = this.recommendedTours.filter((tour, index) => index != id);
                    },

                    clearTour() {

                        document.getElementById('tour-form').style.display = 'none'

                        this.recommendedTours = [];
                    },

                    save() {

                        jQuery(`<input type="hidden" name="schedule_cost" value="${this.scheduleCost}"/>`).appendTo('#booking-form');

                        jQuery(`<input type="hidden" name="participants" value='[${this.participants.map(participant => JSON.stringify(participant))}]'/>`).appendTo('#booking-form');

                        jQuery(`<input type="hidden" name="software" value='[${this.recommendedSoftware.map(software => JSON.stringify(software))}]'/>`).appendTo('#booking-form');

                        jQuery(`<input type="hidden" name="tours" value='[${this.recommendedTours.map(tour => JSON.stringify(tour))}]'/>`).appendTo('#booking-form');

                        return true;
                    },
                }
            });
        </script>

<script>
    // JavaScript to toggle between individuals and corporate packages
    document.getElementById('explore-individuals').addEventListener('click', function() {
        document.getElementById('individual-packages').classList.remove('hidden');
        document.getElementById('corporate-packages').classList.add('hidden');

        // Change button colors
        this.classList.add('bg-[#00a651]', 'text-white');
        document.getElementById('explore-corporate').classList.remove('bg-[#00a651]', 'text-white');
        document.getElementById('explore-corporate').classList.add( 'text-black');
    });

    document.getElementById('explore-corporate').addEventListener('click', function() {
        document.getElementById('corporate-packages').classList.remove('hidden');
        document.getElementById('individual-packages').classList.add('hidden');

        // Change button colors
        this.classList.add('bg-[#00a651]', 'text-white');
        document.getElementById('explore-individuals').classList.remove('bg-[#00a651]', 'text-white');
        document.getElementById('explore-individuals').classList.add( 'text-black');
    });
</script>


    {{-- @endpush --}}

@endsection
