@extends('front.Projects.master')

@section('title', 'Topic')

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

            <span>
                <a href="{{ route('course.category.subcategory.index', $category) }}">
                    {{ $category->name }}
                </a>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

            <span>
                <a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}">
                    {{ $subcategory->name }}
                </a>
            </span>

           <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

            <span class="bc-current-page">{{ $topic->name }}</span>
        </div>
        <!-- END page breadcrumbs -->

        @include('front/partials/alert')
        <!-- categories column -->
        <div class="container mx-0 lg:mx-32 my-8 ">
            <h1 class="text-xl lg:text-4xl text-[#00a651] ml-2 mb-4 text-left">Areas of Training in {{ $topic->name }}.</h1>

            <div class="flex flex-wrap justify-start mt-8 mb-4">
                @foreach($topics as $course_topic)
                    <a class="bg-[#1ea19d] hover:bg-[#00a651] text-white font-bold rounded-full py-2 px-4 m-2 text-center" href="{{ route('course.topic.show', $course_topic) }}" onclick="scrollToSection('#courses')"><strong>{{$course_topic->name}}</strong></a>
                @endforeach
            </div>

        </div>
        <!--ip-content-one page content lg-8 offset-lg-4-->
        <div class="w-full">
            <div class="flex flex-col md:flex-row gap-8 my-24 mx-4 lg:mx-32">
                <div class="md:w-3/4">
                    <h2 class="text-lg lg:text-3xl mb-4 text-[#00a651]">Training Courses in {{ $topic->name }}.</h2>
                    @php
                        $description = $topic->description;
                        $shortDescription = Str::words(strip_tags($description), 50, '...');
                    @endphp

                    @if (str_word_count(strip_tags($description)) > 10)
                        <div class="text-[15px]">
                            <span id="short-description">{!! ($shortDescription) !!}</span>
                            <span id="full-description" class="hidden *:mb-2">{!! ($description) !!}</span><br>
                            <a href="javascript:void(0);" id="show-more" class="text-[#00a651] mt-4 font-bold cursor-pointer"><b>Show More</b></a>
                            <a href="javascript:void(0);" id="show-less" class="hidden text-[#00a651] font-bold cursor-pointer"><b>Show Less</b></a>
                        </div>
                    @endif
                </div>
                <div class="md:w-1/4 mt-4 md:mt-0 flex justify-center items-center">
                    <img src="{{ asset('storage/' .$topic->cover) }}" class="w-3/4 aspect-[3/2] rounded-md border" alt="{{ $topic->name }}">
                </div>
            </div>
            <div class="clearfix" id="courses"></div>
        </div>

        <div class="">
            <div class="mx-4 lg:mx-32  my-8">
                <div class="mb-12">
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

    </div>
    <!-- END page container -->
</div>


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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const targetElement = document.getElementById('courses');
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    });
</script>

<script>
    var form = document.getElementById('wishlist')

    function wishListModal(button) {
        var courseName = button.getAttribute('data-course-name');

        console.log('Wewe');

        form.classList.toggle('hidden')

        document.getElementById('course-name-input').value = courseName;
    }

    function closePopupForm() {
        form.classList.toggle('hidden')
    }
</script>

{{-- <script>
    function scrollToSection(sectionId) {
        document.querySelector(sectionId).scrollIntoView({
            behavior: 'smooth'
        });
    }
</script> --}}
@section('css')
<style>
    .course-section {
        border: outset;
        border-color: #ececec;
        border-radius: 5%;
        margin: 10px;
        align-items: center;
    }
    .ip-content-one {
        background-image: url('{{ asset('images/backimage.webp') }}');
        background-size: cover;
        padding: 30px;
        width: 100%;
        object-fit: cover;
    }
    .ip-inner-header,
    .ip-brief-desc {
        padding: 10px;
    }
    .areas {
        margin: 3px;
    }

</style>
@endsection

@endsection
