@extends('backoffice.master')

@section('title', 'Trainer Issue Details')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TRAINER ISSUE DETAILS
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Customer</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $trainer_issue->customer->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Trainers</label>

                                        <div class="form-line">
                                            @foreach ($trainer_issue->trainers as $trainer)
                                                <div>
                                                    <a href="{{ route('backoffice.staff.edit', $trainer) }}">
                                                        {{ $trainer->name }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Course</label>

                                        <div class="form-line">
                                            @switch ($trainer_issue->booking_type)

                                                @case ('App\CourseBooking')
                                                    <a href="{{ route('backoffice.course.edit', $trainer_issue->booking->course_id) }}">
                                                        {{ $trainer_issue->booking->course->name }}
                                                    </a>
                                                    @break;

                                                @case ('App\CourseBundleBooking')
                                                    <a href="{{ route('backoffice.course.bundle.edit', $trainer_issue->booking->course_bundle_id) }}">
                                                        {{ $trainer_issue->booking->courseBundle->name }}
                                                    </a>
                                                    @break;
                                                       
                                            @endswitch
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ ucfirst($trainer_issue->status) }}" disabled>
                                        </div>
                                    </div>

                                    <h4>Message</h4>

                                    <p>
                                        {{ ucfirst($trainer_issue->message) }}
                                    </p>

                                    @if ($trainer_issue->status == 'not resolved')

                                        &nbsp;

                                        <form class="form-action" action="{{ route('backoffice.trainer_issue.resolve', $trainer_issue) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button onclick="return confirm('Are you sure to resolve issue') ? true : false" type="submit" class="btn btn-sm btn-success">
                                                Resolve
                                            </button>
                                        </form>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->
            
        </div>
    </section>
@endsection