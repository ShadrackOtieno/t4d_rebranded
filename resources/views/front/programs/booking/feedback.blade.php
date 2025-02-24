@extends('front.master')

@section('title', "Thank you for registering")

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <span class="bc-sep"></span>
                <span>
                    <a href="#">
                        {{$booking->program->name}}
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">
                    Registeration Feedback
                </span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content row">
                <div class="col-sm-6 offset-sm-3">
                    <p>
                        Thank you for registering for <b>
                        {{$booking->program->name}}</b>.
                    </p>

                    <h4 class="text-center">Program Booking Summary</h4>

                    <table class="table table-bordered">
                        <tr>
                            <td>Program</td>
                            <td>{{$booking->program->name}}</td>
                        </tr>
                        <tr>
                            <td>Schedule</td>
                            <td>
                                <ul>
                                    <li>Start: {{ date('j M Y', strtotime($booking->program->s->where('start_date', '>=', now())->first()->start_date ?? Now()))}}</li>
                                    <li>Duration: {{ $booking->program->s->where('start_date', '>=', now())->first()->duration ?? 0}} Week(s), 4-6 hours per day</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Mode of Learning</td>
                            <td>mode of learning</td>
                        </tr>
                        <tr>
                            <td>Program Module</td>
                            <td>Program Module</td>
                        </tr>
                    </table>

                    <h5>Personal Information</h5>

                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td>{{$booking->name}}</td>
                        </tr>
                        <tr>
                            <td>Personal E-mail</td>
                            <td>{{ $booking->personal_email }}</td>
                        </tr>
                        <tr>
                            <td>Work E-mail</td>
                            <td>{{ $booking->personal_email }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $booking->phone }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ $booking->country }}</td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td>{{ $booking->designation }}</td>
                        </tr>
                    </table>

                    <!-- <h5>Participants</h5>

                    <table class="table table-bordered">
                    </table> -->


                    <h5>Payment Details</h5>

                    <table class="table table-bordered">
                        <tr>
                            <td>Payment Method</td>
                            <td>{{ $booking->payment_method }}</td>
                        </tr>
                        <tr>
                            <td>
                                Training Cost
                            </td>
                            <td>
                                ..
                            </td>
                        </tr>
                        <tr>
                            <td>VAT</td>
                            <td>
                                ..
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>
                                ..
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
