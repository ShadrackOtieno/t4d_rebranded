@extends('backoffice.master')

@section('title', "Add Service")

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD SERVICE
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
                                    <form action="{{route('backoffice.services.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Service Name:</label>
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Service Name" value="">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                        </div>

                                        {{-- <div class="form-group">
                                            <div class="form-line">
                                                <label for="industry_id">Industry:</label>
                                                <select class="form-control select2" name="industry_id[]" multiple>
                                                    <option value="">Select Industry</option>
                                                    @foreach(App\ServiceIndustry::all() as $industry)
                                                        <option value="{{ $industry->id }}"> {{ $industry->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'industry_id'])
                                        </div> --}}

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="industry_id">Capability:</label>
                                                <select class="form-control select2" name="capability_id" >
                                                    <option value="">Select Capability</option>
                                                    @foreach(App\ServiceCapability::all() as $capability)
                                                        <option value="{{ $capability->id }}"> {{ $capability->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'capability_id'])
                                        </div>

                                        <label>Banner Description:</label>

                                        <div class="">
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'banner_description'])
                                            <textarea name="banner_description" class="ckeditor">{{ old('banner_description') }}</textarea>
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
                                                ADD
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
