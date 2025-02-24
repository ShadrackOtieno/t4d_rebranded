@extends('backoffice.master')

@section('title', 'Tours')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TOURS
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="dt-buttons">
                                    @can('create_edit_tours')
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.tour.create') }}">
                                        <span>Add Tour</span>
                                    </a>
                                    @endcan
                                    @can('export_data')
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.tour.export') }}" target="_blank">
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
                                                <th>Location</th>
                                                <th>Cost</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tours as $tour)
                                                <tr>
                                                    <td>{{ $tour->id }}</td>
                                                    <td>{{ ucfirst($tour->name) }}</td>
                                                    <td>
                                                        {{ ucfirst($tour->city . ',') }}
                                                        {{ ucfirst($tour->country) }}
                                                    </td>
                                                    <td>
                                                        USD {{ number_format( @$tour->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
                                                    </td>
                                                    <td>
                                                        @can('view_leads')
                                                        <a href="{{ route('backoffice.tour.booking.index', $tour) }}" class="btn btn-sm btn-secondary">
                                                            Bookings
                                                        </a> 
                                                        @endcan
                                                        
                                                        &nbsp;
                                                        
                                                        @can('create_edit_tours')
                                                        <a href="{{ route('backoffice.tour.edit', $tour) }}" class="btn btn-sm btn-success">
                                                            Edit
                                                        </a> 
                                                        @endcan
                                                        
                                                        &nbsp; 

                                                        @can('delete_tours')
                                                        <form class="form-action" action="{{ route('backoffice.tour.destroy', $tour) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete tour') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No tours available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $tours->links('backoffice.partials.pagination') }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection