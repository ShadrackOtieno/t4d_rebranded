@extends('backoffice.master')

@section('title', "Edit Face to Face Schedule | $bundle->name")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT FACE TO FACE SCHEDULE
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
                                    <form action="{{ route('backoffice.course.bundle.physical.update', compact('bundle', 'physical_bundle')) }}" method="post">

                                        @csrf
                                        @method('PUT')
    
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <span class="input-group-addon">From</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date start..." name="from" min="{{ date('Y-m-d') }}" value="{{ old('from', $physical_bundle->from) }}">
                                            </div>
                                            <span class="input-group-addon">to</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date end..." name="to" min="{{ date('Y-m-d') }}" value="{{ old('to', $physical_bundle->to) }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'from'])
                                        @include('backoffice.partials.alerts.form_error', ['field' => 'to'])

                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="city_id">
                                                    <option value="">-- Select Venue --</option>
                                                    @foreach (App\City::all() as $city)
                                                        <option value="{{ $city->id }}"
                                                        @if ( old('city_id', $physical_bundle->city_id) == $city->id )
                                                            selected
                                                        @endif>
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach>
                                                </select>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'city_id'])
                                        </div>

                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            @foreach (App\Currency::all() as $currency)    
                                                <span class="input-group-addon">
                                                    {{ strtoupper($currency->code) }}
                                                </span>

                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="{{ $currency->code . '-currency-amount' }}" value="{{ old($currency->code . '-currency-amount', @$physical_bundle->currencies->firstWhere('code', $currency->code)->pivot->amount) }}"
                                                    @if (strtolower($currency->code) == 'usd')
                                                        required
                                                    @endif>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="tax" class="form-control" placeholder="Tax Percentage" value="{{ old('tax', $physical_bundle->tax) }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'tax'])
                                        </div>

                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <span class="input-group-addon">Booking Starts</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date start..." name="booking_start" min="{{ date('Y-m-d') }}" value="{{ old('booking_start', $physical_bundle->booking_start) }}">
                                            </div>
                                            <span class="input-group-addon">Booking Ends</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date end..." name="booking_end" min="{{ date('Y-m-d') }}" value="{{ old('booking_end', $physical_bundle->booking_end) }}">
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