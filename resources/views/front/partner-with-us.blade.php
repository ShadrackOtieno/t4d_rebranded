@extends('front.Projects.master')

@section('content')
    <div class="main-body" id="tp">
        <!-- page breadcrumbs -->
        <div class="flex items-center space-x-2 text-white bg-[#0096FF] p-2">
            <span>
                <a href="{{ route('home') }}" class="fa fa-home text-xl text-white"></a>
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"></svg>
            <span class="text-sm font-semibold text-white">Franchise With Us</span>
        </div>
        <!-- END page breadcrumbs -->

        <!-- page container -->
        <div class="lg:w-[1024px] mx-auto">

            {{-- @include('front/partials/alert') --}}

            <div class="mx-auto py-4">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 p-4">
                        <div class="rounded-lg overflow-hidden">
                            <img class="w-full h-auto rounded-lg" src="{{ asset('images/Franchise with Us.webp') }}" alt="Franchise with Us">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <div class="">
                            <div class="mb-4">
                                <h1 class="text-4xl font-bold text-[#00a651]">Franchise with Us</h1>
                                <hr class="my-2 border-[#00a651]"/>
                            </div>
                            <p class="">Together, we can create impact. At Tech For Development(IRES), we provide a platform for meaningful collaboration and personal growth.
                                Whether you're an independent consultant, a seasoned professional, or nurturing entrepreneurial dreams, we extend a warm invitation to join our dynamic network.
                                Let's walk on this journey together, where your unique skills and aspirations find a home for shared success.</p><br/>
                            <p class="">When you franchise with IRES, you become part of our esteemed network of partners.
                                As a franchisee, you'll benefit from our proven business model, extensive resources, and ongoing support, enabling you to build and grow a successful franchise in your local market.
                                With our comprehensive training programs and innovative approach to learning, you can make a meaningful impact on individuals and organizations while achieving your entrepreneurial aspirations.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-auto py-4">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 p-4">
                        <div class="">
                            <div class="mb-4">
                                <h3 class="text-3xl font-semibold text-[#00a651]">Benefits of Franchising with Us</h3>
                                <hr class="my-2 border-[#00a651]"/>
                            </div>
                            <ol class="listdisc pl-6">
                                <li>Leverage the strength of our established brand and reputation in the industry to attract clients and build credibility.</li>
                                <li>Benefit from our comprehensive support system to streamline your business operations.</li>
                                <li>Enjoy exclusive rights to operate within a designated territory.</li>
                                <li>Stay ahead of the curve with access to our ongoing innovation in training methodologies and content delivery.</li>
                            </ol>
                            <p class="mt-4 text-gray-700">For further inquiries, please contact us on <br/>
                                <b>
                                    Phone: +254 715 077 817 or <br/>
                                    Email: outreach@indepthresearch.org.
                                </b>
                            </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <div class="rounded-lg overflow-hidden shadow-lg">
                            <img class="w-full h-auto rounded-lg" src="{{ asset('images/affiliate.webp') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
