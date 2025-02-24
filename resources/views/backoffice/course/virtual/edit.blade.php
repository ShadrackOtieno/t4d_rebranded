@extends('backoffice.master')

@section('title', "Edit Virtual Schedule | $course->name")

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
                                    <form action="{{ route('backoffice.course.virtual_class.update', compact('course', 'virtual_class')) }}" method="post">

                                        @csrf
                                        @method('PUT')
    
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <span class="input-group-addon">From</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date start..." name="from" value="{{ old('from', $virtual_class->from) }}" min="{{ date('Y-m-d') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'from'])

                                            <span class="input-group-addon">to</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date end..." name="to" value="{{ old('to', $virtual_class->to) }}" min="{{ date('Y-m-d') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'to'])
                                        </div>

                                        <div class="form-group">
                                            <label for="period">Period</label>
                                            
                                            <div class="form-line">
                                                <select id="period" name="period" class="form-control">

                                                    @foreach ([

                                                        'Half-day'

                                                    ] as $period)

                                                        <option
                                                        @if ( old('period', $virtual_class->period) == $period )
                                                            selected
                                                        @endif>

                                                            {{ $period }}
                                                            
                                                        </option>

                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            @foreach (App\Currency::hasMorph('venue', 'App\VirtualVenue')->get() as $currency)    
                                                <span class="input-group-addon">
                                                    {{ strtoupper($currency->code) }}
                                                </span>

                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="{{ $currency->code . '-currency-amount' }}" value="{{ old($currency->code . '-currency-amount', @$virtual_class->currencies->firstWhere('code', $currency->code)->pivot->amount) }}"
                                                    @if (strtolower($currency->code) == 'usd')
                                                        required
                                                    @endif>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label>Tax Rate</label>
                                            
                                            <div class="form-line">
                                                <input type="number" name="tax" class="form-control" placeholder="Tax Percentage" value="{{ App\VirtualVenue::first()->tax }}" readonly>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'tax'])
                                        </div>

                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <span class="input-group-addon">Booking Ends</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date end..." name="booking_end" min="{{ date('Y-m-d') }}" value="{{ old('booking_end', $virtual_class->booking_end) }}" min="{{ date('Y-m-d') }}">
                                            </div>
                                            
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'booking_end'])
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