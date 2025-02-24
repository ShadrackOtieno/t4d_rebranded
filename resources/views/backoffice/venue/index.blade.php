@extends('backoffice.master')

@section('title', 'Locations')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LOCATIONS
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.venue.create') }}">
                                        <span>Add Location</span>
                                    </a>
                                    @can('export_data')
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.venue.export') }}" target="_blank">
                                        <span>Export to Excel</span>
                                    </a>
                                    @endcan
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
                                                <th>Country</th>
                                                <th>E-mail Address</th>
                                                <th>Phone</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($venues as $venue)
                                                <tr>
                                                    <td>{{ $venue->id }}</td>
                                                    <td>{{ ucfirst($venue->country) }}</td>
                                                    <td>{{ $venue->email }}</td>
                                                    <td>{{ $venue->phone }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.venue.currency.index', $venue) }}" class="btn btn-sm btn-primary">Currencies</a> 

                                                        &nbsp;
                                                        
                                                        <a href="{{ route('backoffice.venue.city.index', $venue) }}" class="btn btn-sm btn-secondary">Cities</a> 

                                                        &nbsp; 

                                                        <a href="{{ route('backoffice.venue.edit', $venue) }}" class="btn btn-sm btn-success">Edit</a> 

                                                        &nbsp; 

                                                        @can('delete_location')
                                                        <form class="form-action" action="{{ route('backoffice.venue.destroy', $venue) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete location') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        No locations available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $venues->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection