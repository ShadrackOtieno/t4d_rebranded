@extends('backoffice.master')

@section('title', 'Edit Payment')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT PAYMENT
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
                            <form action="{{ route('backoffice.invoice.log.update', compact('payment', 'log')) }}" class="row clearfix" method=POST>

                                @csrf
                                @method('PUT')

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Amount</label>

                                        <div class="form-line">
                                            <input type="number" name="amount" class="form-control" value="{{ old('amount', floor($log->amount)) }}">
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
                                                    @if ( old('effect', $log->effect) == $effect )
                                                        selected 
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
                                                    @if ( old('method', $log->method) == $method )
                                                        selected
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
                                        <label>Status</label>

                                        <div class="form-line">
                                            <select id="status" name="status" class="form-control">

                                                @foreach ([

                                                    'Completed' => 'completed',
                                                    'Pending' => 'pending',

                                                ] as $key => $status)

                                                    <option value="{{ $status }}"
                                                    @if ( old('status', $log->status) == $status )
                                                        selected
                                                    @endif>
                                                        {{ $key }}
                                                    </option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Date Received</label>

                                        <div class="form-line">
                                            <input type="date" name="date_received" class="form-control" value="{{ old('date_received', $log->date_received) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Date Confirmed</label>

                                        <div class="form-line">
                                            <input type="date" name="date_approved" class="form-control" value="{{ old('date_approved', $log->date_approved) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Give Reason</label>

                                        <div class="form-line">
                                            <textarea name="reason" class="form-control">{{ old('reason', $log->reason) }}</textarea>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'reason'])
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">
                                        UPDATE
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