@extends('front.Projects.master')

@section('title', 'FAQs')
@section('position', 'fixed')
@section('opacity', 'bg-opacity-0')
@section('display', 'hidden')
@section('textColor', 'text-white')

@section('css')

<style>
    .hamburger {
        position: relative;
        display: block;
        width: 35px;
        cursor: pointer;
        appearance: none;
        background: none;
        outline: none;
        border: none;
        
        
    }

    .hamburger .bar, .hamburger::after, .hamburger::before {
        content: '';
        display: block;
        width: 100%;
        height: 5px;
        background-color: #1ea19d;
        margin: 6px 12px;
        transition: 0.5s;
       

    }

    .hamburger.is-active::before {
        transform: rotate(-45deg) translate(-23.8px, 7.5px);
        background-color:#fff;
        width: 70%;
       
      
    }

    .hamburger.is-active::after {
        transform: rotate(45deg) translate(-7px, 7.6px);
        background-color: #fff;
        width: 70%;
        
       
    }

    .hamburger.is-active .bar{
        opacity: 0;
    }

     details summary::marker{
        content: url("{{ asset('svg/plus.svg') }}");
        place-content: center;
        border: 1px solid blue;
     }
     details[open] > summary::marker {
        content: url("{{ asset('svg/minus.svg') }}");
       
     }

     .desc{
        max-height: 44;
     }
    .ct::-webkit-scrollbar{
        width: 1px;
    }
    ::scrollbar{
        width: 7px;
    }
    #popup {
        animation: slide 0.25s ease-out;
        position: right;
    }

    @keyframes slide {
        from {
            transform: translateY(-100px)
        }
    }

    
</style>
@endsection

@section('content')

    <div class="bg-white">
        <div class="relative bg-cover bg-center h-screen w-full" id="tp" style="background-image: url('{{ asset('images/home-2.webp') }}');">
            <!-- Modal Section -->

            <dialog id="quiz" class="max-md:w-full bg-gray-100 rounded-lg">
                <form action="{{ route('contact.submit') }}" method="post" id="faqs" class="rounded mx-4 my-10">
                    <div class="grid md:grid-cols-2 md:gap-6 mx-4 m-5">
                        <div class="relative z-0 w-full mb-5 group">
                        <label for=" full_name" class="block mb-2 text-sm font-medium text-gray-900">Full name</label>
                        <input type="text" name="full_name" id="full_name" class="text-gray-900 text-base rounded-lg block w-full p-2.5 shadow-lg outline-none" placeholder="My name" required />
                        
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                            <input type="email" id="email" class="text-base rounded-lg block w-full p-2.5 shadow-lg outline-none" placeholder="name@email.com" required />
                        </div>
                    </div class="">
                        <label for="message" class="block mb-2 mx-4 m-5 text-sm font-medium text-gray-900">Ask for Anything</label>
                        <textarea id="message" rows="3" class="w-11/12 mx-auto aspect-[5/2] my-5 block p-2 text-sm rounded-lg outline-none" placeholder="Leave a Question..."></textarea>
                        <button type="submit" class="ml-5  ires-pri-btn px-6 py-2">Submit</button>
                </form>
                <button class=" text-red-600 hover:text-white hover:bg-red-600 font-medium text-sm  p-1 text-center absolute top-0 right-0" onclick="document.getElementById('quiz').close()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        
                </button>
            </dialog>
            <!--End Modal-->
            
            <div class="absolute top-1/3 -translate-y-1/4  ml-10 mt-13 flex flex-col items-left justify-center pl:0 md:pl-20 pr:0 md:pr-20 pt-8 h-full">
                <h1 class="text-5xl font-bold  mb-3 text-[#a11e22] text-left leading-[60px]">FAQs: Your One-Stop Shop <br> for Answers</h1>
                <p class="text-lg pb-10  text-black ">Explore our comprehensive FAQ section to find solutions to your most pressing questions.</p>
                <div class="flex space-x-4">
                    <a href="#content1" class="bg-[#1ea19d] hover:bg-[#a11e22] text-white font-bold py-2 px-4 rounded-full ">View FAQs</a>
                    {{-- <a href="{{ route('contact') }}" class="bg-gray-700 border border-[#1ea19d] hover:bg-gray-900 text-white font-bold py-2 px-4 rounded-full">Submit a Question</a> --}}
                    <button class="ires-sec-btn py-2 px-4" onclick="document.getElementById('quiz').showModal()">Ask Us Anything</button>
                    
                </div>
            </div>
        </div>

        <div class="w-full xl:w-[1280px] mx-auto relative" >
           
            <div class="lg:flex bg-[#cccc] lg:bg-white items-start flex-row-reverse pb-0 lg:py-5 lg:px-5 w-full">
                
                
                <div class="lg:hidden flex justify-between p-2  z-30 ">
                    <div class="lg:hidden p-2  top-20 z-30 ">
                        <h1 class="text-[#1ea19d] text-center text-xl font-bold cursor-default">
                            <a href="{{ route('faqs') }}/#content1">FAQs Categories</a>
                        </h1>
                    </div>
                    <button class="hamburger w-max mr-10 ">
                        <div class="bar "></div>
                    </button>
                </div>
                    
                <!-- Sidebar   absolute-->
            
                <div class="hidden sm:relative lg:block z-20 bg-[#a11e22] lg:bg-gray-100 borderl lg:border-blue200 lg:rounded-2xl lg:mr-4 max-lg:h-[40vh] lg:sticky lg:top-28 right-0 lg:left-0 lg:w-1/4 md:mt-10 px-8 mb-0 lg:mb-4" id="sb">
                    <h1 class="hidden lg:block text-xl font-bold lg:mt10 text-[#1ea19d] lg:text-[#a11e22] mb-5 pl-2 pt-5 hover:text-black">
                        <a href="{{ route('faqs') }}/#content1">FAQs Categories</a>
                    </h1>
                    <div class="lg:text-base text-small mb-4 pl-0 h[60vh] lg:hfull overflow-y-scroll ct">
                        <ul style="list-style: none">
                           
                            <!-- 1 -->
                            <li class="" style="text-decoration: none;">
                                  
                                <a class= "flex flex-nowrap  mt-2 p-2 text-white lg:text-[#1ea19d]  hover:text-[#1ea19d] lg:hover:text-[#a11e22]" href="{{ route('faqs', 'About IRES') }}/#content1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"  class=""><path fill="currentColor" d="M232 88v112.89A15.13 15.13 0 0 1 216.89 216H40a16 16 0 0 1-16-16V64a16 16 0 0 1 16-16h53.33a16.12 16.12 0 0 1 9.6 3.2L130.67 72H216a16 16 0 0 1 16 16"/></svg>
                                    <p class="pl-2">{{ 'About IRES' }}</p>
                                </a>
                            </li>
                            <hr>
                            <!-- 2 -->
                            <li class="" style="text-decoration: none;">
                                  
                                <a class= "flex flex-nowrap mt-2 p-2  text-white lg:text-[#1ea19d]  hover:text-[#1ea19d] lg:hover:text-[#a11e22] "
                                    href="{{ route('faqs', 'IRES Course Registration and Information') }}/#content1" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"  class="inlin"><path fill="currentColor" d="M232 88v112.89A15.13 15.13 0 0 1 216.89 216H40a16 16 0 0 1-16-16V64a16 16 0 0 1 16-16h53.33a16.12 16.12 0 0 1 9.6 3.2L130.67 72H216a16 16 0 0 1 16 16"/></svg>
                                    <p class="pl-2">
                                        {{ 'IRES Course Registration and Information' }}
                                    </p>
                                </a>
                            </li>
                            <hr>
                            <li class="" style="text-decoration: none;">
                                  
                                <a class= "flex flex-nowrap  mt-2 p-2  text-white lg:text-[#1ea19d]  hover:text-[#1ea19d] lg:hover:text-[#a11e22]"
                                    href="{{ route('faqs', 'Course Fee and Payment') }}/#content1" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"  class=""><path fill="currentColor" d="M232 88v112.89A15.13 15.13 0 0 1 216.89 216H40a16 16 0 0 1-16-16V64a16 16 0 0 1 16-16h53.33a16.12 16.12 0 0 1 9.6 3.2L130.67 72H216a16 16 0 0 1 16 16"/></svg>
                                    <p class="pl-2">
                                        {{ 'Course Fee and Payment' }}
                                    </p>
                                </a>
                            </li>
                            <hr>
                            <!-- 3 -->
                            <li class="" style="text-decoration: none;">
                                  
                                <a class= "flex flex-nowrap  mt-2 p-2  text-white lg:text-[#1ea19d] hover:text-[#1ea19d] lg:hover:text-[#a11e22]"
                                    href="{{ route('faqs', 'IRES Training Venues and Destinations') }}/#content1" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"  class=""><path fill="currentColor" d="M232 88v112.89A15.13 15.13 0 0 1 216.89 216H40a16 16 0 0 1-16-16V64a16 16 0 0 1 16-16h53.33a16.12 16.12 0 0 1 9.6 3.2L130.67 72H216a16 16 0 0 1 16 16"/></svg>
                                    <p class="pl-2">
                                        {{ 'IRES Training Venues and Destinations' }}
                                    </p>
                                </a>
                            </li>
                            <hr>
                             <!-- 4 -->
                             <li class="" style="text-decoration: none;">
                                  
                                <a class= "flex flex-nowrap  mt-2 p-2  text-white lg:text-[#1ea19d]  hover:text-[#1ea19d] lg:hover:text-[#a11e22]"
                                    href="{{ route('faqs', ' Certifications') }}/#content1" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"  class=""><path fill="currentColor" d="M232 88v112.89A15.13 15.13 0 0 1 216.89 216H40a16 16 0 0 1-16-16V64a16 16 0 0 1 16-16h53.33a16.12 16.12 0 0 1 9.6 3.2L130.67 72H216a16 16 0 0 1 16 16"/></svg>
                                    <p class="pl-2">
                                        {{ ' Certifications' }}
                                    </p>
                                </a>
                            </li>
                            <hr>
                            <!-- 5 -->
                            <li class="" style="text-decoration: none;">
                                  
                                <a class= "flex flex-nowrap  mt-2 p-2  text-white lg:text-[#1ea19d] hover:text-[#1ea19d] lg:hover:text-[#a11e22]"
                                    href="{{ route('faqs', 'Airport Transfer and Accommodation') }}/#content1" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"  class=""><path fill="currentColor" d="M232 88v112.89A15.13 15.13 0 0 1 216.89 216H40a16 16 0 0 1-16-16V64a16 16 0 0 1 16-16h53.33a16.12 16.12 0 0 1 9.6 3.2L130.67 72H216a16 16 0 0 1 16 16"/></svg>
                                    <p class="pl-2">
                                        {{ 'Airport Transfer and Accommodation'}}
                                    </p>
                                </a>
                            </li>
                            <hr>
                            <!-- 6 -->
                            <li class="" style="text-decoration: none;">
                                  
                                <a class= "flex flex-nowrap  mt-2 p-2  text-white lg:text-[#1ea19d]  hover:text-[#1ea19d] lg:hover:text-[#a11e22]"
                                    href="{{ route('faqs', 'Careers and Opportunities') }}/#content1" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"  class=""><path fill="currentColor" d="M232 88v112.89A15.13 15.13 0 0 1 216.89 216H40a16 16 0 0 1-16-16V64a16 16 0 0 1 16-16h53.33a16.12 16.12 0 0 1 9.6 3.2L130.67 72H216a16 16 0 0 1 16 16"/></svg>
                                    <p class="pl-2">
                                        {{ 'Careers and Opportunities' }}
                                    </p>
                                </a>
                            </li>
                        </ul>
                       
                    </div>

                </div>
        
                <!-- Page Content  -->
                <div class="lg:w-3/4 md:px-10 bg-white mt-10 ct" id="content1">
                    <div id="content">
                        <div class="container lg:flex flex-wrap md:px-2">
                            @foreach ($faqs as $faq)
                               <div class="w-full lg:w-1/2  p-4 ">
                                    <div class="rounded shadow-md h-30 shadow-gray-400 p-3 transform transition-transform duration-300 hover:scale-105">
                                        <details class="faqs_marker ">
                                            <summary class="cursor-pointer h-16 md:h-12">
                                                <h3 class="text-[#a11e22] font-semibold inline">{!! $faq->title !!}</h3>
                                            </summary>
                                            <div class="desc p-5 h-64 overflow-y-scroll">
                                                <p class="">{!! $faq->description !!}</p>
                                            </div>
                                        </details>
                                    </div>
                               </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
                

@endsection
    
@section('js_content')

    <script >
        
        const menu_btn =document.querySelector('.hamburger').parentNode;

        menu_btn.addEventListener('click', function(){
            menu_btn.classList.toggle('bg-[#a11e22]')
            menu_btn.childNodes[3].classList.toggle('is-active');

            document.querySelector('#sb').classList.toggle('hidden')
            
        });

        const All_Details = document.querySelectorAll('details');

    All_Details.forEach(deet=>{
    deet.addEventListener('toggle', toggleOpenOneOnly)
    })

    function toggleOpenOneOnly(e) {
    if (this.open) {
        All_Details.forEach(deet=>{
        if (deet!=this && deet.open) deet.open = false
        });
    }
    }
    </script>
    
    <script src="{{ asset('front/Projects/js/header_scroll.js')}}"></script>

@endsection