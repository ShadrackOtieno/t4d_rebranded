<title>Invitation Letter</title>

{{-- <div class="clearfix">
<table>
	<tr>
		<td class="text-left">
			Ref: IRES/SPB/{{ strtoupper( date('M') ) }}/{{ date('Y') }}
		</td>
		<td class="text-right">
			Your Ref: TBA
		</td>
	</tr>
</table>
</div> --}}

<div class="clearfix">
	<img class="center" src="{{ public_path('images/ires-bg.jpg') }}" width="710", height="970" alt="ires-bg">
</div>
<br>
<p class="address">
	To: <br>
	{{ $booking->company->name }}, <br>
	{{ $booking->country }}.
</p>
<p class="date">
	{{ date('jS F Y') }}
</p>
<p class="salutation">
	Att. {{ $payment->customer->name ?? $booking->salutation ." ". $booking->name }},
</p>

<div class="container" id="body">
	<h3 class="reference">
		SUBJECT: INVITATION TO ATTEND A {{ $schedule->duration }} {{ ngettext('DAY', 'DAYS', $schedule->duration) }} TRAINING WORKSHOP ON {{ strtoupper($course->name) }}
	</h3>
	<p>
		We are delighted to invite you to participate in a {{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }} training workshop {{ $course->name }} to be held on {{ date('jS F Y', strtotime($schedule->from)) }} - {{ date('jS F Y', strtotime($schedule->to)) }}
		@if ( get_class($schedule) == 'App\PhysicalClass' && $schedule->city->name != 'Virtual')
			in {{ $schedule->city->name}}, {{$schedule->city->venue->country }}
		@else
			Virtually
		@endif.
	</p>
	{!! $course->description !!}
	{{-- @if ( strpos($course->description, 'Duration') == false )
		<h4>Duration</h4>
		{{ $schedule->duration }} {{ ngettext('day', 'days', $schedule->duration) }}
	@endif --}}
	@if ( strpos($course->description, 'Course Outline') == false and isset($course->outline) )
		{{-- <h4>Course Outline</h4> --}}
		{!! $course->outline !!}
	@endif

	{!! $course->module !!}
	<h4>METHODOLOGY</h4>
	<p>
		The instructor-led training is delivered using a blended learning approach and comprises of presentations, guided sessions of practical exercise, web-based tutorials and group work. Our facilitators are seasoned industry experts with years of experience, working as professional and trainers in these fields. All facilitation and course materials will be offered in English. The participants should be reasonably proficient in English.
	</p>
	<h4>ACCREDITATION</h4>
	<p>
		Upon successful completion of this training, participants will be issued with an Indepth Research Institute (IRES) certificate.
	</p>
	<h4>TRAINING VENUE</h4>
	<p>
		The training will be held 
		@if ( get_class($schedule) == 'App\PhysicalClass' && $schedule->city->name != 'Virtual')
			in {{ $schedule->city->name}}, {{$schedule->city->venue->country }}
		@else
			Virtually
		@endif. The course fee covers the course tuition, training materials, Certificate, two break refreshments and lunch.   All participants will additionally cater for their, travel expenses, insurance, and other personal expenses.
	</p>
	<h4>TAILOR-MADE</h4>
	<p>
		This training can also be customized for your institution upon request to a minimum of 4 participants. You can have it delivered in our training centre or at a convenient location.
	</p>
	<p>
		For further inquiries, please contact us on Tel: +254792516000, +254 715 077 817or mail outreach@indepthresearch.org
	</p>
</div>

<div class="container" id="footer">
	Yours Sincerely,
	<div id="signature">
		<img src="{{ public_path('images/signature.jpg') }}" height="70px">
	</div>
	Kennedy Karani. <br>
	CEO/Managing Director <br>
	<b>{{ config('app.name') }}</b>
</div>


<style type="text/css">
	.clearfix::after {
		content: "";
		clear: both;
		display: table;
	}
	.left {
		float: left;
	}
	.right {
		float: right
	}
	.text-left {
		text-align: left;
	}
	.text-right {
		text-align: right;
	}
	.text-center {
		text-align: center;
	}
	.container {
		margin-bottom: 40px;
	}
	#header .clearfix > * {
		width: 50%;
	}
	.reference{
		 border-bottom: 1px solid #a11e22;
		 padding-bottom: 10px;
	}
</style>
