@extends('backoffice.master')

@section('title', 'Cities | ' . ucfirst($venue->country))

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VENUE A CITIES
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')
                        
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.venue.city.create', $venue) }}">
                                        <span>Add City</span>
                                    </a>

                                    @can('export_data')
                                    <a class="dt-button buttons-html5" tabindex="0" target="_blank" href="{{ route('backoffice.venue.city.export', $venue) }}">
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
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($cities as $city)
                                                <tr>
                                                    <td>{{ $city->id }}</td>
                                                    <td>{{ ucfirst($city->name) }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.venue.city.edit', compact('venue', 'city')) }}" class="btn btn-sm btn-success">Edit</a> 
                                                        
                                                        &nbsp; 

                                                        @can('delete_location')
                                                        <form class="form-action" action="{{ route('backoffice.venue.city.destroy', compact('venue', 'city')) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete city') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        No cities available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $cities->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection