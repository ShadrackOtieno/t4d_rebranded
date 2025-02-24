@extends('backoffice.master')

@section('title', "$tour->name Bookings")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                {{ strtoupper($tour->name) }} BOOKINGS
                            </h2>
                            <a href="{{ route('backoffice.tour.index') }}" class="pull-right">
                                Back to tours
                            </a>
                        </div>

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                @can('export_data')
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" target="_blank" href="{{ route('backoffice.tour.booking.export', compact('tour')) }}">
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
                                                <th>Customer</th>
                                                <th>E-mail Address</th>
                                                <th>Application Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bookings as $booking)  
                                                <tr>
                                                    <td>{{ $booking->id }}</td>
                                                    <td>{{ $booking->name }}</td>
                                                    <td>
                                                        {{ $booking->email }}
                                                    </td>
                                                    <td>
                                                        {{ $booking->created_at->format('F j Y') }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('backoffice.tour.booking.show', compact('tour', 'booking')) }}" class="btn btn-sm btn-secondary">
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No booking available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $bookings->links('backoffice.partials.pagination') }}
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