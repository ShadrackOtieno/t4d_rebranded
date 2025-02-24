@extends('backoffice.master')

@section('title', 'Venues')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VENUES
                            </h2>
                        </div>
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('frontend.admin.venue.create') }}">
                                        <span>Add Venue</span>
                                    </a>
                                    @can('export_data')
                                    <a class="dt-button buttons-html5" tabindex="0" href="">
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
                                            <tr>
                                                <td>1</td>
                                                <td>Kenya</td>
                                                <td>mail@example.org</td>
                                                <td>+254 717 258557</td>
                                                <td>
                                                    <a href="{{ route('frontend.admin.venue.city.index') }}" class="btn btn-sm btn-secondary">Cities</a> 

                                                    &nbsp; 

                                                    <a href="{{ route('frontend.admin.venue.edit') }}" class="btn btn-sm btn-success">Edit</a> 

                                                    &nbsp; 

                                                    <form class="form-action" action="" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure to delete item venue') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
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
            <!-- #END# -->
            
        </div>
    </section>
@endsection