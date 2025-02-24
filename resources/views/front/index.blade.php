@extends('front.Projects.master')

@section('title', 'Home')
@section('position', 'fixed')
@section('opacity', 'bg-opacity-0')
@section('display', 'hidden')
@section('textColor', 'text-white')


@section('css')

<style>
    .body {
        scroll-behavior: smooth !important;
    }

    #filters{
        overscroll-behavior-y: contain;
        &::-w

        ebkit-scrollbar{
            width: 10px;
        }
    }

    .venue:hover {
        animation: venue-grow .2s ease-in .2s forwards;
    }

    .venue:hover div div div:nth-child(1) {
        visibility: visible;
    }

    .venue:hover div div div:nth-child(2) {
        display: none;
    }

    @keyframes venue-grow {
        50% {
            flex-grow: 2;
        }

        to {
            flex-grow: 3;
        }
    }

    .venue-show {
        opacity: 1;
        filter: blur(0);
        transform: translateX(0%);
    }

    @media(prefers-reduced-motion) {
        .venue-show {
            transition: none;
        }
    }

    .zlide {
        background-size: cover;
    }

    @keyframes show-expert {
        to {
            opacity: 1;
            filter: blur(0);
            transform: translateY(-40%);
        }
    }

    .zlide {
        opacity: 1;
        filter: blur(0);
        transform: translateY(-40%);
    }

    .zlide-no {
        opacity: 1;
        filter: blur(0);
        transform: translateY(-30%);
    }

    @keyframes slideIn {
        from {
            left: 0;
        }

        to {
            left: -100%;
        }
    }

    .test-slider1 {
        animation: slideIn 60s linear .2s infinite alternate-reverse;
    }

    .test-slider2 {
        animation: slideIn 60s linear .2s infinite alternate;
    }

    .test-slider1:hover,
    .test-slider2:hover {
        animation-play-state: paused;
    }

    .venue-h3 {
        text-shadow:
            -1px -1px 0 #008000,
            1px -1px 0 #008000,
            -1px 1px 0 #008000,
            1px 1px 0 #008000;
        /* Adds a black outline to the text */
    }
</style>

<link rel="stylesheet" href="{{ asset('front/Projects/css/banner.css')}}">
<link rel="preload" href="{{ asset('images/home.jpg') }}" as="image">
<!-- Include Tailwind CSS & Alpine.js (optional) for better transition handling -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.2/dist/cdn.min.js" defer></script>

@endsection

@section('content')

<main class="">

    <!-- Banner -->
    <div class=" w-full relative" id="tp">
        <!-- Banner box -->
        <div class="w-full h-[60dvh] lg:h-[100dvh] overflow-hidden">
            <div class="relative w-full h-full" >
                <!-- Banner Slide -->
                <div class="relative w-full h-full overflow-hidden">

                    <div class="banner relative w-full h-full overflow-hidden" id="tp">
                        <div class="slider">
                          <!-- Slide 1 -->
                <div class="xlide absolute w-full h-full active">
                <img class="absolute w-full h-full object-none object-right-top pointer-events-none opacity-20"
                    src="{{ asset('images/t4d/data.webp') }}" alt="">

                 <!-- Black overlay -->
                 <div class="absolute inset-0 bg-black opacity-60"></div>
                <!-- Gradient overlay -->
                <div class="absolute inset-0 bg-black-300 sm:bg-transparent sm:from-black-900/95 sm:to-black-900/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"></div>
                <div class="absolute w-full h-full">
                    <div class="penetrate-blur bg-[#d9d9d9]/25 md:bg-transparent left pr-10"> <!-- Reduced opacity -->
                <div class="absolute left-5 lg:left-20 top-[40%] lg:w-2/5 py-3 px-6 text-center md:text-left lg:bg-white lg:rounded-xl zlide">
                    <h1 class="text-xl md:text-xl 2xl:text-6xl font-bold capitalize text-[#0096FF] pb-2 mb-5">
                        Your Data Journey Starts Here.
                    </h1>
                    <p class="py-2 mb-6 xl:mb-12 text-base md:text-xl 2xl:text-4xl">
                     Elevate your organization with data-driven insights. Our comprehensive data collection services, tailored to healthcare, government, non-profits, and NGOs, provide the foundation for informed decisions, improved efficiency, and impactful outcomes.
                   <a href="{{ url('dataservices') }}">
    <div class="ires-primary-btn text-sm mx-auto md:mx-0"> <!-- Changed from text-xl to text-lg -->
        Explore More
    </div>
</a>

                </div>
            </div>


    </div>
                        </div>

                                                <!-- Slide 2 -->
                                                <div class="xlide absolute w-full h-full">
                                                    <img class="absolute w-full hfull object-none object-right-top pointer-events-none opacity-0"
                                                    src="{{ asset('images/t4d/data.webp') }}" alt="">

                                                    <div class=" absolute w-full h-full">
                                                        <div class="penetrate-blur bg-[#d9d9d9]/50 md:bg-transparent left pr-10">
                                                            <div
                                                                class="absolute left-5 lg:left-20  top-[40%] lg:w-2/5  py-3 px-6 text-center md:text-left lg:bg-white lg:rounded-xl  zlide">
                                                                <h1 class="text-xl md:text-xl 2xl:text-6xl font-bold capitalize text-[#0096FF] pb-2 mb-5">
                                                                Ignite Your Online Business
                                                                </h1>
                                                                <p class="py-2 mb-6 xl:mb-12 text-base md:text-xl 2xl:text-4xl">
                                                               Accelerate your e-commerce growth with our expert training and consulting services. Master the art of paid ads, SEO, SMM, SEM, and media buying to reach your target audience and boost your sales.
                                                                </p>
                                                                                <a href="{{ url('ecommerece') }}">
                        <div class="ires-primary-btn text-sm mx-auto md:mx-0"> <!-- Changed from text-xl to text-lg -->
                            Explore More
                        </div>
                    </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="xlide absolute w-full h-full ">
                                <img class="absolute w-full hfull object-none object-right-top pointer-events-none opacity-0"
                                   src="{{ asset('images/t4d/data.webp') }}" alt="">
                                <div class="absolute w-full h-full">
                                    <div class="penetrate-blur bg-[#d9d9d9]/50 md:bg-transparent left pr-10">
                                        <div
                                            class="absolute left-5 lg:left-20  top-[40%] lg:w-2/5  py-3 px-6 text-center md:text-left lg:bg-white lg:rounded-xl  zlide">
                                            <h1 class="text-xl md:text-xl 2xl:text-6xl font-bold capitalize text-[#0096FF] pb-2 mb-5">
                                            Elevate Your Learning with Teefodee.com
                                            </h1>
                                            <p class="py-2 mb-6 xl:mb-12 text-base md:text-xl 2xl:text-4xl">
                                           Reach the finish line of effective learning with Teefodee's comprehensive e-learning solutions. Our expert-led trainings, captivating e-learning content, custom portals, and seamless Moodle setup and hosting.

                                            </p>
                                                         <a href="{{ url('elearning') }}">
    <div class="ires-primary-btn text-sm mx-auto md:mx-0"> <!-- Changed from text-xl to text-lg -->
        Explore More
    </div>
</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4 -->
                            <div class="xlide absolute w-full h-full ">
                                <img class="absolute w-full hfull object-none object-right-top pointer-events-none opacity-0"
                                   src="{{ asset('images/t4d/data.webp') }}" alt="">
                                <div class="absolute w-full h-full">
                                    <div class="penetrate-blur bg-[#d9d9d9]/50 md:bg-transparent left pr-10">
                                        <div
                                            class="absolute left-5 lg:left-20  top-[40%] lg:w-2/5  py-3 px-6 text-center md:text-left lg:bg-white lg:rounded-xl  zlide">
                                            <h1 class="text-xl md:text-xl 2xl:text-6xl font-bold capitalize text-[#0096FF] pb-2 mb-5">
                                               Your Tech Partner for the Future
                                            </h1>
                                            <p class="py-2 mb-6 xl:mb-12 text-base md:text-xl 2xl:text-4xl">
                                            Empower your business with cutting-edge technology solutions. Our expert team provides bespoke software deployment, web and web app development, mobile development, AI and machine learning labs, and comprehensive training and consulting services. Let's build a brighter digital future together.
                                            </p>
                                                            <a href="{{ url('techengineering') }}">
    <div class="ires-primary-btn text-sm mx-auto md:mx-0"> <!-- Changed from text-xl to text-lg -->
        Explore More
    </div>
</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5 -->
                            <div class="xlide absolute w-full h-full ">
                                <img class="absolute w-full hfull object-none object-right-top pointer-events-none opacity-0"
                                   src="{{ asset('images/t4d/data.webp') }}" alt="">
                                <div class="absolute w-full h-full">
                                    <div class="penetrate-blur bg-[#d9d9d9]/50 md:bg-transparent left pr-10">
                                        <div
                                            class="absolute left-5 lg:left-20  top-[40%] lg:w-2/5  py-3 px-6 text-center md:text-left lg:bg-white lg:rounded-xl  zlide">
                                            <h1 class="text-2xl md:text-xl 2xl:text-6xl font-bold capitalize text-[#0096FF] pb-2 mb-5">
                                            Sprint Towards Success: Empower Your Team to Cross the Finish Line
                                            </h1>
                                            <p class="py-2 mb-6 2xl:mb-12 text-base md:text-xl 2xl:text-4xl">
                                            Our expert trainers and consultants have the experience to sprint past industry challenges and deliver high-impact solutions. With a proven track record of high conversion rates, we'll help your team cross the finish line of peak performance.
                                            </p>
                                                             <a href="{{ url('consultation') }}">
    <div class="ires-primary-btn text-sm mx-auto md:mx-0"> <!-- Changed from text-xl to text-lg -->
        Explore More
    </div>
</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 6 -->
                            <div class="xlide absolute w-full h-full ">
                                <img class="absolute w-full hfull object-none object-right-top pointer-events-none opacity-0"
                                    src="{{ asset('images/t4d/data.webp') }}" alt="">
                                <div class="absolute w-full h-full">
                                    <div class="penetrate-blur bg-[#d9d9d9]/50 md:bg-transparent left pr-10">
                                        <div
                                            class="absolute left-5 lg:left-20  top-[40%] lg:w-2/5  py-3 px-6 text-center md:text-left lg:bg-white lg:rounded-xl zlide">
                                            <h1 class="text-2xl md:text-xl 2xl:text-6xl font-bold capitalize text-[#0096FF] pb-2 mb-5">
                                            Elevate your learning with Teefodee.com
                                            </h1>
                                            <p class="py-2 mb-6 xl:mb-12 text-base md:text-xl 2xl:text-4xl">
                                           Reach the finish line of effective learning with Teefodee's comprehensive e-learning solutions. Our expert-led trainings, captivating e-learning content, custom portals, and seamless Moodle setup and hosting will supercharge your learning experience.  Unlock your e-learning potential today.
                                            </p>
                                                             <a href="{{ url('elearning') }}">
    <div class="ires-primary-btn text-sm mx-auto md:mx-0"> <!-- Changed from text-xl to text-lg -->
        Explore More
    </div>
</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slider controls Arrows -->
                    <button class="absolute top-0 start-0 z-30 pb-5 md:pb-0 flex items-end md:items-center justify-center h-full px-4 cursor-pointer group focus:outline-none prev-xlide invisible md:visible">
                        <span class="prev-xlide p-2 hover:border-2 border-[#0096FF] rounded-full hover:bg-transparent bg-[#0096FF] hover:text-[#0096FF] text-white">
                            <i>
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'
                                    width='24' height='24'>
                                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z">
                                    </path>
                                </svg>
                            </i>
                        </span>
                    </button>
                    <button class="absolute top-0 end-0 z-30 pb-5 md:pb-0 flex items-end md:items-center justify-center h-full px-4 cursor-pointer group focus:outline-none next-xlide invisibl md:visible">
                        <span class="next-xlide  p-2 hover:border-2 border-[#0096FF] rounded-full hover:bg-transparent bg-[#0096FF] hover:text-[#0096FF] text-white" id="nxt">
                            <i>
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'
                                    width='24' height='24'>
                                    <path
                                        d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                    </path>
                                </svg>
                            </i>
                        </span>
                    </button>
                </div>
            </div>
        </div>




        <!-- Badges of Quality -->
       <div class="xl:absolute bottom-0 z-30 w-full xl:h-[15dvh] ">
                <div class="flex flex-wrap justify-center items-center w-full h-full py-3 *:pt-1 divide-y sm:divide-y-0 lg:divide-x *:mb-4 lg:*:mb-0">
                <div class="w-[210px] text-center">
                    <div class="counter inline text-2xl text-[#FFFFFF] font-bold" id="Courses_counter">0</div>
                    <div class="inline text-2xl text-[#FFFFFF] font-bold">+</div>
                    <p class="text-[#FFFFFF] text-lg">Courses</p>
                </div>
                <div class="w-[210px] text-center">
                    <div class="counter inline text-2xl text-[#FFFFFF] font-bold" id="Learners_counter">0</div>
                    <div class="inline text-2xl text-[#FFFFFF] font-bold">+</div>
                    <p class="text-[#FFFFFF] text-lg">Learners</p>
                </div>
                <div class="w-[210px] text-center">
                    <div class="counter inline text-2xl text-[#FFFFFF] font-bold" id="Companies_counter">0</div>
                    <div class="inline text-2xl text-[#FFFFFF] font-bold">+</div>
                    <p class="text-[#FFFFFF] text-lg"> Affiliates</p>
                </div>
                <div class="w-[210px] text-center">
                    <div class="counter inline text-2xl text-[#FFFFFF] font-bold" id="Venues_counter">0</div>
                    <div class="inline text-2xl text-[#FFFFFF] font-bold">+</div>
                    <p class="text-[#FFFFFF] text-lg">Trainings</p>
                </div>
                <div class="w-[210px] text-center">
                    <div class="counter inline text-2xl text-[#FFFFFF] font-bold" id="Sector_counter">0</div>
                    <div class="inline text-2xl text-[#FFFFFF] font-bold">+</div>
                    <p class="text-[#FFFFFF] text-lg">Sectors served</p>
                </div>
                <div class="w-[210px] text-center">
                    <div class="counter inline text-2xl text-[#FFFFFF] font-bold" id="Services_counter">0</div>
                    <div class="inline text-2xl text-[#FFFFFF] font-bold">+</div>
                    <p class="text-[#FFFFFF] text-lg">Consultancy Areas</p>
                </div>
            </div>
         </div>

  </div>



<!-- Courses -->
  <div class="w-full bg-transparent mt-5 pt-6 pb-3">
    <div class="w-full text-center pt-2">
        <div class="md:w-2/3 mx-auto relative">
            <hr class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#0096FF] border-0 rounded-full" />
            <h3 class="text-center text-[#0096FF] text-xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl">Courses</h3>
        </div>
        <p class="italic text-black md:text-lg font-bold p-2">Discover a wide range of courses crafted to enhance your skills and accelerate your career.</p>
    </div>
    <div class="lg:w-10/12 mx-auto my-8">
        <!-- Category Buttons -->
        <div class="flex cursor-pointer *:rounded-3xl *:mx-1 *:mb-1 *:bg-[#0096FF] *:text-white ml-4 mb-3">
            @foreach($categories as $category)
                <button class="hover:bg-[#0096FF] hover:text-white focus:bg-#0096FF] hover:mb-1 p-2 w-max"
                    hx-get="/courses/category/{{ $category->id }}"
                    hx-trigger="click"
                    hx-indicator="#indicator"
                    hx-target="#explores"
                    hx-swap="innerHTML">
                    <p class="p-1 box-border">{{ $category->name }}</p>
                </button>
            @endforeach
        </div>

        @include('front.Projects.wishlist')

        <!-- Course Display Area -->
        <div class="w-full bg-transparent p-4 rounded-lg" id="explores">
            <span id="indicator" class="htmx-indicator w-full p-5">
                <img class="w-24 object-cover mx-auto" src="{{ asset('images/Infinity@1x-1.0s-200px-200px.gif') }}" alt="">
            </span>
        </div>

        <!-- Show More Button -->
        <div class="w-full p-4" id="showMore">
            <div class="float-right">
                <button class="hover:underline focus:text-[#0096FF]"
                    hx-get="/courses/category/{{ $categories->first()->id }}"
                    hx-trigger="click"
                    hx-indicator="#indicator"
                    hx-target="#explores"
                    hx-swap="beforeend">
                    <p class="p-1 box-border">Show More</p>
                </button>
            </div>
        </div>
    </div>
</div>


          <!-- Service -->
    <div class="w-full bg-transparent mt-10 pt-6 pb-3">
        <div class="w-full lg:w-2/3 mx-auto my-8 px-3 sm:px-0">
            <div class="w-full text-center ">
                <div class="mx-auto relative">
                    <hr
                        class="absolute top-1/2 w-2/3 left-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#0096FF] border-0 rounded-full" />
                    <h3 class="text-center text-[#0096FF] text-xl sm:text-xl capitalize font-bold relative z-10 bg-white w-max mx-auto p-4 rounded-5xl"
                        id='testimonial'>Our Services</h3>
                </div>

                <p class="italic text-black md:text-lg font-bold pt-1 pb-10">Delivering expert-led courses and tailored
                    training to empower your professional journey.</p>
            </div>
            <div class="w-full relative *:cursor-pointer">
                <div class="pt-3 w-full overflow-hidden">
                    <div
                        class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  2xl:gridcols-5 gap-4 py-2 px-2 lg:px-0 transition-all duration-1000 ease-in-out ">
                        {{-- @foreach(App\ServiceCapability::all() as $service_capability)
                            <div
                                class="cardz *:w-full bg-[#0096FF] hover:bg-white hover:shadow-xl shadow-white rounded-xl overflow-hidden group">
                                <div class="h-40 ">
                                    <img loading="lazy" loading="lazy" class="h-full w-full object-cover"
                                        src="{{ asset('images/Service_' . $loop->iteration . '.webp') }}" alt="">
                                </div>
                                <h4 class="h-20 py-2 px-4 text-white group-hover:text-[#1EA19D] font-bold">
                                    {{$service_capability->name}}
                                </h4>
                                <div clss="">
                                    <div class="w-max mx-auto m-5 p-2 text-white">
                                        <a href="{{ route('course.industry.service-capability', $service_capability) }}"
                                            class="bg-[#1EA19D] hover:bg-[#0096FF] hover:text-white py-2 px-4 rounded-3xl">More
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach --}}
                        @foreach(App\ServiceCapability::limit(8)->get() as $service_capability)
                            <a href="{{ route('course.industry.service-capability', $service_capability) }}"
                                class="border box-content rounded-lg shadow-xl hover:shadow-[#0096FF] overflow-hidden md:hover:scale-110 transition duration-500 relative">
                                <div class="h-40 md:h-56 lg:h-64 flex items-center ">
                                    <img loading="lazy" loading="lazy" class="h-full w-full object-cover"
                                        src="{{ asset('images/Service_' . $loop->iteration . '.webp') }}" alt="">
                                </div>
                                <h4 class="absolute bottom-0 h-1/3 w-full text-sm font-bold p-2 bg-white hover:underline capitalize">
                                    {{$service_capability->name}}
                                </h4>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




<!-- Data Collection -->
<div class="w-full bg-transparent mt-5 pt-6 pb-3">
    <div class="bg-blue-600 mx-auto max-w-6xl p-6 rounded-lg"> <!-- Added rounded-lg here -->
        <div class="w-full text-center pt-2">
            <div class="md:w-2/3 mx-auto relative">
                <hr
                    class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full" />
                <h3 class="text-center text-[#0096FF] text-xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-2xl"
                    id='testimonial'> Data Collection</h3>
            </div>
            <p class="italic text-white md:text-lg font-bold p-2">Discover a wide range of courses crafted to enhance
                your skills and accelerate your career.</p>
        </div>
        <div class="lg:w-10/12 mx-auto my-4">
            <!-- Features -->
            <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 lg:py-10 mx-auto">
                <!-- Grid -->
                <div class="md:grid md:grid-cols-2 md:items-center md:gap-8 xl:gap-32">
                    <div class="mt-0 sm:mt-2 lg:mt-0">
                        <div class="space-y-0 sm:space-y-4">
                            <!-- Title -->
                            <div class="space-y-0 md:space-y-2">
                                <h2 class="font-bold text-xl lg:text-xl text-white dark:text-neutral-200">
                                                        Expert Training and Consultancy - Empowering Organizations through Data Solutions

                                </h2>
                                <p class="text-white dark:text-neutral-500">
                    At TechForDevelopment, we are dedicated to empowering organizations with cutting-edge data solutions and training programs. Our consultancy services span multiple sectors, delivering customized solutions that address specific needs in data collection, analysis, and management.
                                </p>
                            </div>
                            <!-- End Title -->

                            <!-- List -->
                            <ul class="space-y-2 sm:space-y-4">
                                <li class="flex gap-x-3">
                                    <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>
                                    <div class="grow">
                                        <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                            <span class="font-bold">Health Sector</span> Data Collection
                                        </span>
                                    </div>
                                </li>

                             <li class="flex gap-x-3">
                                    <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>
                                    <div class="grow">
                                        <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                              <span class="font-bold">Agriculture Sector</span> Data Collection
                                        </span>
                                    </div>
                                </li>

                               <li class="flex gap-x-3">
                                    <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>
                                    <div class="grow">
                                        <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                            <span class="font-bold">Public Sector</span> Data Collection
                                        </span>
                                    </div>
                                </li>
                                <li class="flex gap-x-3">
                                    <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>
                                    <div class="grow">
                                        <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                            <span class="font-bold">Custom Training Programs</span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                            <!-- End List -->
                        </div>
                    </div>
                    <!-- End Col -->

                    <div>
                        <img class="rounded-xl" src="https://images.unsplash.com/photo-1648737963503-1a26da876aca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=900&h=900&q=80" alt="Features Image">
                    </div>
                </div>
                <!-- End Grid -->
                <div class="mt-4 md:mt-8 flex space-x-4"> <!-- Removed justify-center -->
                    <a
                    href="{{ url('dataservices') }}"
                    class="inline-block rounded border border-white bg-white px-12 py-3 text-sm font-medium text-blue-500 transition hover:bg-transparent hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                    >
                   Explore More Services
                    </a>

                <a
                href="{{ url('consultation') }}"
                class="inline-block rounded border border-white bg-transparent text-white px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-500 hover:border-blue-500 hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                >
                Free Consultation
                </a>

                </div>


            </div>
            <!-- End Features -->

        </div>
    </div>
</div>


<!-- Announcement Banner -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="bg-blue-600 bg-[url('https://preline.co/assets/svg/examples/abstract-1.svg')] bg-no-repeat bg-cover bg-center p-4 rounded-lg text-center">
    <p class="me-2 inline-block text-white">
      Empower Your Business with Accurate Data
    </p>
    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border-2 border-white text-white hover:border-white/70 hover:text-white/70 focus:outline-none focus:border-white/70 focus:text-white/70 disabled:opacity-50 disabled:pointer-events-none" href="{{ url('dataservices') }}">
      Learn more
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
    </a>
  </div>
</div>
<!-- End Announcement Banner -->


<!-- E-Learning -->
<div class="w-full bg-[#00a651] mt-5 pt-6 pb-3 rounded-xl shadow-lg lg:w-10/12 mx-auto">
    <div class="w-full text-center pt-2">
       <div class="md:w-2/3 mx-auto relative">
                <hr
                    class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#0096FF] border-0 rounded-full" />
                <h3 class="text-center text-[#00a651] text-xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-2xl"
                    id='testimonial'>E-Learning</h3>
            </div>
        <p class="italic text-white md:text-lg font-bold p-2">Discover a wide range of courses crafted to enhance your skills and accelerate your career.</p>
    </div>

    <!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
            <div class="lg:col-span-7">
                <!-- Grid -->
                <div class="grid grid-cols-12 gap-2 sm:gap-6 items-center lg:-translate-x-10">
                    <div class="col-span-4">
                        <img class="rounded-xl" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
                    </div>
                    <div class="col-span-3">
                        <img class="rounded-xl" src="https://images.unsplash.com/photo-1605629921711-2f6b00c6bbf4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
                    </div>
                    <div class="col-span-5">
                        <img class="rounded-xl" src="https://images.unsplash.com/photo-1600194992440-50b26e0a0309?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=920&q=80" alt="Features Image">
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-10 lg:mt-0 lg:col-span-5">
                <div class="space-y-6 sm:space-y-8">
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-xl lg:text-xl text-white dark:text-neutral-200">Collaborative tools to design user experience</h2>
                        <p class="text-white dark:text-neutral-500">Use our tools to explore your ideas and make your vision come true. Then share your work easily.</p>
                    </div>

                    <!-- List -->
                    <ul class="space-y-2 sm:space-y-4">
                        <li class="flex gap-x-3">
                            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                    <span class="font-bold">Corporate Training and Professional Development</span>
                                </div>
                        </li>

                         <li class="flex gap-x-3">
                            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                    <span class="font-bold">Learning Management System (LMS) Setup and Support</span>
                                </div>
                        </li>
                         <li class="flex gap-x-3">
                            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                    <span class="font-bold">Content Development and Instructional Design</span>
                                </div>
                        </li>
                         <li class="flex gap-x-3">
                            <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            <div class="grow">
                                <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                    <span class="font-bold">Moodle Course Hosting</span>
                                </div>
                        </li>
                    </ul>
                    <!-- End List -->

                    <!-- Button Section -->
                    <div class="mt-4 md:mt-8 flex justify-center space-x-4">
                       <a
                        href="{{ url('elearning') }}"
                        class="inline-block rounded border border-blue-500 bg-blue-500 px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-600 hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                       >
                        Explore
                       </a>
                       <a
                        href="{{ url('consultation') }}"
                        class="inline-block rounded border border-blue bg-blue text-white px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-500 hover:border-blue-500 hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                       >
                        Free Consultation
                       </a>
                    </div>
                    <!-- End Button Section -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Features -->

</div>

<section class="relative z-10 overflow-hidden bg-[#00a651] lg:w-10/12 mx-auto py-16 px-8 mt-10">
    <div class="container max-w-6xl mx-auto">
        <div class="-mx-4 flex flex-wrap items-center">
            <div class="w-full px-4 lg:w-1/2">
                <div class="text-center lg:text-left">
                    <div class="mb-10 lg:mb-0">
                        <h1 class="mt-0 mb-3 text-3xl font-bold leading-tight sm:text-4xl sm:leading-tight md:text-[40px] md:leading-tight text-white">
                            Your Vision, Our Expertise
                        </h1>
                        <p class="w-full text-base font-medium leading-relaxed sm:text-lg sm:leading-relaxed text-white">
                            Transform your ideas into high-performance software, tailored precisely to drive results in your industry.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="text-center lg:text-right">
                    <a class="font-semibold rounded-lg mx-auto inline-flex items-center justify-center bg-white py-4 px-9 hover:bg-opacity-90" href="#">
                        Get Your Custom Solution
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Background Decorative SVGs -->
    <span class="absolute top-0 right-0 -z-10">
        <svg width="388" height="250" viewBox="0 0 388 220" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.05" d="M203 -28.5L4.87819e-05 250.5L881.5 250.5L881.5 -28.5002L203 -28.5Z" fill="url(#paint0_linear_971_6910)"></path>
            <defs>
                <linearGradient id="paint0_linear_971_6910" x1="60.5" y1="111" x2="287" y2="111" gradientUnits="userSpaceOnUse">
                    <stop offset="0.520507" stop-color="white"></stop>
                    <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                </linearGradient>
            </defs>
        </svg>
    </span>
    <span class="absolute top-0 right-0 -z-10">
        <svg width="324" height="250" viewBox="0 0 324 220" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.05" d="M203 -28.5L4.87819e-05 250.5L881.5 250.5L881.5 -28.5002L203 -28.5Z" fill="url(#paint0_linear_971_6911)"></path>
            <defs>
                <linearGradient id="paint0_linear_971_6911" x1="60.5" y1="111" x2="287" y2="111" gradientUnits="userSpaceOnUse">
                    <stop offset="0.520507" stop-color="white"></stop>
                    <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                </linearGradient>
            </defs>
        </svg>
    </span>
    <span class="absolute top-4 left-4 -z-10">
        <svg width="43" height="56" viewBox="0 0 43 56" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- SVG circles code here -->
        </svg>
    </span>
</section>
n>


<!-- Software and Tech -->
<div class="w-full bg-transparent mt-5 pt-6 pb-3">
    <div class="bg-blue-600 mx-auto max-w-6xl p-6 rounded-lg"> <!-- Added rounded-lg here -->
        <div class="w-full text-center pt-2">
            <div class="md:w-2/3 mx-auto relative">
                <hr
                    class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full" />
                <h3 class="text-center text-[#0096FF] text-xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-2xl"
                    id='testimonial'> Software and Tech</h3>
            </div>
            <p class="italic text-white md:text-lg font-bold p-2">Discover a wide range of courses crafted to enhance
                your skills and accelerate your career.</p>
        </div>
        <div class="lg:w-10/12 mx-auto my-4">
            <!-- Features -->
            <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 lg:py-10 mx-auto">
                <!-- Grid -->
                <div class="md:grid md:grid-cols-2 md:items-center md:gap-8 xl:gap-32">
                    <div class="mt-0 sm:mt-2 lg:mt-0">
                        <div class="space-y-0 sm:space-y-4">
                            <!-- Title -->
                            <div class="space-y-0 md:space-y-2">
                                <h2 class="font-bold text-xl lg:text-xl text-white dark:text-neutral-200">
                                   TransformingSoftware and Tech - Explore Our Multi-Channel Solutions
                                </h2>
                                <p class="text-white dark:text-neutral-500">
                                    Besides working with start-up enterprises as a partner for digitalization, we have built enterprise products for common pain points that we have encountered in various products and projects.
                                </p>
                            </div>
                            <!-- End Title -->

                            <!-- List -->
                            <ul class="space-y-2 sm:space-y-4">
                                <li class="flex gap-x-3">
                                    <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>
                                    <div class="grow">
                                        <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                            <span class="font-bold">Bespoke/Custom Sofware Development </span>
                </span>
                                    </div>
                                </li>

                             <li class="flex gap-x-3">
                                    <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>
                                    <div class="grow">
                                        <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                              <span class="font-bold">Web and Web Apps Development</span>
                                        </span>
                                    </div>
                                </li>

                               <li class="flex gap-x-3">
                                    <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>
                                    <div class="grow">
                                        <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                            <span class="font-bold">Mobile App Development </span>
                                        </span>
                                    </div>
                                </li>
                                <li class="flex gap-x-3">
                                    <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>
                                    <div class="grow">
                                        <span class="text-sm sm:text-base text-white dark:text-neutral-500">
                                            <span class="font-bold">AI and Machine Learning Labs</span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                            <!-- End List -->
                        </div>
                    </div>
                    <!-- End Col -->

                    <div>
                        <img class="rounded-xl" src="https://images.unsplash.com/photo-1648737963503-1a26da876aca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=900&h=900&q=80" alt="Features Image">
                    </div>
                </div>
                <!-- End Grid -->
                <div class="mt-4 md:mt-8 flex space-x-4"> <!-- Removed justify-center -->
                    <a
                    href="{{ url('techengineering') }}"
                    class="inline-block rounded border border-white bg-white px-12 py-3 text-sm font-medium text-blue-500 transition hover:bg-transparent hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                    >
                    Get Started Today
                    </a>

                <a
                href="{{ url('consultation') }}"
                class="inline-block rounded border border-white bg-transparent text-white px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-500 hover:border-blue-500 hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                >
                Free Consultation
                </a>

                </div>


            </div>
            <!-- End Features -->

        </div>
    </div>
</div>


<!-- Announcement Banner -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="bg-blue-600 bg-[url('https://preline.co/assets/svg/examples/abstract-1.svg')] bg-no-repeat bg-cover bg-center p-4 rounded-lg text-center">
    <p class="me-2 inline-block text-white">
     Drive Growth with Scalable E-commerce Tech
    </p>
    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border-2 border-white text-white hover:border-white/70 hover:text-white/70 focus:outline-none focus:border-white/70 focus:text-white/70 disabled:opacity-50 disabled:pointer-events-none" href="{{ url('techengineering') }}">
      Learn more
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
    </a>
  </div>
</div>
<!-- End Announcement Banner -->




<!-- E-Commerce -->
<div class="w-full bg-[#00a651] mt-5 pt-6 pb-3 rounded-xl shadow-lg lg:w-10/12 mx-auto">
   <div class="md:w-2/3 mx-auto relative">
                <hr
                    class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#0096FF] border-0 rounded-full" />
                <h3 class="text-center text-[#00a651] text-xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-2xl"
                    id='testimonial'> E-Commerce</h3>
            </div>

        <!-- Features -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Grid -->
            <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
                <div>
                    <img class="rounded-xl" src="https://images.unsplash.com/photo-1648737963503-1a26da876aca?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=900&h=900&q=80" alt="Features Image">
                </div>
                <!-- End Col -->

                <div class="mt-5 sm:mt-10 lg:mt-0">
                    <div class="space-y-6 sm:space-y-8">
                        <!-- Title -->
                        <div class="space-y-2 md:space-y-4">
                            <h2 class="font-bold text-xl lg:text-xl text-white">
                                We tackle the challenges start-ups face
                            </h2>
                            <p class="text-gray-200">
                                Besides working with start-up enterprises as a partner for digitalization, we have built enterprise products for common pain points that we have encountered in various products and projects.
                            </p>
                        </div>
                        <!-- End Title -->

                        <!-- List -->
                        <ul class="space-y-2 sm:space-y-4">
                            <li class="flex gap-x-3">
                                <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-[#00a651] text-white">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                                <div class="grow">
                                    <span class="text-sm sm:text-base text-gray-200">
                                        <span class="font-bold">Search Engine Optimization (SEO)</span>
                                </div>
                            </li>

                           <li class="flex gap-x-3">
                                <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-[#00a651] text-white">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                                <div class="grow">
                                    <span class="text-sm sm:text-base text-gray-200">
                                        <span class="font-bold">Social Media Marketing (SMM)</span>
                                </div>
                            </li>

                         <li class="flex gap-x-3">
                                <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-[#00a651] text-white">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                                <div class="grow">
                                    <span class="text-sm sm:text-base text-gray-200">
                                        <span class="font-bold">Influencer Marketing</span>
                                </div>
                            </li>
                             <li class="flex gap-x-3">
                                <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-[#00a651] text-white">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                                <div class="grow">
                                    <span class="text-sm sm:text-base text-gray-200">
                                        <span class="font-bold">Search Engine Marketing (SEM)</span>
                                </div>
                            </li>
                             <li class="flex gap-x-3">
                                <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-[#00a651] text-white">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                                <div class="grow">
                                    <span class="text-sm sm:text-base text-gray-200">
                                        <span class="font-bold">Paid Advertising (Paid ADs)</span>
                                </div>
                            </li>
                            <li class="flex gap-x-3">
                                <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-[#00a651] text-white">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </span>
                                <div class="grow">
                                    <span class="text-sm sm:text-base text-gray-200">
                                        <span class="font-bold">Media Buying</span>
                                </div>
                            </li>
                        </ul>
                        <!-- End List -->

                         <!-- Button Section -->
                        <div class="mt-4 md:mt-8 flex justify-center space-x-4">
     <a
                        href="{{ url('ecommerece') }}"
                        class="inline-block rounded border border-blue-500 bg-blue-500 px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-600 hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                       >
                        Explore More
                       </a>
                       <a
                        href="{{ url('consultation') }}"
                        class="inline-block rounded border border-blue bg-blue text-white px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-500 hover:border-blue-500 hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                       >
                        Free Consultation
                       </a>
                        </div>
                        <!-- End Button Section -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Features -->
</div>



<div class="relative mx-auto max-w-6xl mt-20 lg:w-10/12 mx-auto">
    <div class="rounded-xl p-1"
        style="background-image: linear-gradient(to right bottom, rgb(0, 150, 255) 0%, rgb(0, 166, 81) 50%, rgb(0, 166, 81) 100%);">
        <div class="rounded-lg bg-[#0096ff]/80 backdrop-blur">
            <div class="flex w-full flex-wrap items-center justify-between gap-4 px-8 py-10 sm:px-16 lg:flex-nowrap">
                <div class="lg:max-w-xl">
                    <h2
                        class="block w-full pb-2 bg-gradient-to-b from-white to-gray-200 bg-clip-text font-bold text-transparent text-2xl sm:text-3xl">
                       Empowering Success Through Expert Training and Consultancy
                    </h2>
                    <p class="my-4 bg-transparent font-medium leading-relaxed tracking-wide text-gray-200">
                       Unlock your organization’s full potential with our tailored Training and Consultancy services, designed to equip your team with the skills and strategies needed for lasting success. Partner with us to enhance your operations, navigate challenges, and achieve sustainable growth.
                    </p>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-6">
                     <button class="bg-[#00a651] text-white button-text flex items-center justify-center whitespace-nowrap rounded-md transition-all duration-300 px-8 py-3 text-xs sm:text-sm hover:bg-[#00b76d]">Get Started</button>

                    <button class="flex items-center justify-center whitespace-nowrap rounded-md border border-white bg-white text-center text-black backdrop-blur transition-all hover:bg-[#00a651] px-8 py-3 text-xs sm:text-sm">Learn More</button>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Affiliated Websites -->
<div class="w-full bg-white mt-5 pt-6 pb-3 rounded-lg shadow-md">
    <div class="w-full text-center pt-2">
        <div class="md:w-2/3 mx-auto relative">
            <hr class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#0096FF] border-0 rounded-full" />
            <h3 class="text-center text-[#0096FF] text-xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl"
                id='testimonial'>Partner Websites in Our Network</h3>
        </div>
        <p class="italic text-black md:text-lg font-bold p-2">Discover a wide range of courses crafted to enhance your skills and accelerate your career.</p>
    </div>

    <section>
        <div class="max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
            <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-2 lg:items-center lg:gap-x-16">
               <div class="mx-auto max-w-lg lg:mx-0 text-left">
                <h2 class="text-3xl font-bold sm:text-4xl">Explore Our Trusted Affiliates</h2>
                <p class="mt-4 text-gray-700">TechforDevelopment.com collaborates with a diverse group of affiliated websites, each offering specialized services and resources to elevate your business. Together, we provide a comprehensive ecosystem that fosters innovation and drives success in the ever-evolving tech landscape.</p>
                <a href="#" class="inline-block rounded border border-[#0096FF] bg-[#0096FF] px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-600 hover:text-white focus:outline-none focus:ring focus:ring-yellow-400 mt-2">Explore More</a>
            </div>


                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3">
                    <a class="block rounded-xl border border-gray-200 bg-white p-4 shadow-sm hover:border-gray-300 hover:ring-1 hover:ring-gray-300 focus:outline-none focus:ring"
                        href="#">
                        <span class="inline-block rounded-lg bg-gray-100 p-3">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <!-- SVG paths here -->
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold">Medialytica</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
                    </a>

                    <!-- Repeat similar card structures here for other affiliated websites -->
                     <a class="block rounded-xl border border-gray-200 bg-white p-4 shadow-sm hover:border-gray-300 hover:ring-1 hover:ring-gray-300 focus:outline-none focus:ring"
                        href="#">
                        <span class="inline-block rounded-lg bg-gray-100 p-3">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <!-- SVG paths here -->
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold">Howto</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
                    </a>
                     <a class="block rounded-xl border border-gray-200 bg-white p-4 shadow-sm hover:border-gray-300 hover:ring-1 hover:ring-gray-300 focus:outline-none focus:ring"
                        href="#">
                        <span class="inline-block rounded-lg bg-gray-100 p-3">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <!-- SVG paths here -->
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold">Howafrica</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
                    </a>
                     <a class="block rounded-xl border border-gray-200 bg-white p-4 shadow-sm hover:border-gray-300 hover:ring-1 hover:ring-gray-300 focus:outline-none focus:ring"
                        href="#">
                        <span class="inline-block rounded-lg bg-gray-100 p-3">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <!-- SVG paths here -->
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold">Afrobookies</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
                    </a>
                     <a class="block rounded-xl border border-gray-200 bg-white p-4 shadow-sm hover:border-gray-300 hover:ring-1 hover:ring-gray-300 focus:outline-none focus:ring"
                        href="#">
                        <span class="inline-block rounded-lg bg-gray-100 p-3">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <!-- SVG paths here -->
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold">Teefodee</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
                    </a>
                     <a class="block rounded-xl border border-gray-200 bg-white p-4 shadow-sm hover:border-gray-300 hover:ring-1 hover:ring-gray-300 focus:outline-none focus:ring"
                        href="#">
                        <span class="inline-block rounded-lg bg-gray-100 p-3">
                            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <!-- SVG paths here -->
                            </svg>
                        </span>
                        <h2 class="mt-2 font-bold">T4D Blog</h2>
                        <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">Lorem ipsum dolor sit amet consectetur.</p>
                    </a>

                </div>
            </div>
        </div>
    </section>
</div>



<!-- Announcement Banner -->
<div class="bg-gradient-to-r from-[#00a651] to-[#00a657]">
  <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
    <!-- Grid -->
    <div class="grid justify-center md:grid-cols-2 md:justify-between md:items-center gap-2">
      <div class="text-center md:text-start md:order-2 md:flex md:justify-end md:items-center">
        <p class="me-5 inline-block text-sm font-semibold text-white">
          Ready to get started?
        </p>
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border-2 border-white text-white hover:border-white/70 hover:text-white/70 focus:outline-none focus:border-white/70 focus:text-white/70 disabled:opacity-50 disabled:pointer-events-none" href="#">
         Learn More
        </a>
      </div>
      <!-- End Col -->

      <div class="flex items-center">
        <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg font-medium text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition text-sm" href="#">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>

        </a>
        <span class="inline-block border-e border-white/30 w-px h-5 mx-2"></span>
        <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg font-medium text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition text-sm" href="#">
          Cross the finish line with a tailor-made web or web app solution that elevates your business to the next level
        </a>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Grid -->
  </div>
</div>
<!-- End Announcement Banner -->









    <!-- Testimonials -->
    <div class="w-full  bg-transparent mt-10 pb-3">
        <div class="w-full py-5 overflow-hidden">
            <div class="md:w-2/3 mx-auto relative">
                <hr
                    class="absolute top-1/2 left-1/2 w-5/6 -translate-x-1/2 -translate-y-1/2 h-0.5 bg-[#0096FF] border-0 rounded-full" />
                <h3 class="text-center text-[#0096FF] text-xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl"
                    id='testimonial'>Testimonials</h3>
            </div>
            <p class="text-center text-black md:text-lg font-bold italic p-2">Hear directly from some of our satisfied clients about how our services have positively impacted them.</p>
        </div>
        <div class="w-full">
            <!-- the buttons have inline js -->
            <div class="w-full lg:w-4/5 mx-auto h-[300px] px-2 relative overflow-hidden pb-0">
                <div class="absolute bottom-0 w-full z-40 hidden cursor-pointer pb-2"
                    onclick="this.parentElement.classList.toggle('h-[350px]');this.parentElement.childNodes[3].classList.toggle('hidden');this.classList.toggle('hidden')">
                    <div class="w-max mx-auto">
                        <a href="#testimonial"
                            class="px-4 py-2 rounded-lg  bg-[#0096FF] hover:bg-[#0096FF] ring-offset-black ring-[#0096FF] text-white text-center capitalize">Close</a>
                    </div>
                </div>
                <div class="absolute bottom-0 w-full z-40 bg-gradient-to-t from-[#f7f9f9] via-[#f7f9f9] to-transparent h-24 cursor-pointer"
                    onclick="this.parentElement.classList.toggle('h-[350px]');this.parentElement.childNodes[1].classList.toggle('hidden');this.classList.toggle('hidden')">
                    <p class="w-full h-full text-center text-[#1EA19D] translate-y-1/3 capitalize font-bold">Click to
                        Show More</p>
                </div>
                <div class="flex flex-wrap justify-center gap-3 w-full">
                    <div class="">
                        <div class="rounded-lg h-[200px] aspect-square relative bg-[#0096FF] p-2">
                            <div class="absolute -top-1 left-4 z-0 origin-top-left rotate-[20deg]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-white opacity-50 "
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M11.192 15.757c0-.88-.23-1.618-.69-2.217c-.326-.412-.768-.683-1.327-.812c-.55-.128-1.07-.137-1.54-.028c-.16-.95.1-1.956.76-3.022c.66-1.065 1.515-1.867 2.558-2.403L9.372 5c-.8.396-1.56.898-2.26 1.505c-.71.607-1.34 1.305-1.9 2.094s-.98 1.68-1.25 2.69s-.345 2.04-.216 3.1c.168 1.4.62 2.52 1.356 3.35C5.837 18.58 6.754 19 7.85 19c.965 0 1.766-.29 2.4-.878c.628-.576.94-1.365.94-2.368zm9.124 0c0-.88-.23-1.618-.69-2.217c-.326-.42-.77-.692-1.327-.817c-.56-.124-1.073-.13-1.54-.022c-.16-.94.09-1.95.752-3.02c.66-1.06 1.513-1.86 2.556-2.4L18.49 5c-.8.396-1.555.898-2.26 1.505a11.29 11.29 0 0 0-1.894 2.094c-.556.79-.97 1.68-1.24 2.69a8.042 8.042 0 0 0-.217 3.1c.166 1.4.616 2.52 1.35 3.35c.733.834 1.647 1.252 2.743 1.252c.967 0 1.768-.29 2.402-.877c.627-.576.942-1.365.942-2.368z" />
                                </svg>
                            </div>
                            <div class="absolute bottom-10 right-0 z-0 rotate-[200deg] ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-white opacity-50"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M11.192 15.757c0-.88-.23-1.618-.69-2.217c-.326-.412-.768-.683-1.327-.812c-.55-.128-1.07-.137-1.54-.028c-.16-.95.1-1.956.76-3.022c.66-1.065 1.515-1.867 2.558-2.403L9.372 5c-.8.396-1.56.898-2.26 1.505c-.71.607-1.34 1.305-1.9 2.094s-.98 1.68-1.25 2.69s-.345 2.04-.216 3.1c.168 1.4.62 2.52 1.356 3.35C5.837 18.58 6.754 19 7.85 19c.965 0 1.766-.29 2.4-.878c.628-.576.94-1.365.94-2.368zm9.124 0c0-.88-.23-1.618-.69-2.217c-.326-.42-.77-.692-1.327-.817c-.56-.124-1.073-.13-1.54-.022c-.16-.94.09-1.95.752-3.02c.66-1.06 1.513-1.86 2.556-2.4L18.49 5c-.8.396-1.555.898-2.26 1.505a11.29 11.29 0 0 0-1.894 2.094c-.556.79-.97 1.68-1.24 2.69a8.042 8.042 0 0 0-.217 3.1c.166 1.4.616 2.52 1.35 3.35c.733.834 1.647 1.252 2.743 1.252c.967 0 1.768-.29 2.402-.877c.627-.576.942-1.365.942-2.368z" />
                                </svg>
                            </div>
                            <div
                                class="mx-2 mb-10 z-10 px-2 py-4 text-xs text-white text-center relative line-clamp-[10] overflow-hidden h-4/5">
                                Tech For Developmentis highly professional and I want to thank them for
                                inculcating in me sustainability best practices through the climate finance workshop.
                                This will go a long way in helping me provide sustainable finance solutions.
                            </div>
                            <div class="absolute bottom-2 right-2 m-2">
                                <p class="text-sm text-white font-bold">&gt; Virgile Ngabo</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="rounded-lg h-[200px] aspect-square relative bg-[#0096FFe5] p-2">
                            <div class="absolute -top-1 left-4 z-0 origin-top-left rotate-[20deg]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-white opacity-50 "
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M11.192 15.757c0-.88-.23-1.618-.69-2.217c-.326-.412-.768-.683-1.327-.812c-.55-.128-1.07-.137-1.54-.028c-.16-.95.1-1.956.76-3.022c.66-1.065 1.515-1.867 2.558-2.403L9.372 5c-.8.396-1.56.898-2.26 1.505c-.71.607-1.34 1.305-1.9 2.094s-.98 1.68-1.25 2.69s-.345 2.04-.216 3.1c.168 1.4.62 2.52 1.356 3.35C5.837 18.58 6.754 19 7.85 19c.965 0 1.766-.29 2.4-.878c.628-.576.94-1.365.94-2.368zm9.124 0c0-.88-.23-1.618-.69-2.217c-.326-.42-.77-.692-1.327-.817c-.56-.124-1.073-.13-1.54-.022c-.16-.94.09-1.95.752-3.02c.66-1.06 1.513-1.86 2.556-2.4L18.49 5c-.8.396-1.555.898-2.26 1.505a11.29 11.29 0 0 0-1.894 2.094c-.556.79-.97 1.68-1.24 2.69a8.042 8.042 0 0 0-.217 3.1c.166 1.4.616 2.52 1.35 3.35c.733.834 1.647 1.252 2.743 1.252c.967 0 1.768-.29 2.402-.877c.627-.576.942-1.365.942-2.368z" />
                                </svg>
                            </div>
                            <div class="absolute bottom-10 right-0 z-0 rotate-[200deg] ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-white opacity-50"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M11.192 15.757c0-.88-.23-1.618-.69-2.217c-.326-.412-.768-.683-1.327-.812c-.55-.128-1.07-.137-1.54-.028c-.16-.95.1-1.956.76-3.022c.66-1.065 1.515-1.867 2.558-2.403L9.372 5c-.8.396-1.56.898-2.26 1.505c-.71.607-1.34 1.305-1.9 2.094s-.98 1.68-1.25 2.69s-.345 2.04-.216 3.1c.168 1.4.62 2.52 1.356 3.35C5.837 18.58 6.754 19 7.85 19c.965 0 1.766-.29 2.4-.878c.628-.576.94-1.365.94-2.368zm9.124 0c0-.88-.23-1.618-.69-2.217c-.326-.42-.77-.692-1.327-.817c-.56-.124-1.073-.13-1.54-.022c-.16-.94.09-1.95.752-3.02c.66-1.06 1.513-1.86 2.556-2.4L18.49 5c-.8.396-1.555.898-2.26 1.505a11.29 11.29 0 0 0-1.894 2.094c-.556.79-.97 1.68-1.24 2.69a8.042 8.042 0 0 0-.217 3.1c.166 1.4.616 2.52 1.35 3.35c.733.834 1.647 1.252 2.743 1.252c.967 0 1.768-.29 2.402-.877c.627-.576.942-1.365.942-2.368z" />
                                </svg>
                            </div>
                            <div
                                class="mx-2 mb-10 z-10 px-2 py-4 text-xs text-white text-center relative line-clamp-[10] overflow-hidden h-4/5">
                                The fraud and internal control training workshop I attended was very helpful. Moreover,
                                the facilitator was very engaging. I would highly recommend this course to colleagues
                                because it is relevant to the day-to-day operations of organizations.
                            </div>
                            <div class="absolute bottom-2 right-2 m-2">
                                <p class="text-sm text-white font-bold">&gt; Bridget Tuei</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="rounded-lg h-[200px] aspect-square relative bg-[#0096FF] p-2">
                            <div class="absolute -top-1 left-4 z-0 origin-top-left rotate-[20deg]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-white opacity-50 "
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M11.192 15.757c0-.88-.23-1.618-.69-2.217c-.326-.412-.768-.683-1.327-.812c-.55-.128-1.07-.137-1.54-.028c-.16-.95.1-1.956.76-3.022c.66-1.065 1.515-1.867 2.558-2.403L9.372 5c-.8.396-1.56.898-2.26 1.505c-.71.607-1.34 1.305-1.9 2.094s-.98 1.68-1.25 2.69s-.345 2.04-.216 3.1c.168 1.4.62 2.52 1.356 3.35C5.837 18.58 6.754 19 7.85 19c.965 0 1.766-.29 2.4-.878c.628-.576.94-1.365.94-2.368zm9.124 0c0-.88-.23-1.618-.69-2.217c-.326-.42-.77-.692-1.327-.817c-.56-.124-1.073-.13-1.54-.022c-.16-.94.09-1.95.752-3.02c.66-1.06 1.513-1.86 2.556-2.4L18.49 5c-.8.396-1.555.898-2.26 1.505a11.29 11.29 0 0 0-1.894 2.094c-.556.79-.97 1.68-1.24 2.69a8.042 8.042 0 0 0-.217 3.1c.166 1.4.616 2.52 1.35 3.35c.733.834 1.647 1.252 2.743 1.252c.967 0 1.768-.29 2.402-.877c.627-.576.942-1.365.942-2.368z" />
                                </svg>
                            </div>
                            <div class="absolute bottom-10 right-0 z-0 rotate-[200deg] ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-white opacity-50"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M11.192 15.757c0-.88-.23-1.618-.69-2.217c-.326-.412-.768-.683-1.327-.812c-.55-.128-1.07-.137-1.54-.028c-.16-.95.1-1.956.76-3.022c.66-1.065 1.515-1.867 2.558-2.403L9.372 5c-.8.396-1.56.898-2.26 1.505c-.71.607-1.34 1.305-1.9 2.094s-.98 1.68-1.25 2.69s-.345 2.04-.216 3.1c.168 1.4.62 2.52 1.356 3.35C5.837 18.58 6.754 19 7.85 19c.965 0 1.766-.29 2.4-.878c.628-.576.94-1.365.94-2.368zm9.124 0c0-.88-.23-1.618-.69-2.217c-.326-.42-.77-.692-1.327-.817c-.56-.124-1.073-.13-1.54-.022c-.16-.94.09-1.95.752-3.02c.66-1.06 1.513-1.86 2.556-2.4L18.49 5c-.8.396-1.555.898-2.26 1.505a11.29 11.29 0 0 0-1.894 2.094c-.556.79-.97 1.68-1.24 2.69a8.042 8.042 0 0 0-.217 3.1c.166 1.4.616 2.52 1.35 3.35c.733.834 1.647 1.252 2.743 1.252c.967 0 1.768-.29 2.402-.877c.627-.576.942-1.365.942-2.368z" />
                                </svg>
                            </div>
                            <div
                                class="mx-2 mb-10 z-10 px-2 py-4 text-xs text-white text-center relative line-clamp-[10] h-4/5">
                                I would like to express gratitude to the management of Tech For Developmentfor
                                successfully organizing and hosting me for the Workshop on Report Writing Skills and
                                Presentation Techniques.
                            </div>
                            <div class="absolute bottom-2 right-2 m-2">
                                <p class="text-sm text-white font-bold">&gt; Abubacarr Ceesay</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="rounded-lg h-[200px] aspect-square relative bg-[#0096FF] p-2">
                            <div class="absolute -top-1 left-4 z-0 origin-top-left rotate-[20deg]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-white opacity-50 "
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M11.192 15.757c0-.88-.23-1.618-.69-2.217c-.326-.412-.768-.683-1.327-.812c-.55-.128-1.07-.137-1.54-.028c-.16-.95.1-1.956.76-3.022c.66-1.065 1.515-1.867 2.558-2.403L9.372 5c-.8.396-1.56.898-2.26 1.505c-.71.607-1.34 1.305-1.9 2.094s-.98 1.68-1.25 2.69s-.345 2.04-.216 3.1c.168 1.4.62 2.52 1.356 3.35C5.837 18.58 6.754 19 7.85 19c.965 0 1.766-.29 2.4-.878c.628-.576.94-1.365.94-2.368zm9.124 0c0-.88-.23-1.618-.69-2.217c-.326-.42-.77-.692-1.327-.817c-.56-.124-1.073-.13-1.54-.022c-.16-.94.09-1.95.752-3.02c.66-1.06 1.513-1.86 2.556-2.4L18.49 5c-.8.396-1.555.898-2.26 1.505a11.29 11.29 0 0 0-1.894 2.094c-.556.79-.97 1.68-1.24 2.69a8.042 8.042 0 0 0-.217 3.1c.166 1.4.616 2.52 1.35 3.35c.733.834 1.647 1.252 2.743 1.252c.967 0 1.768-.29 2.402-.877c.627-.576.942-1.365.942-2.368z" />
                                </svg>
                            </div>
                            <div class="absolute bottom-10 right-0 z-0 rotate-[200deg] ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-white opacity-50"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="1.5"
                                        d="M11.192 15.757c0-.88-.23-1.618-.69-2.217c-.326-.412-.768-.683-1.327-.812c-.55-.128-1.07-.137-1.54-.028c-.16-.95.1-1.956.76-3.022c.66-1.065 1.515-1.867 2.558-2.403L9.372 5c-.8.396-1.56.898-2.26 1.505c-.71.607-1.34 1.305-1.9 2.094s-.98 1.68-1.25 2.69s-.345 2.04-.216 3.1c.168 1.4.62 2.52 1.356 3.35C5.837 18.58 6.754 19 7.85 19c.965 0 1.766-.29 2.4-.878c.628-.576.94-1.365.94-2.368zm9.124 0c0-.88-.23-1.618-.69-2.217c-.326-.42-.77-.692-1.327-.817c-.56-.124-1.073-.13-1.54-.022c-.16-.94.09-1.95.752-3.02c.66-1.06 1.513-1.86 2.556-2.4L18.49 5c-.8.396-1.555.898-2.26 1.505a11.29 11.29 0 0 0-1.894 2.094c-.556.79-.97 1.68-1.24 2.69a8.042 8.042 0 0 0-.217 3.1c.166 1.4.616 2.52 1.35 3.35c.733.834 1.647 1.252 2.743 1.252c.967 0 1.768-.29 2.402-.877c.627-.576.942-1.365.942-2.368z" />
                                </svg>
                            </div>
                            <div
                                class="mx-2 mb-10 z-10 px-2 py-4 text-xs text-white text-center relative line-clamp-[10] h-4/5">
                                I would like to express gratitude to the management of Tech For Developmentfor
                                successfully organizing and hosting me for the Workshop on Report Writing Skills and
                                Presentation Techniques.
                            </div>
                            <div class="absolute bottom-2 right-2 m-2">
                                <p class="text-sm text-white font-bold">&gt; Abubacarr Ceesay</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Announcement Banner -->
<div class="bg-gradient-to-r from-[#00a651] to-[#00a657]">
  <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
    <!-- Grid -->
    <div class="grid justify-center md:grid-cols-2 md:justify-between md:items-center gap-2">
      <div class="text-center md:text-start md:order-2 md:flex md:justify-end md:items-center">
        <p class="me-5 inline-block text-sm font-semibold text-white">
          Ready to get started?
        </p>
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border-2 border-white text-white hover:border-white/70 hover:text-white/70 focus:outline-none focus:border-white/70 focus:text-white/70 disabled:opacity-50 disabled:pointer-events-none" href="#">
        Reach Out
        </a>
      </div>
      <!-- End Col -->

      <div class="flex items-center">
        <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg font-medium text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition text-sm" href="#">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>

        </a>
        <span class="inline-block border-e border-white/30 w-px h-5 mx-2"></span>
        <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg font-medium text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition text-sm" href="#">
    Amplify your brand’s reach with our expert influencer marketing services. Let us help you connect with the right influencers and create campaigns that captivate and convert!        </a>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Grid -->
  </div>
</div>
<!-- End Announcement Banner -->


 <!-- Core Values -->
<div class="w-full bg-white mt-10 pb-3"> <!-- Changed background to white -->
    <div class="w-full py-5 overflow-hidden">
        <div class="md:w-2/3 mx-auto relative">
            <hr
                class="absolute top-1/2 left-1/2 w-5/6 -translate-x-1/2 -translate-y-1/2 h-0.5 bg-[#0096FF] border-0 rounded-full" />
            <h3 class="text-center text-[#0096FF] text-xl sm:text-xl capitalize font-bold relative z-10 bg-white w-max mx-auto p-4 rounded-5xl"
                id='testimonial'>Core Values</h3> <!-- Changed background to white -->
        </div>
        <p class="text-center text-black md:text-lg font-bold italic p-2">Hear directly from some of our satisfied clients about how our services have positively impacted them.</p>
    </div>
    <div class="w-full">
        <section class="bg-white text-black"> <!-- Changed section background to white -->
            <div class="mx-auto max-w-screen-xl px-2 py-2 sm:px-3 sm:py-4 lg:px-2 lg:py-2">

                <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">

                 <a
                    class="relative block rounded-xl bg-[#00a651] p-8 shadow-xl overflow-hidden transition hover:shadow-lg"
                    href="#">

                    <!-- Green fill overlay animation -->
                    <span class="absolute inset-0 bg-[#00a651] opacity-1 transition-all duration-700 transform scale-0 hover:scale-100 hover:opacity-100 origin-top-left"></span>

                    <h2 class="text-xl font-bold text-white">Integrity</h2>
                    <p class="mt-1 text-sm text-gray-200">
                        We act with honesty and adhere to strong ethical principles in all our dealings, building trust with clients, partners, and employees.
                    </p>
                </a>

                 <a
                    class="relative block rounded-xl bg-[#00a651] p-8 shadow-xl overflow-hidden transition hover:shadow-lg"
                    href="#">

                    <!-- Green fill overlay animation -->
                    <span class="absolute inset-0 bg-[#00a651] opacity-1 transition-all duration-700 transform scale-0 hover:scale-100 hover:opacity-100 origin-top-left"></span>

                    <h2 class="text-xl font-bold text-white">Innovation</h2>
                    <p class="mt-1 text-sm text-gray-200">
                      We embrace creativity and strive for continuous improvement, always seeking new ways to solve problems and provide value.
                    </p>
                </a>



                 <a
                    class="relative block rounded-xl bg-[#00a651] p-8 shadow-xl overflow-hidden transition hover:shadow-lg"
                    href="#">

                    <!-- Green fill overlay animation -->
                    <span class="absolute inset-0 bg-[#00a651] opacity-1 transition-all duration-700 transform scale-0 hover:scale-100 hover:opacity-100 origin-top-left"></span>

                    <h2 class="text-xl font-bold text-white">Collaboration</h2>
                    <p class="mt-1 text-sm text-gray-200">
                        We believe in the power of teamwork, valuing diverse perspectives and working together to achieve common goals.
                    </p>
                </a>


                 <a
                    class="relative block rounded-xl bg-[#00a651] p-8 shadow-xl overflow-hidden transition hover:shadow-lg"
                    href="#">

                    <!-- Green fill overlay animation -->
                    <span class="absolute inset-0 bg-[#00a651] opacity-1 transition-all duration-700 transform scale-0 hover:scale-100 hover:opacity-100 origin-top-left"></span>

                    <h2 class="text-xl font-bold text-white">Customer-Centric</h2>
                    <p class="mt-1 text-sm text-gray-200">
                       We prioritize the needs and satisfaction of our customers, always striving to deliver exceptional service and products.
                    </p>
                </a>


                 <a
                    class="relative block rounded-xl bg-[#00a651] p-8 shadow-xl overflow-hidden transition hover:shadow-lg"
                    href="#">

                    <!-- Green fill overlay animation -->
                    <span class="absolute inset-0 bg-[#00a651] opacity-1 transition-all duration-700 transform scale-0 hover:scale-100 hover:opacity-100 origin-top-left"></span>

                    <h2 class="text-xl font-bold text-white">Adaptability</h2>
                    <p class="mt-1 text-sm text-gray-200">
                        We are agile in responding to change, continuously evolving to meet new challenges and opportunities in a dynamic world.
                    </p>
                </a>


                 <a
                    class="relative block rounded-xl bg-[#00a651] p-8 shadow-xl overflow-hidden transition hover:shadow-lg"
                    href="#">

                    <!-- Green fill overlay animation -->
                    <span class="absolute inset-0 bg-[#00a651] opacity-1 transition-all duration-700 transform scale-0 hover:scale-100 hover:opacity-100 origin-top-left"></span>

                    <h2 class="text-xl font-bold text-white">Accountability</h2>
                    <p class="mt-1 text-sm text-gray-200">
                       We take responsibility for our actions, ensuring transparency and reliability in all our decisions and outcomes.
                    </p>
                </a>


                 <a
                    class="relative block rounded-xl bg-[#00a651] p-8 shadow-xl overflow-hidden transition hover:shadow-lg"
                    href="#">

                    <!-- Green fill overlay animation -->
                    <span class="absolute inset-0 bg-[#00a651] opacity-1 transition-all duration-700 transform scale-0 hover:scale-100 hover:opacity-100 origin-top-left"></span>

                    <h2 class="text-xl font-bold text-white">Team-Work</h2>
                    <p class="mt-1 text-sm text-gray-200">
                       We believe in the power of teamwork, valuing diverse perspectives and working together to achieve common goals.</p>
                </a>



                 <a
                    class="relative block rounded-xl bg-[#00a651] p-8 shadow-xl overflow-hidden transition hover:shadow-lg"
                    href="#">

                    <!-- Green fill overlay animation -->
                    <span class="absolute inset-0 bg-[#00a651] opacity-1 transition-all duration-700 transform scale-0 hover:scale-100 hover:opacity-100 origin-top-left"></span>

                    <h2 class="text-xl font-bold text-white">Sustainability</h2>
                    <p class="mt-1 text-sm text-gray-200">
                        We are committed to minimizing our environmental impact and contributing to the well-being of future generations through responsible practices.
                    </p>
                </a>








                </div>
            </div>
        </section>
    </div>
</div>







    <!-- Trusted by -->
    <div class="w-full bg-transparent mt10 pt-2 pb-3">
        <!-- @include('front.Projects.staticSeparator') -->
        <div class="md:flex w-full bg-transparent py-4 lg:px-16">
            <div class="md:w-1/3 lg:p-4 flex justify-center md:justify-end items-center">
                <div class="w-3/4 lg:p-2 text-center md:text-left">
                    <h4 class="text-3xl sm:text-xl text-[#0096FF] font-bold">Trusted By</h4>
                    <p class="mt-4">We’re proud to be the go-to partner in capacity-building for organizations and professionals around the world.
                    </p>
                    <div class="my-3 p-1">
                        <a
                        href="#"
                        class="inline-block rounded border border-blue-500 bg-blue-500 px-12 py-3 text-sm font-medium text-white transition hover:bg-blue-600 hover:text-white focus:outline-none focus:ring focus:ring-yellow-400"
                    >
                        Explore More
                        </a>

                    </div>
                </div>
            </div>
            <div class="md:w-2/3 lg:p-4 flex justify-center md:justify-end items-center">
                <div class="lg:p-4">
                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7 *:border">
                        @foreach(App\Company::where('status', 'Approved')->whereNotNull('logo')->inRandomOrder()->limit(35)->get() as $client)
                            <div class="table-cell size-24 box-border p-2">
                                <div class="w-full aspect-square flex items-center justify-center">
                                    <img loading="lazy" href="" src="{{ asset('storage/' . $client->logo) }}" style=""
                                        alt="" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Contact Us -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="max-w-2xl lg:max-w-5xl mx-auto">
        <div class="w-full py-5 overflow-hidden">
            <div class="md:w-2/3 mx-auto relative">
                <hr
                    class="absolute top-1/2 left-1/2 w-5/6 -translate-x-1/2 -translate-y-1/2 h-0.5 bg-[#0096FF] border-0 rounded-full" />
                <h3 class="text-center text-[#0096FF] text-xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl"
                    id='testimonial'>Contact Us</h3>
            </div>
            <p class="text-center text-black md:text-lg font-bold italic p-2">  We'd love to talk about how we can help you.</p>
        </div>

    <div class="mt-12 grid items-center lg:grid-cols-2 gap-6 lg:gap-16">
      <!-- Card -->
      <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-neutral-700">
        <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-neutral-200">
          Fill in the form
        </h2>

        <form>
          <div class="grid gap-4">
            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="hs-firstname-contacts-1" class="sr-only">First Name</label>
                <input type="text" name="hs-firstname-contacts-1" id="hs-firstname-contacts-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="First Name">
              </div>

              <div>
                <label for="hs-lastname-contacts-1" class="sr-only">Last Name</label>
                <input type="text" name="hs-lastname-contacts-1" id="hs-lastname-contacts-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Last Name">
              </div>
            </div>
            <!-- End Grid -->

            <div>
              <label for="hs-email-contacts-1" class="sr-only">Email</label>
              <input type="email" name="hs-email-contacts-1" id="hs-email-contacts-1" autocomplete="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Email">
            </div>

            <div>
              <label for="hs-phone-number-1" class="sr-only">Phone Number</label>
              <input type="text" name="hs-phone-number-1" id="hs-phone-number-1" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Phone Number">
            </div>

            <div>
              <label for="hs-about-contacts-1" class="sr-only">Details</label>
              <textarea id="hs-about-contacts-1" name="hs-about-contacts-1" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Details"></textarea>
            </div>
          </div>
          <!-- End Grid -->

          <div class="mt-4 grid">
            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Send inquiry</button>
          </div>

          <div class="mt-3 text-center">
            <p class="text-sm text-gray-500 dark:text-neutral-500">
              We'll get back to you in 1-2 business days.
            </p>
          </div>
        </form>
      </div>
      <!-- End Card -->

      <div class="divide-y divide-gray-200 dark:divide-neutral-800">
        <!-- Icon Block -->
        <div class="flex gap-x-7 py-6">
          <svg class="shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
          <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">About Us</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">We're here to help with any questions or code.</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">
              Know more
              <svg class="shrink-0 size-2.5 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.975821 6.92249C0.43689 6.92249 -3.50468e-07 7.34222 -3.27835e-07 7.85999C-3.05203e-07 8.37775 0.43689 8.79749 0.975821 8.79749L12.7694 8.79748L7.60447 13.7596C7.22339 14.1257 7.22339 14.7193 7.60447 15.0854C7.98555 15.4515 8.60341 15.4515 8.98449 15.0854L15.6427 8.68862C16.1191 8.23098 16.1191 7.48899 15.6427 7.03134L8.98449 0.634573C8.60341 0.268455 7.98555 0.268456 7.60447 0.634573C7.22339 1.00069 7.22339 1.59428 7.60447 1.9604L12.7694 6.92248L0.975821 6.92249Z" fill="currentColor"/>
              </svg>
            </a>
          </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class="flex gap-x-7 py-6">
          <svg class="shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
          <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">FAQ</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Search our FAQ for answers to anything you might ask.</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">
              Visit FAQ
              <svg class="shrink-0 size-2.5 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.975821 6.92249C0.43689 6.92249 -3.50468e-07 7.34222 -3.27835e-07 7.85999C-3.05203e-07 8.37775 0.43689 8.79749 0.975821 8.79749L12.7694 8.79748L7.60447 13.7596C7.22339 14.1257 7.22339 14.7193 7.60447 15.0854C7.98555 15.4515 8.60341 15.4515 8.98449 15.0854L15.6427 8.68862C16.1191 8.23098 16.1191 7.48899 15.6427 7.03134L8.98449 0.634573C8.60341 0.268455 7.98555 0.268456 7.60447 0.634573C7.22339 1.00069 7.22339 1.59428 7.60447 1.9604L12.7694 6.92248L0.975821 6.92249Z" fill="currentColor"/>
              </svg>
            </a>
          </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class=" flex gap-x-7 py-6">
          <svg class="shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 11 2-2-2-2"/><path d="M11 13h4"/><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/></svg>
          <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Our Services</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Check out our services and how we can solve your issues.</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">
              Explore more
              <svg class="shrink-0 size-2.5 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.975821 6.92249C0.43689 6.92249 -3.50468e-07 7.34222 -3.27835e-07 7.85999C-3.05203e-07 8.37775 0.43689 8.79749 0.975821 8.79749L12.7694 8.79748L7.60447 13.7596C7.22339 14.1257 7.22339 14.7193 7.60447 15.0854C7.98555 15.4515 8.60341 15.4515 8.98449 15.0854L15.6427 8.68862C16.1191 8.23098 16.1191 7.48899 15.6427 7.03134L8.98449 0.634573C8.60341 0.268455 7.98555 0.268456 7.60447 0.634573C7.22339 1.00069 7.22339 1.59428 7.60447 1.9604L12.7694 6.92248L0.975821 6.92249Z" fill="currentColor"/>
              </svg>
            </a>
          </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div class=" flex gap-x-7 py-6">
          <svg class="shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"/><path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"/></svg>
          <div class="grow">
            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Contact us by email</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">If you wish to write us an email instead please use</p>
            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">
              outreach@t4d.co.ke
            </a>
          </div>
        </div>
        <!-- End Icon Block -->
      </div>
    </div>
  </div>
</div>
<!-- End Contact Us -->

</main>


@endsection

@section('js_content')

<script>
    // Counter js section
    /* Going to have a procedural implementation of a counter library*/
    setTimeout(() => {
        //Course Counter
        runCounter(document.getElementById('Courses_counter'), 1500, 3000)

        //Learners Counter
        runCounter(document.getElementById('Learners_counter'), 5000, 3000)

        //Companies Counter
        runCounter(document.getElementById('Companies_counter'), 876, 3000)

        //Venues
        runCounter(document.getElementById('Venues_counter'), 20, 3000)

        //Sectors
        runCounter(document.getElementById('Sector_counter'), 17, 3000)

        //Services
        runCounter(document.getElementById('Services_counter'), 1000, 3000)
    }, 2000);


    function runCounter(counterElement, targetNumber, duration = 1000, frameRate = 60, count = 0) {

        let increment = targetNumber / (duration / (1000 / frameRate));
        let startTime = null;

        function updateCounter(timestamp) {
            if (!startTime) startTime = timestamp;
            const elapsed = timestamp - startTime;

            if (elapsed < duration) {
                count += increment;
                counterElement.textContent = Math.floor(count).toLocaleString();
                requestAnimationFrame(updateCounter);
            } else {
                counterElement.textContent = targetNumber.toLocaleString();
            }
        }

        requestAnimationFrame(updateCounter);
    }

    //Category
    const courses_filter = document.querySelector('#shortCourses')
    const other_filters = document.querySelectorAll('#otherFilter')

    courses_filter.addEventListener('click', () => {
        document.querySelector('#showMore').classList.remove('hidden')
    })

    other_filters.forEach( (filter) => {
        filter.addEventListener('click', () => {
            document.querySelector('#showMore').classList.remove('hidden')
            document.querySelector('#showMore').classList.add('hidden')
        })
    })

    //Sub Menu
    //Intialize the active element (which is by default)
    //If it is to be a library OOP implementation would be better
    var activeElement = document.querySelector('#short-course')

    function displaySection(choice) {
        //Getting the selected category
        let category = document.getElementById(choice.getAttribute('for'))

        //hiding and unhiding the elements
        hideSeek(category, activeElement)

        //Then update the new active element
        activeElement = category
    }

    //Previous Projects
    //Assign each country to their individual tag
    const mapTitle = document.querySelectorAll('path')

    mapTitle.forEach((country) => {
        country.setAttribute('title', country.getAttribute('id'))
    })

</script>

<!-- Projects View -->
<script src="{{ asset('front/Projects/js/project_slider.js') }}"></script>

<!-- Banner View -->
<script src="{{ asset('front/Projects/js/banner.js') }}"></script>

<!-- header scroll effect -->
<script src="{{ asset('front/Projects/js/header_scroll.js')}}"></script>

@endsection
