@extends('backoffice.master')

@section('title', "Face to Face Schedule | $course->name")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                {{ strtoupper($course->name) }} FACE TO FACE SCHEDULE
                            </h2>

                            <a href="{{ route('backoffice.course.edit', $course) }}" class="pull-right">
                                Back to course
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.course.physical_class.create', $course) }}">
                                        <span>Add Schedule</span>
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
                                                <th>Venue</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Cost</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($classes as $schedule)
                                                <tr>
                                                    <td>{{ $schedule->id }}</td>
                                                    <td>{{ "$schedule->city, $schedule->country" }}</td>
                                                    <td>{{ date('F j Y', strtotime($schedule->from)) }}</td>
                                                    <td>{{ date('F j Y', strtotime($schedule->to)) }}</td>
                                                    <td>
                                                        USD
                                                        {{ number_format( @$schedule->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('backoffice.course.physical_class.edit', [

                                                            'course' => $course,
                                                            'physical_class' => $schedule,
                                                            
                                                        ]) }}" class="btn btn-sm btn-secondary">Edit</a>

                                                        &nbsp;

                                                        <form class="form-action" action="{{ route('backoffice.course.physical_class.destroy', [

                                                            'course' => $course,
                                                            'physical_class' => $schedule,
                                                            
                                                        ]) }}" method="post">
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
                                                    <td colspan="6" class="text-center">
                                                        No schedule available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $classes->links('backoffice.partials.pagination') }}
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