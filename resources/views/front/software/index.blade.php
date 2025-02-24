@extends('front.master')

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
                <span class="bc-current-page">Enterprise Systems</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page hero section -->
            <div class="inner-page-hero">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>Browse and buy our enterprise systems</h3>
                        </span>
                    </div>
                </div>
            </div>
            <!-- END page hero section -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- category description -->
                    <div class="ip-brief-desc" id="">
                        <p>Enterprise solutions for your business or organization. Whatever you need, we’ve got it.</p>
                    </div>
                    <!-- categories column -->
                    <div class="ip-categories-col">
                        <div class="ip-inner-header">
                            <h3>Explore all categories</h3>
                            <hr/>
                        </div>

                        @include('front/software/partials/fiter')

                        <!-- columns -->
                        <div class="row">
                            @forelse ($software as $software_item)
                                <div class="col-sm-3 ip-st-col">
                                    <div class="ip-cat-img-new">
                                        <a href="{{ route('software.show', $software_item->slug ?? $software_item->id) }}">
                                            <img src="{{ asset('storage/'.$software_item->cover) }}">
                                        </a>
                                        <h6>
                                            <a href="{{ route('software.show', $software_item->slug ?? $software_item->id) }}">
                                                {{ $software_item->name }}
                                            </a>
                                        </h6>
                                        <button class="btn btn-primary" type="button" onclick="window.location.href = `{{ route('software.show', $software_item->slug ?? $software_item->id) }}`">
                                            Request Quote
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <b>No software available</b>
                            @endforelse
                        </div>

                        {{ $software->links() }}
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
