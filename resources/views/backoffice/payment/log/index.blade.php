@extends('backoffice.master')

@section('title', "Invoice $payment->id Payment Logs")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                INVOICE {{ $payment->id }} PAYMENT LOGS
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
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.invoice.edit', compact('payment')) }}">
                                        <span>Back to invoice details</span>
                                    </a>
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.invoice.log.create', compact('payment')) }}">
                                        <span>Add Payment</span>
                                    </a>
                                </div>

                                <div class="dataTables_filter">
                                    <form action="{{ url()->current() }}" method="GET">
                                        <label>
                                            Search:
                                            <input name="search" type="search" class="form-control input-sm" value="{{ request()->query('search') }}">
                                        </label>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Payment Method</th>
                                                <th>Payment Effect</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($logs as $log)
                                                <tr>
                                                    <td>
                                                        {{ $log->id }}
                                                    </td>
                                                    <td>
                                                        {{ ucfirst($log->method) }}
                                                    </td>
                                                    <td>
                                                        {{ ucfirst($log->effect) }}
                                                    </td>
                                                    <td>
                                                        {{ $log->currency }}
                                                        {{ number_format($log->amount) }}
                                                    </td>
                                                    <td>
                                                        {{ ucfirst($log->status) }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('backoffice.invoice.log.edit', compact('payment', 'log')) }}" class="btn btn-sm btn-success">Edit</a>

                                                        &nbsp;

                                                        <form class="form-action" action="{{ route('backoffice.invoice.log.destroy', compact('payment', 'log')) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete payment') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        No payment logs
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $logs->links('backoffice.partials.pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection