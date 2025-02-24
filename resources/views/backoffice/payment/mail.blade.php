@extends('backoffice.master')

@section('title', 'Mail Invoice')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                SEND INVOICE TO CUSTOMER
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;"> 
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <form action="{{ route('backoffice.invoice.mail.send', compact('payment')) }}" class="row clearfix" method=POST>

                                @csrf

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Enter Your Message</label>

                                        <div class="form-line">
                                            <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'message'])
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">
                                        SUBMIT
                                    </button>
                                    <a href="{{ route('backoffice.invoice.edit', compact('payment')) }}" class="btn btn-danger">
                                        CANCEL
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->            
        </div>
    </section>
@endsection