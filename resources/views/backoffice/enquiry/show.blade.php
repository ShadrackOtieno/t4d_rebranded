@extends('backoffice.master')

@section('title', 'View Enquiry')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VIEW ENQUIRY
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Course</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ @$enquiry->course->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Name</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $enquiry->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail Address</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $enquiry->email }}" disabled>
                                        </div>
                                    </div>

                                    <h4>Message</h4>

                                    <p>
                                        {{ $enquiry->message }}
                                    </p>
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