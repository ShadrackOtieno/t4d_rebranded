@extends('backoffice.master')

@section('title', 'View Referral')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VIEW REFERRAL
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Course Link</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="Sample Course URL" disabled>
                                        </div>
                                    </div>

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

                                    <h4>Message</h4>

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