@extends('backoffice.master')

@section('title', 'Segments')

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @include('backoffice/partials/alerts/response_message')
                
                <!-- table -->

                <div class="card">
                    <div class="header">
                        <h2>
                            SEGMENTS
                        </h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="window.history.back()">
                            <i class="material-icons" style="font-size: 11px;">
                                arrow_back
                            </i>
                            Go Back
                        </a>
                    </div>

                    <div class="body">

                        <div class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($segments as $segment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucfirst($segment->name) }}</td>
                                            <td>
                                                <a href="{{ route('backoffice.segments.show', $segment) }}" class="btn btn-sm btn-secondary">
                                                    View Sectors
                                                </a>
                                                &nbsp;
                                                <a href="{{ route('backoffice.segment-companies', $segment) }}" class="btn btn-sm btn-primary">
                                                     Companies
                                                </a>
                                                &nbsp;
                                                <a href="{{ route('backoffice.segments.edit', $segment) }}" class="btn btn-sm btn-success">Edit</a>
                                                &nbsp;
                                                @can('delete_companies')
                                                <form class="form-action" action="{{ route('backoffice.segments.destroy', $segment) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure to delete segment') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                No segments available
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- form -->

                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            ADD NEW SEGMENT
                        </h2>
                    </div>

                    <div class="body">
                        <form class="form-horizontal" action="{{ route('backoffice.segments.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="name">Segment Name:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Segment Name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="description">Brief Description:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="description" id="description" class="ckeditor" placeholder="Brief Description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">ADD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# -->

    </div>
</section>
@endsection
