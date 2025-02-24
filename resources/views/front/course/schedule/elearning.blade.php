@extends('front.Projects.master')

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
                <span class="bc-current-page">Courses Schedule</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page hero section -->
            {{-- <div class="inner-page-hero">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>
                                Courses Schedule.
                            </h3>
                        </span>
                    </div>
                </div>
            </div> --}}
            <!-- END page hero section -->

            <!-- page content -->
            <div class="lg:w-[1024px] mx-auto py-5">
                <div class="container mx-auto px-4">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3 class="text-4xl text-[#00a651] font-bold">
                                Courses Schedule
                            </h3>
                        </span>
                    </div>

                    <!-- Course Description -->
                    <div class="ip-courses-sum my-6">
                        <div class="ip-inner-header my-4">
                            <h3 class="text-xl font-medium">Pick your preferred date for your preferred course</h3>
                            <hr class="border border-[#00a651] my-4"/>
                        </div>

                        <!-- courses -->
                        @include('front/course/schedule/partials/filter', compact('category'))

                        <table class="bg-white w-full table-auto my-10">
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr class="">
                                        <td class="px-6 py-4 border">
                                            {{ $course->name }}
                                        </td>
                                        <td class="px-6 py-4 text-center border">
                                            <a class="ires-pri-btn px-4 py-2 w-full" href="{{ route('course.show', $course) }}#face-to-face">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border">
                                        <td colspan="2" class="px-6 py-4 text-center">
                                            No results found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
