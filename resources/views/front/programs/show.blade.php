@extends('front.Projects.master')

@section('css')
@env('local')
<style>
    /* *{
        outline: 1px solid limegreen;
    } */
</style>
@endenv
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
                class="my-10 mx-auto md:w-11/12 max-lg:px-4 sm:mt-12 md:mt-16 lg:mt-20  xl:mt-28 h-full flex flex-wrap">
                <div class="sm:text-center lg:text-left lg:w-2/3 p-2">
                    <h1 class="text-2xl tracking-tight font-extrabold text-gray-800 sm:text-5xl md:text-6xl">
                        <p>{!! $program->name !!}</p> 
                        <!-- <span class="block xl:inline">Begin Your Journey with</span>
                        <span class="block text-[#a11e22] font-[200] xl:inline">  Our Tailored Programs</span> -->
                    </h1>
                    <p
                        class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                      {!! $program->introduction !!}</p> 
                    </p>
                    <!-- Button Section -->
                    <p class="cta-paragraph mt-10">
                        @foreach ($program->prices as $price)
                            <span class="text-[#1c9793] font-300 ">{{ $price->learning_mode }} classes </span><span
                                style="color: #1b918e; font-weight:bold">|</span>
                            <span class="font-400 text-[#A11E22]">
                                {{ $program->intakes->where('start_date', '>=', now())->first()->duration ?? 0 }}
                                Week(s)</span> <span style="color: #1b918e; font-weight:700"> |</span>
                            <span style="color: #1ea19d; font-weight:400">
                                FEE: Ksh <strong>{{ $price->ksh }}</strong> / USD
                                <strong>{{ $price->usd }}</strong></span>
                        @endforeach
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md">
                            <a href="{{ route('programs.register', $program->slug) }}"
                               class="ires-primary-btn text-xl mx-auto md:mx-0 inline-flex items-center px-6 py-4">
                               Apply Now
                            </a>
                        </div>
                        <div class="sm:mt-0 sm:ml-3 mt-3">
                            {{-- download modal --}}
                            <button class="inline-flex items-center text-[#1b918e] rounded-4xl px-6 py-4 text-xl border-2 border-[#1b918e] bg-transparent hover:bg-[#1b918e] hover:text-white transition-colors duration-300" onclick="openModal('modelConfirm')">
                                Download Brochure
                             </button>
                             
                             <div id="modelConfirm" class="backdrop-blur-md fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                                 <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                             
                                     <div class="flex justify-end p-2">
                                         <button onclick="closeModal('modelConfirm')" type="button"
                                             class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                 <path fill-rule="evenodd"
                                                     d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                     clip-rule="evenodd"></path>
                                             </svg>
                                         </button>
                                     </div>
                             
                                     <div class="p-6 pt-10 text-center">
                                        @if (session('success'))
                                        <div class="bg-green-100 border border-green-400 text-[#1b918e] rounded-lg p-4 mb-4">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <form action="{{route('programs.brochure.download', $program->slug)}}" method="POST" id="bronchure-downloads" >
                                            @csrf
                                            <div class="max-w-md mx-auto">
                                            <p class="text-left text-[#000]">
                                                <strong>
                                                Get Your Bronchure Copy Via Email
                                            </strong>
                                            </p>
                                            <div class="relative z-0 w-full mb-5 group text-left">
                                                <input type="text" name="program" value="{{$program->name}}" id="floating_program_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-grey dark:border-[#1b918e] dark:focus:border-[#1b918e] focus:outline-none focus:ring-0 focus:border-[#1b918e] peer" placeholder=" {{$program->name}} " readonly required />
                                                <label for="floating_program_name"
                                                class="peer-focus:font-medium absolute text-sm text-[#1b918e] dark:text-[#1b918e] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#1b918e] peer-focus:dark:text-[#1b918e] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 text-left">
                                               Program Name
                                              </label>
                                              
                                            </div>
                                            <div class="grid md:grid-cols-2 md:gap-6 text-left mt-5">
                                                <div class="relative z-0 w-full mb-5 group">
                                                    <input type="text" name="name" id="floating_full_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-grey dark:border-[#1b918e] dark:focus:border-[#1b918e] focus:outline-none focus:ring-0 focus:border-[#1b918e] peer" placeholder=" " required />
                                                    <label for="floating_full_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#1b918e] peer-focus:dark:text-[#1b918e] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full Name</label>
                                                </div>
                                                <div class="relative z-0 w-full mb-5 group text-left">
                                                    <input type="email" name="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-grey dark:border-[#1b918e] dark:focus:border-[#1b918e] focus:outline-none focus:ring-0 focus:border-[#1b918e] peer" placeholder=" " required />
                                                    <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#1b918e] peer-focus:dark:text-[#1b918e] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                                                </div>
                                               
                                            </div>
                                            <div class="relative z-0 w-full mb-5 group text-left">
                                                <input type="text" name="phone" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-grey dark:border-[#1b918e] dark:focus:border-[#1b918e] focus:outline-none focus:ring-0 focus:border-[#1b918e] peer" placeholder=" " required />
                                                <label for="floating_phone"
                                                class="peer-focus:font-medium absolute text-sm text-[#1b918e] dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#1b918e] peer-focus:dark:text-[#1b918e] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 text-left">
                                                Phone Number
                                              </label>
                                              
                                            </div>
                                       
                                           
                                            <div class="py-5 text-left">
                                                <p>
                                                    Application Closes on:
                                                    <strong class="text-[#a11e22]">

                                                        {{ \Carbon\Carbon::parse(
                                                            $program->intakes->where('start_date', '>=', now())->first()->start_date ?? now(),
                                                        )->isoFormat('Do MMMM YYYY') }}
                                                    </strong>
                                                </p>
                                            </div>
                                            
                                            <button type="submit" class="inline-flex items-center text-[#1b918e] rounded-4xl px-6 py-4 text-xl border-2 border-[#1b918e] bg-transparent hover:bg-[#1b918e] hover:text-white transition-colors duration-300" id="bronchure-form">Download Now</button>
                                          </div>
                                        </form>
                                      
                                     </div>
                             
                                 </div>
                             </div>
                             
                             <script type="text/javascript">
                                 window.openModal = function(modalId) {
                                     document.getElementById(modalId).style.display = 'block'
                                     document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
                                 }
                             
                                 window.closeModal = function(modalId) {
                                     document.getElementById(modalId).style.display = 'none'
                                     document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                                 }
                             
                                 // Close all modals when press ESC
                                 document.onkeydown = function(event) {
                                     event = event || window.event;
                                     if (event.keyCode === 27) {
                                         document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                                         let modals = document.getElementsByClassName('modal');
                                         Array.prototype.slice.call(modals).forEach(i => {
                                             i.style.display = 'none'
                                         })
                                     }
                                 };
                             </script>
                            
                            {{-- end --}}
                        </div>
                    </div>
                    <div class="mt-10">
                        <p ><span class="text-[#a11e22]">Application Deadline:</span> {{ \Carbon\Carbon::parse(
                            $program->intakes->where('start_date', '>=', now())->first()->start_date ?? now(),
                        )->isoFormat('Do MMMM YYYY') }}</p>

                    </div>
                    
                    <!-- End of Button Section -->
                </div>
                <!--   Image Section     -->
                <div class=" lg:right-0 lg:w-1/3 p-2 max-h-full">
                    <div class=" rounded-lg flex max-w-full h-full items-center">
                        <img src="{{ asset ('images/programs/' .$program->cover) }}" alt="{{ $program->name }}" class="img-fluid fit-image">
                        {{-- <img class="w-full object-cover rounded-lg" src="{{ asset('images/Program_'.$program->id.'.webp') }}" alt="{{ $program->name }}" title="{{ $program->name }}"> --}}
                    </div>
                </div>
                
                <!--   End of Image Section     -->
            </div>
        </section>
        <div>
            <!-- page content -->
            <section class="mt-6 lg:mt-10">
                <div class="bg-[rgb(30,161,157)] text-white">
                    <div class="container mx-auto">
                        <div class="flex flex-col items-center py-10 text-center lg:py-10">
                            <div class="w-full px-2 lg:w-1/2 lg:px-0">
                                <div class="mb-2">
                                    <h2 class="text-2xl lg:text-3xl font-bold">
                                       Want to upskill? 
                                    </h2>
                                    <p class="text-lg lg:text-xl opacity-80">
                                        Enroll today in our {!! $program->name !!} to elevate and expand your expertise.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- cards section --}}
            <div class="pt-12 p-4">
                <div class="grid gap-14 md:grid-cols-3 md:gap-5">
                  <div class="rounded-xl bg-white p-6 text-center shadow-xl">
                    <div
                      class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full bg-[#1b918e] shadow-lg shadow-teal-500/40">
                      <svg viewBox="0 0 33 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white">
                        <path
                          d="M24.75 23H8.25V28.75H24.75V23ZM32.3984 9.43359L23.9852 0.628906C23.5984 0.224609 23.0742 0 22.5242 0H22V11.5H33V10.952C33 10.3859 32.7852 9.83789 32.3984 9.43359ZM19.25 12.2188V0H2.0625C0.919531 0 0 0.961328 0 2.15625V43.8438C0 45.0387 0.919531 46 2.0625 46H30.9375C32.0805 46 33 45.0387 33 43.8438V14.375H21.3125C20.1781 14.375 19.25 13.4047 19.25 12.2188ZM5.5 6.46875C5.5 6.07164 5.80766 5.75 6.1875 5.75H13.0625C13.4423 5.75 13.75 6.07164 13.75 6.46875V7.90625C13.75 8.30336 13.4423 8.625 13.0625 8.625H6.1875C5.80766 8.625 5.5 8.30336 5.5 7.90625V6.46875ZM5.5 12.2188C5.5 11.8216 5.80766 11.5 6.1875 11.5H13.0625C13.4423 11.5 13.75 11.8216 13.75 12.2188V13.6562C13.75 14.0534 13.4423 14.375 13.0625 14.375H6.1875C5.80766 14.375 5.5 14.0534 5.5 13.6562V12.2188ZM27.5 39.5312C27.5 39.9284 27.1923 40.25 26.8125 40.25H19.9375C19.5577 40.25 19.25 39.9284 19.25 39.5312V38.0938C19.25 37.6966 19.5577 37.375 19.9375 37.375H26.8125C27.1923 37.375 27.5 37.6966 27.5 38.0938V39.5312ZM27.5 21.5625V30.1875C27.5 30.9817 26.8847 31.625 26.125 31.625H6.875C6.11531 31.625 5.5 30.9817 5.5 30.1875V21.5625C5.5 20.7683 6.11531 20.125 6.875 20.125H26.125C26.8847 20.125 27.5 20.7683 27.5 21.5625Z"
                          fill="white"></path>
                      </svg>
                    </div>
                    <h1 class="text-darken mb-3 text-xl font-medium lg:px-14">Program Fee</h1>
                    <p class="px-4 text-gray-500"> 
                    @foreach ($program->prices as $price)
                        {{ $price->ksh }} / USD
                        {{ $price->usd }}
                    @endforeach</p>
                  </div>
                  <div data-aos-delay="150" class="rounded-xl bg-white p-6 text-center shadow-xl">
                    <div
                      class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-[#000000] shadow-[#000000]-500/40">
                        <svg viewBox=" 0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white">
                      <path
                        d="M12 0C11.0532 0 10.2857 0.767511 10.2857 1.71432V5.14285H13.7142V1.71432C13.7142 0.767511 12.9467 0 12 0Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M36 0C35.0532 0 34.2856 0.767511 34.2856 1.71432V5.14285H37.7142V1.71432C37.7143 0.767511 36.9468 0 36 0Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M42.8571 5.14282H37.7143V12C37.7143 12.9468 36.9468 13.7143 36 13.7143C35.0532 13.7143 34.2857 12.9468 34.2857 12V5.14282H13.7142V12C13.7142 12.9468 12.9467 13.7143 11.9999 13.7143C11.0531 13.7143 10.2856 12.9468 10.2856 12V5.14282H5.14285C2.30253 5.14282 0 7.44535 0 10.2857V42.8571C0 45.6974 2.30253 48 5.14285 48H42.8571C45.6975 48 48 45.6974 48 42.8571V10.2857C48 7.44535 45.6975 5.14282 42.8571 5.14282ZM44.5714 42.8571C44.5714 43.8039 43.8039 44.5714 42.857 44.5714H5.14285C4.19605 44.5714 3.42854 43.8039 3.42854 42.8571V20.5714H44.5714V42.8571Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M13.7142 23.9999H10.2857C9.33889 23.9999 8.57138 24.7674 8.57138 25.7142C8.57138 26.661 9.33889 27.4285 10.2857 27.4285H13.7142C14.661 27.4285 15.4285 26.661 15.4285 25.7142C15.4285 24.7674 14.661 23.9999 13.7142 23.9999Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M25.7143 23.9999H22.2857C21.3389 23.9999 20.5714 24.7674 20.5714 25.7142C20.5714 26.661 21.3389 27.4285 22.2857 27.4285H25.7143C26.6611 27.4285 27.4286 26.661 27.4286 25.7142C27.4286 24.7674 26.6611 23.9999 25.7143 23.9999Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M37.7143 23.9999H34.2857C33.3389 23.9999 32.5714 24.7674 32.5714 25.7142C32.5714 26.661 33.3389 27.4285 34.2857 27.4285H37.7143C38.6611 27.4285 39.4286 26.661 39.4286 25.7142C39.4286 24.7674 38.661 23.9999 37.7143 23.9999Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M13.7142 30.8571H10.2857C9.33889 30.8571 8.57138 31.6246 8.57138 32.5714C8.57138 33.5182 9.33889 34.2857 10.2857 34.2857H13.7142C14.661 34.2857 15.4285 33.5182 15.4285 32.5714C15.4285 31.6246 14.661 30.8571 13.7142 30.8571Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M25.7143 30.8571H22.2857C21.3389 30.8571 20.5714 31.6246 20.5714 32.5714C20.5714 33.5182 21.3389 34.2857 22.2857 34.2857H25.7143C26.6611 34.2857 27.4286 33.5182 27.4286 32.5714C27.4286 31.6246 26.6611 30.8571 25.7143 30.8571Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M37.7143 30.8571H34.2857C33.3389 30.8571 32.5714 31.6246 32.5714 32.5714C32.5714 33.5182 33.3389 34.2857 34.2857 34.2857H37.7143C38.6611 34.2857 39.4286 33.5182 39.4286 32.5714C39.4285 31.6246 38.661 30.8571 37.7143 30.8571Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M13.7142 37.7142H10.2857C9.33889 37.7142 8.57138 38.4817 8.57138 39.4286C8.57138 40.3754 9.33889 41.1428 10.2857 41.1428H13.7142C14.661 41.1428 15.4285 40.3753 15.4285 39.4284C15.4285 38.4816 14.661 37.7142 13.7142 37.7142Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M25.7143 37.7142H22.2857C21.3389 37.7142 20.5714 38.4817 20.5714 39.4285C20.5714 40.3754 21.3389 41.1429 22.2857 41.1429H25.7143C26.6611 41.1429 27.4286 40.3754 27.4286 39.4285C27.4286 38.4817 26.6611 37.7142 25.7143 37.7142Z"
                        fill="#F5F5FC"></path>
                      <path
                        d="M37.7143 37.7142H34.2857C33.3389 37.7142 32.5714 38.4817 32.5714 39.4285C32.5714 40.3754 33.3389 41.1429 34.2857 41.1429H37.7143C38.6611 41.1429 39.4286 40.3754 39.4286 39.4285C39.4286 38.4817 38.661 37.7142 37.7143 37.7142Z"
                        fill="#F5F5FC"></path>
                      </svg>
                    </div>
                    <h1 class="text-darken mb-3 text-xl font-medium lg:px-14 ">Duration</h1>
                    <p class="px-4 text-gray-500">{{ $program->intakes->where('start_date', '>=', now())->first()->duration ?? 0 }} Week(s)</p>
                  </div>
                  <div data-aos-delay="300" class="rounded-xl bg-white p-6 text-center shadow-xl">
                    <div
                      class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-[#a11e22] shadow-[#a11e22]-500/40">
                      <svg viewBox="0 0 55 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white">
                        <path
                          d="M8.25 19.25C11.2836 19.25 13.75 16.7836 13.75 13.75C13.75 10.7164 11.2836 8.25 8.25 8.25C5.21641 8.25 2.75 10.7164 2.75 13.75C2.75 16.7836 5.21641 19.25 8.25 19.25ZM46.75 19.25C49.7836 19.25 52.25 16.7836 52.25 13.75C52.25 10.7164 49.7836 8.25 46.75 8.25C43.7164 8.25 41.25 10.7164 41.25 13.75C41.25 16.7836 43.7164 19.25 46.75 19.25ZM49.5 22H44C42.4875 22 41.1211 22.6102 40.1242 23.5984C43.5875 25.4977 46.0453 28.9266 46.5781 33H52.25C53.7711 33 55 31.7711 55 30.25V27.5C55 24.4664 52.5336 22 49.5 22ZM27.5 22C32.8195 22 37.125 17.6945 37.125 12.375C37.125 7.05547 32.8195 2.75 27.5 2.75C22.1805 2.75 17.875 7.05547 17.875 12.375C17.875 17.6945 22.1805 22 27.5 22ZM34.1 24.75H33.3867C31.5992 25.6094 29.6141 26.125 27.5 26.125C25.3859 26.125 23.4094 25.6094 21.6133 24.75H20.9C15.4344 24.75 11 29.1844 11 34.65V37.125C11 39.4023 12.8477 41.25 15.125 41.25H39.875C42.1523 41.25 44 39.4023 44 37.125V34.65C44 29.1844 39.5656 24.75 34.1 24.75ZM14.8758 23.5984C13.8789 22.6102 12.5125 22 11 22H5.5C2.46641 22 0 24.4664 0 27.5V30.25C0 31.7711 1.22891 33 2.75 33H8.41328C8.95469 28.9266 11.4125 25.4977 14.8758 23.5984Z"
                          fill="white"></path>
                      </svg>
                    </div>
                    <h1 class="text-darken mb-3 pt-3 text-xl font-medium lg:h-14 lg:px-14">Study Mode</h1>
                    <p class="px-4 text-gray-500">Virtual classes</p>
                  </div>
                </div>
              
              </div>

            {{-- cards end --}}
            {{-- Description section --}}
            <section class="bg-white">
                <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="max-w-lg">
                            <div class="md:w-2/3 mx-auto relative">
                                <hr class="absolute top-1/2 left-1/2 w-2/3 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full" />
                                <h3 class="text-center text-[#a11e22] text-3xl sm:text-3xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl"
                                    id='testimonial'>Introduction</h3>
                            </div>
                            <p class="mt-4 text-gray-600 text-lg"> {!! $program->description !!}</p>
                       
                        </div>
                        <div class="mt-12 md:mt-0">
                                     {{-- accordions --}}
                        <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                            <div class="max-w-3xl mx-auto mt-8 space-y-4 md:mt-16">
                           
                                <div class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50 rounded-lg">
                                    <button type="button" id="question1" data-state="closed" onclick="toggleCollapse('question1', 'answer1')" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                                        <span class="flex text-lg font-semibold text-black">Who Should Attend?</span>
                                        <svg id="plus-icon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            class="w-6 h-6 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        <svg id="minus-icon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            class="w-6 h-6 text-gray-400 hidden">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <div id="answer1" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p>{!! $program->participants !!}</p>
                                    </div>
                                </div>
                                <div class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50 rounded-lg">
                                    <button type="button" id="question2" data-state="closed" onclick="toggleCollapse('question2', 'answer2')" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                                        <span class="flex text-lg font-semibold text-black">Program Objectives</span>
                                        <svg id="plus-icon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            class="w-6 h-6 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        <svg id="minus-icon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            class="w-6 h-6 text-gray-400 hidden">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <div id="answer2" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p>{!! $program->objective !!}</p>
                                    </div>
                                </div>
                                <div class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50 rounded-lg">
                                    <button type="button" id="question3" data-state="closed" onclick="toggleCollapse('question3', 'answer3')" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                                        <span class="flex text-lg font-semibold text-black">Program Methodology</span>
                                        <svg id="plus-icon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            class="w-6 h-6 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        <svg id="minus-icon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            class="w-6 h-6 text-gray-400 hidden">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <div id="answer3" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p>{!! $program->methodology !!}</p>
                                    </div>
                                </div>

                                <div class="transition-all duration-200 bg-white border border-gray-200 shadow-lg cursor-pointer hover:bg-gray-50 rounded-lg">
                                    <button type="button" id="question4" data-state="closed" onclick="toggleCollapse('question4', 'answer4')" class="flex items-center justify-between w-full px-4 py-5 sm:p-6">
                                        <span class="flex text-lg font-semibold text-black">Learning Outcomes</span>
                                        <svg id="plus-icon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            class="w-6 h-6 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        <svg id="minus-icon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            class="w-6 h-6 text-gray-400 hidden">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <div id="answer4" style="display:none" class="px-4 pb-5 sm:px-6 sm:pb-6">
                                        <p>{!! $program->outcomes !!}</p>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                       
                    {{-- end of accordions --}}

                   
                        </div>
                    </div>
                </div>
            </section>

             {{-- section  --}}
             <section class="relative overflow-hidden bg-[rgb(50,141,139)]">
             
       
    <div class="mt-2 md:mt-0 py-12 pb-6 sm:py-16 lg:pb-24 overflow-hidden">
        <div class="md:w-2/3 mx-auto relative">
            <hr
                class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#fff] border-0 rounded-full" />
            <h3 class="text-left text-[#a11e22] text-3xl sm:text-3xl capitalize font-bold relative z-10 bg-[rgb(50,141,139)] w-max mx-auto p-4 rounded-5xl"
                id='testimonial'>Application Process</h3>
        </div>
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 relative">
            <div class="relative mt-12 lg:mt-20">
                <div class="absolute inset-x-0 hidden xl:px-44 top-2 md:block md:px-20 lg:px-28">
                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" width="875" height="48" viewBox="0 0 875 48"
                        fill="none">
                        <path
                            d="M2 29C20.2154 33.6961 38.9915 35.1324 57.6111 37.5555C80.2065 40.496 102.791 43.3231 125.556 44.5555C163.184 46.5927 201.26 45 238.944 45C312.75 45 385.368 30.7371 458.278 20.6666C495.231 15.5627 532.399 11.6429 569.278 6.11109C589.515 3.07551 609.767 2.09927 630.222 1.99998C655.606 1.87676 681.208 1.11809 706.556 2.44442C739.552 4.17096 772.539 6.75565 805.222 11.5C828 14.8064 850.34 20.2233 873 24"
                            stroke="#D4D4D8" stroke-width="3" stroke-linecap="round" stroke-dasharray="1 12" />
                    </svg>
                </div>
                <div
                    class="relative grid grid-cols-1 text-center gap-y-8 sm:gap-y-10 md:gap-y-12 md:grid-cols-3 gap-x-12">
                    <div>
                        <div
                            class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-[#a11e22] border-2 border-gray-200 dark:border-white rounded-full shadow">
                            <span class="text-xl font-semibold text-white dark:text-gray-200">1</span>
                        </div>
                        <h3
                            class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                            Register
                        </h3>
                        <p class="mt-3 sm:mt-4 text-base text-white">
                            Submit your registration by filling in the form online.
                        </p>
                    </div>
                    <div>
                        <div
                            class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-[#a11e22] border-2 border-white dark:border-white rounded-full shadow">
                            <span class="text-xl font-semibold dark:text-gray-200">2</span>
                        </div>
                        <h3
                            class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                            Make Payments
                        </h3>
                        <p class="mt-3 sm:mt-4 text-base text-white">
                            Receive Invoice upon registration and make payments.
                        </p>
                    </div>
                    <div>
                        <div
                            class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-[#a11e22] border-2 border-gray-200 dark:border-white rounded-full shadow">
                            <span class="text-xl font-semibold text-white dark:text-gray-200">3</span>
                        </div>
                        <h3
                            class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                            Join program
                        </h3>
                        <p class="mt-3 sm:mt-4 text-base text-white">
                            Choose a mode of study and attend course.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

             {{-- <section>
                <div class="bg-[rgb(30,161,157)] text-white">
                    <div class="container mx-auto">
                        <div class="flex flex-col py-10 lg:py-20">
                            <div class="w-full">
                                <div class="mb-4">
                                    <h2 class="text-3xl lg:text-4xl font-bold mb-3">
                                        Elevate your skills with our {!! $program->name !!} Today.
                                    </h2>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            {{-- prerequisites --}}
            <section class="bg-gray-100">
                <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                        <div class="max-w-lg">
                            <div class=" mx-auto relative">
                                <hr
                                class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full" />
                                
                                <h3 class="text-left text-[#a11e22] text-3xl sm:text-3xl capitalize font-bold relative z-10 bg-[#f7f9f9] rounded-5xl"
                                    id='testimonial'>Program Prerequisites</h3>
                            </div>
                            {{-- <h2 class="text-3xl font-extrabold text-gray-700 sm:text-3xl">Program Prerequisites</h2> --}}
                            <p class="mt-4 text-gray-600 text-lg mx-6"> {!! $program->prerequisite !!}</p>
                            <div class="mt-8">
                                <button class="inline-flex items-center text-[#1b918e] rounded-4xl px-6 py-4 text-xl border-2 border-[#1b918e] bg-transparent hover:bg-[#1b918e] hover:text-white transition-colors duration-300" onclick="openModal('modelConfirm')">
                                    Download Brochure
                                 </button>
                                {{-- <a href="#"
                               class="inline-flex items-center text-[#1b918e] rounded-4xl px-6 py-4 text-xl border-2 border-[#1b918e] bg-transparent hover:bg-[#1b918e] hover:text-white transition-colors duration-300">
                               Download Brochure
                            </a> --}}
                            </div>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <img src="{{ asset ('images/study.webp') }}" alt="About Us Image" class="object-cover rounded-lg shadow-md">
                        </div>
                    </div>
                </div>
            </section>
           
           {{-- === modules=== --}}
           <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
           <script src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js" defer></script>
           <!-- Modules Section -->
<div class="bg-white text-center py-12" id="modules">

<h3 class="text-center text-[#a11e22] text-3xl sm:text-3xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 mb-5 rounded-5xl"
    id='testimonial'>Program Modules</h3>
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
           

            <div x-data="moduleAccordion()" class="space-y-4">
                <div x-data="{ openTab: null }">
                    @foreach ($program->modules as $key => $module)
                        <div class="bg-[#1a8c88] text-white shadow-md rounded-lg overflow-hidden mb-4">
                            <button 
                                @click="openTab === {{ $key }} ? openTab = null : openTab = {{ $key }}"
                                class="w-full px-6 py-4 text-left text-white font-semibold focus:outline-none flex justify-between items-center" 
                            >
                                {{ $module->name }}
                
                                <!-- Plus Icon -->
                                <div class="flex items-center justify-center w-8 h-8 bg-white rounded-full text-[#1a8c88] hover:bg-[#a11e22] hover:text-white transition duration-200" x-show="openTab !== {{ $key }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>

                                <!-- Minus Icon -->
                                <div class="flex items-center justify-center w-8 h-8 bg-white rounded-full text-[#1a8c88] hover:bg-[#a11e22] hover:text-white transition duration-200" x-show="openTab === {{ $key }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </div>
                            </button>
                
                            <div 
                                x-show="openTab === {{ $key }}"
                                x-collapse
                                class="ml-5 px-6 py-4 text-white bg-[#1a8c88] text-left"
                            >
                                {!! $module->description !!}
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>


             
          {{-- certificate of completion --}}
        
           <div class="container mx-auto mt-12 mb-12">
            <div class="md:w-2/3 mx-auto relative mb-12">
                <hr
                class="absolute top-1/2 left-1/2 w-1/2 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full" />
                <h3 class="text-center text-[#a11e22] text-3xl sm:text-3xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl"
                    id='testimonial'>Certifications</h3>
                    
                   
            </div>
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-full md:w-1/2 p-4 py-11 text-center">
                  <!-- Content for the first column -->
                  <p class="text-3xl">Upon successful course completion, participants will be awarded a certificate of program completion from Indepth Research Institute.</p>
                </div>
                <div class="w-2/3 md:w-1/2 p-4 flex justify-center">
                  <img class="h-auto w-3/4 rounded-lg" src="{{ asset('front/assets/img/certificate.webp') }}" alt="Certification image">
                </div>
              </div>
            
           
     
        </div>
        <div class="container mx-auto mt-12 mb-12">
            <div class="md:w-2/3 mx-auto relative">
       
                <h3 class="text-center text-[#a11e22] text-3xl"
                    id='testimonial'>The Program also Includes</h3>
            </div>
        
            <div class="relative flex-row overflow-hidden py-6 sm:py-12 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div
                    class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                    <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:scale-[10]"></span>
                    <div class="relative z-10 mx-auto max-w-md">
                        <span class="grid h-20 w-20 place-items-center rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:bg-[rgb(50,141,139)]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white transition-all">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                        </span>
                        <div
                            class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                            <h3 class="text-[#a11e22] group-hover:text-white">Program Delivery</h4>
                            <p>Delivered via video lectures in form of zoom and google meet.</p>
                        </div>
                    </div>
                </div>
                <div
                class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:scale-[10]"></span>
                <div class="relative z-10 mx-auto max-w-md">
                    <span class="grid h-20 w-20 place-items-center rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:bg-[rgb(50,141,139)]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white transition-all">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2.25a9.75 9.75 0 1 0 9.75 9.75A9.764 9.764 0 0 0 12 2.25zm0 18a8.25 8.25 0 1 1 8.25-8.25A8.259 8.259 0 0 1 12 20.25zm-3.75-8.25H15.75M12 2.25v19.5m5.303-14.197a10.453 10.453 0 0 1-10.606 0" />
                      </svg>
                      
                    </span>
                    <div
                        class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                        <h3 class="text-[#a11e22] group-hover:text-white">Real World Examples</h4>
                        <p>Delivered through a combination of video and live online lectures.</p>
                    </div>
                    {{-- <div class="pt-5 text-base font-semibold leading-7">
                        <p>
                            <a href="#" class="text-sky-500 transition-all duration-300 group-hover:text-white">Read the docs
                                &rarr;
                            </a>
                        </p>
                    </div> --}}
                </div>
            </div>
                <div
                class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:scale-[10]"></span>
                <div class="relative z-10 mx-auto max-w-md">
                    <span class="grid h-20 w-20 place-items-center rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:bg-[rgb(50,141,139)]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white transition-all">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.77 5.82 22l1.09-7.86-5-4.87 6.91-1.01L12 2z" />
                          </svg>
                          
                    </span>
                    <div
                        class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                        <h3 class="text-[#a11e22]  group-hover:text-white">Hands on Experience</h4>
                        <p>Learn through individual assignments and feedback.</p>
                    </div>
                </div>
            </div>
            <div
            class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10 ">
            <span class="absolute top-10 z-0 h-20 w-20 rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:scale-[10]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span class="grid h-20 w-20 place-items-center rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:bg-[rgb(50,141,139)]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-white transition-all">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5V6.75A2.25 2.25 0 016.25 4.5h6.75a2.25 2.25 0 012.25 2.25v12.75m0-13.5H7.5m9 1.5V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5m12.75 0h6.75A2.25 2.25 0 0121.5 21.75V9a2.25 2.25 0 00-2.25-2.25h-6.75" />
                      </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                    <h3 class="text-[#a11e22]  group-hover:text-white">Debrief of Learning</h4>
                    <p>A combination of recorded and live video lectures.</p>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="w-full bg-white py-5">
            <div class="md:w-2/3 mx-auto relative">
                <hr class="absolute top-1/2 left-1/2 w-3/4 -translate-y-1/2 -translate-x-1/2 h-0.5 bg-[#a11e22] border-0 rounded-full" />
                <h3 class="w-max text-center text-[#a11e22] text-3xl sm:text-3xl capitalize font-bold relative z-10 bg-white mx-auto p-4 rounded-5xl"
                    id='testimonial'>Tech Stack</h3>
            </div>
            <div class="w-full p-4">
                <div class="w-full xl:w-[1280px] mx-auto grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 2xl:grid-cols-10 gap-2">
                    @forelse($program->techstacks as $TechStack)
                    <div class="rounded-md overflow-hidden shadow-lg shadow-black aspect-square">
                        <img src="{{ asset('images/program/techstack/'.$TechStack->logo) }}" alt="{{ $TechStack->name }}" title="{{ $TechStack->name }}" class="w-full h-full object-cover">
                    </div>
                    @empty
                    <div class="w-full p-4 col-span-full">
                        <p class="text-center text-lg font-bold">
                            No Technology needed
                        </p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
           {{-- application process --}}
           <section class="relative overflow-hidden">
           <div class="px-12 bg-slate-100  ">
            <div class="flex flex-col lg:flex-row gap-8 md:w-5/6 mx-auto relative py-20">
                <div class="lg:w-7/12">
                    <div class="header">
                        <h2 class="text-2xl font-bold mb-4 text-[#a11e22]">Upcoming Application Deadline</h2>
                    </div>
                    <p class="mb-4">
                        Admissions are closed once the requisite number of participants enroll for the upcoming cohort.
                        Apply early to secure your seat.
                    </p>
                    <p class="mb-6">
                        Deadline:
                        <strong>{{ date('j M Y', strtotime($program->intakes->where('start_date', '>=', now())->first()->start_date ?? Now())) }}</strong>
                    </p>
                    <div class="rounded-md">
                        <a href="{{ route('programs.register', $program->slug) }}"
                           class="ires-primary-btn text-xl mx-auto md:mx-0 inline-flex items-center px-6 py-4">
                           Apply Now
                        </a>
                    </div>
                  
                </div>
            
                <div class="lg:w-5/12 border border-[#1b918e] p-4">
                    <h2 class="text-2xl font-bold mb-4 text-[#a11e22]">Program Fees</h2>
                    <div class="cta-programs">
                        <div class="program-fee">
                            <p class="mb-4">
                                Fees:
                                @foreach ($program->prices as $price)
                                    {{ $price->ksh }} / USD {{ $price->usd }}
                                @endforeach
                            </p>
                            {{-- <a href="{{ route('programs.register', $program->slug) }}"
                               class="inline-block px-6 py-2 text-lg font-medium text-brown-500 bg-transparent border border-brown-500 rounded-md hover:text-white hover:bg-brown-500">
                                Apply Now
                            </a> --}}
                        </div>
                    </div>
            
                    <h4 class="mt-6 text-lg font-bold">We accept</h4>
                    <div class="flex gap-4 mt-4">
                        <div class="inline-block">
                            <img src="{{ asset('images/mpesa.webp') }}" alt="Mpesa">
                        </div>
                        <div class="inline-block">
                            <img src="{{ asset('images/paybal.webp') }}" alt="PayPal">
                        </div>
                        <div class="inline-block">
                            <img src="{{ asset('images/master.webp') }}" alt="Mastercard">
                        </div>
                        <div class="inline-block">
                            <img src="{{ asset('images/visa.webp') }}" alt="Visa">
                        </div>
                    </div>
                    
                </div>
            </div>
            

        </div>
    </section>

           <div class="container mx-auto mt-12 mb-12">
          
        
            {{-- <div class="relative flex-row overflow-hidden py-6 sm:py-12 grid grid-cols-2 md:grid-cols-3 gap-2">
                <div
                    class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-4 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                    <span class="absolute top-10 z-0 h-12 w-12 rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:scale-[16]"></span>
                    <div class="relative z-10 mx-auto max-w-md">
                        <div class="flex items-center justify-center  
                        h-12 w-12 rounded-full"> 
                        <span class="text-white font-bold text-2xl"> 
                            1
                        </span> 
                    </div> 
                        <div
                            class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                            <h3 class="text-[#a11e22] group-hover:text-white">Register</h4>
                            <p>Submit your registration by filling in the form online.</p>
                        </div>
                    </div>
                </div>
                <div
                class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                <span class="absolute top-10 z-0 h-12 w-12 rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:scale-[16]"></span>
                <div class="relative z-10 mx-auto max-w-md">
                    <div class="flex items-center justify-center  
                    h-12 w-12 rounded-full"> 
                    <span class="text-white font-bold text-2xl"> 
                        2
                    </span> 
                </div> 
                      
                    </span>
                    <div
                        class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                        <h3 class="text-[#a11e22] group-hover:text-white">Make Payments</h4>
                        <p>Receive Invoice upon registration and make payments.</p>
                    </div>
                  
                </div>
            </div>
                <div
                class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                <span class="absolute top-10 z-0 h-12 w-12 rounded-full bg-[rgb(50,141,139)] transition-all duration-300 group-hover:scale-[16]"></span>
                <div class="relative z-10 mx-auto max-w-md">
                    <div class="flex items-center justify-center  
                    h-12 w-12 rounded-full"> 
                    <span class="text-white font-bold text-2xl"> 
                        3
                    </span> 
                </div> 
                    <div
                        class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                        <h3 class="text-[#a11e22]  group-hover:text-white">Join program</h4>
                        <p>Choose a mode of study and attend course.</p>
                    </div>
                </div>
            </div>
        </div> --}}

   
        {{-- cta --}}

        <div class="w-full">
            <div class="w-full relative grid grid-cols-12 place-items-end">
                <div class="absolute bottom-0 w-full h-full lg:h-1/2">
                    <img class="h-full object-cover z-0" src="{{ asset('images/001.webp') }}" alt="">
                </div>
                <div class="col-span-5 max-lg:hidden z-20">
                    <div class="w-full">
                        <img src="{{ asset ('images/program-cta1.webp') }}" alt="person " class="w-full aspect[2/3]"/>
                    </div>
                </div>
                <div class="col-span-7 max-lg:col-span-full w-full lg:h-1/2 flex items-center z-20">
                    <div class="p-3">
                        <h3 class=" text-white  relative after:bg-[#fff] after:w[10%] text-2xl lg:text-4xl font-semibold pb-1 lg:pb-4">
                            Interested in this Program?
                        </h3>
                        <h4 class=" text-[#fff]">
                            Curious about how the program can help you reach your goals? To get started, just click the button below to make an inquiry, or reach out to us at  <span class=" text-[#328d8b]  underline underline-[#fff] underline-offset-2 "> <a href="mailto:outreach@indepthresearch.org">outreach@indepthresearch.org</a>  </span> or call us at  <span class=" text-[#328d8b]  underline underline-[#fff] underline-offset-2 "> <a href="tel:+254 715 077 817">+254 715 077 817</a></span>
                        </h4>
                        <div class="my-5">
                            <a href="{{route ('contact')}}" class="bg-[#328d8b] text-white rounded-3xl py-3 px-5 hover:bg-[rgb(161,30,34)]">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        
     

        <div class="container mx-auto mt-12 mb-12">
            <div class="md:w-2/3 mx-auto relative mb-12">
                <h3 class="text-center text-[#a11e22] sm:text-3xl capitalize font-bold relative z-10 bg-[#f7f9f9] w-max mx-auto p-4 rounded-5xl"
                    id='testimonial'>Discover Our Courses</h3>  
            </div>
        
                        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 xl:grid-cols-6 gap-3 md:px-12">
            @foreach (App\Course::inRandomOrder()->take(6)->get() as $course)
            <div class="border box-content rounded-lg shadow-xl hover:shadow-[#a11e22] aspect-square overflow-hidden relative group">
                <div class="absolute bottom-0  bg-[#a11e22] bg-opacity-60 text-white w-full h-full group-hover:bg-opacity-100 flex items-center transition duration-500">
                    <a class="hover:underline" href="{{ route('course.show', $course->slug) }}">
                        <h5 class="p-3">{{ $course->name }}</h5>
                    </a>
                </div>
                <img loading="lazy" src="{{ asset('storage/'.$course->cover) }}" alt="{{ $course->name }}" title="{{ $course->name }}" class="w-full h-full object-cover">
               
            </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>
@endsection

@section('js_content')

    {{-- script for modules --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('moduleAccordion', () => ({
                activeTab: null,
                
                init() {
                    // You can set an initial open tab here if needed
                    // this.activeTab = 0;
                },
    
                toggleTab(index) {
                    this.activeTab = this.activeTab === index ? null : index;
                },
    
                isOpen(index) {
                    return this.activeTab === index;
                }
            }));
        });
    </script>
    
    <script>
                           
        function toggleCollapse(questionId, answerId) {
            const answerElement = document.getElementById(answerId);
            const plusIcon = document.getElementById(`plus-icon${questionId.slice(-1)}`);
            const minusIcon = document.getElementById(`minus-icon${questionId.slice(-1)}`);

            if (answerElement.style.display === "none") {
                answerElement.style.display = "block";
                plusIcon.classList.add('hidden');
                minusIcon.classList.remove('hidden');
            } else {
                answerElement.style.display = "none";
                plusIcon.classList.remove('hidden');
                minusIcon.classList.add('hidden');
            }
        }


        // form for download
            const form = document.getElementById('bronchure-downloads');
            const button = document.getElementById('bronchure-form');

            form.addEventListener('submit', function() {
                button.disabled = true;  
                button.innerHTML = 'Loading...';
                button.classList.add('bg-[#1b918e]', 'text-[#a11e22]'); 
            });


    </script>

@endsection
