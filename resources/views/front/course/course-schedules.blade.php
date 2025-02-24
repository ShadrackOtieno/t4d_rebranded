@extends('front.master')

@section('content')
    <div class="main-body">
        <!-- page breadcrumbs -->
        <div class="breadcrumbs">
            <span>
                <a href="{{ route('home') }}" class="fa fa-home"></a>
            </span>
            <span class="bc-sep"></span>
            <span>
                <a href="{{ route('course.category.index') }}">
                    All Categories
                </a>
            </span>
            <span class="bc-sep"></span>
            <span>
                <a href="{{ route('course.category.subcategory.index', $course->category) }}">
                    {{ $course->category->name }}
                </a>
            </span>
            <span class="bc-sep"></span>
            <span>
                <a
                    href="{{ route('course.category.subcategory.show', [
                        'category' => $course->category,
                        'subcategory' => $course->subcategory,
                    ]) }}">
                    {{ $course->subcategory->name }}
                </a>
            </span>
            <span class="bc-sep"></span>
            @if ($course->topic)
                <span>
                    <a href="{{ route('course.topic.show', $course->topic->slug) }}">
                        {{ $course->topic->name }}
                    </a>
                </span>
                <span class="bc-sep"></span>
            @endif
            <span class="bc-current-page">{{ $course->name }}</span>
        </div>
        <!-- END page breadcrumbs -->

        @include('front/partials/alert')

        <!-- Page hero -->
        {{-- <div class="inner-page-hero" style="background-image: linear-gradient(270deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1)), url({{ $course->cover ? asset('storage/'.$course->cover) : '../img/cover.jpg' }});">
            <div class="container">
                <div class="ip-content-one">
                <span class="ip-heading">
                    <h3>{{ ucfirst($course->name) }} </h3>
                </span>
                </div>
            </div>
        </div> --}}
        <!-- End page hero -->

        <div class="container">
            <div class="container">
                <div class="ip-content-one">
                    <span class="ip-heading">
                        <h3>{{ ucfirst($course->name) }} </h3>
                    </span>
                </div>
            </div>
            <div class="tab-content">
                <div>
                    @if ($type == 'physical-classess')
                        <h5 class="pt-3">Face to Face Schedules By Location</h5>
                        <p>Our face to face schedules allow you to choose any classroom course of your choice to be
                            delivered at any venue of your choice - offering you the ultimate in convenience and value for
                            money. </p>
                        {{-- <a class="btn btn-mod btn-course btn-medium animation-one" href="#" data-toggle="modal" data-target="#customizeDates">
                            Customize Attendance Dates
                        </a> --}}
                        <div class="accordion" id="accordionExample">
                            @foreach ($locations as $location)
                                @php
                                    $location_schedules = $course->physicalClasses
                                        ->load('currencies')
                                        ->filter(function ($schedule) {
                                            return strtotime('today') <= strtotime($schedule->booking_end);
                                        })
                                        ->filter(function ($schedule) use ($location) {
                                            return $schedule->city_id == $location->id;
                                        });
                                @endphp

                                <div class="">
                                    @if ($location->priority == 1)
                                        <div class="card-header" id="{{ $location->id }}">
                                            <h6 class="btn text-dark" type="button" data-toggle="collapse"
                                                data-target="#T{{ $location->id }}" aria-expanded="true"
                                                aria-controls="T{{ $location->id }}">
                                                Register for {{ $location->name }} Course here: <span
                                                    class="has-child fa fa-chevron-down"></span>
                                            </h6>
                                        </div>

                                        <div id="T{{ $location->id }}" class="accordion-collapse collapse show"
                                            aria-labelledby="{{ $location->id }}" data-parent="#accordionExample">
                                            <div class="container table-responsive">
                                                <!-- Display cards on small screens and hide tables on medium-sized screens and larger -->
                                                <div class="d-block d-md-none">
                                                        @if (empty($schedule->course))
                                                            {{-- skip the current iteration --}}
                                                            @continue
                                                        @endif
                                                        <div class="card mb-3">
                                                            <div class="card-body">
                                                                <p class="card-text">
                                                                    <strong>Code:</strong>
                                                                    {{ $schedule->course->code }}<br>
                                                                    <strong>Date:</strong>
                                                                    {{ date('j M Y', strtotime($schedule->from)) }} -
                                                                    {{ date('j M Y', strtotime($schedule->to)) }}<br>
                                                                    <strong>Duration:</strong> {{ $schedule->duration }}
                                                                    {{ ngettext('day', 'days', $schedule->duration) }}<br>
                                                                    <strong>Location:</strong>
                                                                    {{ "{$schedule->city->name}, {$schedule->city->venue->country}" }}<br>
                                                                    <strong>Fees:</strong>
                                                                    @if (request()->getHttpHost() == config('domains.rwanda'))
                                                                        {{ ($rwf = @$schedule->currencies->firstWhere('code', 'RWF')) ? 'RWF ' . number_format($rwf->pivot->amount) : '' }}
                                                                    @else
                                                                        {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '' }}
                                                                    @endif
                                                                    USD
                                                                    {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                                </p>
                                                                <a class="td-reg-btn"
                                                                    href="{{ route('course.booking.create', [
                                                                        'course' => $course,
                                                                        'class' => 'physical',
                                                                        'schedule' => $schedule->id,
                                                                    ]) }}">
                                                                    Register
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Display tables on medium-sized screens and larger -->
                                                <div class="d-none d-md-block">
                                                    <table class="table table-sm table-striped ires-table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Code</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Duration</th>
                                                                <th scope="col">Location</th>
                                                                <th scope="col">Fees (VAT Exclusive)</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($location_schedules as $schedule)
                                                                <tr>
                                                                    <td>{{ $schedule->course->code }}</td>
                                                                    <td>{{ date('j M Y', strtotime($schedule->from)) }} -
                                                                        {{ date('j M Y', strtotime($schedule->to)) }}</td>
                                                                    <td>
                                                                        {{ $schedule->duration }}
                                                                        {{ ngettext('day', 'days', $schedule->duration) }}
                                                                    </td>
                                                                    <td>{{ "{$schedule->city->name}, {$schedule->city->venue->country}" }}
                                                                    </td>
                                                                    <td>
                                                                        @if (request()->getHttpHost() == config('domains.rwanda'))
                                                                            {{ ($rwf = @$schedule->currencies->firstWhere('code', 'RWF')) ? 'RWF ' . number_format($rwf->pivot->amount) : '' }}
                                                                        @else
                                                                            {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '' }}
                                                                        @endif
                                                                        USD
                                                                        {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                                    </td>
                                                                    <td>
                                                                        <a class="td-reg-btn"
                                                                            href="{{ route('course.booking.create', [
                                                                                'course' => $course,
                                                                                'class' => 'physical',
                                                                                'schedule' => $schedule->id,
                                                                            ]) }}">
                                                                            Register
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td>
                                                                        <h6>Need a schedule in this location?</h6>
                                                                        <p>Contact Us on <a href="tel:+254715077817">(+254)
                                                                                715 077 817</a> / <a
                                                                                href="tel:+254792516000">(+254) 792 516
                                                                                000</a> or email us <a
                                                                                href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card-header" id="{{ $location->id }}">
                                            <h6 class="btn text-dark" type="button" data-toggle="collapse"
                                                data-target="#T{{ $location->id }}" aria-expanded="true"
                                                aria-controls="T{{ $location->id }}">
                                                Register for {{ $location->name }} Course here: <span
                                                    class="has-child fa fa-chevron-down"></span>
                                            </h6>
                                        </div>

                                        <div id="T{{ $location->id }}" class="collapse collapsed container"
                                            aria-labelledby="{{ $location->id }}" data-parent="#accordionExample">
                                            <div class="container table-responsive">
                                                <!-- Display cards on small screens and hide tables on medium-sized screens and larger -->
                                                <div class="d-block d-md-none">
                                                    @foreach ($location_schedules as $schedule)
                                                        @if (empty($schedule->course))
                                                            <tr>
                                                                <td>
                                                                    <h6>Need a schedule in this location?</h6>
                                                                    <p>Contact Us on <a href="tel:+254715077817">(+254) 715
                                                                            077 817</a> / <a href="tel:+254792516000">(+254)
                                                                            792 516 000</a> or email us <a
                                                                            href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        <div class="card mb-3">
                                                            <div class="card-body">
                                                                <p class="card-text">
                                                                    <strong>Code:</strong>
                                                                    {{ $schedule->course->code }}<br>
                                                                    <strong>Date:</strong>
                                                                    {{ date('j M Y', strtotime($schedule->from)) }} -
                                                                    {{ date('j M Y', strtotime($schedule->to)) }}<br>
                                                                    <strong>Duration:</strong> {{ $schedule->duration }}
                                                                    {{ ngettext('day', 'days', $schedule->duration) }}<br>
                                                                    <strong>Location:</strong>
                                                                    {{ "{$schedule->city->name}, {$schedule->city->venue->country}" }}<br>
                                                                    <strong>Fees:</strong>
                                                                    @if (request()->getHttpHost() == config('domains.rwanda'))
                                                                        {{ ($rwf = @$schedule->currencies->firstWhere('code', 'RWF')) ? 'RWF ' . number_format($rwf->pivot->amount) : '' }}
                                                                    @else
                                                                        {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '' }}
                                                                    @endif
                                                                    USD
                                                                    {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                                </p>
                                                                <a class="td-reg-btn"
                                                                    href="{{ route('course.booking.create', [
                                                                        'course' => $course,
                                                                        'class' => 'physical',
                                                                        'schedule' => $schedule->id,
                                                                    ]) }}">
                                                                    Register
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <!-- Display tables on medium-sized screens and larger -->
                                                <div class="d-none d-md-block">
                                                    <table class="table table-sm table-striped ires-table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Code</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Duration</th>
                                                                <th scope="col">Location</th>
                                                                <th scope="col">Fees</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($location_schedules as $schedule)
                                                                <tr>
                                                                    <td>{{ $schedule->course->code }}</td>
                                                                    <td>{{ date('j M Y', strtotime($schedule->from)) }} -
                                                                        {{ date('j M Y', strtotime($schedule->to)) }}</td>
                                                                    <td>
                                                                        {{ $schedule->duration }}
                                                                        {{ ngettext('day', 'days', $schedule->duration) }}
                                                                    </td>
                                                                    <td>{{ "{$schedule->city->name}, {$schedule->city->venue->country}" }}
                                                                    </td>
                                                                    <td>
                                                                        @if (request()->getHttpHost() == config('domains.rwanda'))
                                                                            {{ ($rwf = @$schedule->currencies->firstWhere('code', 'RWF')) ? 'RWF ' . number_format($rwf->pivot->amount) : '' }}
                                                                        @else
                                                                            {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '' }}
                                                                        @endif
                                                                        USD
                                                                        {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                                    </td>
                                                                    <td>
                                                                        <a class="td-reg-btn"
                                                                            href="{{ route('course.booking.create', [
                                                                                'course' => $course,
                                                                                'class' => 'physical',
                                                                                'schedule' => $schedule->id,
                                                                            ]) }}">
                                                                            Register
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td>
                                                                        <h6>Need a schedule in this location?</h6>
                                                                        <p>Contact Us on <a href="tel:+254715077817">(+254)
                                                                                715 077 817</a> / <a
                                                                                href="tel:+254792516000">(+254) 792 516
                                                                                000</a> or email us <a
                                                                                href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div style="" class="custom-dates text-center">
                                                <a class="btn btn-mod btn-course btn-medium animation-one" href="#"
                                                    data-toggle="modal" data-target="#customizeDates">
                                                    Customize Attendance Dates
                                                </a>

                                            </div>

                                        </div>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    @endif

                    @if ($type == 'virtual-classess')
                        <h5 class="pt-3">Virtual Trainer Led Schedules</h5>
                        <a class="btn btn-mod btn-course btn-medium animation-one" href="#" data-toggle="modal"
                            data-target="#customizeDates">
                            Customize Attendance Dates
                        </a>
                        <div class="container table-responsive">
                            <div class="d-none d-md-block">
                                <table class="table table-sm table-striped ires-table">
                                    @if (
                                        $course->virtualClasses->filter(function ($schedule) {
                                                return strtotime('today') <= strtotime($schedule->booking_end);
                                            })->count() > 0)
                                        <thead>
                                            <tr>
                                                <th scope="col">Code</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Duration</th>
                                                <th scope="col">Period</th>
                                                <th scope="col">Fees</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                    @endif
                                    <tbody>
                                        @forelse ($course->virtualClasses->load('currencies')->filter(function ($schedule) {
                                        return strtotime('today') <= strtotime($schedule->booking_end);
                                    }) as $schedule)
                                            <tr>
                                                <td>{{ $course->code }}</td>
                                                <td>{{ date('j M Y', strtotime($schedule->from)) }} -
                                                    {{ date('j M Y', strtotime($schedule->to)) }}</td>
                                                <td>
                                                    {{ $schedule->duration }}
                                                    {{ ngettext('day', 'days', $schedule->duration) }}
                                                </td>
                                                <td>
                                                    {{ $schedule->period }}
                                                </td>
                                                <td>
                                                    {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }}

                                                    &vert;

                                                    USD
                                                    {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                                </td>
                                                <td>
                                                    <a class="td-reg-btn"
                                                        href="{{ route('course.booking.create', [
                                                            'course' => $course,
                                                            'class' => 'virtual',
                                                            'schedule' => $schedule->id,
                                                        ]) }}">
                                                        Register
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="d-flex justify-content-center">
                                                <div class="col-md-8">
                                                    <p>Contact Us on <a href="tel:+254715077817">(+254) 715 077 817</a> /
                                                        <a href="tel:+254792516000">(+254) 792 516 000</a> or email us <a
                                                            href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a>
                                                        or fill the form below for a virtual course.</p>

                                                    @include('front/partials/contact_form')
                                                </div>
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-md-none">
                                @forelse ($course->virtualClasses->load('currencies')->filter(function ($schedule) {
                                    return strtotime('today') <= strtotime($schedule->booking_end);
                                    }) as $schedule)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $course->code }}</h5>
                                            <p class="card-text">
                                                <strong>Date:</strong> {{ date('j M Y', strtotime($schedule->from)) }} -
                                                {{ date('j M Y', strtotime($schedule->to)) }}<br>
                                                <strong>Duration:</strong> {{ $schedule->duration }}
                                                {{ ngettext('day', 'days', $schedule->duration) }}<br>
                                                <strong>Period:</strong> {{ $schedule->period }}<br>
                                                <strong>Fees:</strong>
                                                {{ ($kes = @$schedule->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '-' }}<br>
                                                USD
                                                {{ number_format(@$schedule->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                            </p>
                                            <a href="{{ route('course.booking.create', [
                                                'course' => $course,
                                                'class' => 'virtual',
                                                'schedule' => $schedule->id,
                                            ]) }}"
                                                class="btn btn-primary">Register</a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="d-flex justify-content-center">
                                        <div class="col-md-8">
                                            <p>Contact Us on <a href="tel:+254715077817">(+254) 715 077 817</a> / <a
                                                    href="tel:+254792516000">(+254) 792 516 000</a> or email us <a
                                                    href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a>
                                                or fill the form below for a virtual course.</p>

                                            @include('front/partials/contact_form')
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endif

                    @if ($type == 'self-paced')
                        <h3 class="pt-3 text-center">What to expect in IRES E-Learning</h3>
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <div class="lead-brief-c">
                                    <span class="fa fa-2x fa-file-text-o"></span>
                                    <h4>Tutor support 24/7</h4>
                                    <p>Our expert trainers are on hand to help you with any questions which may arise.</p>
                                </div>
                            </div>

                            <div class="col-sm-6 text-center">
                                <div class="lead-brief-c">
                                    <span class="fa fa-2x fa-folder-open-o"></span>
                                    <h4>Immediate access for 90 days</h4>
                                    <p>All of our courses come with a standard 90 days access which can be upgraded if need
                                        be.</p>
                                </div>
                            </div>
                        </div>

                        @if ($course->elearningClass)
                            <a href="{{ strpos($course->elearningClass->website, 'http') ? strreplace('http://', 'https://', $course->elearningClass->website) : "https://{$course->elearningClass->website}" }}"
                                target="_blank">
                                {{ $course->elearningClass->website }}
                            </a>
                        @else
                            <div class="d-flex justify-content-center">
                                <div class="col-md-8">
                                    <p>Contact Us on <a href="tel:+254715077817">(+254) 715 077 817</a> / <a
                                            href="tel:+254792516000">(+254) 792 516 000</a> or email us <a
                                            href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a> or
                                        fill the form below for E-Learning course.</p>

                                    @include('front/partials/contact_form')
                                </div>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="customizeDates" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form action="{{ route('custom-course-booking', $course) }}" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Customize your dates of attendance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                        <div class="form-group">
                            <small class="form-text text-muted">Full Name</small>
                            <input type="text" class="form-control" placeholder="Full Name" name="full_name"
                                value="{{ old('full_name', @$customer->name) }}" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Phone Number</small>
                                <input type="tel" class="form-control" placeholder="Phone Number"
                                    name="phone_number" value="{{ old('phone_number', @$customer->phone) }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Email Address</small>
                                <input type="email" class="form-control" placeholder="Email Address" name="email"
                                    value="{{ old('email', @$customer->account->email) }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Organization</small>
                                <input type="text" class="form-control" placeholder="organization"
                                    name="organization" value="{{ old('organization', @$customer->company->name) }}"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Number of Participants</small>
                                <input type="text" class="form-control" placeholder="1" name="number_of_participants"
                                    value="{{ old('number_of_participants') }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <small class="form-text text-muted">Start Date</small>
                            <input type="date" class="form-control" name="start_date"
                                value="{{ old('start_date') }}" required>
                        </div>
                        <div class="form-group">
                            <small class="form-text text-muted">Duration in Days</small>
                            <input type="number" class="form-control" placeholder="5" name="name"
                                value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit Dates</button>
                    </div>
                </form>
            </div>
        </div> --}}
    @endsection
