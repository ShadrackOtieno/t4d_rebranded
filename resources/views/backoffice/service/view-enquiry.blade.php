@extends('backoffice.master')

@section('title', 'Enquiry Details')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ENQUIRY DETAILS
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
                                    <form>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="full_name">Full Name:</label>
                                                <input type="text" name="full_name" class="form-control" placeholder="" value="{{ $enquiry->full_name }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="email">Email:</label>
                                                <input type="text" name="email" class="form-control" placeholder="" value="{{ $enquiry->email }}" disabled>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="service_id">Service Enquired:</label>
                                                <input type="text" name="service_id" class="form-control" placeholder="" value="{{ $enquiry->service->name }}" disabled>
                                            </div>
                                        </div>

                                        <!-- Meaage -->

                                        <label>Message:</label>

                                        <div class="">
                                            <textarea name="message" class="form-control" disabled>{{ $enquiry->message }}</textarea>
                                        </div>
                                        <!-- End -->

                                        <hr/>
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
