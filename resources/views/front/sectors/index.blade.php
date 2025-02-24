@extends('front.projects.master')

@push('style')

    @env('local')
    <style>
    /* *{
        outline: 1px solid limegreen;
    }*/
    </style> 
    @endenv
    <style>
        .columns{
            column-count: 3;
        }
    </style>
@endpush

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div class="w-full lg:w-[1024px] mx-auto">
            <div class="w-full p-4">        
                <div class="w-full flex flex-wrap p-4">
                    <div class="md:w-1/2">
                        <div class="py-2 align-middle">
                            <div class="ip-tagline">
                                <h3 class="text-[#a11e22] text-3xl font-bold">{{$serviceIndustry->name ?? ''}} Services</h3>
                                <hr class="w-24 my-2 border-b-6 border-[#1ea19d]"/>
                            </div>
                            <p class="p-2">{!! $serviceIndustry->description ?? '' !!}</p>
                        </div>
                        <div class="px-2 py-2">
                            <button type="button" class="ires-primary-btn">{{$serviceIndustry->name ?? ''}} Trainings</button>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-2">
                        <div class="rounded-lg overflow-hidden">
                            <img class="h-full object-cover" src="{{ asset('images/health.webp') }}" alt="health">
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- about brief -->
            <div class="bg-gray-800 text-white py-8 lead-brief">
                <div class="px-4">
                    <div>
                        <span class="ip-tagline">
                            <h3 class="text-[#a11e22] text-3xl font-bold">Group Trainings</h3>
                            <hr class="w-24 my-2 border-b-6 border-[#1ea19d]"/>
                        </span>
                        {!!$serviceIndustry->group_training_description!!}
                    </div>
                    <div class="">
                        <div class="">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                {{-- <ol class="carousel-indicators">
                                    <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                                </ol> --}}
                                <div class="flex flex-wrap">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                    <div class="w-5/6 sm:w-1/2 md:w-1/3 lg:w-1/4 p-3">
                                        <div class="rounded-md overflow-hidden shadow-lg shadow-black">
                                            <div class="w-full aspect-[6/5]">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" class="h-full w-full object-cover">
                                            </div>
                                            <div class="h-48 relative">
                                                <h5 class="p-1">{{ $course->name }}</h5>
                                                <div class="absolute bottom-0 w-full mb-2">
                                                    <div class="w-max mx-auto py-2">
                                                        <a href="{{ route('course.show', $course) }}" class="ires-pri-btn px-6 py-2 mx-auto">
                                                            <span>Course Details</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END about brief -->
        
            <!-- values brief -->
            <div class="py-8 lead-brief">
                <div class="px-4">
                    <div>
                        <span class="ip-tagline">
                            <h3 class="text-[#a11e22] text-3xl font-bold">Team Building Services</h3>
                            <hr class="w-24 my-2 border-b-6 border-[#1ea19d]"/>
                            {!!$serviceIndustry->team_building_description!!}
                        </span>
                    </div>
                    <div class="">
                        <div class="">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                {{-- <ol class="carousel-indicators">
                                    <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                                </ol> --}}
                                <div class="flex flex-wrap">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                    <div class="w-5/6 sm:w-1/2 md:w-1/3 lg:w-1/4 p-3">
                                        <div class="rounded-md overflow-hidden shadow-lg shadow-black">
                                            <div class="w-full aspect-[6/5]">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" class="h-full w-full object-cover">
                                            </div>
                                            <div class="bg-white h-48 relative">
                                                <h5 class="p-1">{{ $course->name }}</h5>
                                                <div class="absolute bottom-0 w-full mb-2">
                                                    <div class="w-max mx-auto py-2">
                                                        <a href="{{ route('course.show', $course) }}" class="ires-pri-btn px-6 py-2 mx-auto">
                                                            <span>Course Details</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END values brief -->
        
            <!-- explore -->
            {{-- <div class="bg-gray-800 text-white py-8 lead-brief">
                <div class="container mx-auto">
                    <div>
                        <span class="ip-tagline">
                            <h3>Services</h3>
                            <hr class="ip-inner-header"/>
                        </span>
                        {!!$serviceIndustry->services_description!!}
                    </div>
                    <div class="gridsm:grid-cols-2md:grid-cols-3lg:grid-cols-4gap-2">
                        @forelse($serviceIndustry->services as $service)
                        <div class="p-1">
                            <div class="lead-brief-c">
                                <span class="fa fa-2x fa-database"></span>
                                <h4>{{$service->name}}</h4>
                                <p class="columns-3">{!! $service->description !!}</p>
                                <a href="{{ route('course.industry.service', $service->slug) }}" class="btn bc-btn bg-blue-500 text-white py-2 px-4">Explore</a>
                            </div>
                        </div>
                        @empty
                        <div class="col-sm-4">
                            <p>No services available</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div> --}}
            <!-- END explore -->
        </div>
        
        <!-- END page container -->

    </div>
@endsection
