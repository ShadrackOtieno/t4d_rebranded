@extends('backoffice.master')

@section('title', 'Profile |New CUSTOMER')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                REGISTER NEW CUSTOMER
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

                            <div class="clearfix">
                                <form method="POST" action="{{route('backoffice.customer.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-text">
                                                Salutation
                                            </label>

                                            <div class="form-line">
                                            <select class="form-control" name="salutation">

                                                @foreach ([
                                                    'Mr.', 'Mrs.', 'Dr.', 'Engr.', 'Prof.', 'Miss'
                                                ] as $salutation)

                                                    <option
                                                    @if ( old('salutation') == $salutation )
                                                        selected
                                                    @endif>

                                                        {{ $salutation }}

                                                    </option>

                                                @endforeach

                                            </select>

                                            @include('front/partials/form_error', ['field' => 'salutation'])
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-text text-muted">
                                                Designation
                                            </label>
                                            <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{ old('designation') }}">
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-text text-muted">
                                                First Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-line">
                                            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" required>

                                            @include('front/partials/form_error', ['field' => 'first_name'])
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-text text-muted">
                                                Last Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required>

                                            @include('front/partials/form_error', ['field' => 'last_name'])
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-text text-muted">
                                                Company <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-line">
                                            <input class="form-control" name="company" list="companies" value="{{ old('company') }}" placeholder="Company" required>

                                            <datalist id="companies">
                                                @foreach (App\Company::where('status', 'Approved')->get() as $company)
                                                    <option value="{{ $company->name ?? ''}}">
                                                @endforeach
                                            </datalist>

                                            @include('front/partials/form_error', ['field' => 'company'])
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-text text-muted">
                                                Select Country
                                            </label>
                                            @php $user_country = 'Kenya' @endphp
                                            <div class="form-line">
                                            <select class="form-control" name="country">
                                                @foreach ([

                                                    "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"

                                                ] as $country)

                                                    <option value="{{ $country }}"
                                                    @if ( old('country', $user_country) == $country )
                                                        selected
                                                    @endif>

                                                        {{ $country }}

                                                    </option>

                                                @endforeach
                                            </select>

                                            @include('front/partials/form_error', ['field' => 'country'])
                                        </div><!-- dropdown of all countries in the world -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-text text-muted">
                                                Phone Number
                                            </label>

                                            <div class="form-line">
                                                <input type="tel" class="form-control" placeholder="Phone Number" name="phone" value="{{ old('phone') }}">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="form-text text-muted">
                                                Personal Email <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-line">
                                            <input type="tel" class="form-control" placeholder="Personal Email" name="email" value="{{ old('email') }}" required>

                                            @include('front/partials/form_error', ['field' => 'email'])
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-text">Work Email<span class="text-danger">*</span></label>
                                                <div class="form-line">
                                                    <input type="tel" class="form-control" placeholder="Work Email" name="work_email" value="{{ old('work_email') }}" required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">
                                                SAVE
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
