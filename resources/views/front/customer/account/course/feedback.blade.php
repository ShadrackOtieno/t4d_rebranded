@extends('front.master')

@section('title', "{$booking->course->name} | Registered Courses")

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <!-- home -->
                <span">
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <span">
                    <a href="{{ route('customer.account.tour.index') }}">
                        Registered Courses
                    </a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">
                    {{ $booking->course->name }}
                </span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <!-- Tabs Section -->
                    <div>
                        @include('front/customer/account/partials/navbar')
                        
                        <div class="tab-pane fade show active" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
                            <div class="row">
                                <div class="col-sm-6 pinfo">
                                    <form action="{{ route('customer.account.course.issue', $booking) }}" method="POST">

                                        @csrf

                                        <!-- personal details -->
                                        <p>Tell us any issue you had with the training</p>

                                        <div class="reg-sec">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <small class="form-text text-muted">Select Trainers</small>
                                                    
                                                    <select class="form-control" name="trainers[]" multiple>
                                                        @foreach ($booking->course->trainers as $trainer)

                                                            <option value="{{ $trainer->id }}" 
                                                            @if ( in_array($trainer->id, $booking->issue ? $booking->issue->trainers->modelKeys() : []) )
                                                                selected
                                                            @endif>
                                                                {{ $trainer->name }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <small class="form-text text-muted">Message</small>
                                                    <textarea class="form-control" name="message" required>{{ old('message', @$booking->issue->message) }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reg-btn">
                                            <button class="btn btn-success" type="submit">
                                                Submit Issue
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-sm-6 pinfo">
                                    <form action="{{ route('customer.account.course.review', $booking) }}" method="POST">

                                        @csrf

                                        <!-- personal details -->
                                        <p>Rate and submit your review</p>

                                        <div class="reg-sec">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <small class="form-text text-muted">Rate out of 5</small>
                                                    
                                                    @for ($rating = 1; $rating <= 5; $rating++)
                                                        <label>
                                                            <input type="radio" name="rating" value="{{ $rating }}"
                                                            @if ( old('rating', @$booking->review->rating) == $rating ) checked @endif>

                                                            {{ $rating }} &nbsp;
                                                        </label>
                                                    @endfor

                                                    @include('front/partials/form_error', ['field' => 'first_name'])
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <small class="form-text text-muted">Comment</small>
                                                    <textarea class="form-control" name="comment">{{ old('comment', @$booking->review->comment) }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="reg-btn">
                                            <button class="btn btn-success" type="submit">
                                                Review
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection