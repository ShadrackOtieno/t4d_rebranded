@extends('front.master')

@section('title', "{$booking->course->name} | Registered Courses")

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
                <span>
                    <a href="{{ route('customer.account.course.index') }}">
                        Registered Courses
                    </a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">
                    {{ $booking->course->name }}
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
                        
                        <div class="tab-pane fade show active" id="nav-pinfo" role="tabpanel" aria-labelledby="nav-pinfo-tab">
                            <div class="row">
                                <div class="col-sm-6 pinfo">
                                    <h4>Course Information</h4>
                                    <p><span>Name:</span> {{ $booking->course->name }}</p>
                                    <p><span>Fees:</span> {{ $booking->currency_code }} {{ number_format($booking->total_cost) }}</p>
                                </div>

                                <div class="col-sm-6 pinfo">
                                    <h4>Booking Details</h4>
                                    <p><span>Name:</span> {{ $booking->salutation }} {{ $booking->name }}</p>
                                    <p><span>Phone Number:</span> {{ $booking->phone }}</p>
                                    <p><span>Personal Email:</span> {{ $booking->personal_email }}</p>
                                    <p><span>Work Email:</span> {{ $booking->work_email }}</p>
                                    <p><span>Country:</span> {{ $booking->country }}</p>
                                    <p><span>Company:</span> {{ $booking->company->name }}</p>
                                    <p><span>Designation:</span> {{ $booking->designation }}</p>
                                    <p><span>Learned about us from:</span> {{ $booking->learn_about_us }}</p>
                                </div>
                            </div>

                            <br><br>

                            <div class="row">
                                <div class="col-sm-6 pinfo">
                                    <h4>Approving Authority</h4>
                                    <p><span>Name:</span> {{ @$booking->approvedAuthority->name }}</p>
                                    <p><span>Phone Number:</span> {{ @$booking->approvedAuthority->phone }}</p>
                                    <p><span>Email:</span> {{ @$booking->approvedAuthority->email }}</p>
                                    <p><span>Company:</span> {{ @$booking->approvedAuthority->company->name }}</p>
                                </div>

                                <div class="col-sm-6 pinfo">
                                    <h4>Payment Information</h4>
                                    <p><span>Method:</span> {{ ucfirst($booking->payment->method) }}</p>
                                    <p>
                                        <span>Amount:</span>
                                        {{ $booking->payment->currency }}
                                        {{ number_format($booking->payment->amount) }}
                                    </p>
                                    <p><span>Status:</span> {{ ucfirst($booking->payment->status) }}</p>
                                    <p><span>Date Received:</span> {{ $booking->payment->date_received ? date('F j Y', strtotime($booking->payment->date_received)) : 'Not Set' }}</p>
                                    <p><span>Date Confirmed:</span> {{ $booking->payment->date_confirmed ? date('F j Y', strtotime($booking->payment->date_confirmed)) : 'Not Set' }}</p>
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