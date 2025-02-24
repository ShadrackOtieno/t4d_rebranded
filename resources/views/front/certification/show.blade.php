@extends('front.Projects.master')

@section('css')
 <style>
    .tab-content div p{
        padding: 10px 5px;
    }
    /* *{
        outline: 1px limegreen solid;
    } */
    span{
        min-width: max-content;
        word-wrap: none;
    }
 </style>
 @endsection

@section('content')
    <div class="main-body bg-white">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="flex flex-wrap items-center text-white bg-[#1ea19d]">
                <span>
                    <a href="{{ route('home') }}" class="fas fa-home"></a>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                </span>
                <span>
                    <a href="{{ route('certification.index') }}" class="hover:underline">
                        Professional Certifications
                    </a>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                </span>
                <span>
                    <a href="{{ route('certification.category.show', $certification->subcategory->category) }}" class="hover:underline">
                        {{ $certification->subcategory->category->name }}
                    </a>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                </span>
                <span>
                    <a href="{{ route('certification.category.subcategory.show', [
                        'category' => $certification->subcategory->category,
                        'subcategory' => $certification->subcategory,
                    ]) }}" class="hover:underline">
                        {{ $certification->subcategory->name }}
                    </a>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
                </span>
                <span class="font-semibold">{{ $certification->name }}</span>
            </div>
            
            <!-- END page breadcrumbs -->
        
            {{-- @include('front/partials/alert') --}}
        
            <!-- page content -->
            <div class="lg:w-[1024px] mx-auto py-8">
                <div class=" mx-auto px-4">
                    <h1 class="text-3xl text-[#a11e22] font-bold">{{ $certification->name }} Professional Certification.</h1>
                    <div class="my-12 py-5">
                        <nav>
                            <div class="flex w-max border border-[#1ea19d] cursor-pointer relative divide-x divide-[#1ea19d] rounded-2xl overflow-hidden" role="tablist">
                                <div class="absolute left-0 py-2 px-4 w-1/3 md:w-[150px] h-14 md:h-12 bg-[#1ea19d] z-0 transition-all duration-700 ease-out" id="select"></div>
                                <div class="py-2 px-4 text-center w-1/3 md:w-[150px] h-14 md:h-12 bg-transparent hover:border border-[#1ea19d] z-10 hover:underline" id="nav-tab" for="face-to-face" position="0" onclick="navTabMove(this)">Face to Face</div>
                                <div class="py-2 px-4 text-center w-1/3 md:w-[150px] h-14 md:h-12 bg-transparent hover:border border-[#1ea19d] z-10 hover:underline" id="nav-tab" for="virtual" position="1" onclick="navTabMove(this)">Virtual</div>
                                <div class="py-2 px-4 text-center w-1/3 md:w-[150px] h-14 md:h-12 bg-transparent hover:border border-[#1ea19d] z-10 hover:underline " id="nav-tab" for="elearning" position="2" onclick="navTabMove(this)">E-learning</div>
                            </div>
                        </nav>
        
                        <div class="tab-content mt-4">
                            <div class="" id="face-to-face" role="tabpanel" aria-labelledby="nav-face-to-face-tab">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="py-2 border-b">Code</th>
                                            <th class="py-2 border-b">Date</th>
                                            <th class="py-2 border-b">Duration</th>
                                            <th class="py-2 border-b">Location</th>
                                            <th class="py-2 border-b">Fees</th>
                                            <th class="py-2 border-b"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certification->physicalClasses->load('currencies')->filter(function ($schedule) {
                                            return strtotime('today') <= strtotime($schedule->booking_end);
                                        }) as $schedule)
                                            <tr>
                                                <td class="py-2">{{ $certification->code }}</td>
                                                <td class="py-2">{{ date('j F Y', strtotime($schedule->from)) }} - {{ date('j F Y', strtotime($schedule->to)) }}</td>
                                                <td class="py-2">
                                                    {{ $schedule->duration }}
                                                    {{ ngettext('day', 'days', $schedule->duration) }}
                                                </td>
                                                <td class="py-2">{{ "{$schedule->city->name}, {$schedule->city->venue->country}" }}</td>
                                                <td class="py-2">
                                                    ${{ number_format( @$schedule->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
                                                </td>
                                                <td class="py-2">
                                                    <a class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" href="{{ route('certification.booking.create',  [
                                                        'certification' => $certification,
                                                        'class' => 'physical',
                                                        'schedule' => $schedule->id,
                                                    ]) }}">
                                                        Register
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        
                            <div class="hidden" id="virtual" role="tabpanel" aria-labelledby="nav-virtual-tab">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="py-2 border-b">Code</th>
                                            <th class="py-2 border-b">Date</th>
                                            <th class="py-2 border-b">Duration</th>
                                            <th class="py-2 border-b">Fees</th>
                                            <th class="py-2 border-b"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certification->virtualClasses->load('currencies')->filter(function ($schedule) {
                                            return strtotime('today') <= strtotime($schedule->booking_end);
                                        }) as $schedule)
                                            <tr>
                                                <td class="py-2">{{ $certification->code }}</td>
                                                <td class="py-2">{{ date('j F Y', strtotime($schedule->from)) }} - {{ date('j F Y', strtotime($schedule->to)) }}</td>
                                                <td class="py-2">
                                                    {{ $schedule->duration }}
                                                    {{ ngettext('day', 'days', $schedule->duration) }}
                                                </td>
                                                <td class="py-2">
                                                    ${{ number_format( @$schedule->currencies->firstWhere('code', 'USD')->pivot->amount ) }}
                                                </td>
                                                <td class="py-2">
                                                    <a class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" href="{{ route('certification.booking.create',  [
                                                        'certification' => $certification,
                                                        'class' => 'virtual',
                                                        'schedule' => $schedule->id,
                                                    ]) }}">
                                                        Register
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        
                            <div class="hidden" id="elearning" role="tabpanel" aria-labelledby="nav-elearning-tab">
                                Follow Website Link:
                                @if ($certification->elearningClass)
                                    <a href="{{ strpos($certification->elearningClass->website, 'http') ? str_replace('http://', 'https://', $certification->elearningClass->website) : "https://{$certification->elearningClass->website}" }}" target="_blank" class="text-blue-500 hover:underline">
                                        {{ $certification->elearningClass->website }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
        
                    <!-- course description -->
                    <div class="py-8">
                        <div>
                            <nav class="w-full max-md:overflow-x-scroll">
                                <div class="flex border border-[#a11e22] relative w-max mx-auto divide-x divide-[#a11e22] rounded-2xl overflow-hidden" id="nav-tab-2">
                                    <div class="absolute left-0 py-2 px-4 w-[130px] h-16 bg-[#a11e22] z-0 transition-all duration-700 ease-out" id="activ"></div>
                                    <div  class="py-2 px-4 text-center w-[130px] h-16 bg-transparent hover:border border-[#1ea19d] z-10 cursor-pointer hover:underline" onclick="navTab2Move(this)" for="nav-cdesc" position="0">Course Overview</div>
                                    <div  class="py-2 px-4 text-center w-[130px] h-16 bg-transparent hover:border border-[#1ea19d] z-10 cursor-pointer hover:underline" onclick="navTab2Move(this)" for="nav-cout" position="1">Learning Objectives</div>
                                    <div  class="py-2 px-4 text-center w-[130px] h-16 bg-transparent hover:border border-[#1ea19d] z-10 cursor-pointer hover:underline" onclick="navTab2Move(this)" for="nav-cmod" position="2">What’s Covered?</div>
                                    <div  class="py-2 px-4 text-center w-[130px] h-16 bg-transparent hover:border border-[#1ea19d] z-10 cursor-pointer hover:underline" onclick="navTab2Move(this)" for="nav-cdld" position="3">Downloads</div>
                                    <div  class="py-2 px-4 text-center w-[130px] h-16 bg-transparent hover:border border-[#1ea19d] z-10 cursor-pointer hover:underline" onclick="navTab2Move(this)" for="nav-exam" position="4">Exam and Certification</div>
                                    <div  class="py-2 px-4 text-center w-[130px] h-16 bg-transparent hover:border border-[#1ea19d] z-10 cursor-pointer hover:underline" onclick="navTab2Move(this)" for="nav-certifying-body" position="5">Certifying Body</div>
                                    <div  class="py-2 px-4 text-center w-[130px] h-16 bg-transparent hover:border border-[#1ea19d] z-10 cursor-pointer hover:underline" onclick="navTab2Move(this)" for="nav-why" position="6">Why Register?</div>
                                </div>
                            </nav>
        
                            <div class="tab-content mt-4 *:p-3">
                                <div class="" id="nav-cdesc">
                                    {!! $certification->description !!}
                                </div>
                                <div class="tab-pane fade hidden" id="nav-cout">
                                    {!! $certification->objectives !!}
                                </div>
                                <div class="tab-pane fade hidden" id="nav-cmod">
                                    {!! $certification->modules !!}
                                </div>
                                <div class="tab-pane fade hidden" id="nav-cdld">
                                    <table class="min-w-full divide-y divide-gray-200 table-auto">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse ($certification->documents as $document)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 hover:underline">
                                                    <a href="#" data-toggle="modal" data-target="#popDownload" onclick="document.getElementById('document_id').value={{ $document->id }}">
                                                        Download
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    No documents available
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade hidden" id="nav-exam">
                                    {!! $certification->exam !!}
                                </div>
                                <div class="tab-pane fade hidden" id="nav-certifying-body">
                                    <h4>{{ $certification->certifyingBody->name }}</h4>
                                    {{ $certification->certifyingBody->description }}
                                </div>
                                <div class="tab-pane fade hidden" id="nav-why">
                                    {!! $certification->why_register !!}
                                </div>
                            </div>
                        </div>
                        <hr class="my-4"/>

                        <!-- (social) share -->
                        <div class="">
                            {{-- <!-- download modal -->
                            <div class="modal fade" id="popDownload" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('certification.document') }}" method="POST" class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Complete form to download</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            @csrf
                                            <input type="hidden" name="document_id" id="document_id">

                                            <div class="mb-4">
                                                <label class="block text-sm text-gray-700">Full Name</label>
                                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Full Name" name="name" required>
                                            </div>

                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-sm text-gray-700">Phone Number</label>
                                                    <input type="tel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Phone Number" name="phone" required>
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-700">Email Address</label>
                                                    <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Email Address" name="email" required>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-2 gap-4 mt-4">
                                                <div>
                                                    <label class="block text-sm text-gray-700">Organization</label>
                                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Organization" name="organization" required>
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-700">Designation</label>
                                                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Designation" name="designation" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Download</button>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}

                            <!-- social share -->
                            <div class="w-full mt-10 lg:mt-0 px-10 2xl:px[200px] ">
                                <h4 class="text-left text-[22px] pb-10 text-[#a11e22]">Share this course:</h4>
                                {{-- <hr class="border-gray-300  my-4" /> --}}
                                <div class="flex flex-wrap w-full gap-2">
                                    <a class=" items-center justify-center bg-transparent border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white rounded-full w-full lg:w-max text-center lg:px-7 py-2 text-sm"
                                        href="http://www.facebook.com/sharer.php?u={{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}" target="_blank"
                                        title="Share on Facebook">
                                        <i class="fab fa-facebook-square mr-2"></i> Share
                                    </a>
                                    <a class=" items-center justify-center bg-transparent border border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white rounded-full w-full lg:w-max text-center lg:px-7 py-2 text-sm"
                                        href="https://twitter.com/share?url={{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}" target="_blank"
                                        title="Share on Twitter">
                                        <i class="fab fa-twitter mr-2"></i> Tweet
                                    </a>
                                    <a class="inline-flex items-center justify-center bg-transparent border border-blue-700 text-blue-700 hover:bg-blue-700 hover:text-white rounded-full w-full lg:w-max text-center lg:px-7 py-2 text-sm"
                                        href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}"
                                        target="_blank" title="Share on LinkedIn">
                                        <i class="fab fa-linkedin-in mr-2"></i> Share
                                    </a>
                                    <a class="inline-flex items-center justify-center text-center lg:px-7 bg-transparent border border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded-full w-full lg:w-max  py-2 text-sm"
                                        href="https://wa.me/?text={{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}" target="_blank"
                                        title="Share on WhatsApp">
                                        <i class="fab fa-whatsapp mr-2"></i> Share
                                    </a>
                                    <a class=" items-center justify-center text-center lg:px-7 py-2 bg-transparent border border-gray-500 text-black hover:bg-black hover:text-white rounded-full w-full lg:w-max text-sm"
                                        href="mailto:?subject={{ urlencode('Get your certification: ' . $certification->name) }}&body={{ urlencode('I found this interesting certification and thought you might like it. Check it out here: ' . route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification)) }}"
                                        target="_blank" title="Share via Email">
                                        <i class="fas fa-envelope mr-2"></i> Share via Email
                                    </a>
                                    <a class=" items-center justify-center bg-transparent border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded-full w-full lg:w-max text-center lg:px-7 py-2 text-sm"
                                        href="https://www.reddit.com/submit?url={{ route( $certification->type == 'single' ? 'certification.show' : 'certification.bundle.show', $certification) }}" target="_blank"
                                        title="Share on Reddit">
                                        <i class="fab fa-reddit-alien mr-2"></i> Share
                                    </a>
                                </div>
                            </div>
                            <hr class="lg:hidden block border-gray-300 mt-10">
                        </div>
                        <!-- END (social) share -->

                    </div>
                    <!-- END course description -->
            @php
                $other_certifications = App\Certification::where('id', '<>', $certification->id)->inRandomOrder()->take(4)->get();
            @endphp

            @if ($other_certifications->count() > 0)
                <!-- related courses section -->
                <div class="mt-8">
                    <div class="mb-4">
                        <h4 class="text-xl font-semibold">We thought you might be interested</h4>
                        <hr class="my-2 border-gray-300"/>
                    </div>
                    <!-- columns -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-8 sm:px-0">
                        @foreach ($other_certifications as $other_certification)
                            <div class="bg-white h-[360px] shadow-md rounded-lg overflow-hidden relative flex justify-center flex-wrap">
                                <img class="w-full h-44 object-cover" src="{{ asset('storage/'.$other_certification->cover) }}" alt="{{ $other_certification->cover }}">
                                <div class="px-4 py-1 w-full h-full">
                                    <h6 class="text-base font-bold">
                                        <a href="{{ route('certification.show', $other_certification) }}" class="hover:underline">
                                            {{ $other_certification->name }}
                                        </a>
                                    </h6>
                                    <span class="text-gray-600 text-sm">
                                        {{ $other_certification->courses_count }}
                                        {{ ngettext('course', 'courses', $other_certification->courses_count) }}
                                    </span>
                                </div>
                                <button class="absolute bottom-0 mt-4 mb-4 mx-auto ires-pri-btn px-8 py-2" type="button" onclick="window.location.href = `{{ route('certification.show', $other_certification) }}`">
                                    View
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- END related courses section -->
            @endif

                </div>
            </div>
        </div>
        
        <!-- END page container -->

    </div>
@endsection

@section('js_content')
    <script>
        // let schedule_tab = (window.location.hash || '#face-to-face').substr(1);

        // document.getElementById(`nav-${schedule_tab}-tab`).className += ' active';
        // document.getElementById(schedule_tab).className += ' show active';

        const selected = document.getElementById('select')
        var activeSection = document.querySelector('#face-to-face')

        function navTabMove(btn) {
            selected.style.transform = 'translateX(' + btn.getAttribute('position') * 100 + "%)"

            //Getting the selected section
            let section = document.getElementById(btn.getAttribute('for'))

            //hiding and unhiding the elements
            hideSeek(section, activeSection)

            //Then update the new active element
            activeSection = section
        }

        const activ = document.getElementById('activ')
        var activeDesc = document.querySelector('#nav-cdesc')

        function navTab2Move(btn) {
            activ.style.transform = 'translateX(' + btn.getAttribute('position') * 100 + "%)"

            //Getting the selected section
            let section = document.getElementById(btn.getAttribute('for'))

            //hiding and unhiding the elements
            hideSeek(section, activeDesc)

            //Then update the new active element
            activeDesc = section
        }
    </script>
@endsection
