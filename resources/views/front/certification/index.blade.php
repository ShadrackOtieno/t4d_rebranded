@extends('front.Projects.master')

@section('title', "Professional Certifications")

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs mt16 pb-3 pt-2 pl-5 bg-[#1ea19d] h-10 text-white" id="tp">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
        
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

                <span class="bc-current-page">Professional Certifications</span>

            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="container mx-auto">
                <div class="container">
                
                            <div class="w-full md:w-5/6 lg:mt-10 mx-auto relative lg:mb-20">
                                <hr class="hidden lg:block absolute top-1/2 left-1/2 w-2/3 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full">
                                <h2 class="text-center text-[#a11e22] text-xl sm:text-2xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl">Browse our Professional Certifications</h2>
                                
                            </div>
                    <!-- category description -->
                    {{-- <div class="ip-brief-desc" id="">
                        <p>Grow your future, expand your knowledge, with our expertly developed training courses.</p>
                    </div> --}}
                    <!-- categories column -->
                    <div class="mx-20">
                        <!-- columns -->
                        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4 py-2 px-4 ">
                            @forelse ($certifications as $certification)
                            <div class="bg-white rounded shadow-md  px-5 hover:shadow-gray-400 ">
                                <div class="h-40 pt-4">
                                        <a href="{{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}">
                                            <img loading="lazy" class="rounded-[5px] h-full w-full object-cover" src="{{ asset('storage/'.$certification->cover) }}" alt="{{ $certification->name }}">
                                        </a>
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h6 class="text-[16px] h-6 text-[#a11e22] hover:font-bold pt-5 pb-3">
                                                    <a href="{{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}">
                                                        {{ $certification->name }}
                                                    </a>
                                                </h6>
                                                @if ($certification->type == 'bundle')
                                                    <span class="bundle-course-no">
                                                        Bundle
                                                    </span>
                                                @endif
                                            </div>
                                            <button class="bg-[#1ea19d] hover:bg-[#a11e22] float-right p-1 my-4 text-white " type="button" onclick="window.location.href = `{{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}`">
                                                View
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <b>No professional certifications available</b>
                            @endforelse

                        </div>
                        <div class="w-max m-20">
                            {{ $certifications->links('front.partials.pagination') }}
                         </div>
                        
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
