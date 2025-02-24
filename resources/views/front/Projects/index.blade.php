@extends('front.Projects.master')

@section('title', "Projects")
@section('position', 'fixed')
@section('opacity', 'bg-opacity-0')
@section('display', 'hidden')
@section('textColor', 'text-white')

@section('css')
    <style>
        body{
            background-image: url('{{ asset('images/close-up-team-hand-shake.webp') }}');
            background-size: cover;
            background-attachment: fixed;
        }
        .dropdown li {
            display: block;
        }
        .dropdown {
            display: none;
        }
        ul li:hover ul.dropdown{
            display: block;
        }
        .p-t p{
            background-image: linear-gradient(135deg, rgba(30, 161, 157, .5), rgba(30, 161, 157, .1) 98%);
            padding: 5px;
            border-radius: 0.125rem /* 2px */;

        }
    </style>
@endsection

@section('content')
{{-- @include('front.Projects.header') --}}
    <div class="banner relative w-full h-[80vw] sm:h-[40vw] md:h-[45vw] overflow-hidden" id="tp">
        <div class="slider">
            @foreach($projects AS $project)
                <?php
                    //Spliting the string into two
                    $val = ceil(strlen($project->location)/2);
                    $str = str_split($project->location,$val);
                    $active = "";
                    if($loop->iteration == 1) $active = "active";
                ?>
            <div class="slide absolute w-full h-full {{ $active }}">
                <img class="absolute w-full objective-cover pointer-events-none opacity-0" src="{{ asset('images/project/'.$project->image) }}" alt="">
                <div class="left info bg-black bg-opacity-30">
                    <div class="penetrate-blur">
                        <h1 class="left-h text-[40px] sm:text-[90px] md:text-[130px] lg:text-[150px] text-[#a11e22]"><?php echo $str[0]; ?></h1>
                    </div>
                    <div class="content text-medium ">
                        <div class="p-2 rounded-sm md:w-56 lg:w-96 hidden md:block p-t line-clamp-2">
                            {!! $project->excerpt !!}
                        </div>
                        <a href="{{ route('previousproject', $project->id) }}" >
                            <div class="btn hover:text-black" style="background: white;">
                                More Details
                            </div>
                        </a>
                    </div>
                </div>
                <div class="right info bg-black bg-opacity-30">
                    <div class="penetrate-blur">
                        <h1 class="right-h  text-[40px] sm:text-[90px] md:text-[130px] lg:text-[150px] text-[#1EA19D]"><?php echo $str[1]; ?></h1>
                        <h3 class="hidden md:block">{{ $project->region ?? 'Region' }}</h3>
                    </div>
                </div>
            </div>
            @if($loop->iteration == 5)
                @break;
            @endif
            @endforeach

        </div>

        <div class="navigation hidden lg:block">
            <span class="prev-btn">
                <i>
                    <svg xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 24 24' fill='#000000' width='24' height='24'><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
                </i>
            </span>
            <span class="next-btn" id="nxt">
                <i>
                    <svg xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 24 24' fill='#000000' width='24' height='24'><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
                </i>
            </span>
        </div>
    </div>
    <div class="mx-auto w-full md:w-4/5 md:py-1">
        <div class="filter flex flex-wrap py-1 bg-red700 cursor-pointer">
            <div class="m-2 flex flex-wrap justify-start">
                <div class="button w-max text-white flex">
                    <div class="px-1">
                        <ul>
                            <li class="inline-block relative " onclick="dropList()">
                                <div class="flex bg-blue-700 border border-blue-700 rounded-sm py-1 px-2 mt-2">
                                    <div class="hidden md:block px-1">Filter by</div>
                                    <div class="p-1 flex flex-col justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-4 w-5 md:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                        </svg>
                                    </div>
                                </div>
                                <ul class="hidden hover:block dropdown absolute -left-0 z-50">
                                    <li class="px-4 py-1 md:mt-1 bg-[#1EA19D] rounded-sm hover:bg-[#a11e22]" id="lst">Sector</li>
                                    <li class="px-4 py-1 md:mt-1 bg-[#1EA19D] rounded-sm hover:bg-[#a11e22]" id="lst">Country</li>
                                    <li class="px-4 py-1 md:mt-1 bg-[#1EA19D] rounded-sm hover:bg-[#a11e22]" id="lst">Type</li>
                                    {{-- <li class="px-4 py-1 md:mt-1 bg-[#1EA19D] rounded-sm hover:bg-[#a11e22]" id="lst">Industry</li>
                                    <li class="px-4 py-1 md:mt-1 bg-[#1EA19D] rounded-sm hover:bg-[#a11e22]" id="lst">Nature</li> --}}
                                </ul>
                            </div>
                            </li>
                        </ul>
                </div>

                <div class="flex w-max">
                    <a href="{{ route('previousprojects') }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">All Projects</div>
                    </a>
                </div>
                <div id="Sector" class="hidden flex-wrap w-full">
                    {{-- <a href="{{ route('previousprojects') }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">All Sectors</div>
                    </a> --}}
                @foreach($sectors AS $secta)
                    <a href="{{ route('previousprojects', ['sector', $secta->sector] ) }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">{{ $secta->sector }}</div>
                    </a>
                @endforeach
                </div>
                <div id="Country" class="hidden flex-wrap w-full">
                    {{-- <a href="{{ route('previousprojects') }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">All Countries</div>
                    </a> --}}
                @foreach($countries AS $country)
                    <a href="{{ route('previousprojects', ['location', $country->location] ) }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">{{ $country->location }}</div>
                    </a>
                @endforeach
                </div>
                <div id="Type" class="hidden flex-wrap w-full">
                    {{-- <a href="{{ route('previousprojects') }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">All Types</div>
                    </a> --}}
                @foreach($types AS $typ)
                    <a href="{{ route('previousprojects', ['type', $typ->type ]) }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">{{ $typ->type }}</div>
                    </a>
                @endforeach
                </div>
                {{-- <div id="Nature" class="hidden flex-wrap">
                    <a href="{{ route('previousprojects') }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">All Natures</div>
                    </a>
                @foreach($natures AS $natur)
                    <a href="{{ route('previousprojects', ['nature', $natur->nature ]) }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">{{ $natur->nature }}</div>
                    </a>
                @endforeach
                </div>

                <div id="Industry" class="hidden flex-wrap">
                    <a href="{{ route('previousprojects') }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">All Industries</div>
                    </a>
                @foreach($industries AS $indu)
                    <a href="{{ route('previousprojects', ['industry', $indu->industry] ) }}" class="m-2">
                        <div class="button bg-red-700 rounded-2xl py-1 px-4 text-white hover:bg-white hover:text-blue-700 ">{{ $indu->industry }}</div>
                    </a>
                @endforeach --}}
                </div>
            </div>
        </div>
        <div class="box md:w-4/5 mx-auto pb-1">
            @foreach($projects AS $project)

                @if($loop->odd)
                <div class="bg-gray-200 lg:mt-1 lg:py-1 lg:rounded-xl mb-8" style="background-color: ;">
                    <div class="w-full lg:w-max mx-auto">
                        <div class="lg:my-12 relative">
                            @if($project->client_logo != null)
                                <div class="w-24 h-24 -top-10 -left-full absolute rounded-3xl overflow-hidden lg:block hidden border-8 border-gray-200
                                bg-gray-200">
                                        <img class=" w-full lg:h-full object-cover" src="{{ asset('images/client/'.$project->client_logo) }}" alt="{{ $project->client.' logo' }}">
                                </div>
                            @endif
                            <div class="left-box w-full lg:w-[500px] lg:h-[450px] lg:-ml-56 lg:rounded-xl overflow-hidden md:border-8 lg:border-[#1EA19D]">
                                <img class="h-full w-full object-cover" src="{{ asset('images/project/'.$project->image) ?? asset('images/project/replace.webp')}}" alt="">
                            </div>
                            <div class="right-box bg-blue-100 lg:bg-transparent lg:absolute top-5 left-[85%] pb-2">
                                <div class="p-4 pb-0 lg:pb-4 bg-blue-100 relative text-wrap w-full lg:w-[350px] lg:h-[350px] lg:rounded-xl overflow-hidden">
                                    <div class="lg:h-[300px]">
                                        <p class="text-2xl mb-1 capitalize line-clamp-2">
                                            <b class="text-[#a11e22]">{{ $project->title}}</b>
                                        </p>
                                        <p class="*:line-clamp-4 mb-6 lg:mb-0">
                                            {!! $project->excerpt !!}
                                        </p>
                                    </div>
                                    <div class="mt-6 md:mt-0 lg:h-[30px] lg:flex flex-col justify-end">
                                        <div class="w-full text-xl mb-4">
                                            <div>
                                                <p class="">
                                                    <b class="text-[#a11e22]">Sector: </b>{{ $project->sector }}
                                                </p>
                                            </div>
                                            <div class="capitalize" >
                                                <p>
                                                    <b class="text-[#a11e22]">Population Impacted: </b>{!! number_format($project->p_impacted) ?? '#' !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-wrap my-4 mx-auto lg:mx-0 lg:ml-16 lg:mt-10 w-max rounded-md overflow-hidden bg-[#1EA19D] text-white hover:bg-transparent hover:border-2 border-[#1EA19D] hover:text-[#1EA19D] transition delay-500">
                                    <a href="{{ route('previousproject', $project->id) }}">
                                        <p class="py-2 px-6 " >Read More</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="bg-gray-200 lg:bg-gray-300 lg:rounded-xl mb-8 lg:py-1 " style="background-color:;">
                    <div class="w-full lg:w-max mx-auto">
                        <div class="lg:my-20 relative">
                            @if($project->client_logo != null)
                            <div class="w-24 h-24 -top-10 -right-full absolute rounded-3xl overflow-hidden lg:block hidden border-8 border-gray-300
                            bg-gray-300">
                                    <img class=" w-full lg:h-full object-cover" src="{{ asset('images/client/'.$project->client_logo) }}" alt="{{ $project->client.' logo' }}">
                            </div>
                            @endif<!-- -->
                            <div class="left-box w-full lg:w-[500px] lg:h-[450px] lg:-mr-56 lg:rounded-xl overflow-hidden md:border-8 lg:border-[#1EA19D]">
                                <img class="h-full w-full object-cover" src="{{ asset('images/project/'.$project->image) ?? asset('images/project/replace.webp')}}" alt="">
                            </div>
                            <div class="right-box bg-blue-100 lg:bg-transparent text-wrap lg:absolute top-5 right-[85%] py-1 pb-2">
                                <div class="p-4 pb-0 lg:pb-4 bg-blue-100 w-full lg:w-[350px] lg:h-[350px] lg:rounded-xl overflow-hidden relative">
                                    <div class="lg:h-[300px]">
                                        <p class="text-2xl mb-1 capitalize line-clamp-2">
                                            <b class="text-[#a11e22]">{{ $project->title}}</b>
                                        </p>
                                        <p class="*:line-clamp-4 mb-6 lg:mb-0">
                                            {!! $project->excerpt !!}
                                        </p>
                                    </div>
                                    <div class="mt-6 md:mt-0 lg:h-[30px] lg:flex flex-col justify-end">
                                        <div class="w-full text-xl mb-4">
                                            <div>
                                                <p class="">
                                                    <b class="text-[#a11e22]">Sector: </b>{{ $project->sector }}
                                                </p>
                                            </div>
                                            <div class="capitalize" >
                                                <p>
                                                    <b class="text-[#a11e22]">Population Impacted: </b>{{ number_format($project->p_impacted) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-white my-4 mx-auto lg:mx-0 w-max rounded-md overflow-hidden bg-[#1EA19D] hover:bg-transparent hover:border-2 border-[#1EA19D] hover:text-[#1EA19D] lg:float-right lg:mr-16 lg:mt-10 transition delay-500">
                                    <a href="{{ route('previousproject', $project->id) }}">
                                        <p class="py-2 px-6 " >Read More</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach

            @include('front.Projects.paginate')

        </div>
    </div>
@endsection

@section('js_content')
    <script>

        // Displaying the filters
        let lst = document.querySelectorAll('#lst')

        lst.forEach((list) => {

            list.addEventListener('click', (e) =>{
                e.stopPropagation()

                lst.forEach((lzt) => {
                    let conn = document.querySelector('#'+lzt.innerHTML)
                    conn.classList.remove('flex')
                    conn.classList.add('hidden')
                })

                let elem = document.querySelector('#'+event.target.innerHTML)
                elem.classList.remove('hidden')
                elem.classList.add('flex')
            })
        })

    </script>

    <script src="{{ asset('front/Projects/js/header_scroll.js')}}"></script>

    <script src="{{ asset('front/Projects/js/project_slider.js') }}"></script>
@endsection
