@extends('front.Projects.master')

@section('content')
    <div class="main-body" id="tp">
        <!-- page breadcrumbs -->
        <div class="flex items-center space-x-2 text-gray-600 bg-[#0096FF] p-2">
            <span>
                <a href="{{ route('home') }}" class="fa fa-home text-xl text-[#00a651]"></a>
            </span>
            <span class="text-sm text-white">/</span>
            <span class="text-sm font-semibold text-white">Become an Agent</span>
        </div>
        <!-- END page breadcrumbs -->

        <!-- page container -->
        <div class="lg:w-[1024px] mx-auto">

            {{-- @include('front/partials/alert') --}}

            <div class="mx-auto px-4 py-10">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 p-4 mb-4">
                        <div class="rounded-lg overflow-hidden shadow-lg">
                            <img class="" src="{{ asset('images/Agent.webp') }}" alt="Agent">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-4 mb-4">
                        <div class="py-2">
                            <div class=" mb-4">
                                <h3 class="text-4xl font-bold text-[#00a651]">Become an Agent</h3>
                                <hr class="my-4 border-b border-[#00a651]"/>
                            </div>
                            <p class="text-gray-700">At Tech For Development, we are constantly expanding our global reach to deliver top-tier training and consultancy services.  <br/><br/>

                                To that end, we’re always looking for passionate individuals to partner with us as agents, helping us organize and manage high-quality professional development experiences across our training locations
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-auto px-4 py-10">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 mb-4">
                        <div class="">
                            <div class="mb-4">
                                <h3 class="text-3xl font-bold text-[#00a651]">Benefits of being an Agent</h3>
                                <hr class="my-4 border-b border-[#00a651]"/>
                            </div>
                            <ol class="list-decimal *:mb-2 pl-5 text-gray-700">
                                <li>
                                    <p class="font-bold">Be Part of a Global Movement</p>
                                    <p>As an IRES agent, you’ll play a key role in connecting professionals and organizations with our transformative training and consultancy services across our global training locations. </p>
                                </li>

                                <li>
                                    <p class="font-bold">Access Exclusive Benefits</p>
                                    <p>Earn competitive pay while having access to insider knowledge on industry trends that keep you ahead of the curve. </p>
                                </li>

                                <li>
                                    <p class="font-bold">Expand Your Network</p>
                                    <p>Build strong relationships with professionals across sectors such as health, education, finance, agriculture, and more. </p>
                                </li>

                                <li>
                                    <p class="font-bold">Flexible Partnership</p>
                                    <p>Becoming an IRES agent accords you the opportunity to work at your own pace and grow  alongside us. Becoming an IRES agent means becoming part of a global mission to transform lives through professional development.
                                    </p>
                                </li>
                            </ol>
                            <p class="mt-4 text-gray-700">For further inquiries, please contact us on <br/>
                                <b>
                                    Phone: +254 715 077 817 or <br/>
                                    Email: outreach@indepthresearch.org.
                                </b>
                            </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-4 mb-4">
                        <div class="rounded-lg overflow-hidden shadow-lg">
                            <img class="w-full " src="{{ asset('images/Benefits of being an Agent.webp') }}" alt="Benefits of being an Agent">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
