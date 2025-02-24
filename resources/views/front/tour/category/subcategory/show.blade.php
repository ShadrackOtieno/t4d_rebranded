@extends('front.master')

@section('title', "$subcategory->name | $category->name Tours")

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <span class="bc-sep"></span>
                <span>
                    <a href="{{ route('tour.category.index') }}">
                        All Categories
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span>
                    <a href="{{ route('tour.category.subcategory.index', $category) }}">
                        {{ $category->name }}
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">{{ $subcategory->name }}</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-tagline">
                            <h5>Tour Categories</h5>
                            <hr/>
                        </span>
                        <span class="bc-btn">
                            <a class="btn" href="{{ route('tour.category.index') }}">
                                Explore categories
                            </a>
                        </span>
                    </div>
                    <!-- categories column -->
                    <div class="ip-categories-col" id="">
                        <div class="ip-inner-header">
                            <h2>{{ $subcategory->name }} Tours</h2>
                            <hr/>
                        </div>
                        <!-- columns -->
                        <div class="row">
                            @forelse ($tours as $tour)
                                <div class="col-sm-3 ip-sub-col">
                                    <div class="ip-cat-img-new">
                                        <a href="{{ route('tour.show', $tour) }}">
                                            <img src="{{ asset('storage/'.$tour->cover) }}">
                                        </a>
                                        <h5>
                                            <a href="{{ route('tour.show', $tour) }}">
                                                {{ $tour->name }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            @empty
                                <b>No tours available</b>
                            @endforelse
                        </div>

                        {{ $tours->links() }}
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
