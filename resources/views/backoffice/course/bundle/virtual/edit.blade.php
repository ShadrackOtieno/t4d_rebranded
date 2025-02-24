@extends('backoffice.master')

@section('title', "Edit Virtual Schedule | $bundle->name")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT VIRTUAL SCHEDULE
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
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{ route('backoffice.course.bundle.virtual.update', compact('bundle', 'virtual_bundle')) }}" method="post">

                                        @csrf
                                        @method('PUT')
    
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <span class="input-group-addon">From</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date start..." name="from" min="{{ date('Y-m-d') }}" value="{{ old('from', $virtual_bundle->from) }}">
                                            </div>
                                            <span class="input-group-addon">to</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date end..." name="to" min="{{ date('Y-m-d') }}" value="{{ old('to', $virtual_bundle->to) }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'from'])
                                        @include('backoffice.partials.alerts.form_error', ['field' => 'to'])

                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            @foreach (App\Currency::all() as $currency)    
                                                <span class="input-group-addon">
                                                    {{ strtoupper($currency->code) }}
                                                </span>

                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="{{ $currency->code . '-currency-amount' }}" value="{{ old($currency->code . '-currency-amount', @$virtual_bundle->currencies->firstWhere('code', $currency->code)->pivot->amount) }}"
                                                    @if (strtolower($currency->code) == 'usd')
                                                        required
                                                    @endif>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="tax" class="form-control" placeholder="Tax Percentage" value="{{ old('tax', $virtual_bundle->tax) }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'tax'])
                                        </div>

                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <span class="input-group-addon">Booking Starts</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date start..." name="booking_start" min="{{ date('Y-m-d') }}" value="{{ old('booking_start', $virtual_bundle->booking_start) }}">
                                            </div>
                                            <span class="input-group-addon">Booking Ends</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date end..." name="booking_end" min="{{ date('Y-m-d') }}" value="{{ old('booking_end', $virtual_bundle->booking_end) }}">
                                            </div>
                                        </div>
        
                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                UPDATE
                                            </button>
                                        </div>

                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->
            
        </div>
    </section>
@endsection