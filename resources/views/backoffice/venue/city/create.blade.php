@extends('backoffice.master')

@section('title', 'Add City | ' . ucfirst($venue->country))

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD NEW CITY
                            </h2>

                            <a class="pull-right" style="cursor: pointer;"
                                onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <form class="form-horizontal" action="{{ route('backoffice.venue.city.store', $venue) }}"
                                method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">Name</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Venue City" value="{{ old('name') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'name',
                                            ])
                                        </div>
                                    </div>
                                </div>

                                <!--===== added for image and description ====-->

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label ">
                                        <label for="cover"> Add Image</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">

                                            <div class="form-line">
                                                <input type="file" class="form-control" name="cover" accept="image/*">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'cover',
                                            ])
                                        </div>
                                    </div>
                                </div>

                                <!-- Introduction -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="description"> Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="">
                                                <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>

                                                @include('backoffice.partials.alerts.form_error', [
                                                    'field' => 'description',
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--==== end of addition ====-->

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
            <!-- #END#  -->

        </div>
    </section>
@endsection
