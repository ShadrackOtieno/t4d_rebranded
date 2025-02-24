@extends('backoffice.master')

@section('title', 'Reviews')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REVIEWS
                            </h2>
                        </div>
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                @can('export_data')
                                <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.review.export') }}" target="_blank">
                                        <span>Export to Excel</span>
                                    </a>
                                </div>
                                @endcan

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
                                                <th>Name</th>
                                                <th>Rating</th>
                                                <th>Service Type</th>
                                                <th>Service Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($reviews as $review)
                                                <tr>
                                                    <td>{{ $review->id }}</td>
                                                    <td>{{ $review->customer->name }}</td>
                                                    <td>{{ $review->rating }}</td>
                                                    <td>
                                                        @switch($review->item_type)

                                                            @case('App\Tour')
                                                                Tour
                                                                @break

                                                            @case('App\Course')
                                                                Course
                                                                @break
                                                                
                                                        @endswitch
                                                    </td>
                                                    <td>{{ $review->item->name }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.review.show', $review) }}" class="btn btn-sm btn-success">View</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        No reviews available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $reviews->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection