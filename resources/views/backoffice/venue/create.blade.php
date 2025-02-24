@extends('backoffice.master')

@section('title', 'Add Location')

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            ADD LOCATION
                        </h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                            <i class="material-icons" style="font-size: 11px;">
                                arrow_back
                            </i>
                            Go back
                        </a>
                    </div>

                    @include('backoffice/partials/alerts/response_message')

                    <div class="body">
                        <form class="form-horizontal" action="{{ route('backoffice.venue.store') }}" method="POST">

                            @csrf

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="country">Country</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="country" id="country" class="form-control" placeholder="Country Name" value="{{ old('country') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'country'])
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="reg_no">Registration Number</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="reg_no" id="reg_no" class="form-control" placeholder="Company Registration Number" value="{{ old('reg_no') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'reg_no'])
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tax_pin">Tax Pin</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tax_pin" id="tax_pin" class="form-control" placeholder="Company Pin" value="{{ old('tax_pin') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'tax_pin'])
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email">E-mail Address</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail Address" value="{{ old('email') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'email'])
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="phone">Phone Number</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'phone'])
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tax">Tax Rate</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tax" id="tax" class="form-control" placeholder="Tax Percentage" value="{{ old('tax', 0) }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'tax'])
                                    </div>
                                </div>
                            </div>

                       
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7 col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <div class="form-group">
                                <input type="checkbox" id="head_office" name="head_office" class="filled-in chk-col-red" @if ( old('head_office') ) checked @endif>

                                <label for="head_office">
                                    Mark as head office
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">ADD</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END#  -->

    </div>
</section>
@endsection