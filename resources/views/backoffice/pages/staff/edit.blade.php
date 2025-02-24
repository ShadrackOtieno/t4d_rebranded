@extends('backoffice.master')

@section('title', 'Edit Staff')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT STAFF
                            </h2>
                        </div>

                        <div class="body">
                            <form class="form-horizontal" action="" method="POST">
                                
                                @csrf
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="first_name">First Name</label>
                                    </div>
                                    
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="first_name" id="first_name" type="text" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'first_name'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="last_name">Last Name</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'last_name'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">E-mail Address</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="email" id="email" type="text" class="form-control" placeholder="E-mail Address" value="{{ old('email') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'email'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="phone">Phone Number</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone Contact" value="{{ old('phone') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'phone'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="role">Role</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="category" name="category" class="form-control show-tick">
                                                    <option value="value"
                                                    @if ( old('role') == 'value')
                                                        selected
                                                    @endif>Administrator</option>
                                                    <option value="value"
                                                    @if ( old('role') == 'value')
                                                        selected
                                                    @endif>Accounts</option>
                                                    <option value="value"
                                                    @if ( old('role') == 'value')
                                                        selected
                                                    @endif>Trainer</option>
                                                    <option value="value"
                                                    @if ( old('role') == 'value')
                                                        selected
                                                    @endif>Staff</option>
                                                </select>
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'role'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
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
