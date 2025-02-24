@extends('front.master')

@section('title', "$category->name Tours")

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
                <span class="bc-current-page">{{ $category->name }}</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-tagline">
                            <h5>{{ $category->name }} Subcategories</h5>
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
                        <!-- columns -->
                        <div class="row">
                            @forelse ($subcategories as $subcategory)
                                <div class="col-sm-3 ip-sub-col">
                                    <div class="ip-cat-img-new">
                                        <a href="{{ route('tour.category.subcategory.show', compact('category', 'subcategory')) }}">
                                            <img src="{{ asset('storage/'.$subcategory->cover) }}">
                                        </a>
                                        <h5>
                                            <a href="{{ route('tour.category.subcategory.show', compact('category', 'subcategory')) }}">
                                                {{ $subcategory->name }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="ip-cat-list">
                                        <ul>
                                            @foreach ($subcategory->tours->take(4) as $tour)
                                                <li>
                                                    <a href="#">
                                                        {{ $tour->name }}
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
