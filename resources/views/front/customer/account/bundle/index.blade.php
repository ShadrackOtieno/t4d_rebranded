@extends('front.master')

@section('title', 'Registered Certifications')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <!-- home -->
                <span">
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">Registered Certifications</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')

                        <div class="tab-pane fade show active" id="nav-course-bundle" role="tabpanel" aria-labelledby="nav-course-bundle-tab">
                            <p>This is a list of all the certifications you have applied for.</p>
                            <div class="table-responsive">
                                <table class="table table-sm table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Application Date</th>
                                            <th scope="col">Fees</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->id }}</td>
                                                <td>{{ $booking->courseBundle->name }}</td>
                                                <td>{{ $booking->created_at->format('F j Y') }}</td>
                                                <td>
                                                    {{ $booking->currency }}
                                                    {{ number_format($booking->schedule_cost) }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="td-ma-btn" href="{{ route('customer.account.certification.show', $booking) }}">
                                                        View Details
                                                    </a>

                                                    &nbsp;

                                                    <a class="td-ma-btn" href="{{ route('customer.account.certification.feedback', $booking) }}">
                                                        Leave a feedback
                                                    </a>

                                                    &nbsp;

                                                    <a class="td-ma-btn" href="{{ route('customer.account.course.payment.index', $booking) }}">
                                                        Payments
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">
                                                    No courses.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{ $bookings->links() }}
                            <!-- END course dates -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
