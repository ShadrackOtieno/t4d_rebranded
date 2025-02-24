<div class="bg-[#0096FF] relative z-0 pt-2 w-full" ></div>
<footer class="w-full bg-cover bg-center md:bg-fixed bg-no-repeat " style="background-image:url('{{ asset('images/banner-faqs.webp') }}')">
    <style>
        /* Rotation for the dropdown button */
        .drop-btn {
        transition: transform 0.3s ease;
        }

        /* Rotation effect when the dropdown is active */
        .togg.rotate {
        transform: rotate(180deg);
        }


</style>
    <!-- Site Links  -->
    <div class="bg-[#00a651] bg-opacity-100 pt-8">
        <div class="w-full lg:w-5/6 container mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-12 mb-4 md:mb-8">

                <!-- Column 1 -->

                <div class="border-b md:border-b-0">
                    <div class="drop-btn cursor-pointer flex justify-between" onclick="toggleMenu('why-ires',this)">
                        <h3 class="drop-label font-semibold text-xl mb-4 text-white">About T4D</h3>
                        <button class="togg mb-4 md:hidden ml-2 focus:outline-none transform transition-transform duration-500 ease-in-out text-white">
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <ul id="why-ires" class="list-none dropdown-menu hidden md:block text-white text-[12px] *:my-4">
                        <li><a href="{{ route('about') }}" class="hover:text-[#0096FF]">Who We Are</a></li>
                        <li><a href="{{ route('previousprojects') }}" class="hover:text-[#0096FF]">Previous Projects</a></li>
                        {{-- <li><a href="{{ route('our-venues') }}" class="hover:text-[#0096FF]">Our Venues</a></li> --}}
                        <li><a href="{{ route('clients') }}" class="hover:text-[#0096FF]">Our Alumni</a></li>
                        <li><a href="https://blog.indepthresearch.org/" class="hover:text-[#0096FF]">Our Blog</a></li>
                        <li><a href="{{ route('faqs') }}" class="hover:text-[#0096FF]">Frequently Asked Questions</a></li>
                    </ul>
                </div>


                <!-- Column 2 -->

                <div class="border-b md:border-b-0">
                    <div class="drop-btn cursor-pointer flex justify-between" onclick="toggleMenu('opportunities',this)">
                    <h3 class="drop-label font-semibold text-xl mb-4 text-white">Important Links</h3>
                        <button class="togg mb-4 md:hidden ml-2 focus:outline-none transform transition-transform duration-500 ease-in-out text-white" >
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <ul id="opportunities" class="list-none dropdown-menu hidden md:block text-white text-[12px] *:my-4">
                            <li><a href="{{ url('programs')}}" class="hover:text-[#0096FF]"></a>Courses</li>
                            <li><a href="{{ route('sector') }}" class="hover:text-[#0096FF]"></a>Learning Pathways</li>
                            <li><a href="{{url ('certification')}}#" class="hover:text-[#0096FF]"></a>Free Consultation</li>
                            <li><a href="{{ route('careers') }}" class="hover:text-[#0096FF]"></a>Affiliated Websites</li>
                            <li><a href="{{ route('careers') }}" class="hover:text-[#0096FF]"></a>Media</li>
                            {{-- <li><a href="{{ route('trainers') }} " class="hover:text-[#0096FF]">Become a Trainer</a></li> --}}
                            {{-- <li><a href="{{ route('training_calendar.index', ['year' => date('Y')]) }}" class="hover:text-[#0096FF]">Training Calendar</a></li> --}}
                    </ul>
                </div>

                <!-- Column 3 -->
    <div class="border-b md:border-b-0">
                    <div class="drop-btn cursor-pointer flex justify-between" onclick="toggleMenu('our-services',this)">
                    <h3 class="drop-label font-semibold text-xl mb-4 text-white">Our Services</h3>
                        <button class="togg mb-4 md:hidden ml-2 focus:outline-none justify-end transform transition-transform duration-500 ease-in-out text-white" >
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>

                    <ul id="our-services" class="dropdown-menu hidden md:block text-white text-[12px] *:my-4 list-none">
                        <li><a href="#" class="hover:text-[#0096FF]">Data Services</a></li>
                        <li><a href="#" class="hover:text-[#0096FF]">E-Learning</a></li>
                        <li><a href="#" class="hover:text-[#0096FF]">E-Commerece</a></li>
                        <li><a href="#" class="hover:text-[#0096FF]">Tech Engineering</a></li>
                        <li><a href="{{ route('sector') }}" class="hover:text-[#0096FF]">Trainings and Consultations </a></li>
                       
                    </ul>
                </div>

                <!-- Column 4 -->

                <div class="border-b md:border-b-0">
                    <div class="drop-btn cursor-pointer flex justify-between" onclick="toggleMenu('contact-us',this)">
                    <h3 class="drop-label font-semibold text-xl mb-4 text-white">Contact Us</h3>
                        <button class="togg mb-4 md:hidden ml-2 focus:outline-none transform transition-transform duration-500 ease-in-out text-white" >
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <ul id="contact-us" class="dropdown-menu hidden md:block text-white text-[12px] *:my-4 list-none">
                        <a class="hover:text-[#0096FF] hover:underline" href="tel:+254715077817">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3.5 mr-2 inline">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>  (+254) 715 077 817
                                </a>

                        <li><a class="hover:text-[#0096FF] hover:underline" href="mailto:outreach@indepthresearch.org">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3.5 mr-2 inline text-[#a11e22]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>outreach@t4d.co.ke
                            </a>
                        </li>
                        <li class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-3.5 mr-2 inline">
                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                            </svg>
                            Head Office: Tala Road,<br> Off Kiambu Road, Runda - Nairobi.
                        </li>
                    </ul>
                </div>


                 <!-- Column 5 -->

                {{-- <div class="border-b md:border-b-0">
                    <div class="drop-btn cursor-pointer flex justify-between" onclick="toggleMenu('our-services',this)">
                    <h3 class="drop-label font-semibold text-xl mb-4 text-white">Our Services</h3>
                        <button class="togg mb-4 md:hidden ml-2 focus:outline-none justify-end transform transition-transform duration-500 ease-in-out text-white" >
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>

                    <ul id="our-services" class="dropdown-menu hidden md:block text-white text-[12px] *:my-4 list-none">
                        <li><a href="#" class="hover:text-[#0096FF]">Short Courses</a></li>
                        <li><a href="#" class="hover:text-[#0096FF]">Short Courses by Sector</a></li>
                        <li><a href="#" class="hover:text-[#0096FF]">Intake Programs</a></li>
                        <li><a href="#" class="hover:text-[#0096FF]">Services by Capability</a></li>
                        <li><a href="{{ route('sector') }}" class="hover:text-[#0096FF]">Industry Solutions</a></li>
                        <li><a href="#" class="hover:text-[#0096FF]">Certifications</a></li>
                    </ul>
                </div> --}}


                <!--Column 6-->
{{--
                @foreach (App\Category::course()->with('subcategories')->whereNotIn('id', [10])->latest()->get() as $category)
                <div class="border-b md:border-b-0">

                     <div class="drop-btn cursor-pointer md:cursor-default flex justify-between" onclick="toggleMenu('{{ $category->name }}',this)">
                    <a href='{{ route('course.category.subcategory.index', $category) }}' class="drop-label font-semibold text-xl mb-4 text-white">{{ $category->name }}</a>
                        <button class="togg mb-4 md:hidden ml-2 focus:outline-none transform transition-transform duration-500 ease-in-out text-white" >
                            <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                    <ul id="{{ $category->name }}" class="dropdown-menu hidden md:block text-white text-[12px] *:my-4 list-none">

                            @foreach ($category->subcategories->take(6) as $subcategory)
                                <li><a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}" class="hover:text-[#0096FF]">{{ $subcategory->name }}</a></li>
                            @endforeach


                    </ul>

                </div>
                @endforeach --}}
            </div>
        </div>

                <!-- policies -->
                <div class="pt-4 pb-20 bg-[#0096FF] bg-opacity-85 ">
                    <div class=" w-full lg:w-5/6 container mx-auto px-4">
                        <div class="w-full md:flex flex-row justify-between items-center">
                            <!-- Logo -->
                            <div class="mb-4 md:mb-0">
                                <a href="/">
                                     <img src="{{ asset('front/assets/img/logo/t4d_full.png') }}" alt="IRES Logo" class="h-24 object-cover">
                                </a>
                        <p class="text-white mt-4 text-[14px]">Transforming people and organizations in Africa since 2010.</p>
                    </div>

                    <div class="w-max text-white relative">
                        <!-- Social Media Icons -->
                        <div class="flex text-white gap-4 mt-10 mb-4 md:mb-12 pb-0 *:size-6 w-max container mx-auto md:mx-0">

                            <a class="fb transform transition-transform duration-300 hover:scale-[0.7] " href="https://www.facebook.com/indepthresearch" target="_blank" title="Follow us on Facebook"><svg class="" xmlns="http://www.w3.org/2000/svg" fill="white" enable-background="new 0 0 72 72" viewBox="0 0 72 72" id="facebook"><switch><g><path d="M68,12v48c0,4.4-3.6,8-8,8H46V46h6.4c1,0,1.8-0.7,2-1.6l1.2-6c0.2-1.2-0.7-2.4-2-2.4H46v-8c0-2.2,1.8-4,4-4
                                h4c1.1,0,2-0.9,2-2v-6c0-1.1-0.9-2-2-2h-6c-6.6,0-12,5.4-12,12v10h-6c-1.1,0-2,0.9-2,2v6c0,1.1,0.9,2,2,2h6v22H12
                                c-4.4,0-8-3.6-8-8V12c0-4.4,3.6-8,8-8h48C64.4,4,68,7.6,68,12z"></path></g></switch></svg></a>

                            <a class="tw transform transition-transform duration-300 hover:scale-[0.7]" href="https://twitter.com/Indepthresearch" target="_blank" title="Follow us on Twitter"><svg class="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" id="twitter"><g clip-path="url(#clip0_84_15698)"><rect width="512" height="512" fill="none" rx="60"></rect><path fill="white" d="M355.904 100H408.832L293.2 232.16L429.232 412H322.72L239.296 302.928L143.84 412H90.8805L214.56 270.64L84.0645 100H193.28L268.688 199.696L355.904 100ZM337.328 380.32H366.656L177.344 130.016H145.872L337.328 380.32Z"></path></g><defs><clipPath id="clip0_84_15698"><rect width="512" height="512" fill="none"></rect></clipPath></defs></svg></a>

                           <a class="in transform transition-transform duration-300 hover:scale-[0.7]" href="https://www.linkedin.com/company/indepth-research-services" target="_blank" title="Follow us on LinkedIn"><svg class="" xmlns="http://www.w3.org/2000/svg" fill="white" enable-background="new 0 0 72 72" viewBox="0 0 72 72" id="linkedin"><switch><g><path d="M68,38.6l0,28c0,0.8-0.6,1.3-1.3,1.3H56.3c-0.7,0-1.3-0.6-1.3-1.3V44c-0.3-10.6-16.7-10.6-17,0v22.7
                                c0,0.7-0.6,1.3-1.3,1.3H26.3c-0.7,0-1.3-0.6-1.3-1.3V26.3c0-0.7,0.6-1.3,1.3-1.3h11.3c0.7,0,1.3,0.6,1.3,1.3v3.2
                                c3-4.7,8.5-7.7,14.5-7.2C61.8,23.1,68,30.3,68,38.6z M15.7,68H5.3C4.6,68,4,67.4,4,66.7V26.3C4,25.6,4.6,25,5.3,25h10.3
                                c0.7,0,1.3,0.6,1.3,1.3v40.3C17,67.4,16.4,68,15.7,68z M17,10.5c0,3.6-2.9,6.5-6.5,6.5S4,14.1,4,10.5S6.9,4,10.5,4S17,6.9,17,10.5
                                z"></path></g></switch></svg></a>

                            <a class="tk transform transition-transform duration-300 hover:scale-[0.7]" href="https://www.tiktok.com/@indepth_research" target="_blank" title="Follow us on TikTok"><svg class="" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"><path d="M6.977 15.532a2.791 2.791 0 0 0 2.791 2.792 2.859 2.859 0 0 0 2.9-2.757L12.7 3h2.578A4.8 4.8 0 0 0 19.7 7.288v2.995a4.676 4.676 0 0 1-.443.022 4.8 4.8 0 0 1-4.02-2.172v7.4a5.469 5.469 0 1 1-5.469-5.469c.114 0 .226.01.338.017v2.7a2.909 2.909 0 0 0-.338-.034 2.791 2.791 0 0 0-2.791 2.785Z"/></svg></a>

                            <a class="fl transform transition-transform duration-300 hover:scale-[0.7]" href="https://www.instagram.com/indepthresearchinstitute/" target="_blank" title="Follow us on Instagram"><svg class="" xmlns="http://www.w3.org/2000/svg" fill="white" enable-background="new 0 0 72 72" viewBox="0 0 72 72" id="instagram"><switch><g><path d="M20,10c-5.5,0-10,4.5-10,10v32c0,5.5,4.5,10,10,10h32c5.5,0,10-4.5,10-10V20c0-5.5-4.5-10-10-10H20z M36,52
                            c-2.2,0-4.3-0.4-6.2-1.3c-1.9-0.8-3.6-2-5.1-3.4c-1.5-1.5-2.6-3.2-3.4-5.1c-0.8-2-1.3-4.1-1.3-6.2c0-2.2,0.4-4.3,1.3-6.2
                            c0.8-1.9,2-3.6,3.4-5.1c1.5-1.5,3.2-2.6,5.1-3.4c2-0.8,4.1-1.3,6.2-1.3c2.2,0,4.3,0.4,6.2,1.3c1.9,0.8,3.6,2,5.1,3.4
                            c1.5,1.5,2.6,3.2,3.4,5.1c0.8,2,1.3,4.1,1.3,6.2c0,2.2-0.4,4.3-1.3,6.2c-0.8,1.9-2,3.6-3.4,5.1c-1.5,1.5-3.2,2.6-5.1,3.4
                            C40.3,51.6,38.2,52,36,52z M36,26c-5.5,0-10,4.5-10,10c0,5.5,4.5,10,10,10c5.5,0,10-4.5,10-10C46,30.5,41.5,26,36,26z M54,21
                            c-1.7,0-3-1.3-3-3s1.3-3,3-3h0c1.7,0,3,1.3,3,3S55.7,21,54,21z M52,68H20c-8.8,0-16-7.2-16-16V20c0-8.8,7.2-16,16-16h32
                            c8.8,0,16,7.2,16,16v32C68,60.8,60.8,68,52,68z"></path></g></switch></svg></a>

                            <a class="yt transform transition-transform duration-300 hover:scale-[0.7]" href="https://www.youtube.com/@indepthresearchinstitute" target="_blank" title="Subscribe to our YouTube Channel"><svg class="" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" id="youtube"><path d="M23,9.71a8.5,8.5,0,0,0-.91-4.13,2.92,2.92,0,0,0-1.72-1A78.36,78.36,0,0,0,12,4.27a78.45,78.45,0,0,0-8.34.3,2.87,2.87,0,0,0-1.46.74c-.9.83-1,2.25-1.1,3.45a48.29,48.29,0,0,0,0,6.48,9.55,9.55,0,0,0,.3,2,3.14,3.14,0,0,0,.71,1.36,2.86,2.86,0,0,0,1.49.78,45.18,45.18,0,0,0,6.5.33c3.5.05,6.57,0,10.2-.28a2.88,2.88,0,0,0,1.53-.78,2.49,2.49,0,0,0,.61-1,10.58,10.58,0,0,0,.52-3.4C23,13.69,23,10.31,23,9.71ZM9.74,14.85V8.66l5.92,3.11C14,12.69,11.81,13.73,9.74,14.85Z"></path></svg></a>

                        </div>

                        <!-- Copyright -->
                        <div class="text-center text-sm mb-2 md:text-left">
                             &copy; 2003 - <span id="currentYear"></span>. Tech For Development (T4D)<br> All Rights Reserved.
                        </div>
                        &ensp;
                        <div class=" flex text-sm">
                            <div class="flex md:flex justify-center md:justify-start space-x-0 md:space-x-4">
                                <a href="{{ route('privacy-policy') }}" class="hover:text-[#a11e22]">Privacy Policy</a>
                                <span class="mx-2"></span>
                                <a href="{{ route('terms-and-conditions') }}" class="hover:text-[#a11e22]">Terms and Conditions</a>
                                <span class="mx-2"></span>
                                <a href="{{ route('sitemap') }}" class="hover:text-[#a11e22]">Sitemap</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<script>
    function toggleMenu(menuId, btn) {
        const menu = document.getElementById(menuId);
        const isVisible = !menu.classList.contains('hidden');

        // Close all dropdowns
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        document.querySelectorAll('.togg').forEach(btn => btn.classList.remove('rotate'));

        // Toggle the clicked dropdown
        if (!isVisible) {
            menu.classList.remove('hidden');
            btn.querySelector('.togg').classList.add('rotate');
        }
    }
</script>
