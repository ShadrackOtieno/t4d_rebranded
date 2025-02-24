@extends('backoffice.master')

@section('title', 'View Contact')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                VIEW CONTACT
                            </h2>

                            <a class="pull-right" href="{{ route('backoffice.contact.index') }}">
                                <i class="material-icons" style="font-size: 11px;"> 
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $contact->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail Address</label>

                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $contact->email }}" disabled>
                                        </div>
                                    </div>

                                    <h4>Message</h4>

                                    <p>
                                        {{ $contact->message }}
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