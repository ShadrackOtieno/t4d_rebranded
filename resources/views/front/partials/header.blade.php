<div class="ires-header">
    <!-- top bar -->
    <div class="ires-topbar">
        <div class="row" style="padding-top: 0.5em;">
            <!-- country selector -->
            <!-- social icons -->
            <div class="col-sm-3 ires-f-social">
                <a class="tk" href="https://www.tiktok.com/@indepth_research" target="_blank" title="Follow us on TikTok"><i class="fa fa-tiktok" aria-hidden="true"></i></a>
                <a class="fb" href="https://www.facebook.com/indepthresearch" target="_blank" title="Follow us on Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>

                <a class="tw" href="https://twitter.com/Indepthresearch" target="_blank" title="Follow us on Twitter"><img src="{{ asset('front/assets/img/logo/twitter.webp') }}" style="width:30px; object-fit: cover; padding-right:15px;"></a>
                <a class="in" href="https://www.linkedin.com/company/indepth-research-services" target="_blank" title="Follow us on LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a class="fl" href="https://www.instagram.com/indepthresearchinstitute/" target="_blank" title="Follow us on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a class="yt" href="https://www.youtube.com/@indepthresearchinstitute" target="_blank" title="Subscribe to our YouTube Channel"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
            <div class="col-sm-7">
                <div class="ires-f-contact" style="color: #ffffff; font-size: 14px;">
                    <a href="tel:+254715077817"><i class="fa fa-phone px-2" aria-hidden="true">&#160; (+254) 715 077 817 </i></a>&#160; | &#160;
                    <a href="mailto:outreach@indepthresearch.org"><i class="fa fa-envelope-o px-2" aria-hidden="true">&#160; outreach@indepthresearch.org </i></a>
                </div>
                <!-- <div class="cselector dropdown">

                    @if ( request()->getHttpHost() == config('domains.rwanda') )

                        <a class="btn dropdown-toggle" href="#" role="button" id="country-selector" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('front/assets/img/flags/rw.webp') }}" alt="Kenyan Flag" width="20px"> Rwanda
                        </a>

                    @else

                        <a class="btn dropdown-toggle" href="#" role="button" id="country-selector" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('front/assets/img/flags/ke.webp') }}" alt="Kenyan Flag" width="20px"> Kenya
                        </a>

                    @endif

                    <div class="dropdown-menu" aria-labelledby="country-selector">

                        @if ( request()->getHttpHost() == config('domains.rwanda') )

                            <a class="dropdown-item" href="https://www.indepthresearch.org">
                                <img src="{{ asset('front/assets/img/flags/ke.webp') }}" alt="Kenyan Flag" width="20px"> Kenya
                            </a>

                        @else

                            <a class="dropdown-item" href="https://www.indepthresearch.co.rw">
                                <img src="{{ asset('front/assets/img/flags/rw.webp') }}" alt="Kenyan Flag" width="20px"> Rwanda
                            </a>
                        @endif
                    </div>d-none d-sm-block
                </div> -->
            </div>

            <!-- home menu -->

            <div class="col-sm-2">
                <nav class="navbar-expand-lg">
                    <div class="collapse navbar-collapse home-menu">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item dropdown" style="font-size: 13.5px;">
                                @auth
                                <a class="nav-link" href="#" id="tourLearn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">Account<span class="has-child fa fa-chevron-down"></span></a>

                                <div class="dropdown-menu simple-menu" aria-labelledby="tourLearn">
                                    <a class="dropdown-item" href="{{ route(Auth::user()->role == 'customer' ? 'customer.account.profile.show' : 'backoffice.profile.edit') }}">
                                        My Profile
                                    </a>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                        confirm('Are you sure to logout') ? document.getElementById('logout-form').submit() : NaN">
                                        Logout
                                    </a>
                                </div>

                                <form action="{{ route('logout') }}" method="post" id="logout-form">
                                    @csrf
                                </form>
                                @endauth

                                @guest
                                <a class="nav-link" href="{{ route('login') }}" style="color: white">
                                    Login / Register
                                </a>
                                @endguest
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- END top bar -->

    <!-- navbar -->
    <div class="main-nav">
        <nav class="navbar main-navbar navbar-expand-lg" id="stickyMainNav">
            <a class="navbar-brand mn-logo" href="{{ route('home') }}">
                <img src="{{ asset('front/assets/img/logo/t4d_logo_black.jpg') }}" alt="T4D-logo" description="T4D logo">
            </a>

            <div class="hh-search">
                <a class="search-collapse collapsed" data-toggle="collapse" href="#searchCollapse">
                    <span class="fa fa-search mn-search"></span>
                    <span class="fa fa-close mnm-close"></span>
                </a>
            </div>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-close nt-close"></span>
                <span class="fa fa-bars nt-open"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown mega-menu-li-4c">
                        <a class="nav-link" href="{{ route('course.physical') }}" id="trainingCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Collection<span class="has-child fa fa-chevron-down"></span></a>
                        <!-- training calendar menu -->
                        <div class="dropdown-menu mega-menu mega-menu-4c" aria-labelledby="trainingCategories">
                            <div class="row">
                                @foreach (App\Category::course()->with('subcategories')->whereNotIn('id', [10])->orderBy('name', 'desc')->get() as $category)

                                {{-- @foreach (App\Category::course()->with('subcategories')->whereNotIn('id', [10])->oldest()->get() as $category) --}}

                                <div class="mn-col col-sm-3">
                                    <span class="mm-title">
                                        <a href="{{ route('course.category.subcategory.index', $category) }}">
                                            {{ $category->name }}
                                        </a>
                                    </span>

                                    @foreach ($category->subcategories as $subcategory)

                                    <a class="dropdown-item" href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}">
                                        {{ $subcategory->name }}
                                    </a>
                                    @endforeach
                                </div>

                                @endforeach
                                {{-- <div class="mn-col col-sm-3">
                                    <span class="mm-title">
                                        Short Courses by Venue
                                    </span>
                                    <a class="dropdown-item" href="{{ route('our-venues') }}">
                                        All Venues
                                    </a>
                                    @foreach(App\City::where('name', '!=', 'Virtual')->get() as $city)
                                        <a class="dropdown-item" href="{{ route('course.venue.index', ['city' => $city->name]) }}">
                                            {{$city->name}}
                                        </a>
                                    @endforeach


                                </div> --}}

                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown mega-menu-li-4c">
                        <a class="nav-link" href="#" id="venue" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        E-Learning<span class="has-child fa fa-chevron-down"></span>
                        </a>
                        <div class="dropdown-menu mega-menu mega-menu-4c">
                            <div class="row">
                                @php
                                    $sectoral = App\Category::course()->with('subcategories')->where('id', 10)->first();
                                    $subcategories = $sectoral->subcategories;
                                    $total = $subcategories->count();
                                    $perColumn = ceil($total / 3);
                                @endphp

                                <div class="mn-col col-sm-4">
                                    @foreach($subcategories->slice(0, $perColumn) as $subcategory)
                                        <a class="dropdown-item" href="{{ route('course.category.subcategory.show', ['category' => $sectoral, 'subcategory' => $subcategory]) }}">
                                            {{ $subcategory->name }}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="mn-col col-sm-4">
                                    @foreach($subcategories->slice($perColumn, $perColumn) as $subcategory)
                                        <a class="dropdown-item" href="{{ route('course.category.subcategory.show', ['category' => $sectoral, 'subcategory' => $subcategory]) }}">
                                            {{ $subcategory->name }}
                                        </a>
                                    @endforeach
                                </div>
                                <div class="mn-col col-sm-4">
                                    @foreach($subcategories->slice($perColumn * 2) as $subcategory)
                                        <a class="dropdown-item" href="{{ route('course.category.subcategory.show', ['category' => $sectoral, 'subcategory' => $subcategory]) }}">
                                            {{ $subcategory->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>



                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="program" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Intake Programs<span class="has-child fa fa-chevron-down"></span></a>
                        <div class="dropdown-menu simple-menu" aria-labelledby="program">
                            @foreach(App\Program\Program::all() as $program)
                            <a class="dropdown-item" href="{{ route('programs.program', $program->slug)}}">
                                {{$program->name}}
                            </a>
                            @endforeach
                        </div>
                    </li> --}}

                    <li class="nav-item dropdown mega-menu-li-4c">
                        <a class="nav-link" href="#" id="program" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Intake Programs<span class="has-child fa fa-chevron-down"></span>
                        </a>
                        <div class="dropdown-menu mega-menu mega-menu-4c" aria-labelledby="program">
                            <div class="container">
                                <div class="row">
                                    @php
                                        $programs = App\Program\Program::all();
                                        $chunks = $programs->chunk($programs->count() / 3);
                                    @endphp

                                    @foreach ($chunks as $chunk)
                                        <div class="col-md-4">
                                            @foreach ($chunk as $program)
                                                <a class="dropdown-item" href="{{ route('programs.program', $program->slug) }}">
                                                    {{$program->name}}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item dropdown mega-menu-li-4c">
                        <a class="nav-link" href="{{ route('certification.index') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Certifications<span class="has-child fa fa-chevron-down"></span>
                        </a>
                        <div class="dropdown-menu mega-menu mega-menu-4c">
                            <div class="row">

                                @foreach (App\Category::certification()->with('subcategories')->latest()->get() as $category)

                                <div class="mn-col col-sm-3">
                                    <span class="mm-title">
                                        <a href="{{ route('certification.category.show', $category) }}">
                                            {{ $category->name }}
                                        </a>
                                    </span>

                                    @foreach ($category->subcategories as $subcategory)

                                    <a class="dropdown-item" href="{{ route('certification.category.subcategory.show', compact('category', 'subcategory')) }}">
                                        {{ $subcategory->name }}
                                    </a>

                                    @endforeach
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="program" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Service by Capability<span class="has-child fa fa-chevron-down"></span></a>

                        <div class="dropdown-menu simple-menu" aria-labelledby="about">
                            @foreach(App\ServiceCapability::all() as $service_capability)
                            <a class="dropdown-item" href="{{ route('course.industry.service-capability', $service_capability) }}">
                                {{$service_capability->name}}
                            </a>
                            @endforeach
                        </div>
                        <div class="dropdown-menu simple-menu" aria-labelledby="program">
                            @foreach(App\Program\Program::all() as $program)
                            <a class="dropdown-item" href="{{ route('programs.program', $program->slug)}}">
                                {{$program->name}}
                            </a>
                            @endforeach
                        </div>
                    </li>

                    {{-- industry sols --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="industry" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Industry Solutions<span class="has-child fa fa-chevron-down"></span></a>
                        <div class="dropdown-menu simple-menu" aria-labelledby="industry">
                            <a class="dropdown-item" href="{{ route('sector') }}">
                                View All Industries
                            </a>
                            {{-- <div class="dropdown-menu simple-menu" aria-labelledby="industry">
                            @foreach(App\Industry::with('courses')->get() as $industry)
                                <a class="dropdown-item" href="{{ route('course.industry.show-industry', $industry->slug) }}">
                            {{$industry->name}}
                            </a>
                            @endforeach
                        </div>--}}
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="about" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us<span class="has-child fa fa-chevron-down"></span></a>
                        <div class="dropdown-menu simple-menu" aria-labelledby="about">
                            <a class="dropdown-item" href="{{ route('about') }}">
                                Who We Are
                            </a>
                            <a class="dropdown-item" href="{{ route('clients') }}">
                                Our Alumni
                            </a>
                            <a class="dropdown-item" href="{{ route('our-venues') }}">
                                Our Venues
                            </a>
                            <a class="dropdown-item" href="https://blog.indepthresearch.org/" target="_blank">Our Blog</a>
                            <a class="dropdown-item" href="{{ route('previousprojects') }}">
                                Previous Projects
                            </a>
                            <a class="dropdown-item" href="{{ route('careers') }}">
                                Careers
                            </a>
                            <a class="dropdown-item" href="{{ route('about') }}">
                                Success Stories
                            </a>
                            <a class="dropdown-item" href="{{ route('faqs') }}">
                                FAQs
                            </a>
                            <a class="dropdown-item" href="{{ route('contact') }}">
                                Contact Us
                            </a>
                        </div>
                    </li>

                    <!-- menu section visible on handheld devices (a duplicate of home menu)-->
                    <span class="hh-home-menu">
                        <hr />
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"  id="about" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">Our Experience<span class="has-child fa fa-chevron-down"></span></a> -->
                        <!-- tour and learn menu -->
                        <!-- <div class="dropdown-menu simple-menu" aria-labelledby="about">
                                    <a class="dropdown-item" href="{{ route('about') }}">
                                        About Us
                                    </a>
                                    <a class="dropdown-item" href="{{ route('clients') }}">
                                        Our Alumni
                                    </a>
                                </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://blog.indepthresearch.org/">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trainer_application.create') }}">Become a Trainer</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="http://webinars.indepthresearch.org/">Webinars</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('hotel_reservation.create') }}">Hotel Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                        </li> -->

                        <li class="nav-item dropdown" style="font-size: 13.5px;">
                            @auth
                            <a class="nav-link" href="#" id="tourLearn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">Account<span class="has-child fa fa-chevron-down"></span></a> -->
                            <!-- tour and learn menu -->
                            <div class="dropdown-menu simple-menu" aria-labelledby="tourLearn">
                                <a class="dropdown-item" href="{{ route(Auth::user()->role == 'customer' ? 'customer.account.profile.show' : 'backoffice.profile.edit') }}">
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                    confirm('Are you sure to logout') ? document.getElementById('logout-form').submit() : NaN">
                                    Logout
                                </a>
                            </div>

                            <form action="{{ route('logout') }}" method="post" id="logout-form">
                                @csrf
                            </form>
                            @endauth

                            @guest
                            <a class="nav-link" href="{{ route('login') }}" style="color: white">
                                Login / Register
                            </a>
                            @endguest
                        </li>
                    </span>
                </ul>
                <div class="ml-3 my-lg-0 d-none d-lg-block mn-searchdiv">
                    <a class="search-collapse collapsed" data-toggle="collapse" href="#searchCollapse">
                        <span class="fa fa-2x fa-search mnd-search" title="Search"></span>
                        <span class="fa fa-close mnd-close" title="Close"></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- END navbar -->

    <!-- search form -->
    <form action="{{ route('search') }}" method="get" class="collapse mn-searchsec" id="searchCollapse">

        <div class="container input-group">
            <input type="text" class="form-control drop-search" placeholder="Search..." autofocus name="search" value="{{ request()->query('search') }}">
            <div class="input-group-append">
                <button class="mn-fs fa fa-2x fa-search" type="submit"></button>
            </div>
        </div>

    </form>
    <div class="breadcrumbs"></div>
    <!-- END search form -->
</div>
