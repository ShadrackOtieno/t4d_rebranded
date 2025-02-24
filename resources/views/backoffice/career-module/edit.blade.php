@extends('backoffice.master')

@section('title', 'Update Vacancy')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                UPDATE VACANCY
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
                            <h4>Please fix the errors below</h4>
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
                                    <form action="{{route('backoffice.career-modules.update', $career)}}" method="post" id="course-form" enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Title"> Job Title</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
                                                        <input type="text" name="title" class="form-control" placeholder="Job Title" value="{{ old('title') ?? $career->Job_title }}" id="Title">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Department">Department</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'department'])
                                                    <select class="form-control select2" name="department" id="department">
                                                        @php
                                                            $options = ['Accounts & Finance', 'Learning & Development', 'Human Resources',
                                                                        'Customer Success Executive','Training Officer',
                                                                        'Digital Marketing','IT, Design & Development'];
                                                            foreach($options AS $option){
                                                                if($career->Department == $option){
                                                                    echo "<option value='$option' selected>$option</option>";
                                                                }else{
                                                                    echo "<option value='$option'>$option</option>";
                                                                }
                                                            }
                                                        @endphp
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Job_Category">Job Category</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'Job_Category'])
                                                    <select class="form-control select2" name="Job_Category" id="Job_Category">
                                                        @php
                                                            $options = ['Careers', 'Internship', 'Consultant'];
                                                            foreach($options AS $option){
                                                                if($career->Category == $option){
                                                                    echo "<option value='$option' selected>$option</option>";
                                                                }else{
                                                                    echo "<option value='$option'>$option</option>";
                                                                }
                                                            }
                                                        @endphp
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="experience" class="form-label">Years of Experience</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'experience'])
                                                    <input type="number" class="form-control" name="experience" id="experience"
                                                    style="border: 0.5px solid gray; border-radius: 5px;" value="
                                                    {{ old('experience') ?? $career->Experience }}"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Job_Description">Job Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'Job_description'])
                                                        <textarea name="Job_description" class="ckeditor" id="Job_description">{!! old('Job_description') ?? $career->Description !!}</textarea>                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="requirements">Job Requirements</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'requirements'])
                                                        <textarea name="requirements" class="ckeditor" id="requirements">{{ old('requirements') ?? $career->Requirements }}</textarea>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="date">Apply Before</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <div class="form-line">

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'date'])

                                                            <input type="date" class="form-control" placeholder="Date start..." name="date" value="{{ old('date') ?? $career->Apply_before }}" min="{{ date('Y-m-d') }}">
                                                        </div>           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End -->

                                        <hr/>

                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                UPDATE
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
