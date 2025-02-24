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
                                            <input type="text" class="form-control" value="John Doe" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail Address</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="mail@example.org" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone Number</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="+254 710 001001" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Country</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="Kenya" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>City</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="Nairobi" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            Area of Specialization
                                        </label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="Project Management" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>
                                            <a href="">
                                                Download Document
                                            </a>
                                        </label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="Sample resume file" disabled>
                                        </div>
                                    </div>

                                    <h4>Comment</h4>

                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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