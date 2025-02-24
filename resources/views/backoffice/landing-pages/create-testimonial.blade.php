@extends('backoffice.master')

@section('title', 'Add Landing Page Testimonial')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                {{$landing_page->subcategory->name}} Landing Page
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')
                        
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <h4>Please fix below errors</h4>
                            <ul style="list-style: none">
                                @foreach ($errors->all() as $error)
                                    <li><strong>Oh Snap! </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.testimonials.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                                        @csrf

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="name">Landing Page</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <select class="form-control select2" name="landing_page_id" id="landing_page_id">
                                                        @foreach($landing_pages as $page)
                                                            <option value="{{ $page->id }}">{{ $page->subcategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'landing_page_id'])
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="cover">Customer's Name and Organization</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="name_organization" class="form-control" placeholder="Organization Name" value="{{ old('name_organization') }}">
                                                    </div>
                                                </div>
        
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name_organization'])
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="cover">Message</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'message'])
                                                        <textarea name="message" class="ckeditor">{{ old('message') }}</textarea>                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="banner_image">Profile Image</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input name="banner_image" type="file" id="banner_image">
                                                    </div>
                                                </div>
        
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'banner_image'])
                                                
                                                <div class="col-md-6 mb-2">
                                                    <img id="preview-image-before-upload" src=""
                                                        alt="preview image" style="max-height: 250px;">
                                                </div>
                                            </div>
                                        </div>

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
            <!-- #END#  -->

        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script type="text/javascript">
      
    $(document).ready(function (e) {
     
       
       $('#banner_image').change(function(){
                
        let reader = new FileReader();
     
        reader.onload = (e) => { 
     
          $('#preview-image-before-upload').attr('src', e.target.result); 
        }
     
        reader.readAsDataURL(this.files[0]); 
       
       });
       
    });
     
    </script>
