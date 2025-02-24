@extends('backoffice.master')

@section('title', 'Add Payment')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD PAYMENT
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
                            <form action="{{ route('backoffice.invoice.log.store', $payment) }}" class="row clearfix" method=POST>

                                @csrf

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Amount</label>

                                        <div class="form-line">
                                            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'amount'])
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Payment Type</label>

                                        <div class="form-line">
                                            <select id="effect" name="effect" class="form-control" v-model="selectedCategory">

                                                @foreach ([

                                                    'Deduction' => 'deduction',
                                                    'Increase' => 'increase',

                                                ] as $key => $effect)

                                                    <option value="{{ $effect }}"
                                                    @if ( old('effect') == $effect )
                                                        checked
                                                    @endif>
                                                        {{ $key }}
                                                    </option>

                                                @endforeach

                                            </select>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'effect'])
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Payment Method</label>

                                        <div class="form-line">
                                            <select id="method" name="method" class="form-control">

                                                @foreach ([

                                                    'Paypal' => 'paypal',
                                                    'Offline' => 'offline',

                                                ] as $key => $method)

                                                    <option value="{{ $method }}"
                                                    @if ( old('method') == $method )
                                                        checked
                                                    @endif>
                                                        {{ $key }}
                                                    </option>

                                                @endforeach

                                            </select>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'method'])
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>

                                        <div class="form-line">
                                            <textarea name="reason" class="form-control">{{ old('reason') }}</textarea>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'reason'])
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">
                                        ADD
                                    </button>
                                    <a href="{{ route('backoffice.invoice.log.index', compact('payment')) }}" class="btn btn-danger">
                                        CANCEL
                                    </a>
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