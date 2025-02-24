@extends('backoffice.master')

@section('title', 'Virtual Location')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    @include('backoffice/partials/alerts/response_message')

                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                VIRTUAL LOCATION
                            </h2>

                            @if ( isset($venue) )
                                <a class="pull-right" href="{{ route('backoffice.virtual_venue.currency.index', compact('venue')) }}">
                                    Manage Currencies
                                </a>
                            @endif
                        </div>
                        
                        <div class="body">
                            <form class="form-horizontal" action="{{ route('backoffice.virtual_venue.store') }}" method="POST">

                                @csrf

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">E-mail Address</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail Address" value="{{ old('email', @$venue->email) }}">
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
                                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone', @$venue->phone) }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'phone'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tax">Tax Rate (%)</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tax" id="tax" class="form-control" placeholder="Tax Rate" value="{{ old('tax', @$venue->tax) }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'tax'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                            SAVE
                                        </button>
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