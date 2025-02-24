@extends('backoffice.master')

@section('title', 'Details | Trainer Application')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TRAINER APPLICATION DETAILS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $trainer_application->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail Address</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $trainer_application->email }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $trainer_application->phone }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Country</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $trainer_application->country }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>City</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $trainer_application->city }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            Area of Specialization
                                        </label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $trainer_application->specialization }}" disabled>
                                        </div>
                                    </div>

                                    @if ( $trainer_application->document ) 
                                        <div class="form-group">
                                            <label>
                                                <a href="{{ route('backoffice.trainer_application.resume', $trainer_application) }}" target="_blank">
                                                    Download Document
                                                </a>
                                            </label>

                                            <div class="form-line">
                                                <input type="text" class="form-control" value="Resume file" disabled>
                                            </div>
                                        </div>
                                    @endif

                                    <h4>Comment</h4>

                                    <p>
                                        {{ $trainer_application->comment }}
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