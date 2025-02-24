@extends('front.master')

@section('title', "{$booking->tour->name} | Booked Tours")

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <!-- home -->
                <span">
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <span">
                    <a href="{{ route('customer.account.tour.index') }}">
                        Booked Tours
                    </a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">
                    {{ $booking->tour->name }}
                </span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')
                        
                        <div class="tab-pane fade show active" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
                            <div class="row">
                                <div class="col-sm-4 pinfo">
                                    <h4>Tour Information</h4>
                                    <p><span>Name:</span> {{ $booking->tour->name }}</p>
                                    <p><span>Price:</span> {{ '$' . number_format($booking->tour->currencies->firstWhere('code', 'USD')->pivot->amount) }}</p>
                                </div>

                                <div class="col-sm-4 pinfo">
                                    <h4>Bookings Details</h4>
                                    <p><span>Full Name:</span> {{ $booking->name }}</p>
                                    <p><span>Personal Email:</span> {{ $booking->email }}</p>
                                    <p><span>Phone Number:</span> {{ $booking->phone }}</p>
                                    <p><span>Application Date:</span> {{ $booking->created_at->format('F j Y') }}</p>
                                    <p><span>Preferred Date:</span> {{ date('F j Y', strtotime($booking->preferred_date)) }}</p>
                                    <p><span>Participants:</span> {{ $booking->participants }}</p>
                                    <p><span>Message:</span> {{ $booking->message }}</p>
                                </div>

                                <div class="col-sm-4 pinfo">
                                    <form action="{{ route('customer.account.tour.review', $booking) }}" method="POST">

                                        @csrf

                                        <!-- personal details -->
                                        <p>Rate and submit your review</p>

                                        <div class="reg-sec">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <small class="form-text text-muted">Rate out of 5</small>
                                                    
                                                    @for ($rating = 1; $rating <= 5; $rating++)
                                                        <label>
                                                            <input type="radio" name="rating" value="{{ $rating }}"
                                                            @if ( old('rating', @$booking->review->rating) == $rating ) checked @endif>

                                                            {{ $rating }} &nbsp;
                                                        </label>
                                                    @endfor

                                                    @include('front/partials/form_error', ['field' => 'first_name'])
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <small class="form-text text-muted">Comment</small>
                                                    <textarea class="form-control" name="comment">{{ old('comment', @$booking->review->comment) }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reg-btn">
                                            <button class="btn btn-success" type="submit">
                                                Review
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection