@extends('front.master')

@section('title', 'Hotel Reservations')

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
                <span class="bc-current-page">Hotel Reservations</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')

                        <div class="tab-pane fade show active" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
                            <p>This is a list of all the hotel reservations.</p>
                            <div class="table-responsive">
                                <table class="table table-sm table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Application Date</th>
                                            <th scope="col">Check In</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reservations as $reservation)
                                            <tr>
                                                <td>{{ $reservation->id }}</td>
                                                <td>{{ $reservation->created_at->format('F j Y') }}</td>
                                                <td>{{ date('F j Y', strtotime($reservation->check_in)) }}</td>
                                                <td class="text-center">
                                                    <a class="td-ma-btn" href="{{ route('customer.account.reservation.show', $reservation) }}">
                                                        View Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">
                                                    No hotel reservations.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{ $reservations->links() }}
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
