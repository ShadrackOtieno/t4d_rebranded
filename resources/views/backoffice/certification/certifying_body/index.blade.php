@extends('backoffice.master')

@section('title', 'Certifying Bodies')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    @include('backoffice/partials/alerts/response_message')

                    <!-- form -->

                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD NEW CERTIFYING BODY
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;"> 
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        <div class="body">
                            <form class="form-horizontal" action="{{ route('backoffice.certification.certifying_body.store') }}" method="POST" enctype="multipart/form-data">
                                
                                @csrf
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="name" id="name" type="text" class="form-control" placeholder="Certifying Body Name" value="{{ old('name') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="description">Brief Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="description" id="description" class="form-control" placeholder="Brief Description">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="cover">Add Image</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="cover" type="file" id="cover">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'cover'])
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

                    <!-- table -->

                    <div class="card">
                        <div class="header">
                            <h2>
                                CERTIFYING BODIES
                            </h2>
                        </div>

                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">
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
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($certifying_bodies as $certifying_body)
                                                <tr>
                                                    <td>{{ $certifying_body->id }}</td>
                                                    <td>{{ ucfirst($certifying_body->name) }}</td>
                                                    <td>
                                                        <a href="{{ route('backoffice.certification.certifying_body.edit', $certifying_body) }}" class="btn btn-sm btn-success">Edit</a> 

                                                        &nbsp;

                                                        <form class="form-action" action="{{ route('backoffice.certification.certifying_body.destroy', $certifying_body) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete certifying body') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        No certifying body available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $certifying_bodies->links('backoffice.partials.pagination') }}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection