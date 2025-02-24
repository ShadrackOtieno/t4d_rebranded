@extends('front.Projects.master')
@section('content')

<div class="main-body">
    <!-- page container -->
<div>
    <!-- page breadcrumbs -->
    <div class="lex items-center space-x-2 text-sm text-white bg-[#1ea19d] mx-auto px-4 mb-8">
        <div class="breadcrumbs flex items-center space-x-2 text-gray-600 text-sm">
            <a href="{{ route('home') }}" class="fas fa-home text-blue-500"></a>
            <span class="text-white">/</span>
            <span class="font-semibold ">Our Training Venues</span>
        </div>
    </div>

    @include('front/partials/alert')

    <div class="container mx-auto px-4">
        <div class="row">
            <div class="py-2 text-left">
                <div class="ip-tagline">
                    <h1 class="text-3xl font-bold text-[#00a651]">Our Training Venues</h1>
                    <hr class="border-b-2 border-red-700 my-4"/>
                </div>
                <p class="text-lg text-gray-600">Select one of our Global training venues to see scheduled courses.</p>
            </div>
        </div>
    </div>
    <!-- END page breadcrumbs -->



    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
            @foreach (App\City::where('name', '!=', 'Virtual')->get() as $city)
                <div class="flex flex-col bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform hover:-translate-y-2 text-[#1ea19d] hover:text-[#00a651]">
                    <div class="card-img-caption relative transform transition-transform hover:-translate-y-2">
                        <a href="{{ route('course.venue.show', ['city' => $city->name]) }}">
                            @if ($city->cover)
                                <img src="{{ $city->cover }}" class="w-full h-64 object-cover" alt="{{ $city->name }}">
                            @else
                                <p class="text-gray-500">No cover image available.</p>
                            @endif
                        </a>
                    </div>
                    <div class="p-4">
                        <h4 class="text-xl font-bold">
                            <a class="venue-title" href="{{ route('course.venue.show', ['city' => $city->name]) }}">
                                {{ $city->name }}
                            </a>
                        </h4>
                        <div class="mt-4">
                            <span class="mr-2">
                                <a class="inline-block bg-[#1ea19d] hover:bg-[#00a651] text-white font-semibold py-2 px-4 rounded-full transition-all duration-300"
                                   href="{{ route('course.venue.index', ['city' => $city->name]) }}">
                                    View Courses
                                </a>
                            </span>
                            <span>
                                <a class="inline-block bg-[#00a651] hover:bg-[#1ea19d] text-white font-semibold py-2 px-4 rounded-full transition-all duration-300"
                                   href="{{ route('course.venue.show', ['city' => $city->name]) }}">
                                    About Venue
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
</div>
    <!-- /container -->

    <script>
        // Adds active state to section navigation
        document.querySelectorAll('.nav li').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                document.querySelectorAll('.nav li').forEach(el => el.classList.remove('active'));
                item.classList.add('active');
            });
        });
    </script>
@endsection
