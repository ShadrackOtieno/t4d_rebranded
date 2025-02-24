@extends('backoffice.master')

@section('title', 'Invoice Details')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                INVOICE DETAILS
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
                            <form action="{{ route('backoffice.invoice.update', $payment) }}" class="row clearfix" method=POST>

                                @csrf
                                @method('PUT')

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>{{ $payment->service }}</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $payment->service_name }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Customer</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $payment->customer->name ?? @$payment->item->customer->name }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            Application Date
                                        </label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $payment->item->created_at->format('F j Y') }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Payment Method</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $payment->method }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Status</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ ucfirst($payment->status) }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Amount ({{ $payment->item->currency_code ?? '' }})</label>

                                        <div class="form-line">
                                            <input type="text" name="amount" class="form-control" value="{{ number_format($payment->amount) }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Payment Received</label>

                                        <div class="form-line">
                                            <input type="date" name="date_received" class="form-control" value="{{ old('date_received', $payment->date_received) }}"
                                            @if ($payment->method == 'paypal')
                                                disabled
                                            @endif>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Payment Approved</label>

                                        <div class="form-line">
                                            <input type="date" name="date_approved" class="form-control" value="{{ old('date_approved', $payment->date_approved) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">
                                        UPDATE
                                    </button>
                                    <a href="{{ route('backoffice.invoice.show', $payment) }}" class="btn btn-secondary" target="_blank">
                                        VIEW INVOICE
                                    </a>
                                    <a href="{{ route('backoffice.invoice-letter', $payment) }}" class="btn btn-secondary" target="_blank">
                                        INVITATION LETTER
                                    </a>
                                    <a href="{{ route('backoffice.invoice.mail.show', compact('payment')) }}" class="btn btn-primary">
                                        SEND INVOICE
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PAYMENT LOGS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Records Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ $payment->item->paymentLogs()->count() }}
                                            </td>
                                            <td>
                                                <a href="{{ route('backoffice.invoice.log.index', compact('payment')) }}" class="btn btn-sm btn-secondary">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
