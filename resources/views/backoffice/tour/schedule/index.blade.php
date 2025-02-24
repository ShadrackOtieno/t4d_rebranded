@extends('backoffice.master')

@section('title', 'Tour Schedules')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    @include('backoffice/partials/alerts/response_message')

                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">ADD TOUR SCHEDULE</h2>

                            <a class="dt-button buttons-html5 pull-right " tabindex="0" href="{{ route('backoffice.tour.edit', $tour) }}">
                                <span>Back to tour</span>
                            </a>
                        </div>
                        <div class="body">
                            <form action="{{ route('backoffice.tour.schedule.store', $tour) }}" method="POST">

                                @csrf

                                <div class="form-group">
                                    <label for="from">
                                        Start Date
                                    </label>

                                    <div class="form-line">
                                        <input type="date" name="from" id="from" class="form-control" placeholder="from" value="{{ old('from') }}" min="{{ date('Y-m-d') }}">
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'from'])
                                </div>

                                <div class="form-group">
                                    <label for="to">
                                        End Date
                                    </label>

                                    <div class="form-line">
                                        <input type="date" name="to" id="to" class="form-control" placeholder="to" value="{{ old('to') }}" min="{{ date('Y-m-d') }}">
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'to'])
                                </div>

                                <div class="form-group">
                                    <label for="booking_end">
                                        Booking End Date
                                    </label>

                                    <div class="form-line">
                                        <input type="date" name="booking_end" id="booking_end" class="form-control" placeholder="booking_end" value="{{ old('booking_end') }}" min="{{ date('Y-m-d') }}">
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'booking_end'])
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-success">
                                        ADD
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ strtoupper($tour->name) }} TOUR SCHEDULES
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
                                                <th>ID</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Booking Deadline Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($schedules as $schedule)
                                                <tr>
                                                    <td>{{ $schedule->id }}</td>
                                                    <td>
                                                        {{ date('F j Y', strtotime($schedule->from)) }}
                                                    </td>
                                                    <td>
                                                        {{ date('F j Y', strtotime($schedule->to)) }}
                                                    </td>
                                                    <td>
                                                        {{ date('F j Y', strtotime($schedule->booking_end)) }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('backoffice.tour.schedule.edit', compact('tour', 'schedule')) }}" class="btn btn-sm btn-success">
                                                            Edit
                                                        </a> 
                                                        
                                                        &nbsp; 
                                                        
                                                        <form class="form-action" action="{{ route('backoffice.tour.schedule.destroy', compact('tour', 'schedule')) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete schedule') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No tour schedule available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $schedules->links('backoffice.partials.pagination') }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection