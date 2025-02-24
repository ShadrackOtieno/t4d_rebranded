@extends('backoffice.master')

@section('title', 'Add Tour')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD NEW TOUR
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

                                    <form action="{{ route('backoffice.tour.store') }}" method="post" enctype="multipart/form-data" id="tour-form">

                                        <div v-if="categories.length && cities.length">

                                            @csrf

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>

                                            <div class="form-group">
                                                <label for="country">Country</label>

                                                <div class="form-line">
                                                    <select id="country" name="country" class="form-control" v-model="selectedCountry">
                                                        <option v-for="(venue, index) in venues" :key="index" :value="venue.country">
                                                            @{{ venue.country }}
                                                        </option>
                                                    </select>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'country'])
                                            </div>

                                            <div class="form-group">
                                                <label for="city">City</label>

                                                <div class="form-line">
                                                    <select id="city" name="city" class="form-control" v-model="selectedCity">
                                                        <option v-for="(city, index) in cities" :key="index" :value="city.name">
                                                            @{{ city.name }}
                                                        </option>
                                                    </select>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'city'])
                                            </div>

                                            <div class="form-group">
                                                <label for="category_id">Category</label>

                                                <div class="form-line">
                                                    <select id="category_id" name="category_id" class="form-control" v-model="selectedCategory">
                                                        <option v-for="(category, index) in categories" :key="category-index" :value="category.id">
                                                            @{{ category.name }}
                                                        </option>
                                                    </select>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'category_id'])
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

                                            <div class="form-group">
                                                <label for="industry_id">Industry:</label>
                                                <select class="form-control select2" name="industries" id="industry_id" multiple>
                                                    @foreach(App\ServiceIndustry::all() as $industry)
                                                        <option value="{{ $industry->id }}"> {{ $industry->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="checkbox" name="readily_available" id="readily_available" class="filled-in chk-col-red"
                                                @if ( old('readily_available') )
                                                    checked
                                                @endif>

                                                <label for="readily_available">
                                                    Readily Available
                                                </label>
                                            </div>

                                            <div class="dates" id="set_schedule"
                                            @if ( old('from') == null )
                                                style="display: none"
                                            @endif>
                                                <div class="form-group">
                                                    <label for="from">
                                                        Start Date
                                                    </label>

                                                    <div class="form-line">
                                                        <input type="date" name="from" id="from" class="form-control" placeholder="from" value="{{ old('from') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="to">
                                                        End Date
                                                    </label>

                                                    <div class="form-line">
                                                        <input type="date" name="to" id="to" class="form-control" placeholder="to" value="{{ old('to') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="booking_end">
                                                        Booking End Date
                                                    </label>

                                                    <div class="form-line">
                                                        <input type="date" name="booking_end" id="booking_end" class="form-control" placeholder="booking_end" value="{{ old('booking_end') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="minimum_no_people">Minimum No.of People</label>

                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="minimum_no_people" value="{{ old('minimum_no_people') }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'minimum_no_people'])
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
                                                <label for="itinerary">
                                                    Tax
                                                </label>

                                                <div class="form-line">
                                                    <input type="number" name="tax" class="form-control" placeholder="Tax Percentage" value="{{ old('tax') }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'tax'])
                                            </div>

                                            <div class="form-group">
                                                <label for="itinerary">
                                                    Itinerary Document
                                                </label>

                                                <div class="form-line">
                                                    <input type="file" id="itinerary" class="form-control" name="itinerary">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'itinerary'])
                                            </div>

                                            <div class="form-group">
                                                <input type="checkbox" name="featured" id="featured" class="filled-in chk-col-red"
                                                @if ( old('featured') )
                                                    checked
                                                @endif>

                                                <label for="featured">
                                                    Mark as featured
                                                </label>
                                            </div>

                                            <!-- Description -->

                                            <label>Description:</label>

                                            <div class="">
                                                <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>
                                            </div>
                                            <!-- End -->

                                            <h4>Add Itinerary</h4>

                                            <div class="">
                                                <textarea name="itinerary_desc" class="ckeditor">{{ old('itinerary_desc') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="cover">Tour Image</label>

                                                <div class="form-line">
                                                    <input type="file" id="cover" class="form-control" name="cover">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'cover'])
                                            </div>

                                            <div class="form-group">
                                                <label for="gallery">Gallery</label>

                                                <div class="form-line">
                                                    <input type="file" id="gallery" class="form-control" name="gallery[]" multiple accept="image/*">
                                                </div>
                                            </div>

                                            <hr/>

                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    ADD
                                                </button>
                                            </div>

                                        </div>

                                        <div v-else>
                                            <p>
                                                Proceed to create categories with subcategories and venues before adding a tour.
                                            </p>

                                            Create
                                            <a href="{{ route('backoffice.tour.category.create') }}">
                                                categories
                                            </a>
                                            or
                                            <a href="{{ route('backoffice.venue.create') }}">
                                                venues
                                            </a>
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
                selectedCategory: @json( old('category_id') ),
                selectedSubcategory: @json( old('subcategory_id') ),
                venues: @json( App\Venue::with(['cities', 'currencies'])->get() ),
                selectedCountry: @json( old('country') ),
                selectedCity: @json( old('city') ),
            }),

            created() {

                this.selectedCategory = Array.isArray(this.categories) && this.categories.length ? this.selectedCategory || this.categories[0].id : undefined;

                if ( this.selectedSubcategory == null ) {

                    let subcategory = this.selectedCategory ? this.categories.find(category => category.id == this.selectedCategory).subcategories[0] : undefined;

                    this.selectedSubcategory = subcategory ? subcategory.id : undefined;
                }

                this.selectedCountry = this.selectedCountry || (Array.isArray(this.venues) && this.venues.length ? this.venues[0].country : undefined);

                this.selectedCity = this.selectedCity || (Array.isArray(this.venues) && this.venues.length ? this.venues[0].cities[0].name : undefined);
            },

            computed: {

                subcategories() {

                    return this.selectedCategory ? this.categories.find(category => category.id == this.selectedCategory).subcategories : [];
                },

                cities() {

                    return Array.isArray(this.venues) && this.venues.length ? this.venues.find(venue => venue.country == this.selectedCountry).cities : [];
                },

                currencies() {

                    return Array.isArray(this.venues) && this.venues.length ? this.venues.find(venue => venue.country == this.selectedCountry).currencies : [];
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
