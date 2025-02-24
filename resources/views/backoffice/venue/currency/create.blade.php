@extends('backoffice.master')

@section('title', 'Add Currency')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD NEW CURRENCY
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
                            <form class="form-horizontal" action="{{ route('backoffice.venue.currency.store', compact('venue')) }}" method="POST">
                                
                                @csrf
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="code">Currency Code</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="code" id="code" type="text" class="form-control" value="{{ old('code') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'code'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="description">Brief Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="description" id="description" class="form-control" placeholder="Brief Description">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dates">
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="bank_name">Bank Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="bank_name" id="bank_name" type="text" class="form-control" value="{{ old('bank_name') }}">
                                                </div>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'bank_name'])
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="bank_branch">Branch</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="bank_branch" id="bank_branch" type="text" class="form-control" value="{{ old('bank_branch') }}">
                                                </div>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'bank_branch'])
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="bank_account">Account No</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="bank_account" id="bank_account" type="text" class="form-control" value="{{ old('bank_account') }}">
                                                </div>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'bank_account'])
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="account_name">Account Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="account_name" id="account_name" type="text" class="form-control" value="{{ old('account_name') }}">
                                                </div>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'account_name'])
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="swift_code">
                                                Swift Code
                                            </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="swift_code" id="swift_code" type="text" class="form-control" value="{{ old('swift_code') }}">
                                                </div>
                                            </div>
    
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'swift_code'])
                                        </div>
                                    </div>
    
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="bank_code">
                                                Bank Code
                                            </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="bank_code" id="bank_code" type="text" class="form-control" value="{{ old('bank_code') }}">
                                                </div>
                                            </div>
    
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'bank_code'])
                                        </div>
                                    </div>
    
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="branch_code">
                                                Branch Code
                                            </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="branch_code" id="branch_code" type="text" class="form-control" value="{{ old('branch_code') }}">
                                                </div>
                                            </div>
    
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'branch_code'])
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <input type="checkbox" id="tax" name="tax" class="filled-in chk-col-red" style="position: relative;" 
                                            @if ( old('tax') )
                                                checked
                                            @endif>

                                            <label for="tax">
                                                Apply Tax Rate
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">ADD</button>

                                        <a href="{{ route('backoffice.venue.currency.index', $venue) }}" class="btn btn-danger m-t-15 waves-effect">
                                            CANCEL
                                        </a>
                                    </div>
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