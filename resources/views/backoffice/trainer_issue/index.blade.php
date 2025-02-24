@extends('backoffice.master')

@section('title', 'Trainer Issue')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TRAINER ISSUE
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')
                        
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                {{-- <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.trainer_issue.export') }}" target="_blank">
                                        <span>Export to Excel</span>
                                    </a>
                                </div> --}}

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
                                                <th>Trainers</th>
                                                <th>Course</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($trainer_issues as $trainer_issue)
                                                <tr>
                                                    <td>{{ $trainer_issue->id }}</td>
                                                    <td>{{ $trainer_issue->customer }}</td>
                                                    <td>{{ $trainer_issue->trainers->map( function ($trainer) {
                                                        return $trainer->name;
                                                    })->join(', ', ' and ') }}</td>
                                                    <td>
                                                        {{ @$trainer_issue->booking->{ $trainer_issue->booking_type == 'App\CourseBooking' ? 'course' : 'courseBundle'}->name }}
                                                    </td>
                                                    <td>{{ ucwords($trainer_issue->status) }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.trainer_issue.show', $trainer_issue->id) }}" class="btn btn-sm btn-secondary">View</a>

                                                        @if ($trainer_issue->status == 'not resolved')

                                                            &nbsp;

                                                            <form class="form-action" action="{{ route('backoffice.trainer_issue.resolve', $trainer_issue->id) }}" method="post">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button onclick="return confirm('Are you sure to resolve issue') ? true : false" type="submit" class="btn btn-sm btn-success">
                                                                    Resolve
                                                                </button>
                                                            </form>

                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        No staff records
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $trainer_issues->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection