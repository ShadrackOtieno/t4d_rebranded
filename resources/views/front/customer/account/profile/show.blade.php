@extends('front.master')

@section('title', 'My Profile')

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
                <!-- current page -->
                <span class="bc-current-page">My Profile</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')
                        
                        <div class="tab-pane fade show active" id="nav-pinfo" role="tabpanel" aria-labelledby="nav-pinfo-tab">
                            <div class="row">
                                <div class="col-sm-6 pinfo">
                                    <h4>Personal Information</h4>
                                    <p><span>Full Name:</span> {{ $customer->name }}</p>
                                    <p><span>Designation:</span> {{ $customer->designation }}</p>
                                    <p><span>Company:</span> {{ @$customer->company->name }}</p>
                                    <p><span>Country:</span> {{ $customer->country }}</p>
                                </div>

                                <div class="col-sm-6 pinfo">
                                    <h4>Contact Details</h4>
                                    <p><span>Phone Number:</span> {{ $customer->phone }}</p>
                                    <p><span>Personal Email:</span> {{ $customer->account->email }}</p>
                                    <p><span>Company Email:</span> {{ $customer->work_email }}</p>
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