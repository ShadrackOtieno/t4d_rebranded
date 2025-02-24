@extends('front.master')

@section('title', 'Tour Categories')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <!-- home -->
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">All categories</span>
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
                    </div>
                    <!-- categories column -->
                    <div class="ip-categories-col">
                        <div class="ip-inner-header">
                            <h2>Explore all categories</h2>
                            <hr/>
                        </div>
                        <!-- columns -->
                        <div class="row">
                            @forelse ($categories as $category)
                                <div class="col-sm-3 ip-cat-col">
                                    <div class="ip-cat-img-new">
                                        <a href="{{ route('tour.category.subcategory.index', $category) }}">
                                            <img src="{{ asset('storage/'.$category->cover) }}">
                                        </a>
                                        <h5>
                                            <a href="{{ route('tour.category.subcategory.index', $category) }}">
                                                {{ $category->name }} Tours
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="ip-cat-list">
                                        <ul>
                                            @forelse ($category->subcategories->take(4) as $subcategory)
                                                <li>
                                                    <a href="{{ route('tour.category.subcategory.show', compact('category', 'subcategory')) }}">
                                                        {{ $subcategory->name }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li>
                                                    No subcategories available
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            @empty
                                <b>No categories available</b>
                            @endforelse
                        </div>

                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
