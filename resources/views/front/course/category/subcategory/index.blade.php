@extends('front.Projects.master')

@section('css')
<style>
   .fading-line-list li {
    font-size: 14px;
    color: #1ea19d; /* Text color */
    margin-bottom: 10px;
    position: relative;
    padding-left: 20px; /* Space for the line */
}

.fading-line-list li:before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    height: 1px;
    width: 15px;
    background: linear-gradient(to left, #007b83, transparent); /* Fading line */
}
</style>
@endsection

@section('title', 'Sub-categories')

@section('content')


    <div class="main-body bg-fixed" style="background-image: url('/images/servicesbg.svg')">

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

        <div id="imageContainer" class="relative w-full h-[50vh] lg:h-[60vh] order2 bg-cover transition-all duration-500 ease-in-out"
        style="background-image: url('{{ asset('images/home7.webp') }}')">
       <div class="w-full h-full bg-[#00a651] bg-opacity-40"></div>
       <div class="absolute left-5 lg:left-20 top-16 md:top-28 lg:w-2/5 text-white py-3 px-6">
           <div class="mb-6" id="tp">
               <h1 class="text-3xl text-white">Grow your future, expand your knowledge, with our expertly developed training courses.</h1>
           </div>

           <div class="mb-4">
               <div id="description" class="*:mb-2 text-justify">
                   {!! Str::limit(strip_tags($category->description), 150) !!}
               </div>
               <button id="showMoreBtn" class="mb-3 mt-1 text-red-500 underline">Show More</button>
               <button id="showLessBtn" class="mb-4 mt-1 text-red-500 underline hidden">Show Less</button>
           </div>
       </div>
   </div>

        <!-- page container -->
        <div>
            <!-- page content -->
            <div class="mt-6 mx-10 lg:mx-28">
                <div class="w-full">

                        <!-- categories column -->
                        <div class="" id="">
                            <div class="w-full md:w-5/6 lg:mt-10 mx-auto relative">
                                <hr class="hidden lg:block absolute top-1/2 left-1/2 w-2/3 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full">
                                <h2 class="text-center text-[#00a651] text-xl sm:text-2xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl">What would you like to learn?</h2>

                            </div>
                            <!-- columns -->
                            <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4 py-2 lg:px-4 ">
                                @forelse ($subcategories as $subcategory)
                                    <div class="bg-white rounded shadow-md  px-5 hover:shadow-gray-400 ">
                                        <div>
                                            <a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}">
                                                {{--  --}}
                                                <div class="h-40 pt-4">
                                                    <img loading="lazy" class="rounded-[5px] h-full w-full object-cover" src="{{ asset('storage/'.$subcategory->cover) }}" alt="{{ $subcategory->name }}">
                                                    {{-- <img loading="lazy" loading="lazy" class="rounded-[5px] h-full w-full object-cover" src="{{ asset('images/people.webp') }}" alt=""> --}}
                                                </div>
                                            </a>
                                            <h3 class="text-[16px] h-6 text-[#00a651] hover:font-bold pt-5 pb-3">
                                                <a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="text-[15px] leading-[25px]">
                                            <ul class="fading-line-list list-none px-7 pb-7 pt-10 ">
                                                @foreach ($subcategory->courses->take(4) as $course)
                                                    <li class="hover:underline hover:font-bold hover:text-[#1ea19d]">
                                                        <a href="{{ route('course.show', $course) }}">
                                                            {{ $course->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        {{-- <div class="mb-10">
                                            <a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}" class="bg-[#1ea19d] hover:bg-[#00a651] text-white font-bold py-2 mx-20 px-4 rounded-full ">View More</a>
                                        </div> --}}
                                    </div>
                                @empty
                                    <b>No subcategories available</b>
                                @endforelse
                            </div>

                            {{ $subcategories->links() }}

                        <!-- view all button -->
                        <div class="flex justify-center ">
                            <a class="bg-[#1ea19d] text-white rounded-full mt-10 mb-10 px-5 py-2 text-sm font-normal hover:bg-[#00a651] transition duration-300" href="{{ route('course.schedule', $category) }}">
                                View All Scheduled Dates
                            </a>
                        </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->
    </div>
@endsection
@section('js_content')
<script>
    document.getElementById('showMoreBtn').addEventListener('click', function() {
        // Expand the image container
        document.getElementById('imageContainer').style.height = '100vh';

        // Show full description
        var descriptionDiv = document.getElementById('description');
        descriptionDiv.innerHTML = `{!! str_replace(array("\r", "\n"), '', addslashes($category->description)) !!}`;

        // Hide the "Show More" button
        this.style.display = 'none';

        // Show the "Show Less" button
        document.getElementById('showLessBtn').classList.remove('hidden');
    });

    document.getElementById('showLessBtn').addEventListener('click', function() {
        // Shrink the image container back to its original height
        document.getElementById('imageContainer').style.height = '60vh';

        // Show limited description
        var descriptionDiv = document.getElementById('description');
        descriptionDiv.innerHTML = `{!! Str::limit(strip_tags($category->description), 150) !!}`;

        // Hide the "Show Less" button
        this.classList.add('hidden');

        // Show the "Show More" button again
        document.getElementById('showMoreBtn').style.display = 'inline';
    });
</script>
@endsection
