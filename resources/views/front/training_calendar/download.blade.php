@extends('front.master')

@section('title', 'Download Training Calendar')

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
                <!-- current page -->
                <span class="bc-current-page">Download Training Calendar</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    @if ( session()->has('success') )
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <!-- course schedule -->
                    <div>
                        <p>
                            Download our {{ $calendar->year}} training calendar.
                        </p>
                    </div>

                    <!-- registration inputs --> 
                    <div>
                        <form action="{{ route('training_calendar.download', $calendar) }}" method="POST">

                            @csrf

                            <!-- personal details -->
                            <div class="reg-sec">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">Full Name</small>
                                        <input type="text" class="form-control" placeholder="Your Full Name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">Phone Number</small>
                                        <input type="tel" class="form-control" placeholder="Phone Number" name="phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <small class="form-text text-muted">Email Address</small>
                                    <input type="tel" class="form-control" placeholder="Personal Email Address" name="email" required>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">Organization</small>
                                        <input type="tel" class="form-control" placeholder="Organization" name="organization" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">Designation</small>
                                        <input type="text" class="form-control" placeholder="Designation" name="designation" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tocs" required>
                                <label class="form-check-label" for="tocs">By checking this you agree to our <a href="#" target="_blank">Terms and Conditions</a> and <a href="#" target="_blank">Privacy Policy</a></label>
                            </div>

                            <div class="reg-btn">
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger">
                                    <span class="fa fa-refresh">&nbsp;</span>Reset
                                </button>
                            </div>
                            
                        </form>
                    </div>
                    <!-- END registration inputs --> 

                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection