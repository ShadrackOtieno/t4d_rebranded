@extends('front.Projects.master')

@section('css')


@section('title', 'Course Categories')

@section('content')
@include('front.Projects.header2')
    <div class="main-body bg-fixed" style="background-image: url('/images/servicesbg.svg')">
    <!-- page breadcrumbs -->
    <div class="breadcrumbs  py-3 pl-5 bg-[#1ea19d] h-10 text-white">
        <span>
            <a href="{{ route('home') }}" class="fa fa-home"></a>
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
        <span >
            <a href="{{ route('course.category.index') }}">
                All Categories
            </a>
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

        <span class="bc-current-page">{{ $category->name }}</span>
    </div>
    <!-- END page breadcrumbs -->
        <div id="imageContainer" class="relative w-full h-[50vh] lg:h-[60vh] order2 bg-cover transition-all duration-500 ease-in-out"
        style="background-image: url('{{ asset('images/home7.webp') }}')">
        <div class="w-full h-full bg-[#00a651] bg-opacity-40"></div>
        <div class="absolute left-5 lg:left-20 top-16 md:top-32 lg:w-2/5 text-white py-3 px-6">
            <div class="mb-6" id="tp">
                <h1 class="text-3xl text-white">Explore all our Categories for Professional Development Programmes.</h1>
            </div>
            <div class="*:mb-2 text-justify" id="">
                <p>Explore our wide range of executive short courses and professional certifications and take the noble step of upskilling yourself or your entire team.
                    We offer our courses in three main ways – Face to face in all our locations, virtually or through our e-learning portal.</p>
            </div>

       <!-- page conainer -->
        <div>
            <!-- page content -->
            <div class="mt-6 mx-10 lg:mx-28">
                <div class="w-full">

                    <!-- categories column -->
                    <div class="">
                        <div class="w-full md:w-5/6 lg:mt-10 mx-auto relative">
                            <hr class="hidden lg:block absolute top-1/2 left-1/2 w-2/3 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full">
                            <h2 class="text-center text-[#00a651] text-xl sm:text-2xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl">Explore all categories</h2>
                        </div>

                        <!-- columns -->
                        <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 py-2 px-4 ">

                            @forelse ($categories as $category)
                                <div class="bg-white rounded shadow-md  px-5 hover:shadow-gray-400 ">
                                    <div >
                                        <a href="{{ route('course.category.subcategory.index', $category) }}">
                                            <div class="h-40 pt-4">
                                                <img loading="lazy" loading="lazy" class="rounded-[5px] h-full w-full object-cover" src="{{ asset('storage/'.$category->cover) }}">
                                            </div>
                                        </a>
                                        <h5 class="text-[16px] h-6 text-[#00a651] hover:font-bold pt-5 pb-3">
                                            <a href="{{ route('course.category.subcategory.index', $category) }}">
                                                {{ $category->name }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="text-[15px] leading-[25px]">
                                        <ul class="fading-line-list list-none px-7 pb-7 pt-10 ">
                                            @forelse ($category->subcategories->take(4) as $subcategory)
                                                <li class="hover:underline hover:font-bold hover:text-[#1ea19d]">

                                                    <a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}">
                                                        {{ $subcategory->name }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li>
                                                    No subcategories available
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            @empty
                                <b>No categories available</b>
                            @endforelse
                        </div>

                        {{ $categories->links() }}

                        <!-- view all button -->
                        <div class="flex justify-center ">
                            <a class="bg-[#1ea19d] text-white rounded-full mt-10 mb-10 px-5 py-2 text-sm font-normal hover:bg-[#00a651] transition duration-300" href="{{ route('course.schedule') }}">View All Schedules</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
