<<<<<<< HEAD
@extends('front.projects.master')

@section('title', 'Training Courses')

=======
@extends('front.Projects.master')
>>>>>>> 44a02fb3702dc3ab480d142d3de976634420878e

@section('content')

<div class="">

    <!-- page container -->
    <div>
        <!-- page breadcrumbs -->
        <div class="breadcrumbs mt16 py-3 pl-5 bg-[#1ea19d] h-10 text-white">
            <span>
                <a href="{{ route('home') }}" class="fa fa-home"></a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24">
                <path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/>
            </svg>
            <span>
                <a href="{{ route('course.category.index') }}">
                    All Categories
                </a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24">
                <path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/>
            </svg>

            <span>
                <a href="{{ route('course.category.subcategory.index', $category) }}">
                    {{ $category->name }}
                </a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24">
                <path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/>
            </svg>

            <span>
                <a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}">
                    {{ $subcategory->name }}
                </a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24">
                <path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/>
            </svg>

            <span class="bc-current-page">{{ $topic->name }}</span>
        </div>
        <!-- END page breadcrumbs -->

        @include('front/partials/alert')

        <!-- page content -->
        <div class="ip-content">
            <div class="container mx-auto px-4">
                <!-- Heading Section -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-[#a11e22]">
                        Training Courses for Professional Development in {{ $topic->name }}.
                    </h1>
                </div>
                {{--

                <!-- Description Section -->
                <div class="ip-brief-desc mb-8">
                    <p class="text-gray-600">{!! $topic->description !!}</p>
                </div>
                

                <!-- Categories Column -->
                <div class="ip-categories-col">
                    <div class="ip-inner-header mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $topic->name }}</h2>
                        <hr class="border-gray-300 my-4"/>
                    </div>
                --}}    

                    <!-- Areas of training -->
                    <div class="container mx-0 lg:ml-0 my-8 text-center w-full">
                        <h1 class="text-xl lg:text-4xl text-[#a11e22] mb-4">Areas of Training in {{ $topic->name }}.</h1>
                    
                        <div class="flex flex-wrap justify-start mt-8 mb-4">
                            @foreach($topics as $course_topic)
                                <a class="bg-[#1ea19d] hover:bg-[#a11e22] text-white font-bold rounded-full py-2 px-4 m-2 text-center" 
                                   href="{{ route('course.topic.show', $course_topic) }}" 
                                   onclick="scrollToSection('#courses')">
                                    <strong>{{$course_topic->name}}</strong>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Columns -->
                    <div class="flex flex-wrap -mx-4">
                        {{-- <!-- Sidebar Column -->
                        <div class="w-full md:w-1/3 px-4 mb-4 md:mb-0 rounded-lg">
                            @include('front.course.category.subcategory.topic.sidebar')
                        </div> --}}

                        <!-- Main Content Column -->
                        <div class="w-full">
                            <!-- Container for Courses -->
                            <div class="flex flex-wrap -mx-4 flex-row">
                                @forelse ($schedules as $course)
                                    @if($course->duration > 5)
                                        <!-- Each course will take a specific width based on screen size -->
                                        <div class="rounded-md p-4 mb-4 w-full md:w-1/2 lg:w-1/3">
                                            @include('front.course.duration.schedule-view')
                                        </div>
                                    @endif

                                @empty
                                    <b class="text-red-500">No courses available</b>
                                @endforelse
                            </div>
                        
                            <!-- Pagination Links -->
                            <div class="mt-4">
                                {{ $schedules->links('front.partials.pagination') }}
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>

                <!-- View All Button -->
                <div class="mt-8 text-center">
                    <a class="inline-block bg-[#1ea19d] text-white px-6 py-3 rounded-md hover:bg-[#a11e22] transition"
                       href="{{ route('course.schedule', compact('category', 'subcategory', 'topic')) }}">
                        View All Scheduled Dates
                    </a>
                </div>
            </div>
        </div>
        <!-- END page content -->

    </div>
    <!-- END page container -->

</div>

@section('css')
<style>
    .ip-content {
        padding: 30px;
    }
    .ip-inner-header,
    .ip-brief-desc {
        padding: 10px;
    }
</style>
@endsection

@endsection
