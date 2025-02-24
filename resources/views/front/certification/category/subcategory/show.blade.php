@extends('front.Projects.master')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="bg-white">
                <div class="breadcrumbs mt16 py-3 pl-5 bg-[#1ea19d] h-10 text-white" id="tp">
                    <span>
                        <a href="{{ route('home') }}" class="fa fa-home"></a>
                    </span>
            
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

                <span>
                    <a href="{{ route('certification.category.index') }}">
                        All Categories
                    </a>
                </span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

                <span>
                    <a href="{{ route('certification.category.show', $category) }}">
                        {{ $category->name }}
                    </a>
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

                <span class="bc-current-page">{{ $subcategory->name }}</span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page content -->
            <div class="w-full lg:w-2/3 lg:mx56 container lg:mx-auto">
                <div class="container">
                    <div class="container px-5 mt-20">
                            <h1 class="text-xl lg:text-3xl mb-4 text-[#a11e22]">Training topics for professional development in {{ $subcategory->name }}.</h1>
                        
                    </div>
                    <!-- categories column -->
                    <div class="">
                        <div class="px-5 lg:mt-10">
                            {{-- <hr class="hidden lg:block absolute top-1/2 left-1/2 w-2/5 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full"> --}}
                            <h2 class="text-left text-[#a11e22] text-xl sm:text-2xl capitalize">{{ $subcategory->name }}</h2>
                            
                        </div>
                        <!-- columns -->
                        <div class="my-20 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 py-2 px-4 ">

                            @forelse ($certifications as $certification)
                               <div class=" bg-white rounded shadow-md  px-5 hover:shadow-gray-400 ">
                                    <div>
                                        <a href="{{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}">
                                            <div class="h-40 pt-4">
                                            <img loading="lazy" loading="lazy" class="rounded-[5px] h-full w-full object-cover"  src="{{ asset('storage/'.$certification->cover) }}" alt="{{ $certification->cover }}">
                                            </div>
                                        </a>
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h6>
                                                    <a href="{{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}">
                                                        {{ $certification->name }}
                                                    </a>
                                                </h6>
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

                        {{ $certifications->links() }}
                    </div>
                </div>
            </div>
            
            <!-- END page content -->

        </div>
        
        <!-- END page container -->

    </div>
@endsection
