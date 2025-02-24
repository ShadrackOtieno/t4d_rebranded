@extends('backoffice.master')

@section('title', "Add Industry")

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD INDUSTRY
                            </h2>
                        </div>
                        
                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.service_industries.store')}}" method="post" enctype="multipart/form-data">

                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="cover_image">Name</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="name" class="form-control" placeholder="Industry Name" value="{{ old('name') }}">
                                                    </div>

                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="cover_image">Cover Image</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input name="cover_image" type="file" id="cover_image">
                                                    </div>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'cover_image'])

                                                <div class="col-md-6 mb-2">
                                                    <img id="preview-image-before-upload" src=""
                                                         alt="preview image" style="max-height: 250px;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="description">Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                                <div class="">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                    <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="group_training_description">Group Training Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                                <div class="">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'group_training_description'])
                                                    <textarea name="group_training_description" class="ckeditor">{{ old('group_training_description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="team_building_description">Team Building Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                                <div class="">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'team_building_description'])
                                                    <textarea name="team_building_description" class="ckeditor">{{ old('team_building_description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="services_description">Services by Capability Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                                <div class="">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'services_description'])
                                                    <textarea name="services_description" class="ckeditor">{{ old('services_description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="software_description">Software Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                                <div class="">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'software_description'])
                                                    <textarea name="software_description" class="ckeditor">{{ old('software_description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="tours_description">Tours Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                                <div class="">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'tours_description'])
                                                    <textarea name="tours_description" class="ckeditor">{{ old('tours_description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>

                                        <div class="">
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {
            // Select the file input element
            const bannerImageInput = $('#cover_image');

            // Function to set the initial image
            function setInitialImage() {
                if (bannerImageInput[0].files.length > 0) {
                    const reader = new FileReader();

                    reader.onload = (e) => {
                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(bannerImageInput[0].files[0]);
                }
            }

            // Set the initial image when the page loads
            setInitialImage();

            // Attach the change event listener
            bannerImageInput.change(function() {
                setInitialImage();
            });
        });


    </script>

@endsection
