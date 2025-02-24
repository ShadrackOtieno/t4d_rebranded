@extends('backoffice.master')

@section('title', 'View Software Order')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SOFTWARE ORDER DETAILS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label>Software</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="Sample Software" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="50000" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Customer</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="John Doe" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Email Address</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="mail@example.org" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="+254 710 00100" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Date</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="April 1st 2020" disabled>
                                        </div>
                                    </div>
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