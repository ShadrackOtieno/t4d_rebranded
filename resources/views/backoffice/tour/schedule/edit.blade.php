@extends('backoffice.master')

@section('title', 'Edit Tour Schedule')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT TOUR SCHEDULE
                            </h2>

                            <a class="pull-right" href="{{ route('backoffice.tour.schedule.index', $tour) }}">
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

                                    <form action="{{ route('backoffice.tour.schedule.update', compact('tour', 'schedule')) }}" method="POST">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="from">
                                                Start Date
                                            </label>

                                            <div class="form-line">
                                                <input type="date" name="from" id="from" class="form-control" placeholder="from" value="{{ old('from', $schedule->from) }}" min="{{ date('Y-m-d') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'from'])
                                        </div>

                                        <div class="form-group">
                                            <label for="to">
                                                End Date
                                            </label>

                                            <div class="form-line">
                                                <input type="date" name="to" id="to" class="form-control" placeholder="to" value="{{ old('to', $schedule->to) }}" min="{{ date('Y-m-d') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'to'])
                                        </div>

                                        <div class="form-group">
                                            <label for="booking_end">
                                                Booking End Date
                                            </label>

                                            <div class="form-line">
                                                <input type="date" name="booking_end" id="booking_end" class="form-control" placeholder="booking_end" value="{{ old('booking_end', $schedule->booking_end) }}" min="{{ date('Y-m-d') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'booking_end'])
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

            el: '#tour-form',
            
            data: () => ({
                categories: @json( App\Category::tour()->with('subcategories')->get() ),
                selectedCategory: @json( old('category_id', $tour->category_id) ),
                selectedSubcategory: @json( old('subcategory_id', $tour->subcategory_id) ),
                venues: @json( App\Venue::with(['cities', 'currencies'])->get() ),
                selectedCountry: @json( old('country', $tour->country) ),
                selectedCity: @json( old('city', $tour->city) ),
            }),

            created() {

                this.selectedCategory = this.selectedCategory || this.categories[0].id;
                
                if ( this.selectedSubcategory == null ) {

                    let subcategory = this.selectedCategory ? this.categories.find(category => category.id == this.selectedCategory).subcategories[0] : undefined;

                    this.selectedSubcategory = subcategory ? subcategory.id : undefined;
                }

                this.selectedCountry = this.selectedCountry || this.venues[0].country;
                this.selectedCity = this.selectedCity || this.venues[0].cities[0].name;
            },

            computed: {

                subcategories() {

                    return this.selectedCategory ? this.categories.find(category => category.id == this.selectedCategory).subcategories : [];
                },

                cities() {

                    return this.venues.find(venue => venue.country == this.selectedCountry).cities;
                },

                currencies() {

                    return Array.isArray(this.venues) && this.venues.length ? this.venues.find(venue => venue.country == this.selectedCountry).currencies.map(currency => {

                        if ( this.selectedCountry == @json($tour->country) ) {

                            let scheduleCurrency = @json($tour->currencies).find(({id}) => id == currency.id);

                            currency.pivot = scheduleCurrency ? scheduleCurrency.pivot : null;
                        }

                        return currency;

                    }) : [];
                },
            },

            methods: {

                toggleScheduleDate(event) {

                    let schedule_date_div = document.getElementById("set_schedule");

                    if (event.target.value == 'always_available')
                        schedule_date_div.style.display = 'none';
                    else
                        schedule_date_div.style.display = 'block';
                }
            }
        });
    </script>
@endpush