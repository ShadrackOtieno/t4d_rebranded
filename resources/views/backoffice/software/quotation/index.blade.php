@extends('backoffice.master')

@section('title', 'Quotes | Enterprise Systems')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ENTERPRISE SYSTEM QUOTES
                            </h2>
                        </div>
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                @can('export_data')
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.software.quote.export') }}" target="_blank">
                                        <span>Export to Excel</span>
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
                                                <th>Software</th>
                                                <th>Customer</th>
                                                <th>E-mail</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($quotes as $quote)
                                                <tr>
                                                    <td>{{ $quote->id }}</td>
                                                    <td>{{ $quote->software }}</td>
                                                    <td>{{ $quote->name }}</td>
                                                    <td>{{ $quote->email }}</td>
                                                    <td>{{ $quote->phone }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.software.quote.show', $quote) }}" class="btn btn-sm btn-success">
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        No quotes available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $quotes->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection