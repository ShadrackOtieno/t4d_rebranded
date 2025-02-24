@extends('front.master')

@section('content')
<div class="main-body">

<!-- page conainer -->
<div>
    <div class="container">
        <div class="row" style="padding: 10px 0;">
          <div class="col-sm-6 first-column">
            <div class="py-2 align-middle">
                <div class="ip-tagline">
                    <h1>Corporate Training and Development</h1>
                    <hr class="ip-inner-header"/>
                </div>
                <p>We specialize in empowering professionals through targeted programs designed to foster growth and proficiency across various domains. Our Corporate Training offerings cover Leadership and Management Skills, Data and Digital Skills, Business Skills, and People and Soft Skills. Tailored to meet the dynamic needs of the modern corporate landscape, our training programs ensure that your team acquires the essential skills for success. Invest in the future of your business by unlocking the full potential of your employees through our accessible and impactful corporate training solutions.</p>
            </div>
          </div>
          <div class="col-sm-6 second-column">
            <img class="img-side" src="{{ asset('images/resturant manager.webp') }}" alt="restaurant manager">
          </div> 
        </div>
    </div>

    <!-- about brief -->
    <div class="dark-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h2>Leadership & Management Skills</h2>
                    <hr/>
                </span>
                    <p>Elevate your leadership prowess with our specialized Leadership and Management Skills courses. Designed for both emerging and seasoned leaders, these programs impart practical insights and techniques to navigate the challenges of the corporate world. From effective communication strategies to strategic decision-making, our courses equip participants with the skills needed to lead with confidence and inspire teams to peak performance.</p>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [23])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [23])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [23])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
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
            </div>
        </div>
    </div>
    <!-- END about brief -->

    <!-- values brief -->
    <div class="light-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Data and Digital Skills</h3>
                    <hr/>
                    <p>In today's data-driven era, stay ahead of the curve with our Data and Digital Skills courses. Unlock the power of data analytics, digital marketing, and technological proficiency. Whether you're a novice or looking to refine existing skills, our programs provide hands-on training, ensuring you harness the potential of data and digital tools to drive business success.</p>
                </span>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [2,28])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [2,28])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [2,28])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
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
            </div>
        </div>
    </div>
    <!-- END values brief -->

    <!-- explore -->
    <div class="dark-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Technical Skills</h3>
                    <hr class="ip-inner-header"/>
                </span>
                <p>Master the fundamentals of business operations with our Business Skills courses. From project management to financial acumen, these programs are crafted to empower individuals with the practical skills needed to excel in a corporate environment. Enhance your business acuity and decision-making capabilities to contribute effectively to your organization's success.</p>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [13, 15])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [13, 15])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [13, 15])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
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
            </div>
        </div>
    </div>
    <!-- END explore -->

    <!-- explore -->
    <div class="light-bg-sec lead-brief">
        <div class="container">
            <div>
                <span class="ip-tagline">
                    <h3>Business Skills</h3>
                    <hr class="ip-inner-header"/>
                </span>
                <p>Master the fundamentals of business operations with our Business Skills courses. From project management to financial acumen, these programs are crafted to empower individuals with the practical skills needed to excel in a corporate environment. Enhance your business acuity and decision-making capabilities to contribute effectively to your organization's success.</p>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [13, 15])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [13, 15])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [13, 15])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
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
            </div>
        </div>
    </div>
    <!-- END explore -->

    <!-- page content ip-content-->
    <div class="dark-bg-sec lead-brief">
        <div class="container">
            <!-- course schedule -->
            <div>
                <span class="ip-tagline">
                    <h3>People & Soft Skills</h3>
                    <hr/>
                </span>
                <p>Success in the corporate world extends beyond technical expertise, and our People and Soft Skills courses focus on honing interpersonal and communication abilities. Whether it's teamwork, conflict resolution, or effective communication, these programs cultivate the essential people skills that are integral for fostering a collaborative and harmonious work environment. Elevate your team's interpersonal dynamics and strengthen the fabric of your organizational culture with our People and Soft Skills training.</p>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="1" class="bg-secondary"></li>
                            <li data-target="#carousel" data-slide-to="2" class="bg-secondary"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [26])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row equal">
                                    @foreach (App\Course::where('subcategory_id', [26])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 d-flex pb-3">
                                            <div class="card card-block">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
                                                    </a>                                                
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach (App\Course::where('subcategory_id', [26])->whereFeatured(true)->inRandomOrder()->take(4)->get() as $course)
                                        <div class="col-12 col-md-6 col-xl-3 mb-4">
                                            <div class="card mr-3">
                                                <img src="{{asset('storage/'.$course->cover)}}" class="card-img-top" alt="{{ $course->name }}" height="150px">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $course->name }}</h5>
                                                    <a href="{{ route('course.show', $course) }}" class="btn bc-btn btn-primary text-center rounded-pill px-5 fs-6 m-0">
                                                        <span>Course Details & Registration</span>
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
            </div>
        </div>
    </div>
    <!-- END page content -->

</div>
<!-- END page container -->

</div>
@endsection
