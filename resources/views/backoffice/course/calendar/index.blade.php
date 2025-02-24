@extends('backoffice.master')

@section('title', 'Training Calendar')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Training Calendar
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.course.calendar.create') }}">
                                        <span>Add Calendar</span>
                                    </a>
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
                                                <th>Year</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($calendars as $calendar)
                                                <tr>
                                                    <td>{{ $calendar->id }}</td>
                                                    <td>{{ ucfirst($calendar->year) }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.course.calendar.edit', $calendar) }}" class="btn btn-sm btn-success">Edit</a> 
                                                        &nbsp;
                                                        <form class="form-action" action="{{ route('backoffice.course.calendar.destroy', $calendar) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete calendar') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        No calendars available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $calendars->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection