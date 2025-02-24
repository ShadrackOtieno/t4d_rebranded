@extends('front.Projects.master')

@section('title', 'Services')

@section('content')

    <div class="main-body">
        <!-- page content section -->
        <div class="w-full bg-transparent">
             <!-- page breadcrumbs -->
            <div class="breadcrumbs pb-2 py-1 pl-5 bg-[#1ea19d] text-white">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                <span >
                    <a href="{{ route('capability') }}">
                    Our Capabilities
                    </a>
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

                <span class="bc-current-page">{{ $service_capability->name }}</span>
            </div>
            <!-- END page breadcrumbs -->
            <div class="container mx-auto">
            <div class="w-full lg:w-10/12 md:w-2/3 mx-auto my-8 px-3 sm:px-0">
                <div class="mx-auto relative">
                    <div class="relative w-full">
                        <hr class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full" />
                        <h1 class="text-center text-[#00a651] text-3xl md:text-2xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] md:w-max mx-auto p-4 rounded-5xl">
                            {{ $service_capability->name }}
                        </h1>
                    </div>

                    <div class="">
                        <div class="text-black textcenter md:text-left md:text-lg py-4 px-4 pb-10">
                            <p>{!! $service_capability->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page hero -->

            <!-- <div class="pt-3 w-full overflow-hidden"> -->
            <!-- cardz *:w-full bg-[#00a651] hover:bg-white hover:shadow-xl shadow-white rounded-xl overflow-hidden group -->
            <div class="w-full textcenter md:text-left lg:w-5/6 md:w-2/3 mx-auto my-8 px-3 sm:px-0 ">
                <h2 class="text-[#00a651] text-2xl md:text-xl mb-3">Our Services in {{ $service_capability->name }}</h2>
                <p class="text-lg py-6 px-3">We have business experience in the following areas of professional services in {{ $service_capability->name }} industry:</p>
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-4 py-2 md:px-2 lg:px-1 sm:px-3 transition-all duration-1000 ease-in-out">
                    @foreach($service_capability->services as $service)
                        <div class="md:flex bg-[#00a651] rounded-xl p-8 md:p-0 dark:bgslate-800">
                            {{-- <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="/sarah-dayan.jpg" alt="" width="384" height="512"> --}}
                            <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                                <a href="{{ route('course.industry.service', $service->slug) }}">
                                    <h3 class="text-xl text-[#1ea19d] transition-transform hover:scale-105 font-bold mb-3">{{ $service->name }}</h3>
                                </a>

                                <p class="pb-3 mb-3 min-h-[150px] text-white max-h-[250px]">{!! substr(strip_tags($service->description), 0, 250) !!}...</p>
                                <a href="{{ route('course.industry.service', $service->slug) }}">
                                    <div
                                        class="bg-[#1ea19d] rounded-full p-3 text-white text-center transition-transform hover:scale-105 mt-16 text-base mx-auto md:mx-0">
                                        Learn More
                                    </div>


                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END about brief -->
    </div>
@endsection
