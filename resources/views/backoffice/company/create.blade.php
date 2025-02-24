@extends('backoffice.master')

@section('title', 'Add Company')

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            ADD COMPANY
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

                                <form action="{{ route('backoffice.company.store') }}" id="company-form" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-group">
                                        <label>Name: </label>
                                        <div class="form-line">
                                            <input class="form-control" placeholder="XYZ Company" name="name" value="{{old('name')}}" required>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="segment_id">Segment</label>

                                            <div class="form-line">
                                                <select id="segment_id" name="segment_id" class="form-control" v-model="selectedSegment">
                                                    <option v-for="(segment, index) in segments" :key="segment-index" :value="segment.id">
                                                        @{{ segment.name }}
                                                    </option>
                                                </select>
                                            </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'segment_id'])
                                    </div>

                                    <div class="form-group">
                                        <label for="sector_id">Sector</label>

                                            <div class="form-line">
                                                <select id="sector_id" name="sector_id" class="form-control" v-model="selectedSector">
                                                    <option v-for="(sector, index) in sectors" :key="sector-index" :value="sector.id">
                                                        @{{ sector.name }}
                                                    </option>
                                                </select>
                                            </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'sector_id'])
                                    </div>

                                    <div class="form-group">
                                        <label for="subsector_id">
                                            Subsector
                                        </label>

                                        <div class="form-line">
                                            <select id="subsector_id" name="subsector_id" class="form-control" v-model="selectedSubsector">
                                                <option v-for="(subsector, index) in subsectors" :key="subsector-index" :value="subsector.id">
                                                    @{{ subsector.name }}
                                                </option>
                                            </select>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'subsector_id'])
                                    </div>

                                    <div class="form-group">
                                        <label for="industry_id">
                                            Industry
                                        </label>

                                        <div class="form-line">
                                            <select id="industry_id" name="industry_id" class="form-control" v-model="selectedIndustry">
                                                <option v-for="(industry, index) in industries" :key="index" :value="industry.id">
                                                    @{{ industry.name }}
                                                </option>
                                            </select>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'industry_id'])
                                    </div>

                                    <div class="form-group">
                                        <label>Logo: </label>
                                        <div class="form-line">
                                            <input class="form-control" type="file" name="logo"  value="{{old('logo')}}" required>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'logo'])
                                    </div>

                                    <div class="form-group">
                                        <label>Office Address: </label>
                                        <div class="form-line">
                                            <input class="form-control" name="office_address" placeholder="1 Tesla Road Austin, TX 78725" value="{{old('office_address')}}" required>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'office_address'])
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                                                <label>Country: </label>
                                                <div class="form-line">
                                                    <select class="form-control" name="country" required>
                                                        @php $user_country = 'Kenya'; @endphp
                                                        @foreach ([

                                                                "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"

                                                            ] as $country)

                                                            <option value="{{ $country }}"
                                                                    @if ( old('country', $user_country) == $country ) selected @endif> {{ $country }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'country'])
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                                                <label>City: </label>
                                                <div class="form-line">
                                                    <input class="form-control" name="city" placeholder="Nairobi" value="{{old('city')}}" required>
                                                </div>
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'city'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status: </label>
                                        <div class="form-line">
                                            <select class="form-control" name="status" required>
                                                <option selected value="">Select Status</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Viewed">Viewed</option>
                                                <option value="Duplicated">Duplicated</option>
                                            </select>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'status'])
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            Save
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
</section>
@endsection


@push('scripts')
    <script src="{{ asset('backoffice/assets/js/vue-2.6.11.js') }}"></script>

    <script>
        new Vue({

            el: '#company-form',

            data: () => ({
                segments: @json( App\Segment::with('sectors.subsectors.industries')->get() ),
                selectedSegment: @json( old('segment_id') ),
                selectedSector: @json( old('sector_id') ),
                selectedSubsector: @json( old('subsector_id') ),
                selectedIndustry: @json( old('industry_id') ),
            }),

            created() {

                this.selectedSegment = Array.isArray(this.segments) && this.segments.length ? this.selectedSegment || this.segments.find(segment => segment.sectors.length).id : undefined;

                if ( this.selectedSector == null ) {

                    let sector = this.selectedSegment ? this.segments.find(segment => segment.id == this.selectedSegment).sectors[0] : undefined;

                    this.selectedSector = sector ? sector.id : undefined;
                }
            },

            computed: {

                sectors() {

                    return this.selectedSegment ? this.segments.find(segment => segment.id == this.selectedSegment).sectors : [];
                },

                subsectors() {

                    if (this.sectors.length == 0)

                        return [];

                    let sector = this.sectors.find(sector => sector.id == this.selectedSector);

                    return sector ? sector.subsectors : [];
                },
                

                industries() {

                    if (this.subsectors.length == 0)

                        return [];

                    let subsector = this.subsectors.find(subsector => subsector.id == this.selectedSubsector);

                    return subsector ? subsector.industries : [];
                },
            }
        });
    </script>
@endpush