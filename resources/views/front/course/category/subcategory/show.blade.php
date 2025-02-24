@extends('front.Projects.master')

@section('title', 'Sub-category')

@section('content')

<div class="bg-white">

    <!-- page container -->
    <div>
        <!-- page breadcrumbs -->
        <div class="breadcrumbs mt16 py-3 pl-5 bg-[#1ea19d] h-10 text-white">
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

        @include('front/partials/alert')
        {{-- <div class="w-full lg:px-32 my-8">
            <h1 class="text-xl lg:text-3xl text-[#00a651] mx-2 mb-4 text-left">Areas of Training in {{ $subcategory->name }}</h1>
            <div class="flex flex-wrap justify-start mx-auto mt-8 mb-4">
                @foreach($topics as $course_topic)
                    <a class="bg-[#1ea19d] hover:bg-[#00a651] text-white font-bold rounded-full py-2 px-4 m-2 text-center" href="{{ route('course.topic.show', $course_topic) }}">
                        <strong>{{$course_topic->name}}</strong>
                    </a>
                @endforeach
            </div>
        </div> --}}


        <!-- page content -->
        <div class="">
            <div class="my-24 mx-4 lg:px-32 md:w-full">

                @php
                    $description = $subcategory->description;
                    $shortDescription = Str::words(strip_tags($description), 50, '...');
                @endphp

                @if (str_word_count(strip_tags($description)) > 10)
                    <div class="text-[15px]">
                        <span id="short-description">{!! ($shortDescription) !!}</span>
                        <span id="full-description" class="hidden *:mb-2 ">{!! ($description) !!}</span><br>
                        <a href="javascript:void(0);" id="show-more" class="text-red-700 mt-4 font-bold cursor-pointer"><b>Show More</b></a>
                        <a href="javascript:void(0);" id="show-less" class="hidden text-red-700 font-bold cursor-pointer"><b>Show Less</b></a>
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 md:flex-row gap-8 my-24 mx-4 lg:mx-32">


                <div>
                    <h1 class="text-xl text-[#00a651] mx-2 mb-4 text-left">Areas of Training in {{ $subcategory->name }}</h1>
                    <div class="flex flex-wrap justify-start mx-auto mt-8 mb-4">
                        @foreach($topics as $course_topic)
                            <a class="bg-[#1ea19d] hover:bg-[#00a651] text-white font-bold rounded-full py-2 px-4 m-2 text-center" href="{{ route('course.topic.show', $course_topic) }}">
                                <strong>{{$course_topic->name}}</strong>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="md:w-full mt-4 md:mt-0">
                    <img src="{{ asset('storage/' . $subcategory->cover) }}" class="w-full h-auto rounded-md border" alt="{{ $subcategory->name }}">
                </div>
            </div>

        </div>

        <div class="">
            <div class="mx-4 lg:mx-32 my-8">
                <div class="mb-12">
                    <h2 class="text-lg lg:text-2xl mb-4 text-[#00a651]">Training Courses in {{ $subcategory->name }}.</h2>
                   @include('front.Projects.short_courses')
                </div>

                @include('front.Projects.wishlist')

                <div class="w-max">
                   {{ $courses->links('front.partials.pagination') }}
                </div>


                <!-- view all button -->
                <div class="flex justify-center ">
                    <a class="bg-[#1ea19d] text-white rounded-full mt-10 mb-10 px-5 py-2 text-sm font-normal hover:bg-[#00a651] transition duration-300" href="{{ route('course.schedule') }}">View All Schedules</a>
                </div>
            </div>
        </div>

        <!-- END page content -->
        {{-- footer areas of training --}}
        <div class="w-full lg:px-32 my-8">
            <div class="flex flex-wrap justify-start mx-auto mt-8 mb-4">
                @foreach($topics as $course_topic)
                    <a class="bg-[#1ea19d] hover:bg-[#00a651] text-white font-bold rounded-full py-2 px-4 m-2 text-center" href="{{ route('course.topic.show', $course_topic) }}">
                        <strong>{{$course_topic->name}}</strong>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
    <!-- END page container -->



</div>
@endsection

@section('js_content')

<script>
    var form = document.getElementById('wishlist')

    function wishListModal(button) {
        var courseName = button.getAttribute('data-course-name');

        form.classList.toggle('hidden')

        document.getElementById('course-name-input').value = courseName;
    }

    function closePopupForm() {
        form.classList.toggle('hidden')
    }
</script>

<script>
    document.getElementById('show-more').addEventListener('click', function() {
        document.getElementById('short-description').style.display = 'none';
        document.getElementById('full-description').style.display = 'inline';
        document.getElementById('show-more').style.display = 'none';
        document.getElementById('show-less').style.display = 'inline';
    });

    document.getElementById('show-less').addEventListener('click', function() {
        document.getElementById('short-description').style.display = 'inline';
        document.getElementById('full-description').style.display = 'none';
        document.getElementById('show-more').style.display = 'inline';
        document.getElementById('show-less').style.display = 'none';
    });
</script>

@endsection
