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

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
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
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="w-full lg:w-2/3 lg:mx56 container lg:mx-auto">
                <div class="container">
                    <div class="container px-5 mt-20">
                        <span class="">
                            <h3 class="text-xl lg:text-3xl mb-4 text-[#a11e22]">Grow your future, expand your knowledge, with our expertly developed training courses.</h3>
                        </span>
                    </div>
                    <!-- category description -->
                    <div class="ip-brief-desc" id="">
                        <p>{{ $category->description }}</p>
                    </div>
                    <!-- categories column -->
                    <div class="my-20" id="">
                        <div class="w-full md:w-5/6 lg:mt-10 mx-auto relative">
                            <hr class="hidden lg:block absolute top-1/2 left-1/2 w-2/3 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full">
                            <h2 class="text-center text-[#a11e22] text-xl sm:text-2xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl">What would you like to learn?</h2>
                            
                        </div>
                        
                        <!-- columns -->
                        <div class="my-20 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 py-2 px-4 ">
                            @forelse ($subcategories as $subcategory)
                            <div class="bg-white rounded shadow-md  px-5 hover:shadow-gray-400 ">
                                    <div class="h-40 pt-4">
                                        <a href="{{ route('certification.category.show', $subcategory) }}">
                                            <img loading="lazy" class="rounded-[5px] h-full w-full object-cover" src="{{ asset('storage/'.$subcategory->cover) }}" alt="{{ $subcategory->name }}">
                                        </a>
                                        <h5 class="text-[16px] h-6 text-[#a11e22] hover:font-bold pt-5 pb-3">
                                            <a href="{{ route('certification.category.show', $subcategory) }}">
                                                {{ $subcategory->name }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="text-[15px] leading-[25px]">
                                        <ul class="fading-line-list px7 pb-7 pt-20 ">
                                            @foreach ($subcategory->certifications->take(4) as $certification)
                                                <li class="hover:underline hover:font-bold hover:text-[#1ea19d]">
                                                    <a href="{{ route('certification.show', $certification) }}">
                                                        {{ $certification->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @empty
                                <b>No subcategories available</b>
                            @endforelse
                        </div>

                        {{ $subcategories->links() }}
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
    
@endsection
