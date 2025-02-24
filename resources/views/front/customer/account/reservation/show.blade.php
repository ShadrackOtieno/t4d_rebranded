@extends('front.master')

@section('title', 'Hotel Reservation Details')

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
                    <a href="{{ route('customer.account.reservation.index') }}">
                        Hotel Reservations
                    </a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">
                    Resrvation Details
                </span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')
                        
                        <div class="tab-pane fade show active" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
                            <div class="row">
                                <div class="col-sm-6 pinfo">
                                    <p>
                                        <span>Check In:</span>
                                        {{ date('F j Y', strtotime($reservation->check_in)) }}
                                    </p>
                                    <p>
                                        <span>Check Out:</span> 
                                        {{ date('F j Y', strtotime($reservation->check_out)) }}
                                    </p>
                                    <p>
                                        <span>Number of People:</span> 
                                        {{ $reservation->people }}
                                    </p>
                                </div>

                                <div class="col-sm-6 pinfo">
                                    <p>
                                        <span>Flight:</span>
                                        {{ $reservation->flight }}
                                    </p>
                                    <p>
                                        <span>Require visa:</span>
                                        {{ $reservation->visa ? 'Yes' : 'No' }}
                                    </p>
                                    <p>
                                        <span>Airport Transfer:</span>
                                        {{ $reservation->airport_transfer ? 'Yes' : 'No' }}
                                    </p>
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