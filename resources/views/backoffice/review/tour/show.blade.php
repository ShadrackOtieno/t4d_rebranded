@extends('backoffice.master')

@section('title', 'Review Details')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                REVIEW DETAILS
                            </h2>

                            <a href="{{ route('backoffice.review.tour.index') }}" class="pull-right">
                                Back to reviews
                            </a>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label>Customer</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $review->customer->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Rating</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $review->rating }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Tour</label>

                                        <div class="form-line">
                                            <a href="{{ route('backoffice.tour.edit', $review->booking->tour) }}">
                                                {{ $review->booking->tour->name }}
                                            </a>
                                        </div>
                                    </div>

                                    <h4>Comment</h4>

                                    <p>
                                        {{ $review->comment }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->
            
        </div>
    </section>
@endsection