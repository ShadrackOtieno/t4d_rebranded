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
                    <h3>Microfinance Sector Services</h3>
                    <hr class="ip-inner-header"/>
                </div>
                <p>The microfinance industry being one of the most crucial in the financial sector of an economy, Indepth Research Institute (IRES) stands as a hub for comprehensive corporate training and development, consultancy services, and industry solutions. Committed to excellence in microfinance, we offer specialized services designed to empower professionals and organizations navigating the detailed terrain of financial inclusion and microenterprise development.</p>
            </div> 
            <div class="px-2 py-2">
                <button type="button" class="btn bc-btn btn-primary">Microfinance Sector Trainings</button>
            </div>
          </div>
          <div class="col-sm-6 second-column">
            <img class="img-side" src="{{ asset('images/courses.webp') }}" alt="courses">
          </div> 
        </div>
    </div>

    <!-- about brief -->
    <div class="dark-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Group Trainings for Microfinance Sector</h3>
                    <hr/>
                </span>
                <p>Elevate your team's expertise with our tailored group training sessions in microfinance dynamics. From financial inclusion strategies to the latest trends in microenterprise development, our programs ensure your workforce is well-equipped to navigate the complexities of the Microfinance sector.</p>
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
                    <h3>Team Building Services for Microfinance Sector</h3>
                    <hr/>
                    <p>Foster a collaborative and client-centric team with our specialized team-building initiatives. Going beyond conventional exercises, we integrate scenarios relevant to the microfinance sector to enhance communication, problem-solving, and cohesion among your professionals.</p>
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
                    <h3>Our Capabilities in the Microfinance Sector</h3>
                    <hr class="ip-inner-header"/>
                </span>
                <p>Unlock the full potential of your microfinance team with our expertise in data collection, analytics, and market research. In the Microfinance sector, precision in data is vital. We help guide you in utilizing data to make informed decisions, tailor financial services effectively, and contribute to the success of your microfinance initiatives.</p>
            </div>
            <div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <span class="fa fa-2x fa-database"></span>
                            <h4>Data Collection</h4>
                            <p>Implement precise data collection methods tailored for the microfinance industry. We assist you in effective data gathering techniques, ensuring accuracy and relevance in microenterprise settings. From client demographics to financial performance metrics, we empower your organization with the insights needed for strategic decision-making.</p>
                            <button type="button" class="bc-btn btn btn-primary">Explore</button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <span class="fa fa-2x fa-bar-chart"></span>
                            <h4>Data Analytics</h4>
                            <p>Navigate the diverse landscape of microfinance with our advanced data analytics capabilities. Uncover valuable insights from extensive datasets, enabling you to identify client trends, optimize financial processes, and enhance overall microfinance performance. Our tailored analytics solutions provide actionable intelligence, fostering continuous improvement and innovation in your microfinance practices.</p>
                                <button type="button" class="bc-btn btn btn-primary">Explore</button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="lead-brief-c">
                            <span class="fa fa-2x fa-tags"></span>
                            <h4>Social & Market Research</h4>
                            <p>Gain a competitive advantage in the Microfinance sector through our market research expertise. Delve into data on client preferences, industry dynamics, and emerging microfinance trends. Our research services provide insights to refine strategies, connect with stakeholders, and stay ahead in the ever-evolving microfinance market. Empower your organization to make informed decisions that positively impact your microfinance initiatives and the clients you serve.</p>
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
                            <img src="{{ asset('images/nairobi.webp') }}" class="img-central" alt="nairobi">
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
                    <h3>Technology and Software for Microfinance Sector</h3>
                    <hr/>
                </span>
                <p>Stay ahead in the modern microfinance landscape with our specialized technology and software solutions. From microfinance management systems to innovative client engagement tools, we ensure your organization remains at the forefront of technological advancements in the microfinance industry.</p>
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
                    <h3>Exposure/ Study Tours for Microfinance Sector</h3>
                    <hr class="ip-inner-header"/>
                </span>
                <p>Immerse your microfinance team in experiential learning through our curated study tours. Explore successful microfinance models, innovative financial inclusion practices, and emerging trends firsthand, cultivating a deeper understanding of the global Microfinance sector. Indepth Research Institute, your trusted partner in advancing capabilities and driving success in the Microfinance sector.</p>
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
