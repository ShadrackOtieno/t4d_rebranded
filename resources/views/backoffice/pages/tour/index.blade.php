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

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('frontend.admin.tour.create') }}">
                                        <span>Add Tour</span>
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
                                                <th>Name</th>
                                                <th>Location</th>
                                                <th>Cost</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Tsavo</td>
                                                <td>
                                                    Voi, Kenya
                                                </td>
                                                <td>
                                                    1000
                                                </td>
                                                <td>
                                                    <a href="{{ route('frontend.admin.tour.booking.index') }}" class="btn btn-sm btn-secondary">
                                                        Bookings
                                                    </a> 
                                                    
                                                    &nbsp;

                                                    <a href="{{ route('frontend.admin.tour.edit') }}" class="btn btn-sm btn-success">
                                                        Edit
                                                    </a> 
                                                    
                                                    &nbsp; 
                                                    
                                                    <a class="btn btn-sm btn-danger">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    {{-- @include('backoffice.partials.pagination') --}}
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