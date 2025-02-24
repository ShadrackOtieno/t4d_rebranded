@extends('backoffice.master')

@section('title', 'Invoices')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INVOICES
                            </h2>
                        </div>

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                @can('create_invoices')
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{route('backoffice.invoice.create')}}">
                                        <span>Create Invoice</span>
                                    </a>
                                </div>
                                @endcan
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
                                                <th>Name</th>
                                                <th>Customer</th>
                                                <th>Amount (USD)</th>
                                                <th>Application Date</th>
                                                <th>Group</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($payments as $payment)
                                                <tr>
                                                    <td>
                                                        {{ $payment->id }}
                                                    </td>
                                                    <td>
                                                        {{ $payment->service }}

                                                        <br>

                                                        {{ $payment->service_name }}
                                                    </td>
                                                    <td>
                                                        {{ $payment->customer->name ?? @$payment->item->customer->name }}
                                                    </td>
                                                    <td>
                                                        {{ number_format($payment->amount) }}
                                                    </td>
                                                    <td>
                                                        {{ $payment->created_at->format('F j Y') }}
                                                    </td>
                                                    <td>{{ $payment->group_registration }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.invoice.edit', $payment) }}" class="btn btn-sm btn-success">View</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        No invoices available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $payments->links('backoffice.partials.pagination') }}
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
