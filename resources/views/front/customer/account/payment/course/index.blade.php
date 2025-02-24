@extends('front.master')

@section('title', "Payments | {$booking->course->name} | Registered Courses")

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <!-- home -->
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <span">
                    <a href="{{ route('customer.account.course.index') }}">
                        Registered Courses
                    </a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">
                    {{ $booking->course->name }}
                </span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')

                        <div class="tab-pane fade show active" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
                            <p>This is a list of all the payments for {{ $booking->course->name }}.</p>
                            <div class="table-responsive">
                                <table class="table table-sm table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">Invoice No</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->id }}</td>
                                                <td>
                                                    {{ $payment->currency }}
                                                    {{ $payment->effect == 'increase' ? '' : '-' }}
                                                    {{  number_format($payment->amount) }}
                                                </td>
                                                <td>{{ ucfirst($payment->status) }}</td>
                                                <td>
                                                    {{ $payment->created_at->format('F j Y') }}
                                                </td>
                                                <td>
                                                    {{ ucfirst($payment->method) }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="td-ma-btn" href="{{ route('customer.account.course.payment.show', compact('booking', 'payment')) }}">
                                                        View Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    No payments.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{ $payments->links() }}
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
