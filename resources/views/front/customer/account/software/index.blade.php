@extends('front.master')

@section('title', 'Software Quotes')

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
                <span class="bc-current-page">Software Quotes</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')

                        <div class="tab-pane fade show active" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
                            <p>This is a list of all the training courses you applied for.</p>
                            <div class="table-responsive">
                                <table class="table table-sm table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Price</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($software_quotes as $quote)
                                            <tr>
                                                <td>{{ $quote->id }}</td>
                                                <td>{{ $quote->software->name }}</td>
                                                <td>{{ $quote->created_at->format('F j Y') }}</td>
                                                <td>
                                                    {{ $quote->price ? '$' . number_format($quote->price) : 'Sent on invoice' }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="td-ma-btn" href="{{ route('customer.account.software_quote.show', $quote) }}">
                                                        View Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">
                                                    No software quotes.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{ $software_quotes->links() }}
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
