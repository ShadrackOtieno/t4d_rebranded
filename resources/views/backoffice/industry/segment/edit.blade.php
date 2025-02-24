@extends('backoffice.master')

@section('title', 'Edit Segment | ' . $segment->name)

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT SEGMENT: {{ strtoupper($segment->name) }}
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
                        <form class="form-horizontal" action="{{ route('backoffice.segments.update', $segment) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="name">Segment Name:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Segment Name" value="{{ $segment->name }}">
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
                                            <textarea name="description" id="description" class="ckeditor" placeholder="Brief Description">{{ $segment->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->

        </div>
    </section>
@endsection
