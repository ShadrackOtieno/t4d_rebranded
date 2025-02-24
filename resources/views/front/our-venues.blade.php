@extends('front.master')
@section('content')
    <style>
        .content-body {
            border-bottom: 1px solid #ccc;
            margin-top: 3em;
        }

        .content-venues a {
            color: #0096FF !important;
            text-decoration: underline;
            font-size: 20px;
        }

        .content-venues a:hover {
            color: #00a651 !important;
        }

        .card-img-caption {
            border-top-left-radius: calc(.25rem - 1px);
            border-top-right-radius: calc(.25rem - 1px);
        }

        .card-img-caption .card-img-top {
            z-index: 0;
        }

        .card-img-caption .card-text {
            text-align: center;
            width: 100%;
            margin: 33% 0;
            position: absolute;
            z-index: 1;
        }
    </style>
    <div class="container content-body">
        <div class="row" style="padding: 10px 0;">
            <div class="col-sm-12 first-column">
                <div class="py-2 align-middle">
                    <div class="ip-tagline">
                        <h3>Our Venues</h3>
                        <hr class="ip-inner-header" />
                    </div>
                    <p>Select one of our Global training venues to see scheduled courses</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach (App\City::all() as $city)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card" style="width: 100%;">
                        <div class="card-img-caption">
                            <a href="{{ route('course.venue.index', ['city' => $city->name]) }}">
                                <a href="#">
                                    <img src="{{ asset('storage/images/'.$city->cover) }}" alt="{{ $city->name }}">
                                </a>
                            </a>

                                    {{-- <img src="{{ asset('storage/images/' . $city->cover) }}" class="card-img-top" alt="{{ $city->name }}"> --}}


                        </div>
                        <div class="card-body">

                            <h4>
                                <a href="{{ route('course.venue.index', ['city' => $city->name]) }}">
                                    {{ $city->name }}
                                </a>
                            </h4>

                            <a class="btn bc-btn btn-primary"
                                href="{{ route('course.venue.index', ['city' => $city->name]) }}">
                                View Courses
                            </a>
                            <a class="btn bc-btn btn-danger" onclick="window.location.href = `#`">
                                About Venue
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>




    <!-- <span class="mm-title">
                            Short Courses by Venue
                        </span> -->


    </div>

    </div>
    </div>

    <p>
        <span></span>
    </p>
    </div>
    </div>
    </section>
    </div>
    <!-- /container -->

    <script>
        // Adds active state to secion navigation
        $('.nav li').click(function(e) {
            e.preventDefault();
            $('.nav li').removeClass('active');
            $(this).addClass('active');
        });
    </script>
@endsection
