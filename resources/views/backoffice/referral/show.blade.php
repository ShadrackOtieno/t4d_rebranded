@extends('backoffice.master')

@section('title', 'Referral Details')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REFERRAL DETAILS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Course Link</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ empty($referral->course) ? '' : route('course.show', $referral->course) }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Name</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $referral->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail Address</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $referral->email }}" disabled>
                                        </div>
                                    </div>

                                    <h4>Message</h4>

                                    <p>
                                        {{ $referral->message }}
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