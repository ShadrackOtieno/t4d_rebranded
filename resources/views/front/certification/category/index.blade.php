@extends('front.master')

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
                        <span class="ip-heading">
                            <h3>{{ $categories->total() }} categories for professional development</h3>
                        </span>
                    </div>
                    <!-- category description -->
                    <div class="ip-brief-desc" id="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <!-- categories column -->
                    <div class="ip-categories-col">
                        <div class="ip-inner-header">
                            <h3>Explore all categories</h3>
                            <hr/>
                        </div>

                        <!-- columns -->
                        <div class="row">
                            @forelse ($categories as $category)
                                <div class="col-sm-3 ip-cat-col">
                                    <div class="ip-cat-img-new">
                                        <a href="{{ route('certification.category.show', $category) }}">
                                            <img src="{{ asset('storage/'.$category->cover) }}" alt="{{ $category->cover }}">
                                        </a>
                                        <h5>
                                            <a href="{{ route('certification.category.show', $category) }}">
                                                {{ $category->name }} Courses
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="ip-cat-list">
                                        <ul>
                                            @forelse ($category->subcategories->take(4) as $subcategory)
                                                <li>
                                                    <a href="{{ route('certification.category.subcategory.show', compact('category', 'subcategory')) }}">
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
