@extends('backoffice.master')

@section('title', 'Program Bookings')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PROGRAM BOOKINGS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                @can('export_data')
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" target="_blank" href="#">
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
                                                <th>Phone</th>
                                                <th>Learning Mode</th>
                                                <th>Other Participants</th>
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
                                                        {{ $booking->personal_email }}
                                                    </td>
                                                    <td>
                                                        {{ $booking->phone }}
                                                    </td>
                                                    <td>{{$booking->learning_mode}}</td>
                                                    <td>{{ $booking->participants->count() }}</td>
                                                    <td>
                                                        {{ $booking->created_at->format('F j Y') }}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('backoffice.programs.bookings.show', $booking->id)}}" class="btn btn-sm btn-secondary">View</a>
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
