@extends('backoffice.master')

@section('title', 'Edit Project')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                Edit Project:  {{$project->name}}
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.projects.update', $project)}}" method="post" id="course-form" enctype="multipart/form-data">

                                        <div>

                                            @csrf
                                            @method('PATCH')

                                            <div class="form-group">
                                                <label>Name:</label>
                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" placeholder="Project Name" value="{{$project->name}}" required>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>

                                            <div class="form-group">
                                                <label>Company: </label>
                                                <div class="form-line">
                                                    <select class="form-control" name="company">
                                                        <option selected value="{{$project->company_id}}">{{$project->company_id}}</option>
                                                    </select>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'status'])
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Start Date:</label>
                                                        <div class="form-line">
                                                            <input type="date" name="start_date" class="form-control" value="{{$project->start_date}}">
                                                        </div>

                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'start_date'])
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>End Date:</label>
                                                        <div class="form-line">
                                                            <input type="date" name="end_date" class="form-control" value="{{$project->end_date}}">
                                                        </div>

                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'end_date'])
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Status: </label>
                                                        <div class="form-line">
                                                            <select class="form-control" name="status" required>
                                                                <option selected value="In Progress">In Progress</option>
                                                            </select>
                                                        </div>

                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'status'])
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cost Estimate:</label>
                                                        <div class="form-line">
                                                            <input type="number" name="cost_estimate" class="form-control" placeholder="0.00" value="{{$project->cost_estimate}}" required>
                                                        </div>

                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'cost_estimate'])
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Description -->

                                            <label>Description:</label>

                                            <div class="">
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>
                                            </div>
                                            <!-- End -->

                                            <hr/>

                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    SAVE
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->

        </div>
    </section>
@endsection
