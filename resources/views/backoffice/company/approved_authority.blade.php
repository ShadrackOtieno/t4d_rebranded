@extends('backoffice.master')

@section('title', 'Approved Authorities')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                {{ strtoupper($company->name) }} APPROVED AUTHORITIES
                            </h2>

                            <a class="pull-right" tabindex="0" href="{{ route('backoffice.company.edit', $company) }}">
                                Back to company
                            </a>
                        </div>

                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                @can('export_data')
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.company.approved_authority.export', $company) }}" target="_blank">
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Designation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($approved_authorities as $approved_authority)
                                                <tr>
                                                    <td>{{ $approved_authority->id }}</td>
                                                    <td>{{ $approved_authority->name }}</td>
                                                    <td>{{ $approved_authority->email }}</td>
                                                    <td>{{ $approved_authority->phone }}</td>
                                                    <td>{{ $approved_authority->designation }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No approved authorities found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $approved_authorities->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection