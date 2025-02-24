@extends('front.Projects.master')

@section('title', 'Capabilities')

@section('content')

<div class="main-body">
    <!-- page container -->
    <div class="w-full bg-transparent">
        <!-- page breadcrumbs -->
        <div class="breadcrumbs pb-2 py-1 pl-5 bg-[#0096FF] text-white">
            <span>
                <a href="{{ route('home') }}" class="fa fa-home"></a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
            <span>
                <a href="{{ route('capability') }}">
                Services by Capability
                </a>
            </span>
        </div>
        <!-- END page breadcrumbs -->

        <div class="px-2 py-20 w-full flex justify-center">
            <div class="bg-white lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg rounded-lg">
                <div class="lg:w-1/2">
                    <div class="lg:scale-110 h-80 bg-cover lg:h-full rounded-b-none border lg:rounded-lg"
                        style="background-image:url('images/Our Capabilities.webp')">
                    </div>
                </div>
                <div class="py-12 px-6 lg:px-12 max-w-xl lg:max-w-5xl lg:w-1/2 rounded-t-none border lg:rounded-lg">
                    <h1 class="text-3xl text-[#00a651] font-bold">
                        Our Services by
                        <span class="text-[#0096FF]">Capabilities </span>
                    </h1>
                    <p class="mt-4 text-black">
                        Tech For Development(IRES) offers you a diverse range of services designed for strategic development and optimization.
                            We are committed to delivering tailored solutions that propel our clients towards sustained success.
                            Our offerings encompass a spectrum of expertise, including efficient data collection, advanced data analytics, comprehensive social and market research, and seamless digital transformation.
                            As a trusted partner, we guide businesses through evolving landscapes, ensuring a competitive edge and enhanced operational efficiency.
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('contact') }}" class="ires-primary-btn">Get Started <i class='fas fa-arrow-right'></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- page conainer -->
        {{-- <div class="w-full lg:w-10/12 md:w-2/3 mx-auto my-8 px-3 sm:px-0">
            <div class="mx-auto relative"> px-5 py-3 font-semibold rounded
                <div class="columns-1 relative w-full">
                    <hr class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full" />
                    <h1 class="text-center text-[#00a651] text-3xl md:text-2xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] md:w-max mx-auto p-4 rounded-5xl">
                        Our Capabilities
                    </h1>
                </div>

                <div class="columns-1 row">
                    <div class="text-center md:text-left text-black md:text-lg pt-1 pb-10">
                        <p>Tech For Development(IRES) offers you a diverse range of services designed for strategic development and optimization.
                            We are committed to delivering tailored solutions that propel our clients towards sustained success.
                            Our offerings encompass a spectrum of expertise, including efficient data collection, advanced data analytics, comprehensive social and market research, and seamless digital transformation.
                            As a trusted partner, we guide businesses through evolving landscapes, ensuring a competitive edge and enhanced operational efficiency.</p>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="w-full lg:w-5/6 md:w-2/3 mx-auto my-8 px-3 sm:px-0 ">
            <h2 class="text-center lg:text-left text-[#00a651] text-3xl mb-3">Services by Capabilities</h2>
            <p class="text-center lg:text-left text-lg py-3 px-5 md:px-3">Tech For Development(IRES) has a firm belief that every organization has a unique purpose only they can fulfill in this world.
                We work with you in organizing your resources to exploit opportunities so that you can fulfill your purpose and realize your full potential.</p>
            <div class="grid sm:grid-cols-1 md:grid-cols-1 2xl:grid-cols-2 lg:grid-cols-2 gap-4 py-2 md:px-2 lg:px-1 sm:px-3 transition-all duration-1000 ease-in-out">
                @foreach(App\ServiceCapability::with('services')->get() as $capability)
                    <div class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bgslate-800">
                        <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto object-cover" src="{{ asset('storage/'.$capability->cover_image) }}" alt="{{ $capability->name }}" width="384" height="512">
                        <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                            <a href="{{ route('course.industry.service-capability', $capability) }}">
                                <h3 class="text-xl md:text-2xl text-[#00a651] mb-3">{{ $capability->name }}</h3>
                            </a>
                            <p class="pb-3 mb-3">{!! substr(strip_tags($capability->description), 0, 80) !!}...</p>
                            <a href="{{ route('course.industry.service-capability', $capability) }}">
                                <div
                                class="bg-[#1EA19D] hover:bg-transparent hover:text-[#1EA19D] border-2 border-[#1EA19D] box-border py-2 px-4 text-white text-lg w-max mx-auto md:mx-0 rounded-lg">
                                Learn More <i class='fas fa-arrow-right'></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
