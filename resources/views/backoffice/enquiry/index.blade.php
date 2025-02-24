@extends('backoffice.master')

@section('title', 'Enquiries')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ENQUIRIES
                            </h2>
                        </div>
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                {{-- <div class="dt-buttons">
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.enquiry.export') }}" target="_blank">
                                        <span>Export to Excel</span>
                                    </a>
                                </div> --}}

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
                                                <th>Course</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($enquiries as $enquiry)
                                                <tr>
                                                    <td>{{ $enquiry->id }}</td>
                                                    <td>{{ @$enquiry->item->name }}</td>
                                                    <td>{{ $enquiry->name }}</td>
                                                    <td>{{ $enquiry->email }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.enquiry.show', $enquiry) }}" class="btn btn-sm btn-success">View</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">
                                                        No enquiries found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $enquiries->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection