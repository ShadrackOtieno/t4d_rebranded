@extends('front.master')

@section('content')
<div class="main-body">

<!-- page conainer -->
<div>
    <div class="container">
        <div class="row header">
        </div>
        
        <div class="row" style="padding: 10px 0;">
          <div class="col-sm-6 first-column">
            <div class="py-2 align-middle">
                <div class="ip-tagline">
                    <h3>Agriculture Sector Services</h3>
                    <hr class="ip-inner-header"/>
                </div>
                <p>In the thriving Agricultural sector, Indepth Research Institute stands as a catalyst for growth, offering comprehensive corporate training and development, consultancy services, and industry solutions. Rooted in a commitment to agricultural excellence, we provide specialized services designed to empower professionals and organizations contributing to the vitality of the agricultural landscape.</p>
            </div>
            <div class="px-2 py-2">
                <button type="button" class="btn bc-btn btn-primary">Agricultural Trainings</button>
            </div>
          </div>
          <div class="col-sm-6 second-column">
            <img class="img-side" src="{{ asset('images/Agricultural Trainings.webp') }}" alt="Agricultural Trainings">
          </div> 
        </div>
    </div>

    <!-- about brief -->
    <div class="dark-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Agricultural Group Trainings</h3>
                    <hr/>
                </span>
                    <p>Cultivate a knowledgeable and skilled workforce through our customized group training sessions. From sustainable farming practices to modern agricultural technologies, our programs help your team navigate the intricacies of the Agricultural sector effectively.</p>
            </div>
            {{-- <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- END about brief -->

    <!-- values brief -->
    <div class="light-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Team Building Services in Agriculture</h3>
                    <hr/>
                    <p>Sow the seeds of collaboration within your agricultural team through our team-building initiatives. Going beyond conventional exercises, we integrate industry-specific scenarios to enhance communication, problem-solving, and cohesion among your agricultural professionals.</p>
                </span>
            </div>
            {{-- <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- END values brief -->

    <!-- explore -->
    <div class="dark-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Our Capabilities in Agriculture</h3>
                    <hr class="ip-inner-header"/>
                </span>
                <p>Maximize the potential of your team with our capabilities in data collection, analytics, and social and market research. In the Agricultural sector, precision in data is crucial. Our experts guide you in utilizing data to make informed decisions, strategize effectively, and contribute to the growth of your agricultural endeavors.</p>
            </div>
            <div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <span class="fa fa-2x fa-database"></span>
                            <h4>Data Collection</h4>
                            <p>Harvest the power of precise data collection methods tailored for the agricultural industry. Our experts assist you in implementing effective data gathering techniques, ensuring accuracy and relevance in agricultural settings. From crop yield data to market trends, we empower your organization with the insights needed for strategic decision-making.</p>
                            <button type="button" class="bc-btn btn btn-primary">Explore</button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <span class="fa fa-2x fa-bar-chart"></span>
                            <h4>Data Analytics</h4>
                            <p>Navigate the vast fields of agriculture with our advanced data analytics capabilities. Unearth valuable insights from extensive datasets, enabling you to identify trends, optimize farming processes, and enhance overall agricultural productivity. Our tailored analytics solutions provide actionable intelligence, fostering continuous improvement and innovation in your agricultural practices.</p>
                                <button type="button" class="bc-btn btn btn-primary">Explore</button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <span class="fa fa-2x fa-tags"></span>
                            <h4>Social & Market Research</h4>
                            <p>Gain a competitive advantage in the agricultural sector through our social and market research expertise. Plowing through data on consumer trends, market dynamics, and sustainable agricultural practices, we provide insights to refine strategies, connect with stakeholders, and stay ahead in the ever-evolving agricultural landscape. Our research services empower you to make informed decisions that positively impact both your organization and the communities you serve.</p>
                                <button type="button" class="bc-btn btn btn-primary">Explore</button>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <span class="fa fa-2x fa-sitemap"></span>
                            <h4>Digital Transformation</h4>
                            <p>Our programs go beyond conventional training, offering dynamic and interactive learning experiences that not only enhance participants' abilities.</p>
                            <button type="button" class="btn bc-btn btn-primary">Explore</button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <img src="{{ asset('images/nairobi.webp') }}" class="img-central" alt="nairobi, kenya">
                            <br>
                            <h4>NGO Sector</h4>
                            <p>Our business skills training programs go beyond traditional training, offering a blend of cutting-edge curriculum, hands-on learning experiences, and expert facilitation to ensure that participants not only acquire essential business skills but also develop the mindset and adaptability required to navigate challenges and seize opportunities.</p>
                                <button type="button" class="btn bc-btn btn-primary">Browse Our Services</button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <img src="{{ asset('images/courses.webp') }}" class="img-central" alt="courses">
                            <br>
                            <h4>BFSI Sector</h4>
                            <p>Indepth Research Institute (IRES) has a huge selection of courses ranging from Technical Courses, NGO Sector Courses, Business Courses and Management
                                Courses. We offer class based courses, virtual courses at the comfort of your home or office and through our
                                e-learning portal - for individuals and teams.</p>
                                <button type="button" class="btn bc-btn btn-primary">Browse Our Services</button>
                        </div>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
    <!-- END explore -->

    <!-- tour content -->
    {{-- <div class="lead-brief ip-content">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Study Tours</h3>
                    <hr class="ip-inner-header"/>
                </span>
                <p></p>
            </div>
            <div class="ip-brief-desc" id="">
                <p>Whether you need an excursion for yourself or your team, a field trip, case study tour and so much more, we’ve got you covered. 
                    Explore our collection of tours and pick your next destination.</p>
            </div>
            <div class="ip-categories-col">
                <div class="ip-inner-header">
                    <h3>Explore all categories</h3>
                    <hr/>
                </div>

                @include('front/tour/partials/filter')

                <div class="row"> 
                    @forelse ($tours as $tour)
                        <div class="col-sm-3 ip-st-col">
                            <div class="ip-cat-img-new">
                                <a href="{{ route('tour.show', $tour) }}">
                                    <img src="{{ asset('storage/'.$tour->cover) }}" alt="{{ $tour->cover }}">
                                </a>
                                <div class="clearfix">
                                    <div>
                                        <h6>
                                            <a href="{{ route('tour.show', $tour) }}">
                                                {{ $tour->name }}
                                            </a>
                                        </h6>
                                        <span class="tour-price">
                                            {{ ($kes = @$tour->currencies->firstWhere('code', 'KES')) ? 'KES ' . number_format($kes->pivot->amount) : '' }}

                                            USD {{ number_format(@$tour->currencies->firstWhere('code', 'USD')->pivot->amount) }}
                                        </span>
                                    </div>
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = `{{ route('tour.show', $tour) }}`">
                                        Book
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-sm-3 ip-st-col">
                            <b>No tour available</b>
                        </div>
                    @endforelse
                </div>

                {{ $tours->links() }}
            </div>
        </div>
    </div> --}}
    <!-- END tour content -->

    <!-- page content -->
    <div class="ip-content">
        <div class="container">
            <!-- course schedule -->
            <div>
                <span class="ip-tagline">
                    <h3>Technology and Software in Agriculture</h3>
                    <hr/>
                </span>
                <p>Stay ahead in the modern agricultural landscape with our specialized technology and software solutions. From precision farming tools to farm management software, we ensure your organization remains at the forefront of technological advancements in agriculture.</p>
            </div>
            {{-- <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- END page content -->

    <!-- explore -->
    <div class="dark-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Agricultural Exposure/ Study Tours</h3>
                    <hr class="ip-inner-header"/>
                </span>
                <p>Immerse your team in experiential learning through our curated study tours. Explore successful farming operations, innovative agricultural models, and emerging trends firsthand, cultivating a deeper understanding of global agricultural dynamics. Indepth Research Institute, your trusted partner in advancing capabilities and driving success in the Agricultural sector.</p>
            </div>
            {{-- <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary">
                                                        <span>Course Details</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- END explore -->

</div>
<!-- END page container -->

</div>
@endsection
