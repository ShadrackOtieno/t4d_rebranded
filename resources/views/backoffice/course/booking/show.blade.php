@extends('backoffice.master')

@section('title', 'Booking Details')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ $booking->schedule->course->name }} BOOKING DETAILS
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="row clearfix">
                                <form method="POST" action="{{route('backoffice.course.booking.update', $booking->id)}}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Attendance</label>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="attendance">
                                                    <option>{{$booking->attendance ?? 'Registration'}}</option>
                                                    <option>Attended</option>
                                                    <option>Not Attended</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-4">
                                        <button type="submit" class="pull-right btn btn-info">Update Attendance</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Application Date</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $booking->created_at->format('F j Y') }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Start Date</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ date('F j Y', strtotime($booking->schedule->from)) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>End Date</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ date('F j Y', strtotime($booking->schedule->to)) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($booking->schedule->period)

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Period</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{ $booking->schedule->period }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                            @if ($booking->schedule->type == 'physical')
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Location</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{ $booking->schedule->city->name}}, {{$booking->schedule->city->venue->country }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <h4>Customer</h4>

                            <hr>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>First Name</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ @$booking->customer->first_name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Last Name</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ @$booking->customer->last_name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>E-mail Address</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ @$booking->customer->account->email ?? $booking->personal_email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Phone Number</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ @$booking->customer->phone ?? $booking->phone }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Company</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $booking->company->name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4>Approving Authority</h4>

                            <hr>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Full Name</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ @$booking->approvedAuthority->name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>E-mail Address</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ @$booking->approvedAuthority->email }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Phone Number</label>
                                </div>

                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ @$booking->approvedAuthority->phone }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PARTICIPANTS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>E-mail Address</th>
                                        <th>Attendance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($booking->group == 'Yes')
                                        @forelse ($booking->bookingParticipants as $participant)
                                            <tr>
                                                <td>{{ $participant->id }}</td>
                                                <td>{{ $participant->customer->name ?? ''}}</td>
                                                <td>{{ $participant->customer->work_email ?? ''}}</td>
                                                <td>Registration</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    No participants.
                                                </td>
                                            </tr>
                                        @endforelse
                                    @else

                                        @forelse ($booking->participants as $participant)
                                            <tr>
                                                <td>{{ $participant->id }}</td>
                                                <td>{{ $participant->name }}</td>
                                                <td>{{ $participant->email }}</td>
                                                <td>Registration</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    No participants.
                                                </td>
                                            </tr>
                                        @endforelse
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                RECOMMENDED SOFTWARE
                            </h2>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($booking->software as $software)
                                        <tr>
                                            <td>{{ $software->id }}</td>
                                            <td>{{ $software->name }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                No software
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                RECOMMENDED TOURS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Cost</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($booking->tours as $tour)
                                        <tr>
                                            <td>{{ $tour->id }}</td>
                                            <td>{{ $tour->name }}</td>
                                            <td>
                                                {{ $tour->city}}, {{$tour->country }}
                                            </td>
                                            <td>
                                                {{ number_format($tour->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                No tours
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PAYMENT DETAILS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Payment Date</th>
                                            <th>Confirmation Date</th>
                                            <th>Amount</th>
                                            <th>Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>April 2nd 2020</td>
                                            <td>April 14th 2020</td>
                                            <td>
                                                2000
                                            </td>
                                            <td>
                                                M-Pesa
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
@endsection
