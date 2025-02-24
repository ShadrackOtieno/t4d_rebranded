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
                <span class="bc-current-page">Tours</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- tour content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-heading">
                            <h3>Browse and book our tours</h3>
                        </span>
                    </div>
                    <!-- category description -->
                    <div class="ip-brief-desc" id="">
                        <p>Whether you need an excursion for yourself or your team, a field trip, case study tour and so much more, we’ve got you covered. 
                            Explore our collection of tours and pick your next destination.</p>
                    </div>
                    <!-- categories column -->
                    <div class="ip-categories-col">
                        <div class="ip-inner-header">
                            <h3>Explore all categories</h3>
                            <hr/>
                        </div>

                        @include('front/tour/partials/filter')

                        <!-- columns -->
                        <div class="row">
                            @forelse ($tours as $tour)
                                <div class="col-sm-3 ip-st-col">
                                    <div class="ip-cat-img-new">
                                        <a href="{{ route('tour.show', $tour) }}">
                                            <img src="{{ asset('storage/'.$tour->cover) }}">
                                        </a>
                                        <div class="clearfix">
                                            <div>
                                                <h6>
                                                    <a href="{{ route('tour.show', $tour) }}">
                                                        {{ $tour->name }}
                                                    </a>
                                                </h6>
                                                <span class="tour-price">
                                                    {{ ($kes = @$tour->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '' }}

                                                    USD {{ number_format(@$tour->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                </span>
                                            </div>
                                            <button class="btn btn-primary" type="button" onclick="window.location.href = `{{ route('tour.show', $tour) }}`">
                                                Book
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-sm-3 ip-st-col">
                                    <b>No tour available</b>
                                </div>
                            @endforelse
                        </div>

                        {{ $tours->links() }}
                    </div>
                </div>
            </div>
            <!-- END tour content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
