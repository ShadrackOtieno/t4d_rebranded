<!-- Modal -->
<div class="modal fade" id="edit{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('backoffice.branches.update', $branch) }}">
                    @csrf
                    @method('PATCH')
                    <input name="id" type="hidden" value="{{$branch->id}}">

                    <div class="form-group">
                        <label>Company: </label>
                        <div class="form-line">
                            <select class="form-control" name="company_id" required>
                                <option selected value="{{$branch->company->id}}">{{$branch->company->name}}</option>
                                @foreach(App\Company::where('status', 'Approved')->get() as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @include('backoffice.partials.alerts.form_error', ['field' => 'company_id'])
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                                <label>Country: </label>
                                <div class="form-line">
                                    <select class="form-control" name="country_location" @change="setCountryCode" required>
                                        @php $user_country = $branch->country_location; @endphp
                                        @foreach ([

                                                    "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"

                                                ] as $country)

                                            <option value="{{ $country }}"
                                                    @if ( old('country_location', $user_country) == $country ) selected @endif> {{ $country }}
                                            </option>

                                        @endforeach
                                    </select>
                                </div>
                                @include('backoffice.partials.alerts.form_error', ['field' => 'country_location'])
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                                <label>City: </label>
                                <div class="form-line">
                                    <input class="form-control" name="city_location" placeholder="Nairobi" value="{{$branch->city_location}}" required>
                                </div>
                                @include('backoffice.partials.alerts.form_error', ['field' => 'city_location'])
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Office Address: </label>
                        <div class="form-line">
                            <input class="form-control" name="address" placeholder="1 Tesla Road Austin, TX 78725" value="{{$branch->address}}" required>
                        </div>

                        @include('backoffice.partials.alerts.form_error', ['field' => 'address'])
                    </div>
                    <div class="form-group">
                        <label>Phone: </label>
                        <div class="form-line">
                            <input class="form-control" name="phone" placeholder="0700000000" value="{{$branch->phone}}">
                        </div>

                        @include('backoffice.partials.alerts.form_error', ['field' => 'phone'])
                    </div>

                    <div class="form-group">
                        <label>Email: </label>
                        <div class="form-line">
                            <input class="form-control" name="email" placeholder="email@mail.com" value="{{$branch->email}}">
                        </div>

                        @include('backoffice.partials.alerts.form_error', ['field' => 'email'])
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
