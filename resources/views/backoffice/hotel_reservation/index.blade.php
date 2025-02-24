@extends('backoffice.master')

@section('title', 'Hotel Reservations')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                HOTEL RESERVATIONS
                            </h2>
                        </div>
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                @can('export_data')
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.hotel_reservation.export') }}" target="_blank">
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
                                                <th>Application Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($reservations as $reservation)
                                                <tr>
                                                    <td>{{ $reservation->id }}</td>
                                                    <td>{{ $reservation->name }}</td>
                                                    <td>{{ $reservation->created_at->format('F j Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.hotel_reservation.show', $reservation) }}" class="btn btn-sm btn-success">
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        No hotel reservations found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $reservations->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection