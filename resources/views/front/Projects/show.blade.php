@extends('front.Projects.master')

@section('title', "Projects")
@section('position', 'fixed')
@section('opacity', 'bg-opacity-0')
@section('display', 'hidden')
@section('textColor', 'text-white')

@section('css')
    <style>
        .slide{
            background-image: url('{{ asset('images/project/'.$project->image) }}');
            background-size: cover;
            background-attachment: fixed
        }
        .cards{
            transition: all 0.5s ease-in-out;
        }
        .p-t{
            background-image: linear-gradient(135deg, rgba(30, 161, 157, .5),transparent 98%);
        }
        h4::after{
            content: '';
            position: absolute;
            left: 25%;
            bottom: 0;
            width: 50%;
            height: 1px;
            border-bottom: 1px solid #FFF;
        }
        #Top{
            /* opacity: 1!important; */
        }
        #line{
            /* opacity: 1;!important */
        }
    </style>
@endsection

@section('content')
{{-- @include('front.Projects.header') --}}
    <div class="banner relative w-full h-[80vw] sm:h-[40vw] md:h-[50vw] overflow-hidden" id="tp">
        <div class="slider">
            
            <div class="slide absolute w-full h-full active" style="">
                <img class="w-full objective-cover pointer-events-none" src="{{-- asset('images/project/'.$project->image) --}}" alt="">
                <div class="p-2 rgt-h " >
                    <div class="w-2/3">
                    <h1 class="absolute px-2 p-t bottom-2 left-2 md:bottom-4 md:left-4 z-40 text-[18px] sm:text-[24px] md:text-[36px] lg:text-[48px] font-bold text-[#a11e22] line-clamp-2 break-words max-w-fit rounded-md" style="">
                        {{ $project->title }}
                    </h1>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="mx-auto md:my-1 w-full md:w-4/5 relative">
        <div class="fixed float-right top-1/4 text-white right-2 rounded-lg bg-[#a11e22] py-2 px-2 hover:bg-[#1EA19D] transition duration-500 z-50">
            <a href="{{ route('previousprojects') }}">
                <div class="w-max mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </div>
                <div class="hidden md:block w-max mx-auto px-4">
                    Back to
                    <br/> projects
                </div>
            </a>
        </div>

        <div class="box">
            <!-- client introduction -->
                <div class="bg-gray-300 py-5" style="background-color: ;">
                    <div class="md:flex relative py-10 px-5">
                        <div class="md:w-1/2 ">
                            <div class="mx-5 mt-2 pt-1 ">
                                <h2 class="text-[48px] font-bold px-3 text-[#a11e22]">
                                    {{ $project->client }}
                                    <hr/>
                                </h2>
                            </div>
                            
                            <div class="ml-2 mt-2 pt-1 ">
                                <p class="m-5 pl-5 pt-1"><b class="text-[#1EA19D]">Sector: </b><i>{{ $project->sector }}</i></p>
                                <p class="m-5 pl-5 pt-1"><b class="text-[#1EA19D]">Industry: </b><i>{{ $project->industry }}</i></p>
                                <p class="m-5 pl-5 pt-1"><b class="text-[#1EA19D]">Project Nature: </b><i>{{ $project->nature }}</i></p>
                                <p class="m-5 pl-5 pt-1"><b class="text-[#1EA19D]">Project type: </b><i>{{ $project->type }}</i></p>
                            </div>
                        </div>
                        <div class="md:w-1/2  md:border-l-4 ">
                            <div class="">
                                <center class="mt-2  relative flex items-center justify-center">
                                    <div class="relative hover:scale-110 transition duration-1000 ease-in-out z-50 w-32 md:w-56 h-32 md:h-56 overflow-hidden">
                                        <img class="h-full w-full object-contain" src="{{ asset('images/client/'.$project->client_logo) }}" alt="{{ $project->client }}">
                                    </div>
                                    {{-- <div class="absolute left-[24%] top-[2%] z-40 w-64 h-64 border bg-red-200 rounded-lg hidden md:block"></div>
                                    <div class="absolute left-[25%] top-[3%] z-30 w-64 h-64 border bg-red-300 rounded-lg hidden md:block"></div>
                                    <div class="absolute left-[26%] top-[4%] z-20 w-64 h-64 border bg-red-300 rounded-lg hidden md:block"></div>
                                    <div class="absolute left-[27%] top-[5%] z-10 w-64 h-64 border bg-pink-300 rounded-lg hidden md:block"></div> --}}
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Excerpt -->
                <div class="bg-gray-200 py-5" style="background-color: ;">
                    <div class="pt-1 mx-2 md:mx-5 mt-2">
                        <p class="text-[32px] md:text-[48px] font-bold text-center mb-2 text-[#a11e22]" dir="">Excerpt
                            <hr/>
                        </p>
                        <div class="pt-1 md:w-[80%] md:mx-auto">
                            <!-- Excerpt -->
                            <div>
                                <div class="*:text-center mt-4 px-2 md:px-20 ">
                                    {!! $project->excerpt !!}
                                </div>
                            </div>
                            <div class="mt-16 mb-1 md:mb-4 pl-2 md:pl-0">
                                <div class=" md:flex justify-around">
                                    <p class="my-2 pt-1"><b class="text-[#1EA19D]">Location: </b><i>{{ $project->location.", ".$project->region }}</i></p>
                                    <p class="my-2 pt-1"><b class="text-[#1EA19D]">Population Impacted: </b><i>{{ number_format($project->p_impacted) }}</i></p>
                                    <p class="my-2 pt-1"><b class="text-[#1EA19D]">Duration: </b><i>{{ $period }}</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Scope -->
                <div class="scope" style="background-image:url('{{ asset('images/project/'.$project->image)}}');">
                    <div class="md:flex flex-row-reverse relative">
                        <div class="md:w-2/3 p-1 md:p-5 scoped">
                            <div class="mx-2 md:mx-10 md:mt-2 pt-1">
                                <p class="text-[32px] md:text-[48px] font-bold text-center text-[#a11e22]" dir="">Project Description
                                    <hr/>
                                </p>
                            </div>
                            <div class="md:ml-2 mt-2 pt-1 ">
                                <!-- Description -->
                                <div class="*:text-justify py-5 px-1 md:px-20">
                                    {!! $project->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block w-1/3 p-5"></div>
                    </div>
                </div>

                 <!-- Gallery -->
                 @if($project->projectphotos()->exists())
                 <div class="bg-gray-200 py-5" style="background-color: ;">
                    <div class=" md:mt-2 pt-1 ">
                        <p class="text-[32px] md:text-[48px] font-bold text-center mb-3 text-[#a11e22]" dir="">Gallery</p>

                        <!-- Display gallery -->
                        <div class="flex flex-wrap justify-center w-full sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 ">

                            @foreach($project->projectphotos AS $photos)
                            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-1">
                                <img class="h-full w-full object-cover" src="{{ asset('images/project/'.$photos->name) }}" alt="">
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @endif

                 <!-- Collaborators -->
                 @if($project->organisations()->exists())
                 <div class="bg-gray-300 py-5" style="background-color: ;">
                    <div class="mt-5 pt-1 ">
                        <p class="text-[32px] md:text-[48px] font-bold text-center mb-2 text-[#a11e22]" dir="">Collaborators</p>
                        <div class="pt-1 md:mx-auto">
                            <div class="lg:w-3/4 h-64 flex items-center mx-auto cursor-pointer">
                                {{-- <marquee behavior="" direction=""> --}}
                                <div class="flex items-center h-full mx-1">
                                @foreach($project->organisations AS $company)
                                        <div class="h-full cards flex-[1] hover:grow-[1.5] transition duration-500 ease-in-out overflow-hidden">
                                            <img class="h-full object-contain" src="{{ asset('images/Orgainsation/'.$company->photo) }}" alt="{{ $company->name." logo" }}" title="{{ $company->name }}">
                                        </div>
                                        
                                @endforeach
                                </div>
                                {{-- </marquee> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                 <!-- Conclusion -->
                 <div class="bg-gray-200 py-5" style="background-color: ;">
                    <div class="mx-2 md:mx-10 mt-5 pt-1 ">
                        <p class="text-[32px] md:text-[48px] font-bold text-center mb-2 text-[#a11e22]" dir="">Conclusion
                            <hr/>
                        </p>
                        <div class="pt-1 md:w-[80%] md:mx-auto">
                            <div class="mt-6 mb-4">
                                <div class="w-max md:w-full mx-auto md:flex justify-around">
                                    <div class="my-2 pt-1">
                                        <div class="w-max text-center font-semibold text-lg"><b class="text-[#1EA19D]">Project started on:</b></div>
                                        <div class="w-max mx-auto">{{ date('d-m-Y', strtotime($project->started_on)) }}</div>
                                    </div>
                                    <div class="my-2 pt-1">
                                        <div class="w-max text-center font-semibold text-lg"><b class="text-[#1EA19D]">Project ended on:</b></div>
                                        <div class="w-max mx-auto">{{ date('d-m-Y', strtotime($project->ended_on)) ?? "on going..." }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Conclusion -->
                            <div class="*:text-center mt-4 mb-12 px-2 md:px-20 ">
                                {!! substr($project->description, 0, 200) !!}
                            </div>
                        </div>
                    </div>
                </div>

            
                <div class="w-max mx-auto my-1 text-white rounded-md p-2 bg-[#a11e22] hover:bg-[#1EA19D] transform hover:scale-x-110 transition duration-500">
                    <a href="{{ route('previousprojects') }}" class="flex w-max">
                        <div class="w-max mx-auto px-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </div>
                        <div class="w-max px-2">
                            Back to projects
                        </div>
                    </a>
                </div>
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

                console.log(event.target.innerHTML)
                let elem = document.querySelector('#'+event.target.innerHTML)
                elem.classList.remove('hidden')
                elem.classList.add('flex')
            })
        })
            
    </script>
    
    <script src="{{ asset('front/Projects/js/header_scroll.js')}}"></script>
@endsection