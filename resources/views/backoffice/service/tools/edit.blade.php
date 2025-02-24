@extends('backoffice.master')

@section('title', 'Update Service Tool |'. $tool->service->name)

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            Update {{$tool->service->name}} Tool
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
                                <form action="{{ route('backoffice.service.update.tool', $tool->id)}}" method="post">

                                    @csrf
                                    @method('PATCH')
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="tool_name">Tool Name:</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="tool_name" class="form-control" placeholder="Tool Name" value="{{$tool->tool_name}}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'tool_name'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="cover_image">Cover Image:</label>
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
                                            <label for="description">Description:</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                            <div class="">
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                <textarea name="description" class="ckeditor">{{$tool->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End -->

                                    <hr/>

                                    @can('create_edit_programs')
                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            UPDATE
                                        </button>
                                    </div>
                                    @endcan
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

