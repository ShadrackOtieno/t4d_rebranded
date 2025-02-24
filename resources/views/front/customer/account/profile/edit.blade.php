@extends('front.master')

@section('title', 'Edit Account')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <!-- home -->
                <span">
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">My Account</span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')

                        <div class="tab-content" id="nav-tabContent">
                            <form action="{{ route('customer.account.profile.update') }}" method="POST" class="tab-pane fade show active" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">

                                @csrf
                                @method('PUT')

                                <!-- personal details -->
                                <p>Edit your personal information</p>

                                <div class="reg-sec">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <small class="form-text text-muted">Salutation</small>
                                            <select class="form-control" name="salutation">
                                                @foreach ([
                                                    'Mr.', 'Mrs.', 'Miss.', 'Dr.', 'Eng.', 'Prof.'
                                                ] as $title)

                                                    <option
                                                    @if ( old('salutation', $customer->salutation) == $title )
                                                        selected
                                                    @endif>
                                                        {{ $title }}
                                                    </option>

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <small class="form-text text-muted">First Name</small>
                                            <input type="text" class="form-control" placeholder="Your First Name" name="first_name" value="{{ old('first_name', $customer->first_name) }}">

                                            @include('front/partials/form_error', ['field' => 'first_name'])
                                        </div>
                                        <div class="form-group col-md-4">
                                            <small class="form-text text-muted">Last Name</small>
                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name', $customer->last_name) }}">

                                            @include('front/partials/form_error', ['field' => 'last_name'])
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <small class="form-text text-muted">Designation</small>
                                            <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{ old('designation', $customer->designation) }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <small class="form-text text-muted">Company</small>

                                            <input class="form-control" name="company" list="companies" value="{{ old('company', $customer->company->name) }}" placeholder="Company">

                                            <datalist id="companies">
                                                @foreach (App\Company::all() as $company)  
                                                    <option value="{{ $company->name }}">
                                                @endforeach
                                            </datalist>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <small class="form-text text-muted">Select Country</small>
                                            <select class="form-control" name="country">
                                                @foreach (App\Venue::all() as $venue)

                                                    <option value="{{ $venue->country }}"
                                                    @if ( old('country', $customer->country) == $venue->country )
                                                        selected
                                                    @endif>
                                                        {{ $venue->country }}
                                                    </option>

                                                @endforeach
                                            </select>
                                        </div><!-- dropdown of all countries in the world -->
                                        <div class="form-group col-md-6">
                                            <small class="form-text text-muted">Phone Number</small>
                                            <input type="tel" class="form-control" placeholder="Phone Number" name="phone" value="{{ old('phone', $customer->phone) }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <small class="form-text text-muted">Work Email Address</small>
                                            <input type="tel" class="form-control" placeholder="Work Email Address" name="work_email" value="{{ old('work_email', $customer->work_email) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="reg-btn">
                                    <button class="btn btn-success" type="submit">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                            
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection