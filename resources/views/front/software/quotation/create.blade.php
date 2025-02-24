@extends('front.master')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <span class="bc-sep"></span>
                <span>
                    <a href="{{ route('software.index') }}">
                        Software Products
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">
                    Request Quote
                </span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- course schedule -->
                    <div>
                        <p>
                            Fill in the details below to request a quote for
                            <span>
                                <strong>{{ $software->name }}</strong>
                            </span>.
                        </p>
                    </div>

                    <!-- registration inputs --> 
                    <div>
                        <form action="{{ route('software.quotation.store', $software->id ?? $software->slug) }}" method="POST" id="quotation-form">

                            @csrf

                            <!-- personal details -->
                            <h4>Booking Information</h4>

                            <div class="reg-sec">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">
                                            Name <span class="red">(required)</span>
                                        </small>
                                        <input type="text" class="form-control" placeholder="Your First Name" name="name" value="{{ old('name', @$customer->name) }}">

                                        @include('front/partials/form_error', ['field' => 'name'])
                                    </div>

                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">
                                            E-mail Address <span class="red">(required)</span>
                                        </small>
                                        <input type="tel" class="form-control" placeholder="Personal Email Address" name="email" value="{{ old('email', @$customer->account->email) }}">

                                        @include('front/partials/form_error', ['field' => 'email'])
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">
                                            Select Country <span class="red">(required)</span>
                                        </small>
                                        <select class="form-control" name="country" @change="setCountryCode">
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

                                    <div class="form-row col-md-6">
                                        <small class="col-md-12 form-text text-muted">
                                            Phone Number <span class="red">(required)</span>
                                        </small>
                                        <div class="form-group col-md-2">
                                            <select class="form-control" name="country_code" id="country_code" v-model="selectedCountryCode">
                                                <option v-for="(code, index) in countryCode" :key="index" :value="code">
                                                    @{{ code }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-10">
                                            <input type="tel" class="form-control" placeholder="**********" name="phone" :value="phone" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                                            @include('front/partials/form_error', ['field' => 'country_code'])
                                            
                                            @include('front/partials/form_error', ['field' => 'phone'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">
                                            Organization <span class="red">(required)</span>
                                        </small>

                                        <input class="form-control" name="organization" value="{{ old('organization', @$customer->company->name) }}" placeholder="Organization">

                                        @include('front/partials/form_error', ['field' => 'organization'])
                                    </div>

                                    <div class="form-group col-md-6">
                                        <small class="form-text text-muted">
                                            No. of Licenses <span class="red">(required)</span>
                                        </small>
                                        <input type="number" class="form-control" placeholder="Licenses" name="licenses" value="{{ old('licenses') }}">

                                        @include('front/partials/form_error', ['field' => 'licenses'])
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <small class="form-text text-muted">
                                            Additional Requirements
                                        </small>

                                        <textarea class="form-control" name="additional_requirements" placeholder="Additional Requirements" rows="5">{{ old('additional_requirements') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="tocs" name="tocs" required>
                                    <label class="tocs" for="exampleCheck1">By checking this you agree to our <a href="#" target="_blank">Terms and Conditions</a> and <a href="#" target="_blank">Privacy Policy</a></label>
                                </div>

                                <div class="reg-btn">
                                    <a class="btn btn-sm btn-primary" href="">
                                        <span class="fa fa-arrow-left">&nbsp;</span>
                                        Back
                                    </a>

                                    <button class="btn btn-success" type="submit">
                                        Request Quote
                                    </button>

                                    <button class="btn btn-sm btn-danger" type="reset">
                                        <span class="fa fa-refresh">&nbsp;</span>
                                        Reset
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- END registration inputs --> 

                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection

@push('script')
    <!-- vue js -->
    <script src="{{ asset('front/assets/js/vue-2.6.11.js') }}"></script>

    <script>
        new Vue({
            el: '#quotation-form',

            data: () => ({

                selectedCountryCode: null,
                countries: {!! json_encode([
                    'AD'=>array('name'=>'ANDORRA','code'=>'376'),
                    'AE'=>array('name'=>'UNITED ARAB EMIRATES','code'=>'971'),
                    'AF'=>array('name'=>'AFGHANISTAN','code'=>'93'),
                    'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'1268'),
                    'AI'=>array('name'=>'ANGUILLA','code'=>'1264'),
                    'AL'=>array('name'=>'ALBANIA','code'=>'355'),
                    'AM'=>array('name'=>'ARMENIA','code'=>'374'),
                    'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'599'),
                    'AO'=>array('name'=>'ANGOLA','code'=>'244'),
                    'AQ'=>array('name'=>'ANTARCTICA','code'=>'672'),
                    'AR'=>array('name'=>'ARGENTINA','code'=>'54'),
                    'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'1684'),
                    'AT'=>array('name'=>'AUSTRIA','code'=>'43'),
                    'AU'=>array('name'=>'AUSTRALIA','code'=>'61'),
                    'AW'=>array('name'=>'ARUBA','code'=>'297'),
                    'AZ'=>array('name'=>'AZERBAIJAN','code'=>'994'),
                    'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'387'),
                    'BB'=>array('name'=>'BARBADOS','code'=>'1246'),
                    'BD'=>array('name'=>'BANGLADESH','code'=>'880'),
                    'BE'=>array('name'=>'BELGIUM','code'=>'32'),
                    'BF'=>array('name'=>'BURKINA FASO','code'=>'226'),
                    'BG'=>array('name'=>'BULGARIA','code'=>'359'),
                    'BH'=>array('name'=>'BAHRAIN','code'=>'973'),
                    'BI'=>array('name'=>'BURUNDI','code'=>'257'),
                    'BJ'=>array('name'=>'BENIN','code'=>'229'),
                    'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'590'),
                    'BM'=>array('name'=>'BERMUDA','code'=>'1441'),
                    'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'673'),
                    'BO'=>array('name'=>'BOLIVIA','code'=>'591'),
                    'BR'=>array('name'=>'BRAZIL','code'=>'55'),
                    'BS'=>array('name'=>'BAHAMAS','code'=>'1242'),
                    'BT'=>array('name'=>'BHUTAN','code'=>'975'),
                    'BW'=>array('name'=>'BOTSWANA','code'=>'267'),
                    'BY'=>array('name'=>'BELARUS','code'=>'375'),
                    'BZ'=>array('name'=>'BELIZE','code'=>'501'),
                    'CA'=>array('name'=>'CANADA','code'=>'1'),
                    'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'61'),
                    'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'243'),
                    'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'236'),
                    'CG'=>array('name'=>'CONGO','code'=>'242'),
                    'CH'=>array('name'=>'SWITZERLAND','code'=>'41'),
                    'CI'=>array('name'=>'COTE D IVOIRE','code'=>'225'),
                    'CK'=>array('name'=>'COOK ISLANDS','code'=>'682'),
                    'CL'=>array('name'=>'CHILE','code'=>'56'),
                    'CM'=>array('name'=>'CAMEROON','code'=>'237'),
                    'CN'=>array('name'=>'CHINA','code'=>'86'),
                    'CO'=>array('name'=>'COLOMBIA','code'=>'57'),
                    'CR'=>array('name'=>'COSTA RICA','code'=>'506'),
                    'CU'=>array('name'=>'CUBA','code'=>'53'),
                    'CV'=>array('name'=>'CAPE VERDE','code'=>'238'),
                    'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'61'),
                    'CY'=>array('name'=>'CYPRUS','code'=>'357'),
                    'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'420'),
                    'DE'=>array('name'=>'GERMANY','code'=>'49'),
                    'DJ'=>array('name'=>'DJIBOUTI','code'=>'253'),
                    'DK'=>array('name'=>'DENMARK','code'=>'45'),
                    'DM'=>array('name'=>'DOMINICA','code'=>'1767'),
                    'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'1809'),
                    'DZ'=>array('name'=>'ALGERIA','code'=>'213'),
                    'EC'=>array('name'=>'ECUADOR','code'=>'593'),
                    'EE'=>array('name'=>'ESTONIA','code'=>'372'),
                    'EG'=>array('name'=>'EGYPT','code'=>'20'),
                    'ER'=>array('name'=>'ERITREA','code'=>'291'),
                    'ES'=>array('name'=>'SPAIN','code'=>'34'),
                    'ET'=>array('name'=>'ETHIOPIA','code'=>'251'),
                    'FI'=>array('name'=>'FINLAND','code'=>'358'),
                    'FJ'=>array('name'=>'FIJI','code'=>'679'),
                    'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'500'),
                    'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'691'),
                    'FO'=>array('name'=>'FAROE ISLANDS','code'=>'298'),
                    'FR'=>array('name'=>'FRANCE','code'=>'33'),
                    'GA'=>array('name'=>'GABON','code'=>'241'),
                    'GB'=>array('name'=>'UNITED KINGDOM','code'=>'44'),
                    'GD'=>array('name'=>'GRENADA','code'=>'1473'),
                    'GE'=>array('name'=>'GEORGIA','code'=>'995'),
                    'GH'=>array('name'=>'GHANA','code'=>'233'),
                    'GI'=>array('name'=>'GIBRALTAR','code'=>'350'),
                    'GL'=>array('name'=>'GREENLAND','code'=>'299'),
                    'GM'=>array('name'=>'GAMBIA','code'=>'220'),
                    'GN'=>array('name'=>'GUINEA','code'=>'224'),
                    'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'240'),
                    'GR'=>array('name'=>'GREECE','code'=>'30'),
                    'GT'=>array('name'=>'GUATEMALA','code'=>'502'),
                    'GU'=>array('name'=>'GUAM','code'=>'1671'),
                    'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'245'),
                    'GY'=>array('name'=>'GUYANA','code'=>'592'),
                    'HK'=>array('name'=>'HONG KONG','code'=>'852'),
                    'HN'=>array('name'=>'HONDURAS','code'=>'504'),
                    'HR'=>array('name'=>'CROATIA','code'=>'385'),
                    'HT'=>array('name'=>'HAITI','code'=>'509'),
                    'HU'=>array('name'=>'HUNGARY','code'=>'36'),
                    'ID'=>array('name'=>'INDONESIA','code'=>'62'),
                    'IE'=>array('name'=>'IRELAND','code'=>'353'),
                    'IL'=>array('name'=>'ISRAEL','code'=>'972'),
                    'IM'=>array('name'=>'ISLE OF MAN','code'=>'44'),
                    'IN'=>array('name'=>'INDIA','code'=>'91'),
                    'IQ'=>array('name'=>'IRAQ','code'=>'964'),
                    'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'98'),
                    'IS'=>array('name'=>'ICELAND','code'=>'354'),
                    'IT'=>array('name'=>'ITALY','code'=>'39'),
                    'JM'=>array('name'=>'JAMAICA','code'=>'1876'),
                    'JO'=>array('name'=>'JORDAN','code'=>'962'),
                    'JP'=>array('name'=>'JAPAN','code'=>'81'),
                    'KE'=>array('name'=>'KENYA','code'=>'254'),
                    'KG'=>array('name'=>'KYRGYZSTAN','code'=>'996'),
                    'KH'=>array('name'=>'CAMBODIA','code'=>'855'),
                    'KI'=>array('name'=>'KIRIBATI','code'=>'686'),
                    'KM'=>array('name'=>'COMOROS','code'=>'269'),
                    'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'1869'),
                    'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'850'),
                    'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'82'),
                    'KW'=>array('name'=>'KUWAIT','code'=>'965'),
                    'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'1345'),
                    'KZ'=>array('name'=>'KAZAKSTAN','code'=>'7'),
                    'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'856'),
                    'LB'=>array('name'=>'LEBANON','code'=>'961'),
                    'LC'=>array('name'=>'SAINT LUCIA','code'=>'1758'),
                    'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'423'),
                    'LK'=>array('name'=>'SRI LANKA','code'=>'94'),
                    'LR'=>array('name'=>'LIBERIA','code'=>'231'),
                    'LS'=>array('name'=>'LESOTHO','code'=>'266'),
                    'LT'=>array('name'=>'LITHUANIA','code'=>'370'),
                    'LU'=>array('name'=>'LUXEMBOURG','code'=>'352'),
                    'LV'=>array('name'=>'LATVIA','code'=>'371'),
                    'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'218'),
                    'MA'=>array('name'=>'MOROCCO','code'=>'212'),
                    'MC'=>array('name'=>'MONACO','code'=>'377'),
                    'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'373'),
                    'ME'=>array('name'=>'MONTENEGRO','code'=>'382'),
                    'MF'=>array('name'=>'SAINT MARTIN','code'=>'1599'),
                    'MG'=>array('name'=>'MADAGASCAR','code'=>'261'),
                    'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'692'),
                    'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'389'),
                    'ML'=>array('name'=>'MALI','code'=>'223'),
                    'MM'=>array('name'=>'MYANMAR','code'=>'95'),
                    'MN'=>array('name'=>'MONGOLIA','code'=>'976'),
                    'MO'=>array('name'=>'MACAU','code'=>'853'),
                    'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'1670'),
                    'MR'=>array('name'=>'MAURITANIA','code'=>'222'),
                    'MS'=>array('name'=>'MONTSERRAT','code'=>'1664'),
                    'MT'=>array('name'=>'MALTA','code'=>'356'),
                    'MU'=>array('name'=>'MAURITIUS','code'=>'230'),
                    'MV'=>array('name'=>'MALDIVES','code'=>'960'),
                    'MW'=>array('name'=>'MALAWI','code'=>'265'),
                    'MX'=>array('name'=>'MEXICO','code'=>'52'),
                    'MY'=>array('name'=>'MALAYSIA','code'=>'60'),
                    'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'258'),
                    'NA'=>array('name'=>'NAMIBIA','code'=>'264'),
                    'NC'=>array('name'=>'NEW CALEDONIA','code'=>'687'),
                    'NE'=>array('name'=>'NIGER','code'=>'227'),
                    'NG'=>array('name'=>'NIGERIA','code'=>'234'),
                    'NI'=>array('name'=>'NICARAGUA','code'=>'505'),
                    'NL'=>array('name'=>'NETHERLANDS','code'=>'31'),
                    'NO'=>array('name'=>'NORWAY','code'=>'47'),
                    'NP'=>array('name'=>'NEPAL','code'=>'977'),
                    'NR'=>array('name'=>'NAURU','code'=>'674'),
                    'NU'=>array('name'=>'NIUE','code'=>'683'),
                    'NZ'=>array('name'=>'NEW ZEALAND','code'=>'64'),
                    'OM'=>array('name'=>'OMAN','code'=>'968'),
                    'PA'=>array('name'=>'PANAMA','code'=>'507'),
                    'PE'=>array('name'=>'PERU','code'=>'51'),
                    'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'689'),
                    'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'675'),
                    'PH'=>array('name'=>'PHILIPPINES','code'=>'63'),
                    'PK'=>array('name'=>'PAKISTAN','code'=>'92'),
                    'PL'=>array('name'=>'POLAND','code'=>'48'),
                    'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'508'),
                    'PN'=>array('name'=>'PITCAIRN','code'=>'870'),
                    'PR'=>array('name'=>'PUERTO RICO','code'=>'1'),
                    'PT'=>array('name'=>'PORTUGAL','code'=>'351'),
                    'PW'=>array('name'=>'PALAU','code'=>'680'),
                    'PY'=>array('name'=>'PARAGUAY','code'=>'595'),
                    'QA'=>array('name'=>'QATAR','code'=>'974'),
                    'RO'=>array('name'=>'ROMANIA','code'=>'40'),
                    'RS'=>array('name'=>'SERBIA','code'=>'381'),
                    'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'7'),
                    'RW'=>array('name'=>'RWANDA','code'=>'250'),
                    'SA'=>array('name'=>'SAUDI ARABIA','code'=>'966'),
                    'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'677'),
                    'SC'=>array('name'=>'SEYCHELLES','code'=>'248'),
                    'SD'=>array('name'=>'SUDAN','code'=>'249'),
                    'SE'=>array('name'=>'SWEDEN','code'=>'46'),
                    'SG'=>array('name'=>'SINGAPORE','code'=>'65'),
                    'SH'=>array('name'=>'SAINT HELENA','code'=>'290'),
                    'SI'=>array('name'=>'SLOVENIA','code'=>'386'),
                    'SK'=>array('name'=>'SLOVAKIA','code'=>'421'),
                    'SL'=>array('name'=>'SIERRA LEONE','code'=>'232'),
                    'SM'=>array('name'=>'SAN MARINO','code'=>'378'),
                    'SN'=>array('name'=>'SENEGAL','code'=>'221'),
                    'SO'=>array('name'=>'SOMALIA','code'=>'252'),
                    'SR'=>array('name'=>'SURINAME','code'=>'597'),
                    'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'239'),
                    'SV'=>array('name'=>'EL SALVADOR','code'=>'503'),
                    'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'963'),
                    'SZ'=>array('name'=>'SWAZILAND','code'=>'268'),
                    'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'1649'),
                    'TD'=>array('name'=>'CHAD','code'=>'235'),
                    'TG'=>array('name'=>'TOGO','code'=>'228'),
                    'TH'=>array('name'=>'THAILAND','code'=>'66'),
                    'TJ'=>array('name'=>'TAJIKISTAN','code'=>'992'),
                    'TK'=>array('name'=>'TOKELAU','code'=>'690'),
                    'TL'=>array('name'=>'TIMOR-LESTE','code'=>'670'),
                    'TM'=>array('name'=>'TURKMENISTAN','code'=>'993'),
                    'TN'=>array('name'=>'TUNISIA','code'=>'216'),
                    'TO'=>array('name'=>'TONGA','code'=>'676'),
                    'TR'=>array('name'=>'TURKEY','code'=>'90'),
                    'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'1868'),
                    'TV'=>array('name'=>'TUVALU','code'=>'688'),
                    'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'886'),
                    'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'255'),
                    'UA'=>array('name'=>'UKRAINE','code'=>'380'),
                    'UG'=>array('name'=>'UGANDA','code'=>'256'),
                    'US'=>array('name'=>'UNITED STATES','code'=>'1'),
                    'UY'=>array('name'=>'URUGUAY','code'=>'598'),
                    'UZ'=>array('name'=>'UZBEKISTAN','code'=>'998'),
                    'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'39'),
                    'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'1784'),
                    'VE'=>array('name'=>'VENEZUELA','code'=>'58'),
                    'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'1284'),
                    'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'1340'),
                    'VN'=>array('name'=>'VIET NAM','code'=>'84'),
                    'VU'=>array('name'=>'VANUATU','code'=>'678'),
                    'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'681'),
                    'WS'=>array('name'=>'SAMOA','code'=>'685'),
                    'XK'=>array('name'=>'KOSOVO','code'=>'381'),
                    'YE'=>array('name'=>'YEMEN','code'=>'967'),
                    'YT'=>array('name'=>'MAYOTTE','code'=>'262'),
                    'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'27'),
                    'ZM'=>array('name'=>'ZAMBIA','code'=>'260'),
                    'ZW'=>array('name'=>'ZIMBABWE','code'=>'263')
                ]) !!},
            }),

            created() {

                let country = Object.values(this.countries).find(({name}) => name == '{{ @$customer->country }}'.toUpperCase());

                this.selectedCountryCode = country ? country.code : '';
            },

            computed: {

                countryCode() {

                    return Object.values(this.countries).map(country => country.code)
                },

                phone() {

                    return "{{ old('phone', @$customer->phone ?? '') }}".replace('+' + this.selectedCountryCode, '')
                }
            },

            methods: {

                setCountryCode(e) {

                    let country = Object.values(this.countries).find(country => country.name == e.target.value.toLocaleUpperCase());

                    this.selectedCountryCode = country ? country.code : '';
                },
            }
        });
    </script>
@endpush