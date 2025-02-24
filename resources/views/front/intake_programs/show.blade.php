@extends('front.Projects.master')

@section('css')
    <style>
        .fading-line-list li {
            font-size: 14px;
            color: #1ea19d; /* Text color */
            margin-bottom: 10px;
            position: relative;
            padding-left: 20px; /* Space for the line */
        }

        .fading-line-list li:before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 1px;
            width: 15px;
            background: linear-gradient(to left, #007b83, transparent); /* Fading line */
        }
    </style>
@endsection

@section('title', 'Sub-categories')

@section('content')
    <div class="main-body bg-fixed" style="background-image: url('/images/servicesbg.svg')">
        <!-- page container -->
          {{-- heroes section --}}
          <section class="sm:mt-6 lg:mt-8 mt-12 mx-auto px-4 sm:px-6 lg:px-8">

            <div
                class="my-10 mx-auto md:w-11/12 px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-2 xl:mt-28 flex gap-3 lg:flex-justify lg:flex flex-col lg:flex-row">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-6xl">
                        {{-- <p>{!! $program->name !!}</p> --}}
                        <span class="block xl:inline">Begin Your Journey with</span>
                        <span class="block text-[#00a651] font-[200] xl:inline">  Our Tailored Programs</span>
                    </h1>
                    <p
                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        {{-- {!! $program->introduction !!}</p> --}}
                        Start your journey with our tailored programs. Designed to meet your goals, they guide you toward new skills and opportunities. Begin today and unlock your potential.
                    </p>
                    <!-- Button Section -->


                    <p class="cta-paragraph">
                        @foreach ($program->prices as $price)
                            <span style="color: #1c9793;font-weight:500">{{ $price->learning_mode }} classes </span><span
                                style="color: #1b918e; font-weight:bold">|</span>
                            <span style="font-weight:400">
                                {{ $program->intakes->where('start_date', '>=', now())->first()->duration ?? 0 }}
                                Week(s)</span> <span style="color: #1b918e; font-weight:700"> |</span>
                            <span style="color: #1ea19d; font-weight:400">
                                FEE: Ksh <strong>{{ $price->ksh }}</strong> / USD
                                <strong>{{ $price->usd }}</strong></span>
                        @endforeach
                    </p>

                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="#"
                                class="ires-primary-btn text-xl mx-auto md:mx-0">
                                Apply Now
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="#"
                                class="ires-primary-btn text-xl mx-auto md:mx-0">
                                Download Bronchure
                            </a>
                        </div>
                    </div>
                    <!-- End of Button Section -->
                </div>

                <!--   Image Section     -->
                <div class="lg:inset-y-0 lg:right-0 lg:w-1/2 my-4">
                    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset ('images/intake-programs.webp') }}" alt="">
                </div>
                <!--   End of Image Section     -->
            </div>

        </section>
        <div>

            <!-- page content -->
            <div class="mt-6 mb-6 mx-10 lg:mx-28">
                <div class="w-full">
                    <!-- categories column -->
                    <div id="">
                        <div class="w-full md:w-5/6 lg:mt-10 mx-auto relative">
                            <hr class="hidden lg:block absolute top-1/2 left-1/2 w-2/3 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#00a651] border-0 rounded-full">
                            <h2 class="text-center text-[#00a651] text-xl sm:text-2xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl">
                                Intake Programs
                            </h2>
                        </div>
                        <!-- columns -->
                        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4 py-5 lg:px-4">
                            @foreach(App\Program\Program::all() as $program)
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                              <a href="#">
                                  <img class="rounded-t-lg" src="{{ asset('images/Program_' . $program->id . '.webp') }}" alt="{{ $program->name }}" title="{{ $program->name }}" alt="" />
                              </a>
                              <div class="p-5">
                                  <a href="{{ route('programs.program', $program->slug) }}">
                                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $program->name }}</h5>
                                  </a>
                                  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{-- {!! $program->introduction !!} --}}
                                    The ‘Monitoring and Evaluation (M&E)’ course is a comprehensive program that covers the standards and procedures for results-based monitoring and evaluation for end-to-end project lifecycles.
                                  </p>
                                  {{-- <a href="{{ route('programs.program', $program->slug) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#1EA19D] rounded-lg hover:bg-[#00a651] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                      Read more
                                      <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                      </svg>
                                  </a> --}}
                                  <a href="{{ route('programs.program', $program->slug) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#1EA19D] rounded-lg hover:bg-[#00a651] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:gap-2 transition-all">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2 transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>

                              </div>
                            </div>
                                {{-- <div class="bg-white rounded shadow-md px-5 hover:shadow-gray-400">
                                    <div class="pb-10">
                                        <div class="h-40 pt-4">
                                            <img loading="lazy" src="{{ asset('images/Program_' . $program->id . '.webp') }}" alt="{{ $program->name }}" title="{{ $program->name }}" class="w-full h-full object-cover">
                                        </div>
                                        <h3 class="text-[16px] h-6 text-[#00a651] hover:font-bold pt-5 pb-3">
                                            <a href="{{ route('programs.program', $program->slug) }}">
                                                {{ $program->name }}
                                            </a>
                                        </h3>
                                    </div>

                                </div> --}}
                            @endforeach
                        </div>

                        {{-- cards trial --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
