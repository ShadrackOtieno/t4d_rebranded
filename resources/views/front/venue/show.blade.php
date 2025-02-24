@extends('front.Projects.master')

@section('content')
    <div class="main-body">
        <!-- page container -->
        <div>
            <!-- page breadcrumbs -->
            <div class="flex items-center text-sm space-x-2 bg-[#1ea19d]">
                <a href="{{ route('home') }}" class="fa fa-home text-[#00a651]"></a>
                <span class="text-gray-400">/</span>
                <a href="{{ route('our-venues') }}" class="text-[#00a651]">Venues</a>
                <span class="text-gray-400">/</span>
                <span class="text-gray-600">Train in {{ $cityModel->name }}</span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <div class="container mx-auto py-6">
                <div class="text-left">
                    <h3 class="text-2xl font-semibold mb-4 text-[#00a651]">About {{ $cityModel->name }}</h3>
                    {{-- <hr class="border-t-2 border-gray-300 w-24 mx-auto"> --}}
                </div>
                <div class="flex flex-wrap -mx-4 mt-6">
                    <div class="w-full sm:w-1/2 px-4">
                        @if ($cityModel->cover)
                            <img src="{{ $cityModel->cover }}" class="w-full rounded-md" alt="{{ $cityModel->name }}">
                        @else
                            <p>{{ $cityModel->name }}</p>
                        @endif
                    </div>
                    <div class="w-full sm:w-1/2 px-4 xl:py-32">
                        <div class="py-2">
                            <p>{!! $cityModel->description !!}</p>
                        </div>
                        <div class="flex space-x-4 mt-4">
                            <a href="{{ route('course.venue.index', ['city' => $cityModel->name]) }}"
                                class="btn bg-[#1ea19d] text-white rounded-full py-2 px-6 text-sm font-medium hover:bg-[#00a651]">
                                View Courses in {{ $cityModel->name }}
                            </a>
                            <button
                                class="btn bg-red-600 text-white rounded-full py-2 px-6 text-sm font-medium hover:bg-teal-500"
                                onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Venues
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
