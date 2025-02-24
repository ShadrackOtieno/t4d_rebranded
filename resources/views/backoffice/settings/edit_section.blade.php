@extends('backoffice.master')

@section('title', "About Page Sections")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT SECTION - {{$section->title}}
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <form action="{{route('backoffice.about.sections.update', $section->id)}}" method="post" id="course-form" enctype="multipart/form-data">

                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="title" class="form-control" placeholder="Section Title" value="{{$section->title}}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
                                            </div>

                                            <div class="form-group">
                                                <label for="featured">
                                                    Section Order:
                                                </label>
                                                <select class="form-control" aria-label="Default select example" name="order">
                                                    <option selected value="{{$section->order}}">{{$section->order}}</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>

                                            <!-- Description -->

                                            <label>Description:</label>

                                            <div class="">
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                <textarea name="description" class="ckeditor">{{$section->description}}</textarea>
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
