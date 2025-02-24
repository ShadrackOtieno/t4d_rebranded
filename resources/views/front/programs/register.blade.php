@extends('front.Projects.master')
@section('css')
    <style>
        *{
        /* outline: 1px solid limegreen; */
    }
    input, select{
        outline: 0.5px solid #1ea19d;
        &:focus{
            outline: 2px solid blue;
        }
        &:user-valid{
            outline: 2px solid #1ea19d;
            background-color: rgb(231, 248, 252);
        }
        &:user-invalid{
            outline: 2px solid red;
            background-color: #f59999;
        }
    }
    ol{
        list-style-type: decimal !important;
        background-color: #f5f4f4;
    }
    </style>
@endsection

@section('content')

@section('content')
    <div class="">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs py-3 pl-5 bg-[#1ea19d] h-10 text-white">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

                <span>
                    <a href="#">
                        {{ $program->name }}
                    </a>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

                </span><span >
                    <a href="#">
                        Register
                    </a>
                </span>
            </div>
            <!-- END page breadcrumbs -->

        <!-- page content -->
  <!-- page content -->
  <div class="lg:w-[1080px] lg:mx-auto my-4 px-2">
    <div class="">
        <!-- course schedule -->
        <div class="py-3">
            <p>
                Fill in the details below to complete the registration for

                    <strong class="text-[#00a651]">{{ $program->name }}.</strong>

            </p>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <h4>Please fix below errors</h4>
                <ul style="list-style: none">
                    @foreach ($errors->all() as $error)
                        <li><strong>Oh Snap! </strong>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                <!-- program schedule -->
                {{-- <div>
                    <p>
                        Fill in the details below to complete the registration for
                        <span>
                            <strong>{{ $program->name }}</strong>
                        </span>.
                    </p>
                </div> --}}

                <!-- registration inputs -->
                <div class="border border-[#1ea19d] p-8 mb-3 sm:rounded-2xl">
                    <form @submit="save" action="{{route('programs.registration', $program)}}" method="POST" id="booking-form">

                        @csrf

                        <!-- program details -->
                        <h4 class="text-[#00a651] text-lg font-semibold">Program Details</h4>


                    {{-- start --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4 border border-[#1ea19d] p-4 mb-3 sm:rounded-2xl">
                        <!-- Personal Email -->
                        <div class="form-group">
                            <label class="block text-sm text-gray-600">
                                Title
                            </label>
                            <input type="text" class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3 bg-gray-100 cursor-not-allowed" value="{{ $program->name }}" readonly>
                        </div>

                        <!-- Work Email -->
                        <div class="form-group">
                            <label class="block text-sm text-gray-600">Select mode of learning</label>
                                                    <select class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3" name="learning_mode" required>
                                                        <option value="physical">Face to Face</option>
                                                        <option value="virtual">Virtual</option>
                                                        <option value="blended">Blended</option>
                                                    </select>
                        </div>
                        @include('front/partials/form_error', ['field' => 'schedule_id'])

                    </div>

                    {{-- end --}}


                       <!-- Personal details -->
<h4 class="text-lg font-semibold mb-4 text-[#00a651]">Personal Information</h4>

<div class="space-y-4 border border-[#1ea19d] p-4 mb-3 sm:rounded-2xl">
    <!-- Salutation -->
    <div class="form-group">
        <label class="block text-sm text-gray-600">
            Salutation <span class="text-red-500">(required)</span>
        </label>
        <select class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3" name="salutation">
            @foreach (['Mr.', 'Mrs.', 'Dr.', 'Engr.', 'Prof.', 'Miss'] as $salutation)
                <option @if (old('salutation') == $salutation) selected @endif>
                    {{ $salutation }}
                </option>
            @endforeach
        </select>
        @include('front/partials/form_error', ['field' => 'salutation'])
    </div>

    <!-- First Name and Last Name -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- First Name -->
        <div class="form-group">
            <label class="block text-sm text-gray-600">
                First Name <span class="text-red-500">(required)</span>
            </label>
            <input type="text" class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3"
                   name="first_name" value="{{ old('name', @$customer->first_name) }}" required>
            @include('front/partials/form_error', ['field' => 'first_name'])
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label class="block text-sm text-gray-600">
                Last Name <span class="text-red-500">(required)</span>
            </label>
            <input type="text" class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3"
                   name="last_name" value="{{ old('name', @$customer->last_name) }}" required>
            @include('front/partials/form_error', ['field' => 'last_name'])
        </div>
    </div>

<!-- Designation and Company -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <!-- Designation -->
    <div class="form-group">
        <label class="block text-sm text-gray-600">
            Designation <span class="text-red-500">(required)</span>
        </label>
        <input type="text" class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3"
               name="designation" value="{{ old('designation', @$customer->designation) }}">
    </div>

    <!-- Company -->
    <div class="form-group">
        <label class="block text-sm text-gray-600">
            Company <span class="text-red-500">(required)</span>
        </label>
        <input type="text" class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3"
               name="company" value="{{ old('company', @$customer->company->name) }}">
        @include('front/partials/form_error', ['field' => 'company'])
    </div>
</div>

<!-- Country and Phone -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
    <!-- Country -->
    <div class="form-group">
        <label class="block text-sm text-gray-600">
            Select Country <span class="text-red-500">(required)</span>
        </label>
		<select class="rounded-md w-full p-2 shadow-lg @error('country') {{ 'text-red-700 border-2' }} @enderror" name="country" @change="setCountryCode" required>
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
    </div>

    <!-- Phone Number -->
    <div class="form-group">
        <label class="block text-sm text-gray-600">
            Phone Number <span class="text-red-500">(required)</span>
        </label>
        <div class="flex space-x-2">
            <!-- Country Code -->
            <div class="w-1/4">
                <select class="w-full border-gray-300 rounded-md shadow-sm py-2 px-3"
                        name="country_code" v-model="selectedCountryCode" disabled required>
                    <option v-for="(code, index) in countryCode" :key="index" :value="code">
                        @{{ code }}
                    </option>
                </select>
            </div>

            <!-- Phone Input -->
            <div class="w-3/4">
                <input type="tel" class="w-full border-gray-300 rounded-md shadow-sm py-2 px-3"
                       name="phone" value="{{ old('phone', @$customer->phone) }}" maxlength="10"
                       oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                       required>
            </div>
        </div>
        @include('front/partials/form_error', ['field' => 'phone'])
    </div>
</div>

<!-- Email Addresses -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
    <!-- Personal Email -->
    <div class="form-group">
        <label class="block text-sm text-gray-600">
            Personal Email Address <span class="text-red-500">(required)</span>
        </label>
        <input type="email" class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3"
               name="email" value="{{ old('email', @$customer->account->email) }}" required>
        @include('front/partials/form_error', ['field' => 'email'])
    </div>

    <!-- Work Email -->
    <div class="form-group">
        <label class="block text-sm text-gray-600">Work Email Address</label>
        <input type="email" class="w-full mt-1 border-gray-300 rounded-md shadow-sm py-2 px-3"
               name="work_email" value="{{ old('work_email', @$customer->work_email) }}">
    </div>
</div>
</div>


                            <!-- number of participants -->
                            <h4 class="text-[#00a651] text-lg font-semibold px-2 pt-2">Other Participants (*Optional)</h4>
                            <small class=" text-black italic p-2 sm:mb-4">
                                Fill in the details of other people coming with you if applicable. Leave blank if you are the only one coming.
                            </small>

                            <hr>

                            <div class="p-4 rounded-xl m-1 bg-[#1ea19d]">
								<ol class="mx-2">
									<li v-for="(participant, index) in participants" :key="index">
										@{{ participant.name }}, @{{ participant.email }}, @{{ participant.phone }}
										&nbsp; &VerticalBar; &nbsp;
										<button type="button" class="bg-red-600" @click="removeParticipant(index)" style="padding: 1px 4px; font-size: 10px; font-weight: bold">
											&times; remove
										</button>
									</li>
								</ol>

                            </div>

                            <div class="bg-white border border-[#1ea19d] p-4 mb-3 sm:rounded-2xl" id="participants">
                                <!-- additional participant -->
                                <div class="sm:grid grid-cols-3 gap-3 sm:mb-4" id="participant-form">
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Full Name</small><br>
                                        <input type="text" class="rounded-md w-full p-2 shadow-lg @error('participant-name') {{ 'text-red-700 border-2' }} @enderror" placeholder="Their Full Name" name="participant-name" pattern="[A-Za-z ]+" title="You should enter letters and space only">
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">Phone Number</small><br>
                                        <input type="tel" id="phone" class="rounded-md w-full p-2 shadow-lg @error('salutation') {{ 'text-red-700 border-2' }} @enderror" placeholder="712345678 (without country code)" name="participant-phone" pattern="[0-9]{4,17}" title="Enter a valid phone number.">
                                    </div>
                                    <div class="mb-4 sm:mb-0">
                                        <small class="text-base">E-mail Address</small><br>
                                        <input type="email" class="rounded-md w-full p-2 shadow-lg @error('participant-email') {{ 'text-red-700 border-2' }} @enderror" placeholder="Their Email Address" name="participant-email"pattern="[a-z0-9._]+@[a-z0-9]+\.[a-z.]{2,6}" title="should look like abc123@yahoo123.co.ke ">
                                    </div>
                                </div> <!-- END additional participant -->

                                <div class="my-2">
                                    <button type="button" class="ires-pri-btn px-12 py-2" @click="addParticipant">
                                        <small>Add</small>
                                    </button>
                                </div>
                            </div>

{{-- start of payment --}}
    <!-- payment method -->
    <h4 class="text-[#00a651] text-lg font-semibold p-2">Payment Method</h4>

    <div class="bg-[#00a651] text-white p-4 mb-3 sm:rounded-2xl border border-[#1ea19d]">
        <!-- payment radio button -->
        <p>Choose your payment method?</p>

        <div class="form-check">
            <input class="form-check-input !outline-none" type="radio" value="offline" checked name="payment_method"
            @if ( old('payment_method') == 'offline' )
                checked
            @endif>
            <label class="form-check-label">
                Offline
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input !outline-none" type="radio" value="paypal" name="payment_method"
            @if ( old('payment_method') == 'paypal' )
                checked
            @endif>
            <label class="form-check-label">
                PayPal/Card
            </label>
        </div><!-- END payment radio button -->

        @include('front/partials/form_error', ['field' => 'payment_method'])
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input !outline-none" id="tocs" name="tocs" required>
        <label class="tocs" for="tocs">By checking this you agree to our <a href="{{ route('terms-and-conditions') }}" target="_blank" class="text-[#1ea19d]">Terms and Conditions</a> and <a href="{{ route('privacy-policy') }}" target="_blank" class="text-[#1ea19d]">Privacy Policy.</a></label>
    </div>
    <br>
    <div class="flex flex-wrap gap-1">
        <a class="ires-pri-btn px-12 py-1" href="#">
            <span class="fa fa-arrow-left">&nbsp;</span>
            Back
        </a>
        &nbsp;
        <button class="ires-sec-btn px-12 py-1" type="reset">
            <span class="fa fa-refresh">&nbsp;</span>
            Reset
        </button>
        &nbsp;
        <button id="myButton" class="ires-pri-btn px-12 py-1" type="submit" value="">
            Complete Registration
        </button>
    </div>

{{-- end of payment --}}



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
@section('js_content')

    <!-- vue js -->
    <script src="{{ asset('front/assets/js/vue-2.6.11.js') }}"></script>
    <!-- moment -->
    <script src="{{ asset('front/assets/js/moment.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script>
        new Vue({
            el: '#booking-form',

            data: () => ({
                participants: [],
                countries: {!! json_encode([
                    'AD'=>array('name'=>'ANDORRA','code'=>'+376'),
                    'AE'=>array('name'=>'UNITED ARAB EMIRATES','code'=>'+971'),
                    'AF'=>array('name'=>'AFGHANISTAN','code'=>'+93'),
                    'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'+1268'),
                    'AI'=>array('name'=>'ANGUILLA','code'=>'+1264'),
                    'AL'=>array('name'=>'ALBANIA','code'=>'+355'),
                    'AM'=>array('name'=>'ARMENIA','code'=>'+374'),
                    'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'+599'),
                    'AO'=>array('name'=>'ANGOLA','code'=>'+244'),
                    'AQ'=>array('name'=>'ANTARCTICA','code'=>'+672'),
                    'AR'=>array('name'=>'ARGENTINA','code'=>'+54'),
                    'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'+1684'),
                    'AT'=>array('name'=>'AUSTRIA','code'=>'+43'),
                    'AU'=>array('name'=>'AUSTRALIA','code'=>'+61'),
                    'AW'=>array('name'=>'ARUBA','code'=>'+297'),
                    'AZ'=>array('name'=>'AZERBAIJAN','code'=>'+994'),
                    'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'+387'),
                    'BB'=>array('name'=>'BARBADOS','code'=>'+1246'),
                    'BD'=>array('name'=>'BANGLADESH','code'=>'+880'),
                    'BE'=>array('name'=>'BELGIUM','code'=>'+32'),
                    'BF'=>array('name'=>'BURKINA FASO','code'=>'+226'),
                    'BG'=>array('name'=>'BULGARIA','code'=>'+359'),
                    'BH'=>array('name'=>'BAHRAIN','code'=>'+973'),
                    'BI'=>array('name'=>'BURUNDI','code'=>'+257'),
                    'BJ'=>array('name'=>'BENIN','code'=>'+229'),
                    'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'+590'),
                    'BM'=>array('name'=>'BERMUDA','code'=>'+1441'),
                    'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'+673'),
                    'BO'=>array('name'=>'BOLIVIA','code'=>'+591'),
                    'BR'=>array('name'=>'BRAZIL','code'=>'+55'),
                    'BS'=>array('name'=>'BAHAMAS','code'=>'+1242'),
                    'BT'=>array('name'=>'BHUTAN','code'=>'+975'),
                    'BW'=>array('name'=>'BOTSWANA','code'=>'+267'),
                    'BY'=>array('name'=>'BELARUS','code'=>'+375'),
                    'BZ'=>array('name'=>'BELIZE','code'=>'+501'),
                    'CA'=>array('name'=>'CANADA','code'=>'+1'),
                    'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'+61'),
                    'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'+243'),
                    'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'+236'),
                    'CG'=>array('name'=>'CONGO','code'=>'+242'),
                    'CH'=>array('name'=>'SWITZERLAND','code'=>'+41'),
                    'CI'=>array('name'=>'COTE D IVOIRE','code'=>'+225'),
                    'CK'=>array('name'=>'COOK ISLANDS','code'=>'+682'),
                    'CL'=>array('name'=>'CHILE','code'=>'+56'),
                    'CM'=>array('name'=>'CAMEROON','code'=>'+237'),
                    'CN'=>array('name'=>'CHINA','code'=>'+86'),
                    'CO'=>array('name'=>'COLOMBIA','code'=>'+57'),
                    'CR'=>array('name'=>'COSTA RICA','code'=>'+506'),
                    'CU'=>array('name'=>'CUBA','code'=>'+53'),
                    'CV'=>array('name'=>'CAPE VERDE','code'=>'+238'),
                    'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'+61'),
                    'CY'=>array('name'=>'CYPRUS','code'=>'+357'),
                    'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'+420'),
                    'DE'=>array('name'=>'GERMANY','code'=>'+49'),
                    'DJ'=>array('name'=>'DJIBOUTI','code'=>'+253'),
                    'DK'=>array('name'=>'DENMARK','code'=>'+45'),
                    'DM'=>array('name'=>'DOMINICA','code'=>'+1767'),
                    'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'+1809'),
                    'DZ'=>array('name'=>'ALGERIA','code'=>'+213'),
                    'EC'=>array('name'=>'ECUADOR','code'=>'+593'),
                    'EE'=>array('name'=>'ESTONIA','code'=>'+372'),
                    'EG'=>array('name'=>'EGYPT','code'=>'+20'),
                    'ER'=>array('name'=>'ERITREA','code'=>'+291'),
                    'ES'=>array('name'=>'SPAIN','code'=>'+34'),
                    'ET'=>array('name'=>'ETHIOPIA','code'=>'+251'),
                    'FI'=>array('name'=>'FINLAND','code'=>'+358'),
                    'FJ'=>array('name'=>'FIJI','code'=>'+679'),
                    'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'+500'),
                    'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'+691'),
                    'FO'=>array('name'=>'FAROE ISLANDS','code'=>'+298'),
                    'FR'=>array('name'=>'FRANCE','code'=>'+33'),
                    'GA'=>array('name'=>'GABON','code'=>'+241'),
                    'GB'=>array('name'=>'UNITED KINGDOM','code'=>'+44'),
                    'GD'=>array('name'=>'GRENADA','code'=>'+1473'),
                    'GE'=>array('name'=>'GEORGIA','code'=>'+995'),
                    'GH'=>array('name'=>'GHANA','code'=>'+233'),
                    'GI'=>array('name'=>'GIBRALTAR','code'=>'+350'),
                    'GL'=>array('name'=>'GREENLAND','code'=>'+299'),
                    'GM'=>array('name'=>'GAMBIA','code'=>'+220'),
                    'GN'=>array('name'=>'GUINEA','code'=>'+224'),
                    'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'+240'),
                    'GR'=>array('name'=>'GREECE','code'=>'+30'),
                    'GT'=>array('name'=>'GUATEMALA','code'=>'+502'),
                    'GU'=>array('name'=>'GUAM','code'=>'+1671'),
                    'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'+245'),
                    'GY'=>array('name'=>'GUYANA','code'=>'+592'),
                    'HK'=>array('name'=>'HONG KONG','code'=>'+852'),
                    'HN'=>array('name'=>'HONDURAS','code'=>'+504'),
                    'HR'=>array('name'=>'CROATIA','code'=>'+385'),
                    'HT'=>array('name'=>'HAITI','code'=>'+509'),
                    'HU'=>array('name'=>'HUNGARY','code'=>'+36'),
                    'ID'=>array('name'=>'INDONESIA','code'=>'+62'),
                    'IE'=>array('name'=>'IRELAND','code'=>'+353'),
                    'IL'=>array('name'=>'ISRAEL','code'=>'+972'),
                    'IM'=>array('name'=>'ISLE OF MAN','code'=>'+44'),
                    'IN'=>array('name'=>'INDIA','code'=>'+91'),
                    'IQ'=>array('name'=>'IRAQ','code'=>'+964'),
                    'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'+98'),
                    'IS'=>array('name'=>'ICELAND','code'=>'+354'),
                    'IT'=>array('name'=>'ITALY','code'=>'+39'),
                    'JM'=>array('name'=>'JAMAICA','code'=>'+1876'),
                    'JO'=>array('name'=>'JORDAN','code'=>'+962'),
                    'JP'=>array('name'=>'JAPAN','code'=>'+81'),
                    'KE'=>array('name'=>'KENYA','code'=>'+254'),
                    'KG'=>array('name'=>'KYRGYZSTAN','code'=>'+996'),
                    'KH'=>array('name'=>'CAMBODIA','code'=>'+855'),
                    'KI'=>array('name'=>'KIRIBATI','code'=>'+686'),
                    'KM'=>array('name'=>'COMOROS','code'=>'+269'),
                    'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'+1869'),
                    'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'+850'),
                    'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'+82'),
                    'KW'=>array('name'=>'KUWAIT','code'=>'+965'),
                    'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'+1345'),
                    'KZ'=>array('name'=>'KAZAKSTAN','code'=>'+7'),
                    'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'+856'),
                    'LB'=>array('name'=>'LEBANON','code'=>'+961'),
                    'LC'=>array('name'=>'SAINT LUCIA','code'=>'+1758'),
                    'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'+423'),
                    'LK'=>array('name'=>'SRI LANKA','code'=>'+94'),
                    'LR'=>array('name'=>'LIBERIA','code'=>'+231'),
                    'LS'=>array('name'=>'LESOTHO','code'=>'+266'),
                    'LT'=>array('name'=>'LITHUANIA','code'=>'+370'),
                    'LU'=>array('name'=>'LUXEMBOURG','code'=>'+352'),
                    'LV'=>array('name'=>'LATVIA','code'=>'+371'),
                    'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'+218'),
                    'MA'=>array('name'=>'MOROCCO','code'=>'+212'),
                    'MC'=>array('name'=>'MONACO','code'=>'+377'),
                    'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'+373'),
                    'ME'=>array('name'=>'MONTENEGRO','code'=>'+382'),
                    'MF'=>array('name'=>'SAINT MARTIN','code'=>'+1599'),
                    'MG'=>array('name'=>'MADAGASCAR','code'=>'+261'),
                    'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'+692'),
                    'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'+389'),
                    'ML'=>array('name'=>'MALI','code'=>'+223'),
                    'MM'=>array('name'=>'MYANMAR','code'=>'+95'),
                    'MN'=>array('name'=>'MONGOLIA','code'=>'+976'),
                    'MO'=>array('name'=>'MACAU','code'=>'+853'),
                    'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'+1670'),
                    'MR'=>array('name'=>'MAURITANIA','code'=>'+222'),
                    'MS'=>array('name'=>'MONTSERRAT','code'=>'+1664'),
                    'MT'=>array('name'=>'MALTA','code'=>'+356'),
                    'MU'=>array('name'=>'MAURITIUS','code'=>'+230'),
                    'MV'=>array('name'=>'MALDIVES','code'=>'+960'),
                    'MW'=>array('name'=>'MALAWI','code'=>'+265'),
                    'MX'=>array('name'=>'MEXICO','code'=>'+52'),
                    'MY'=>array('name'=>'MALAYSIA','code'=>'+60'),
                    'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'+258'),
                    'NA'=>array('name'=>'NAMIBIA','code'=>'+264'),
                    'NC'=>array('name'=>'NEW CALEDONIA','code'=>'+687'),
                    'NE'=>array('name'=>'NIGER','code'=>'+227'),
                    'NG'=>array('name'=>'NIGERIA','code'=>'+234'),
                    'NI'=>array('name'=>'NICARAGUA','code'=>'+505'),
                    'NL'=>array('name'=>'NETHERLANDS','code'=>'+31'),
                    'NO'=>array('name'=>'NORWAY','code'=>'+47'),
                    'NP'=>array('name'=>'NEPAL','code'=>'+977'),
                    'NR'=>array('name'=>'NAURU','code'=>'+674'),
                    'NU'=>array('name'=>'NIUE','code'=>'+683'),
                    'NZ'=>array('name'=>'NEW ZEALAND','code'=>'+64'),
                    'OM'=>array('name'=>'OMAN','code'=>'+968'),
                    'PA'=>array('name'=>'PANAMA','code'=>'+507'),
                    'PE'=>array('name'=>'PERU','code'=>'+51'),
                    'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'+689'),
                    'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'+675'),
                    'PH'=>array('name'=>'PHILIPPINES','code'=>'+63'),
                    'PK'=>array('name'=>'PAKISTAN','code'=>'+92'),
                    'PL'=>array('name'=>'POLAND','code'=>'+48'),
                    'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'+508'),
                    'PN'=>array('name'=>'PITCAIRN','code'=>'+870'),
                    'PR'=>array('name'=>'PUERTO RICO','code'=>'+1'),
                    'PT'=>array('name'=>'PORTUGAL','code'=>'+351'),
                    'PW'=>array('name'=>'PALAU','code'=>'+680'),
                    'PY'=>array('name'=>'PARAGUAY','code'=>'+595'),
                    'QA'=>array('name'=>'QATAR','code'=>'+974'),
                    'RO'=>array('name'=>'ROMANIA','code'=>'+40'),
                    'RS'=>array('name'=>'SERBIA','code'=>'+381'),
                    'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'+7'),
                    'RW'=>array('name'=>'RWANDA','code'=>'+250'),
                    'SA'=>array('name'=>'SAUDI ARABIA','code'=>'+966'),
                    'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'+677'),
                    'SC'=>array('name'=>'SEYCHELLES','code'=>'+248'),
                    'SD'=>array('name'=>'SUDAN','code'=>'+249'),
                    'SE'=>array('name'=>'SWEDEN','code'=>'+46'),
                    'SG'=>array('name'=>'SINGAPORE','code'=>'+65'),
                    'SH'=>array('name'=>'SAINT HELENA','code'=>'+290'),
                    'SI'=>array('name'=>'SLOVENIA','code'=>'+386'),
                    'SK'=>array('name'=>'SLOVAKIA','code'=>'+421'),
                    'SL'=>array('name'=>'SIERRA LEONE','code'=>'+232'),
                    'SM'=>array('name'=>'SAN MARINO','code'=>'+378'),
                    'SN'=>array('name'=>'SENEGAL','code'=>'+221'),
                    'SO'=>array('name'=>'SOMALIA','code'=>'+252'),
                    'SR'=>array('name'=>'SURINAME','code'=>'+597'),
                    'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'+239'),
                    'SV'=>array('name'=>'EL SALVADOR','code'=>'+503'),
                    'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'+963'),
                    'SZ'=>array('name'=>'SWAZILAND','code'=>'+268'),
                    'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'+1649'),
                    'TD'=>array('name'=>'CHAD','code'=>'+235'),
                    'TG'=>array('name'=>'TOGO','code'=>'+228'),
                    'TH'=>array('name'=>'THAILAND','code'=>'+66'),
                    'TJ'=>array('name'=>'TAJIKISTAN','code'=>'+992'),
                    'TK'=>array('name'=>'TOKELAU','code'=>'+690'),
                    'TL'=>array('name'=>'TIMOR-LESTE','code'=>'+670'),
                    'TM'=>array('name'=>'TURKMENISTAN','code'=>'+993'),
                    'TN'=>array('name'=>'TUNISIA','code'=>'+216'),
                    'TO'=>array('name'=>'TONGA','code'=>'+676'),
                    'TR'=>array('name'=>'TURKEY','code'=>'+90'),
                    'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'+1868'),
                    'TV'=>array('name'=>'TUVALU','code'=>'+688'),
                    'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'+886'),
                    'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'+255'),
                    'UA'=>array('name'=>'UKRAINE','code'=>'+380'),
                    'UG'=>array('name'=>'UGANDA','code'=>'+256'),
                    'US'=>array('name'=>'UNITED STATES','code'=>'+1'),
                    'UY'=>array('name'=>'URUGUAY','code'=>'+598'),
                    'UZ'=>array('name'=>'UZBEKISTAN','code'=>'+998'),
                    'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'+39'),
                    'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'+1784'),
                    'VE'=>array('name'=>'VENEZUELA','code'=>'+58'),
                    'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'+1284'),
                    'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'+1340'),
                    'VN'=>array('name'=>'VIET NAM','code'=>'+84'),
                    'VU'=>array('name'=>'VANUATU','code'=>'+678'),
                    'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'+681'),
                    'WS'=>array('name'=>'SAMOA','code'=>'+685'),
                    'XK'=>array('name'=>'KOSOVO','code'=>'+381'),
                    'YE'=>array('name'=>'YEMEN','code'=>'+967'),
                    'YT'=>array('name'=>'MAYOTTE','code'=>'+262'),
                    'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'+27'),
                    'ZM'=>array('name'=>'ZAMBIA','code'=>'+260'),
                    'ZW'=>array('name'=>'ZIMBABWE','code'=>'+263')
                ]) !!},

                selectedCountryCode: "{{ old('country_code', @$customer->phone ? substr($customer->phone, 1, strlen($customer->phone) - 10) : '') }}"
            }),

            computed: {

                countryCode() {

                    return Object.values(this.countries).map(country => country.code)
                },

                totalParticipants() {

                    return 1 + this.participants.length;
                },

            filters: {

                date_format: (value) => moment(value).format("MMM D YYYY")
            },
        },

            methods: {

                setCountryCode(e) {

                    let country = Object.values(this.countries).find(country => country.name == e.target.value.toLocaleUpperCase());

                    this.selectedCountryCode = country ? country.code : '';
                },

                addParticipant() {

                    const participant = {
                        name: jQuery('input[name="participant-name"]').val(),
                        email: jQuery('input[name="participant-email"]').val(),
                        phone: jQuery('input[name="participant-phone"]').val(),
                    };

                    this.participants.push(participant);

                    Object.keys(participant).forEach(key => jQuery(`input[name="participant-${key}"]`).val(''));
                },

                removeParticipant(id) {

                    this.participants = this.participants.filter((participant, index) => index != id);
                },

                save() {

                    jQuery(`<input type="hidden" name="participants" value='[${this.participants.map(participant => JSON.stringify(participant))}]'/>`).appendTo('#booking-form');

                    return true;
                },
            }
        });
    </script>

@endsection

