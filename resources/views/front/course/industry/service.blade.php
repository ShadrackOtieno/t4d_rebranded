@extends('front.Projects.master')

@section('title', 'Capabilities')

@section('content')

<div class="main-body">
    <!-- page container -->
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

            <span class="bc-current-page">
                <a href="{{ route('course.industry.service-capability', $service->capability) }}"> {{$service->capability->name}} </a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

            <span class="bc-current-page">{{ $service->name }}</span>
        </div>
        <!-- END page breadcrumbs -->

        <!-- about brief -->
        <div class="w-full lg:w-10/12 md:w-2/3 mx-auto my-8 px-3 sm:px-0">
            <div class="mx-auto relative">
                <div class="relative w-full">
                    <hr class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full" />
                    <h1 class="text-center text-[#00a651] text-3xl md:text-2xl sm:text-xl capitalize font-bold relative z-10 bg-[#f7f9f9] md:w-max mx-auto p-4 rounded-5xl">
                        {{ $service->name }}
                    </h1>
                </div>
                <div>
                    <div class="text-black text-center md:text-left md:text-lg py-5 px-5 pb-10">
                        <p>{!! $service->description !!}</p>
                    </div>
                    <a href="{{ route('contact') }}">
                        <div
                            class="ires-primary-btn text-xl mx-auto md:mx-0">
                            Request a Custom Offer
                        </div>
                    </a>
                </div>
            </div>
            <div class="mx-auto my-8 relative">
                <h2 class="text-center md:text-left text-[#00a651] text-3xl mb-5">Tools Used in {{ $service->name }}</h2>
                {{-- <p>We have business experience in the following areas of professional services in {{ $service_capability->name }} industry:</p> --}}
                <div class="grid sm:grid-cols-1 lg:grid-cols-1 2xl:gridcols-2 gap-2 py-2 md:px-2 lg:px-1 sm:px-3 transition-all duration-1000 ease-in-out">
                    @foreach($service->tools as $tool)
                        <div class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bgslate-800">
                            <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset('storage/'.$tool->cover_image)}}" alt="{{ $tool->tool_name }}" width="384" height="512">
                            <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                                <h3 class="text-3xl text-[#00a651] mb-3">{{ $tool->tool_name }}</h3>
                                <p>{!! $tool->description !!}</p>
                                {{-- <p class="px-3 m-3">{!! substr(strip_tags( $tool->description), 0, 200) !!}...</p> --}}
                                {{-- <a href="{{ route('course.industry.service', $service->slug) }}">
                                    <div
                                        class="ires-primary-btn text-xl mx-auto md:mx-0">
                                        Learn More
                                    </div>
                                </a> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
