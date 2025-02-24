@extends('front.master')
@section('content')
    <div class="main-body">
        <style>
            .breadcrumbs a {
                color: white;
                text-decoration: none;
                /* position: absolute; */
                /* z-index: 10; */
                padding-top: 20px;
            }
        </style>
        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <span class="bc-sep"></span>
                <span>
                    <a href="{{ route('course.category.index') }}">
                        All Categories
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span>
                    <a href="{{ route('course.category.subcategory.index', $category) }}">
                        {{ $category->name }}
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">{{ $subcategory->name ?? '' }}</span>
            </div>
            <!-- END page breadcrumbs -->
            @include('front/partials/alert')
            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h1>Training Courses in {{ $subcategory->name ?? '' }}.</h1>
                            {{-- for Professional Development  --}}
                        </span>
                    </div>
                    <!-- categories column -->
                    <!-- category description -->
                    {{-- <div class="ip-brief-desc" id="">
                    <p>{!! $subcategory->description !!}</p>
                </div> --}}

                    {{-- <div class="ip-brief-desc" id="subcategory-description">
                        @php
                            $description = strip_tags($subcategory->description);
                            $shortDescription = Str::words($description, 100, '...');
                        @endphp

                        <p id="description-content">{{ $shortDescription }}</p>

                        @if (str_word_count($description) > 10)
                            <p>
                                <a href="javascript:void(0);" id="show-more" style="cursor: pointer; color: #1ea19d;">Show
                                    More</a>
                                <span id="full-description" style="display: none;">{{ $description }}</span>
                                <a href="javascript:void(0);" id="show-less"
                                    style="display: none; cursor: pointer; color: #1ea19d;">Show Less</a>
                            </p>
                        @endif
                    </div> --}}

                    <div class="ip-brief-desc" id="subcategory-description">
                        @php
                            $description = strip_tags($subcategory->description);
                            $shortDescription = Str::words($description, 80, '...');
                        @endphp

                        @if (str_word_count($description) > 10)
                            <p>
                                <span id="short-description">{{ $shortDescription }}</span>
                                <span id="full-description" style="display: none;">{{ $description }}</span>
                                <a href="javascript:void(0);" id="show-more" style="cursor: pointer; color: #1ea19d;">Show
                                    More</a>
                                <a href="javascript:void(0);" id="show-less"
                                    style="display: none; cursor: pointer; color: #1ea19d;">Show Less</a>
                            </p>
                        @endif
                    </div>
                    <div class="ip-categories-col" id="">
                        <div class="ip-inner-header">
                            <h2>{{ $subcategory->name ?? '' }}</h2>
                            <hr />
                        </div>
                        <!-- columns -->
                        <div class="row">
                            <div class="col-md-8 ip-sub-col">
                                @include('front.course.category.subcategory.sidebar')
                            </div>


                            <div class="row equal">
                                @foreach ($subcategory->courses as $course)
                                    <div class="col-lg-4 col-md-4 mb-3 d-flex align-items-stretch">
                                        <div class="card">
                                            <a href="{{ route('course.show', $course) }}">
                                                <img class="card-img-top" src="{{ asset('storage/' . $course->cover) }}"
                                                    alt="{{ $course->name }}" class="card-img-top">
                                            </a>
                                            <div class="card-body d-flex flex-column">
                                                <a href="{{ route('course.show', $course) }}">
                                                    <h4 class="card-title">{{ $course->name }}</h4>
                                                </a>
                                                {{-- <p class="card-text">{!! Str::limit($course->description, 100) !!}</p> --}}
                                                <a href="{{ route('course.show', $course) }}"
                                                    class="btn btn-primary text-white mt-auto align-self-start rounded-pill px-5 fs-6 m-0">Course
                                                    Details &amp; Registration</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $courses->links() }}
                        </div>

                        <!-- view all button -->
                        <div class="bc-btn ip-all-btn">
                            <a class="btn bc-btn btn-primary rounded-pill px-5 fs-6 m-0"
                                href="{{ route('course.schedule', compact('category', 'subcategory')) }}">View All
                                Scheduled Dates</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var showMoreLink = document.getElementById("show-more");
        var showLessLink = document.getElementById("show-less");
        var shortDescription = document.getElementById("short-description");
        var fullDescription = document.getElementById("full-description");

        showMoreLink.addEventListener("click", function() {
            shortDescription.style.display = "none";
            fullDescription.style.display = "inline";
            showMoreLink.style.display = "none";
            showLessLink.style.display = "inline";
        });

        showLessLink.addEventListener("click", function() {
            shortDescription.style.display = "inline";
            fullDescription.style.display = "none";
            showMoreLink.style.display = "inline";
            showLessLink.style.display = "none";
        });
    });
</script>
