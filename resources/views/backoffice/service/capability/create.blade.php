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
                                ADD SERVICE BY CAPABILITY
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
                                    <form action="{{route('backoffice.capabilities.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Capability Name:</label>
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Service Name" value="">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                        </div>

                                        <div class="form-group">
                                            <label for="cover_image">Cover Image:</label>
                                            <div class="form-line">
                                                <input name="cover_image" type="file" id="cover_image" accept="image/*">
                                            </div>
                                        
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'cover_image'])
                                        
                                            <div class="">
                                                <img id="preview-image-before-upload" src=""
                                                alt="preview image" style="max-height: 250px; display: none;">
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('cover_image');
            const previewImage = document.getElementById('preview-image-before-upload');
        
            fileInput.addEventListener('change', function () {
                const file = fileInput.files[0];
                if (file) {
                    const reader = new FileReader();
        
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewImage.style.display = 'block'; // Show the preview
                    }
        
                    reader.readAsDataURL(file); // Convert the image file to a data URL
                } else {
                    previewImage.src = '';
                    previewImage.style.display = 'none'; // Hide the preview if no file selected
                }
            });
        });
    </script>
        
@endsection
