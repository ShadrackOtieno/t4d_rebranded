@extends('backoffice.master')

@section('title', 'Edit Service')

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            EDIT SERVICE
                        </h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="window.history.back()">
                            <i class="material-icons" style="font-size: 11px;">
                                arrow_back
                            </i>
                            Go Back
                        </a>
                    </div>

                    @include('backoffice/partials/alerts/response_message')

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <form action="{{route('backoffice.services.update', $service)}}" method="post" id="course-form" enctype="multipart/form-data">

                                    @csrf

                                    @method('PUT')

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control" placeholder="Service Name" value="{{ $service->name }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                    </div>


                                    {{-- <div class="form-group">
                                        <div class="form-line">
                                            <label for="industry_id">Industry:</label>
                                            <select class="form-control select2" name="industry_id[]" multiple>
                                                @foreach (App\ServiceIndustry::all() as $industry)
                                                <option value="{{ $industry->id }}"
                                                    @if ( in_array($industry->id, old('industry_id', @$service->industries->modelKeys() ?? [])) )
                                                    selected
                                                    @endif>{{ $industry->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'subsector_id'])
                                    </div> --}}

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="industry_id">Capability:</label>
                                            <select class="form-control select2" name="capability_id" >
                                                <option value="">Select Capability</option>
                                                @foreach(App\ServiceCapability::all() as $capability)
                                                <option value="{{ $capability->id }}"
                                                    @if($capability->id == $service->capability->id) selected @endif> {{ $capability->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'capability_id'])
                                        </div>

                                        <label>Banner Description:</label>

                                        <div class="">
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'banner_description'])
                                            <textarea name="banner_description" class="ckeditor">{{ $service->banner_description }}</textarea>
                                        </div>

                                        <!-- Description -->

                                        <label>Description:</label>

                                        <div class="">
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                            <textarea name="description" class="ckeditor">{{ $service->description }}</textarea>
                                        </div>
                                        <!-- End -->

                                        <hr/>

                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2>
                        Tools Used
                    </h2>

                    @can('create_edit_programs')
                    <div style="padding-top: 5px">
                        <a class="btn btn-primary" href="{{route('backoffice.service.tool', $service->id)}}">
                            <span>Add Tool</span>
                        </a>
                    </div>
                    @endcan
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($service->tools as $tool)
                                <tr>
                                    <td>{{ $tool->tool_name }}</td>
                                    <td>
                                        <a href="{{route('backoffice.service.edit.tool', $tool->id)}}" class="btn btn-sm btn-info">
                                            Edit
                                        </a>

                                        &nbsp;

                                        @can('delete_programs')
                                        <form class="form-action" action="{{route('backoffice.service.delete.tool', $tool->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure you want to delete {{ $tool->tool_name }}') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        No Tools available
                                    </td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- #END#  -->

        </div>
    </section>
    @endsection
