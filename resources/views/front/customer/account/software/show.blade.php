@extends('front.master')

@section('title', "{$software_quote->software->name} | Software Quotes")

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
                    <a href="{{ route('customer.account.software_quote.index') }}">
                        Software Quotes
                    </a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">
                    {{ $software_quote->software->name }}
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
                                    <h4>Software Information</h4>
                                    <p><span>Name:</span> {{ $software_quote->software->name }}</p>
                                    <p><span>Price:</span> {{ $software_quote->price ? '$' . number_format($software_quote->price) : 'Sent on invoice' }}</p>
                                </div>

                                <div class="col-sm-6 pinfo">
                                    <h4>Quotation Details</h4>
                                    <p><span>Full Name:</span> {{ $software_quote->name }}</p>
                                    <p><span>Personal Email:</span> {{ $software_quote->email }}</p>
                                    <p><span>Phone Number:</span> {{ $software_quote->phone }}</p>
                                    <p><span>Date Requested:</span> {{ $software_quote->created_at->format('F j Y') }}</p>
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