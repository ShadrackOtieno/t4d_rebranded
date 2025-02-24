@extends('backoffice.master')

@section('title', 'Confirm Payment')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CONFIRM PAYMENT
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">

                                @csrf

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="payment_date">Payment Date</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="payment_date" id="payment_date" class="form-control" placeholder="" value="{{ old('payment_date') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'payment_date'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="confirmation_date">Confirmation Date</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="confirmation_date" id="confirmation_date" class="form-control" placeholder="" value="{{ old('confirmation_date') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'confirmation_date'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="payment_method">Payment Method</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="category" name="category" class="form-control show-tick">
                                                    <option value="value"
                                                    @if ( old('payment_method') == 'value')
                                                        selected
                                                    @endif>M-Pesa</option>
                                                    <option value="value"
                                                    @if ( old('payment_method') == 'value')
                                                        selected
                                                    @endif>Cash</option>
                                                    <option value="value"
                                                    @if ( old('payment_method') == 'value')
                                                        selected
                                                    @endif>Cheque</option>
                                                </select>
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'payment_method'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="amount">Amount</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'amount'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">CONFIRM</button>
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