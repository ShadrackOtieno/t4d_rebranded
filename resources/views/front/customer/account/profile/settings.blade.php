@extends('front.master')

@section('title', 'Settings')

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
                <span class="bc-current-page">Settings</span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')

                        <div class="tab-content" id="nav-tabContent">
                            <form action="{{ route('customer.account.settings.update') }}" method="POST" class="tab-pane fade show active" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">

                                @csrf
                                @method('PUT')

                                <!-- personal details -->
                                <p>Edit your login credentials</p>

                                <div class="reg-sec">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <small class="form-text text-muted">Personal Email Address</small>
                                            <input type="email" class="form-control" placeholder="Personal Email Address" name="email" value="{{ old('email', $account->email) }}">

                                            @include('front/partials/form_error', ['field' => 'email'])
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <small class="form-text text-muted">Password</small>
                                            <input type="password" class="form-control" placeholder="New Password" name="password">

                                            @include('front/partials/form_error', ['field' => 'password'])
                                        </div>

                                        <div class="form-group col-md-6">
                                            <small class="form-text text-muted">Confirm Password</small>
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>

                                <div class="reg-btn">
                                    <button class="btn btn-success" type="submit">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                            
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection