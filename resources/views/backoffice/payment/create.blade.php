@extends('backoffice.master')

@section('title', "Create an Invoice ")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                INVOICE DETAILS
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
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form action="{{ route('backoffice.invoice.store') }}" method="post" id="schedule-form">

                                                @csrf

                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="group" value="Yes">
                                                        <label class="form-check-label" for="mySwitch">Group Registration</label>
                                                      </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="subcategory_id">Subcategory</label>

                                                    <div class="form-line">
                                                        <select id="subcategory_id" name="subcategory_id" class="form-control" v-model="selectedSubcategory">
                                                            <option v-for="(subcategory, index) in subcategories" :key="subcategory-index" :value="subcategory.id">
                                                                @{{ subcategory.name }}
                                                            </option>
                                                        </select>
                                                    </div>

                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'subcategory_id'])
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-text">
                                                                Course <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="form-line">
                                                                <select v-on:change="filterSchedules($event)" class="form-control" name="course" v-model="selectedCourse">
                                                                        <option v-for="(course, index) in courses"
                                                                        :key="course-index" :value="course.id">@{{course.name}}</option>
                                                                </select>

                                                                @include('front/partials/form_error', ['field' => 'course'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-text">
                                                                Primary Contact <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="form-line">

                                                                <div class="form-line">
                                                                    <select class="form-control select2" name="primary_contact" required>
                                                                        <option value="">Select Customer</option>
                                                                        @foreach (App\Customer::all() as $customer)
                                                                            <option value="{{ $customer->id }}">{{ $customer->company->name ?? '' }} : {{ $customer->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                @include('front/partials/form_error', ['field' => 'customer'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-text">
                                                                Customer(s) <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="form-line">

                                                                <div class="form-line">
                                                                    <select class="form-control select2" name="customer[]" multiple="multiple" required>
                                                                        @foreach (App\Customer::all() as $customer)
                                                                            <option value="{{ $customer->id }}">{{ $customer->company->name ?? '' }} : {{ $customer->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                @include('front/partials/form_error', ['field' => 'customer'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-text">
                                                                Company <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="form-line">
                                                                <input class="form-control" placeholder="Company Name" name="company" list="companies" value="{{ old('company') }}" required>

                                                                <datalist id="companies">
                                                                    @foreach (App\Company::where('status', 'Approved')->get() as $company)
                                                                        <option value="{{ $company->name }}">
                                                                    @endforeach
                                                                </datalist>

                                                                @include('front/partials/form_error', ['field' => 'company'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Payment Method <span class="text-danger">*</span></label>

                                                            <div class="form-line">
                                                                <select class="form-control" name="payment_method" required>
                                                                    <option value="">Select Method</option>
                                                                    <option value="offline">Offline</option>
                                                                    @include('front/partials/form_error', ['field' => 'payment_method'])
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Currency <span class="text-danger">*</span></label>

                                                            <div class="form-line">
                                                                <select class="form-control" name="currency" required>
                                                                    <option value="">Select Currency</option>
                                                                    @foreach (App\Currency::select('code')->distinct()->get() as $currency)
                                                                        <option value="{{ $currency->code }}">{{ $currency->code }}</option>
                                                                    @endforeach
                                                                    @include('front/partials/form_error', ['field' => 'currency'])
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Invoice Amount(per customer)</label>

                                                            <div class="form-line">
                                                                <input type="text" placeholder="Amount" name="amount" class="form-control" value="{{old('amount')}}">
                                                                @include('front/partials/form_error', ['field' => 'amount'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="header clearfix">
                                                    <h2 class="pull-left">APPROVING AUTHORITY</h2>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-text text-muted">
                                                                Full Name
                                                            </label>
                                                            <div class="form-line">
                                                                <input class="form-control" placeholder="Name" name="authority_name" list="authorities" value="{{ old('authority_name') }}">

                                                                <datalist id="authorities">
                                                                    @foreach (App\ApprovedAuthority::all() as $authority)
                                                                        <option value="{{ $authority->name }}">
                                                                    @endforeach
                                                                </datalist>

                                                                @include('front/partials/form_error', ['field' => 'authority_name'])
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-text text-muted">
                                                                Phone Number
                                                            </label>
                                                            <div class="form-line">
                                                                <input class="form-control" placeholder="Phone" name="authority_phone" value="{{ old('authority_phone') }}">
                                                                @include('front/partials/form_error', ['field' => 'authority_phone'])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email Address</label>

                                                            <div class="form-line">
                                                                <input type="text" placeholder="Email" name="authority_email" list="emails" class="form-control" value="{{ old('authority_email') }}">

                                                                <datalist id="emails">
                                                                    @foreach (App\ApprovedAuthority::all() as $mail)
                                                                        <option value="{{ $mail->email }}">
                                                                    @endforeach
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Designation (Job Title) </label>

                                                            <div class="form-line">
                                                                <input type="text" placeholder="Designation" name="authority_designation" class="form-control" value="{{ old('authority_designation') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="header clearfix">
                                                    <h2 class="pull-left">SCHEDULE INFORMATION</h2>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Select Schedule</label>

                                                            <div class="form-line">
                                                                <select class="form-control" name="schedule"  v-model="selectedSchedule">
                                                                    <option v-for="(schedule, index) in schedules" :key="index" :value="schedule.id">
                                                                        @{{ schedule.city.name }}: (Start Date: @{{ schedule.from }} - End Date: @{{ schedule.to }})
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p>Create New Schedule</p>
                                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                            <span class="input-group-addon">From</span>
                                                            <div class="form-line">
                                                                <input type="date" class="form-control" placeholder="Date start..." name="from" value="{{ old('from') }}" min="{{ date('Y-m-d') }}">
                                                            </div>

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'from'])

                                                            <span class="input-group-addon">to</span>
                                                            <div class="form-line">
                                                                <input type="date" class="form-control" placeholder="Date end..." name="to" value="{{ old('to') }}" min="{{ date('Y-m-d') }}">
                                                            </div>

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'to'])
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <select class="form-control show-tick" name="city_id" v-model="selectedCity">
                                                                    <option>-- Select Venue --</option>
                                                                    <option v-for="(city, index) in cities" :key="index" :value="city.id">
                                                                        @{{ city.name }}
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'city_id'])
                                                        </div>

                                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                            <template v-for="(currency, index) in currencies">
                                                                <span class="input-group-addon">
                                                                    @{{ currency.code.toUpperCase() }}
                                                                </span>

                                                                <div class="form-line">
                                                                    <input type="number" class="form-control" :name="`${currency.code}-currency-amount`">
                                                                </div>
                                                            </template>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Tax</label>

                                                            <div class="form-line">
                                                                <input type="number" name="tax" class="form-control" placeholder="Tax Percentage" :value="tax" readonly>
                                                            </div>

                                                            @include('backoffice.partials.alerts.form_error', ['field' => 'tax'])
                                                        </div>

                                                        <input type="hidden" class="form-control" name="booking_start" value="{{ date('Y-m-d') }}">
                                                        <input type="hidden" class="form-control" name="booking_end" value="{{ date('Y-m-d') }}">
                                                    </div>

                                                </div>

                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success">
                                                        CREATE INVOICE(S)
                                                    </button>
                                                </div>

                                            </form>
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

@push('scripts')
    <script src="{{ asset('backoffice/assets/js/vue-2.6.11.js') }}"></script>

    <script>
        new Vue({

            el: '#schedule-form',

            data: () => ({
                schedules : [],
                cities: @json( App\City::with('venue.currencies')->get() ),
                selectedCity: @json( old('city_id') ),
                selectedCourse: @json( old('course') ),
                selectedSchedule: @json( old('schedule') ),

                selectedSubcategory: @json( old('subcategory_id') ),
                subcategories: @json( App\Subcategory::with('courses')->get() ),
            }),

            created() {
                this.selectedCity = Array.isArray(this.cities) && this.cities.length ? this.selectedCity || this.cities[0].id : undefined;
                this.selectedSubcategory = Array.isArray(this.subcategories) && this.subcategories.length ? this.selectedSubcategory || this.subcategories[0].id : undefined;
            },

            computed: {
                currencies() {

                    return this.selectedCity ? this.cities.find(city => city.id == this.selectedCity).venue.currencies : [];
                },

                tax() {

                    return this.cities.find(city => city.id == this.selectedCity).venue.tax;
                },

                courses() {
                    return this.selectedSubcategory ? this.subcategories.find(subcategory => subcategory.id == this.selectedSubcategory).courses : [];
                }
            },

            methods:{
                filterSchedules(event) {
                    console.log(event.target.value);
                    axios.get('/backoffice/course-schedules?course=' + event.target.value).then(response => this.schedules = response.data);
                }
            }
        });
    </script>
@endpush
