@extends('backoffice.master')

@section('title', 'Bookings')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CUSTOM COURSE BOOKINGS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">

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
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Participants</th>
                                            <th>Organization</th>
                                            <th>Requested Start Date</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($booked_dates as $booking)
                                            <tr>
                                                <td>{{ $booking->full_name }}</td>
                                                <td>
                                                    {{ $booking->course_id }}
                                                </td>
                                                <td>
                                                    {{ $booking->phone_number }}
                                                </td>
                                                <td>
                                                    {{ $booking->email }}
                                                </td>
                                                <td>
                                                    {{ $booking->organization }}
                                                </td>
                                                <td>
                                                    {{ $booking->number_of_participants }}
                                                </td>
                                                <td>
                                                    {{ $booking->start_date }}
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-secondary">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No bookings made
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>

                                    {{ $booked_dates->links('backoffice.partials.pagination') }}
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
