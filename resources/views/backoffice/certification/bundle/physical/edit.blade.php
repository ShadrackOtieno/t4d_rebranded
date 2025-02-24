@extends('backoffice.master')

@section('title', "Edit Face to Face Schedule | $bundle->name")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT FACE TO FACE SCHEDULE
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
                                    <form action="{{ route('backoffice.certification_bundle.physical.update', compact('bundle', 'physical')) }}" method="post" id="schedule-form">

                                        @csrf
                                        @method('PUT')
    
                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <span class="input-group-addon">From</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date start..." name="from" value="{{ old('from', $physical->from) }}" min="{{ date('Y-m-d') }}">
                                            </div>
                                            <span class="input-group-addon">to</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date end..." name="to" value="{{ old('to', $physical->to) }}" min="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'from'])
                                        @include('backoffice.partials.alerts.form_error', ['field' => 'to'])

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
                                                    <input type="number" class="form-control" :name="`${currency.code}-currency-amount`" :value="currency.pivot ? currency.pivot.amount : ''">
                                                </div>
                                            </template>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'USD-currency-amount'])

                                        <div class="form-group">
                                            <label>Tax</label>

                                            <div class="form-line">
                                                <input type="number" name="tax" class="form-control" placeholder="Tax Percentage" :value="tax" readonly>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'tax'])
                                        </div>

                                        <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                            <span class="input-group-addon">Booking Ends</span>
                                            <div class="form-line">
                                                <input type="date" class="form-control" placeholder="Date end..." name="booking_end" min="{{ date('Y-m-d') }}" value="{{ old('booking_end', $physical->booking_end) }}" min="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
        
                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                UPDATE
                                            </button>
                                        </div>

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

@push('scripts')
    <script src="{{ asset('backoffice/assets/js/vue-2.6.11.js') }}"></script>

    <script>
        new Vue({

            el: '#schedule-form',
            
            data: () => ({
                
                cities: @json( App\City::with('venue.currencies')->get() ),
                selectedCity: @json( old('city_id', $physical->city_id) )
            }),

            created() {

                this.selectedCity = Array.isArray(this.cities) && this.cities.length ? this.selectedCity || this.cities[0].id : undefined;
            },

            computed: {

                currencies() {

                    return this.selectedCity ? this.cities.find(city => city.id == this.selectedCity).venue.currencies.map(currency => {

                        if ( this.selectedCity == @json($physical->city_id) ) {

                            let scheduleCurrency = @json($physical->currencies).find(({id}) => id == currency.id);

                            currency.pivot = scheduleCurrency ? scheduleCurrency.pivot : null;
                        }

                        return currency;

                    }) : [];
                },

                tax() {

                    return this.cities.find(city => city.id == this.selectedCity).venue.tax;
                },
            }
        });
    </script>
@endpush
