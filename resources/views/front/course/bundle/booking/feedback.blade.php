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
                    <a href="{{ route('course.certification.show', $booking->courseBundle) }}">
                        {{ $booking->courseBundle->name }}
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
                    <div class="container">
                        <div>
                            <p>
                                Thank you for registering for <b>{{ $booking->courseBundle->name }}</b>.
                            </p>
                        </div>
                    </div>
    
                    <h5>Course</h5>
    
                    <table class="table table-bordered">
                        <tr>
                            <td>Course</td>
                            <td>{{ $booking->courseBundle->name }}</td>
                        </tr>
                        <tr>
                            <td>Schedule</td>
                            <td>
                                <ul>
                                    <li>Start: {{ date('F j Y', strtotime($booking->schedule->from)) }}</li>
                                    <li>End: {{ date('F j Y', strtotime($booking->schedule->to)) }}</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>
                                @switch($booking->schedule_type)
    
                                    @case('physical')
                                        Face to Face
                                        @break
    
                                    @case('virtual')
                                        Virtual
                                        @break
                                        
                                @endswitch
                            </td>
                        </tr>
                    </table>
    
                    <h5>Personal Information</h5>
    
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td>{{ "$booking->salutation $booking->name" }}</td>
                        </tr>
                        <tr>
                            <td>Personal E-mail</td>
                            <td>{{ $booking->personal_email }}</td>
                        </tr>
                        <tr>
                            <td>Work E-mail</td>
                            <td>{{ $booking->work_email }}</td>
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
                        <tr>
                            <td>Company</td>
                            <td>{{ $booking->company->name }}</td>
                        </tr>
                    </table>
    
                    <h5>Approving Authority</h5>
                    
                    @if ( $booking->approvedAuthority )
                        <table class="table table-bordered">
                            <tr>
                                <td>Name</td>
                                <td>{{ $booking->approvedAuthority->name }}</td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td>{{ $booking->approvedAuthority->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{ $booking->approvedAuthority->phone }}</td>
                            </tr>
                            <tr>
                                <td>Company</td>
                                <td>{{ $booking->approvedAuthority->company->name }}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td>{{ $booking->approvedAuthority->designation }}</td>
                            </tr>
                        </table>
                    @else  
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2">
                                    No approving authority
                                </td>
                            </tr>
                        </table> 
                    @endif
    
                    <h5>Participants</h5>
    
                    <table class="table table-bordered">
                        @forelse ($booking->participants as $participant)  
                            <tr>
                                <td colspan="2">
                                    {{ $loop->iteration }}
                                </td>
                            </tr>  
                            <tr>
                                <td>Name</td>
                                <td>{{ $participant->name }}</td>
                            </tr>
                            <tr>
                                <td>E-mail Address</td>
                                <td>{{ $participant->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{ $participant->phone }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">
                                    No participants
                                </td>
                            </tr>
                        @endforelse
                    </table>
    
                    <h5>Recommended Tours</h5>
    
                    <table class="table table-bordered">
                        @forelse ($booking->tours as $tour)
                            <tr>
                                <td colspan="2">
                                    {{ $loop->iteration }}
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $tour->name }}</td>
                            </tr>
                            <tr>
                                <td>Participants</td>
                                <td>{{ $tour->pivot->participants }}</td>
                            </tr>
                            <tr>
                                <td>Cost per Person</td>
                                <td>
                                    {{ $booking->currency }} {{ number_format($tour->pivot->cost) }}
                                </td>
                            </tr>    
                        @empty
                            <tr>
                                <td colspan="2">
                                    No tours
                                </td>
                            </tr>
                        @endforelse
                    </table>
    
                    <h5>Recommended Software</h5>
    
                    <table class="table table-bordered">
                        @forelse ($booking->software as $software)
                            <tr>
                                <td colspan="2">
                                    {{ $loop->iteration }}
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $software->name }}</td>
                            </tr>
                            <tr>
                                <td>Licenses</td>
                                <td>{{ $software->pivot->licenses }}</td>
                            </tr>
                            <tr>
                                <td>Cost per License</td>
                                <td>{{ $software->pivot->cost ? 'Price will be invoiced' : number_format($software->cost) }}</td>
                            </tr>    
                        @empty
                            <tr>
                                <td colspan="2">
                                    No software
                                </td>
                            </tr>
                        @endforelse
                    </table>
    
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
                                {{ $booking->currency }} {{ number_format($booking->booking_cost) }}
                            </td>
                        </tr>  
                        <tr>
                            <td>Tour Cost</td>
                            <td>
                                {{ $booking->currency }} {{ number_format($booking->tours_cost) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Software Cost</td>
                            <td>
                                {{ $booking->currency }} {{ number_format($booking->software_cost) }}
                            </td>
                        </tr>
                        <tr>
                            <td>VAT</td>
                            <td>
                                {{ $booking->schedule->tax }}%
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>
                                {{ $booking->currency }} {{ number_format($booking->total_cost) }}
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