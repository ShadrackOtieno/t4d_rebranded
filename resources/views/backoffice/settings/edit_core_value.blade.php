@extends('backoffice.master')

@section('title', "Edit Core VAlue")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT CORE VALUE - {{$core_value->title}}
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <form action="{{route('backoffice.about.values.update', $core_value->id)}}" method="post" id="course-form" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="title" class="form-control" placeholder="Year" value="{{$core_value->title}}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
                                            </div>

                                            <!-- Description -->

                                            <label>Description:</label>

                                            <div class="">
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                <textarea name="description" class="ckeditor">{{$core_value->description}}</textarea>
                                            </div>
                                            <!-- End -->

                                            <hr/>

                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    SAVE
                                                </button>
                                            </div>
                                    </form>
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
