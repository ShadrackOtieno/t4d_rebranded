@extends('front.master')

@section('title', "Payment Details | {$booking->course->name} | Registered Courses")

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
                <span>
                    <a href="{{ route('customer.account.course.payment.index', $booking) }}">
                        {{ $booking->course->name }}
                    </a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">
                    Payment Details
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
                                <div class="col-sm-6 offset-sm-3 pinfo">
                                    <h4>Payment Information</h4>
                                    <p>
                                        <span>Invoice No:</span> 
                                        {{ $payment->id }}
                                    </p>
                                    <p>
                                        <span>Amount:</span>
                                        {{ $payment->currency }}
                                        {{ $payment->effect == 'increase' ? '' : '-' }}
                                        {{ number_format($payment->amount) }}
                                    </p>
                                    <p>
                                        <span>Status:</span>
                                        {{ ucfirst($payment->status) }}
                                    </p>
                                    <p>
                                        <span>Date:</span>
                                        {{ $payment->created_at->format('F j Y') }}
                                    </p>
                                    <p>
                                        <span>Payment Method:</span>
                                        {{ ucfirst($payment->method) }}
                                    </p>
                                    <p>
                                        <span>Reason:</span> <br>
                                        {{ ucfirst($payment->reason) }}
                                    </p>

                                    @if ($payment->effect == 'increase' and $payment->status == 'pending')
                                        
                                        @switch ($payment->method)

                                            @case ('paypal')
                                                <a href="{{ route('course.payment.log.paypal.create', $payment) }}" class="td-ma-btn">
                                                    Make Payment
                                                </a>
                                                @break

                                        @endswitch

                                    @endif
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