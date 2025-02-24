@extends('backoffice.master')

@section('title', "Currencies | $venue->country")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                {{ strtoupper("$venue->country Currencies") }}
                            </h2>

                            <a class="pull-right" href="{{ route('backoffice.venue.index') }}">
                                Back to locations
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')
                        
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.venue.currency.create', $venue) }}">
                                        <span>Add Currency</span>
                                    </a>

                                    @can('export_data')
                                    <a class="dt-button buttons-html5" tabindex="0" target="_blank" href="{{ route('backoffice.venue.currency.export', $venue) }}">
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
                                                <th>Code</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($currencies as $currency)
                                                <tr>
                                                    <td>{{ $currency->id }}</td>
                                                    <td>{{ ucfirst($currency->code) }}</td>
                                                    <td>
                                                        {{ ucfirst($currency->description) }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('backoffice.venue.currency.edit', compact('venue', 'currency')) }}" class="btn btn-sm btn-success">Edit</a> 
                                                        
                                                        &nbsp; 

                                                        @can('delete_location')
                                                        <form class="form-action" action="{{ route('backoffice.venue.currency.destroy', compact('venue', 'currency')) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete currency') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        No currencies available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $currencies->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection