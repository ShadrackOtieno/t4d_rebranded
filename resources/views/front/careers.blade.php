@extends('front.Projects.master')

@section('content')
<div class="main-body" id="tp">

<!-- page container -->
<div>
    <!-- page breadcrumbs -->
    <div class="breadcrumbs text-white bg-[#0096FF] p-1">
        <!-- home -->
        <span>
            <a href="{{ route('home') }}" class="fa fa-home"></a>
        </span>
        <!-- separator -->
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>
        <!-- current page -->
        <span class="bc-current-page"> Careers at IRES </span>
    </div>
    <!-- END page breadcrumbs -->

    {{-- @include('front/partials/alert') --}}
    <div class="bg-white py-6">
        <div class="lg:w-[1024px] mx-auto flex flex-wrap p-4 my-10">
            <!-- First Column -->
            <div class="w-full sm:w-1/2 px-2 pb-5 sm:pb-0 sm:pr-6 first-column">
                <div class="pb-4">
                    <div class="ip-tagline">
                        <h1 class="text-[#00a651] text-4xl font-bold">
                            Join IRES,<br>
                            <span class="">and be part of our family.</span>
                        </h1>
                        <hr class="my-4 border-gray-300"/>
                    </div>
                    <p class="text-gray-600 text-justify sm:text-left">
                        IRES is an organization committed to fostering an environment that values and prioritizes the members of our team. 
                        We believe in a culture of respect, collaboration, and continuous growth. Our commitment extends beyond professional development to encompass the well-being and fulfillment of every individual who contributes to our shared goals. 
                        Join us, and be a part of an organization that places its people at the heart of its success story.
                    </p>
                </div>
                <div class="pt-4 block">
                    <a class="ires-primary-btn" href="#vacancy">
                        View Vacancies
                    </a>
                </div>
            </div>
            <!-- Second Column -->
            <div class="w-full sm:w-1/2 p-2 second-column">
                <div class="w-full rounded-lg overflow-hidden">
                    <img class="img-side w-full h-auto object-cover" src="{{ asset('images/Join us.webp') }}" alt="Join us">
                </div>
            </div>
        </div>
    </div>
    
  

    <!-- about brief -->
    <div class="bg-[#0096FF] py-6">
        <div class="xl:w-[1280px] mx-auto my-10 px-6">
            <div class="text-center text-[#00a651] pb-5 px-2">
                <span class="block">
                    <h3 class=" text-3xl font-bold">Opportunities</h3>
                    <hr class="w-24 mx-auto my-4 border border-[#00a651]">
                    <p class="text-white text-medium">
                        Our goal at IRES is to establish a welcoming and inclusive workplace where anyone can grow on a personal and professional level.
                        Work with us as we support employees, promote well-being, value diversity, and make a difference in significant issues.
                        Check out our promising opportunities.
                    </p>
                </span>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 justify-items-center gap-8 mt-10">
                <div class="w-full sm:max-md:w-2/3 md:max-lg:w-1/2 bg-gray-800 text-center p-6 rounded-lg">
                    <span class="text-[#0096FF] text-4xl block mb-4">
                        <i class="fas fa-briefcase"></i>
                    </span>
                    <h5 class="text-xl font-semibold text-[#0096FF]">Careers</h5>
                    <p class="text-white mt-4">
                        Recognizing the distinct challenges and goals of every organization, we go beyond a one-size-fits-all approach. 
                        This commitment to providing customized solutions guarantees that every client receives tailored technical and managerial services, addressing their challenges directly and effectively.
                    </p>
                </div>
                <div class="w-full sm:max-md:w-2/3 md:max-lg:w-1/2 bg-gray-800 text-center p-6 rounded-lg">
                    <span class="text-[#0096FF] text-4xl block mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10 w-max mx-auto" viewBox="0 0 448 512"><path fill="currentColor" d="M48 32C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm140.695 64h178.24l-16.47 12.86v22.693c6.116.785 5.469 4.46 5.469 8.857v107.223c0 4.965-4.062 9.03-9.028 9.03h-3.324c-4.966 0-9.03-4.065-9.03-9.03V140.41c0-4.408-.64-8.086 5.522-8.861v-14.266l-47.424 38.893c.548 1.016 1.068 1.667 1.563 2.52c4.167 7.377 6.289 16.548 6.289 27.76c0 8.592-1.432 16.314-4.336 23.13c-2.89 6.817-6.407 12.384-10.508 16.674c-4.101 4.304-8.215 8.236-12.33 11.777c-4.113 3.548-7.629 7.247-10.508 11.088c-2.901 3.828-4.347 7.787-4.347 11.889c0 4.108 1.876 8.28 5.613 12.486c3.724 4.219 8.305 8.306 13.723 12.344c5.429 4.01 10.846 8.463 16.263 13.306c5.43 4.836 9.987 11.061 13.711 18.621c3.75 7.586 5.625 15.938 5.625 25.118c0 12.109-3.087 23.046-9.246 32.779c-6.172 9.693-14.219 17.429-24.101 23.1c-9.91 5.709-20.508 10.006-31.809 12.91c-11.328 2.877-22.565 4.322-33.79 4.322a139 139 0 0 1-21.421-1.666c-7.212-1.12-14.438-3.098-21.717-5.885c-7.291-2.806-13.75-6.25-19.35-10.39c-5.611-4.095-10.13-9.382-13.593-15.82c-3.464-6.44-5.184-13.68-5.184-21.72c0-9.538 2.657-18.385 7.983-26.634c5.325-8.19 12.382-15.026 21.158-20.442c15.313-9.525 39.336-15.41 72.031-17.636c-7.473-9.343-11.223-18.14-11.223-26.37c0-4.682 1.222-9.7 3.645-15.117a87 87 0 0 1-12.031.854c-17.563 0-32.396-5.71-44.44-17.207c-12.044-11.479-18.058-25.846-18.058-43.217c0-1.816.052-3.419.181-5.19H81.064zm31.38 38.334c-11.2 0-19.793 4.029-25.782 12.07q-8.983 12.03-8.984 29.147c0 9.72 1.64 19.616 4.921 29.707c3.269 10.085 8.622 19.09 16.122 27.025c7.473 7.956 16.171 11.926 26.054 11.926c11.016 0 19.623-3.69 25.795-11.072c6.145-7.37 9.23-16.674 9.23-27.88c0-9.544-1.626-19.536-4.894-29.986c-3.256-10.462-8.685-19.902-16.264-28.306c-7.552-8.432-16.303-12.631-26.199-12.631m18.517 172.08c-8.035 0-15.94.712-23.7 2.13c-7.76 1.38-15.416 3.71-22.968 6.999c-7.579 3.27-13.698 8.075-18.36 14.43c-4.687 6.346-7.02 13.821-7.02 22.422c0 8.195 2.06 15.506 6.175 21.873c4.102 6.327 9.518 11.284 16.25 14.832c6.732 3.554 13.789 6.236 21.158 8c7.383 1.751 14.897 2.664 22.553 2.664c15.142 0 28.175-3.411 39.113-10.229c10.91-6.816 16.38-17.342 16.38-31.549c0-2.988-.416-5.932-1.237-8.802q-1.288-4.357-2.538-7.454c-.833-2.025-2.421-4.467-4.765-7.279a368 368 0 0 0-5.315-6.289c-1.224-1.432-3.512-3.477-6.886-6.18c-3.345-2.713-5.48-4.405-6.432-5.03h-.002c-.938-.658-3.372-2.436-7.291-5.321q-5.877-4.365-6.445-4.637c-2.058-.37-4.946-.58-8.67-.58"/></svg>
                    </span>
                    <h5 class="text-xl font-semibold text-[#0096FF]">Internships</h5>
                    <p class="text-white mt-4">
                        At IRES, we're not only committed to fostering the professional development of established professionals but also to nurturing the next generation of talent through our internship program.
                        Candidates will gain hands-on experience, and develop vital skills for future career advancement.
                    </p>
                </div>
                <div class="w-full sm:max-md:w-2/3 md:max-lg:w-1/2 bg-gray-800 text-center p-6 rounded-lg">
                    <span class="text-[#0096FF] text-4xl block mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10 w-max mx-auto" viewBox="0 0 448 512"><path fill="currentColor" d="M48 32C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm71.564 107.355H303.41c11.722 26.248 16.474 54.123 20.918 82.07l-2.447.7c-.588-1.635-1.282-3.238-1.748-4.908c-3.367-12.035-6.76-24.063-9.983-36.137c-1.159-4.344-3.892-6.507-7.802-8.635c-5.743-3.123-11.17-7.148-15.93-11.64c-3.037-2.865-5.635-4.614-9.943-4.569c-28.685.304-57.372.334-86.055.598c-1.912.019-4.278.724-5.63 1.977c-5.22 4.828-10.111 10.01-16.544 16.488c16.967 41.316 25.497 86.349 21.834 134.222c-8.146-5.215-14.452-9.343-14.826-20.271c-1.874-54.62-18.724-104.014-53.924-146.52c-.792-.956-1.185-2.243-1.766-3.375m-17.03 21.028c4.084-.003 8.168.024 12.25.144c1.62.047 3.885 1.078 4.695 2.375c24.41 39.22 43.44 80.41 45.906 127.537c.011.187-.182.383-.88 1.752c-14.587-49.866-40.905-92.087-74.755-129.93c.177-.613.35-1.228.527-1.843c4.085 0 8.171-.033 12.256-.035m-7.12 33.312c.994-.019 2.168 1.295 3 2.221c19.257 21.42 36.734 44.052 47.506 71.12c2.05 5.147 3.453 10.554 5.154 15.841c-22.312-35.113-53.362-61.368-87.074-88.148c11.67-.425 21.542-.85 31.414-1.034m287.12 18.97a4.4 4.4 0 0 1 1.466.134c-73.305 42.572-143.24 89.187-194.533 159.846l-59.438-94.526l.72-.92c1.64 1.321 36.529 29.297 52.198 42.13c4.365 3.574 7.663 3.51 12.203-.177c53.28-43.28 112.733-76.04 175.86-102.457c3.37-1.41 6.866-2.528 10.312-3.754a4.8 4.8 0 0 1 1.211-.277"/></svg>
                    </span>
                    <h5 class="text-xl font-semibold text-[#0096FF]">Consultants</h5>
                    <p class="text-white mt-4">
                        We value the expertise in our network, inviting trainers, clients, and staff to share insights through consultation in professional fields like data analytics, strategy, training, digital innovation, enterprise systems, experiential tours, and many more.
                        Explore available vacancies.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- END about brief -->

    <!-- page content -->
    <div class="ip-content bg-white py-6" id="vacancy">
        <div class="lg:w-[1024px] mx-auto my-10 py-8">
            <div class="pb-5 px-2">
                <span class="ip-tagline">
                    <h3 class="text-center text-[#00a651] text-2xl font-bold">View Available Vacancies</h3>
                    <hr class="my-4 border border-[#00a651]"/>
                </span>
            </div>
    
            <!-- Careers Section -->
            <div class="mb-8 px-2">
                <div class="bg-teal-600 p-4 rounded-t-lg">
                    <h5 class="font-bold text-white">Careers</h5>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-left">
                        @php $careersAvailable = false; @endphp
                        <thead class="bg-gray-300">
                            <tr class="">
                                <th class="px-4 py-2 text-red-600">Position</th>
                                <th class="px-4 py-2 text-red-600 hidden md:block">Department</th>
                                <th class="px-4 py-2 text-red-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($careers as $career)
                                @if ($career->Category == 'Careers')
                                    @php $careersAvailable = true; @endphp
                                    <tr class="odd:bg-gray-100 even:bg-gray-200 hover:bg-[#0096FF]/50">
                                        <td class="px-4 ">{{ $career->Job_title }}</td>
                                        <td class="px-4  max-md:hidden">{{ $career->Department }}</td>
                                        <td class="px-1 lg:px-4 py-5">
                                            <a href="{{ route('career', $career) }}" class="ires-pri-btn px-4 py-2 text-nowrap">More Info...</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @if (!$careersAvailable)
                                <tr>
                                    <td colspan="4" class="px-4 py-2">
                                        There are no vacancies available at the moment.
                                        <p>For further inquiries, please contact us on <b>Phone: +254 715 077 817 or Email: hr@indepthresearch.org.</b></p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
    
            <!-- Internships Section -->
            <div class="mb-8 px-2">
                <div class="bg-teal-600 p-4 rounded-t-lg">
                    <h5 class="font-bold text-white">Internships</h5>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-left">
                        @php $internshipsAvailable = false; @endphp
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="px-4 py-2 text-red-600">Position</th>
                                <th class="px-4 py-2 text-red-600 hidden md:block">Department</th>
                                <th class="px-4 py-2 text-red-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($careers as $career)
                                @if ($career->Category == 'Internship')
                                    @php $internshipsAvailable = true; @endphp
                                    <tr class="odd:bg-gray-100 even:bg-gray-200 hover:bg-[#0096FF]/50">
                                        <td class="px-4 ">{{ $career->Job_title }}</td>
                                        <td class="px-4  hidden md:block">{{ $career->Department }}</td>
                                        <td class="px-4 py-5">
                                            <a href="{{ route('career', $career) }}" class="btn bg-blue-600 text-white text-nowrap rounded-full px-4 py-2">More Info...</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @if (!$internshipsAvailable)
                                <tr>
                                    <td colspan="4" class="px-4 py-2">
                                        There are no internships available at the moment.
                                        <p>For further inquiries, please contact us on <b>Phone: +254 715 077 817 or Email: hr@indepthresearch.org.</b></p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
    
            <!-- Consultants Section -->
            <div class="mb-8 px-2">
                <div class="bg-teal-600 p-4 rounded-t-lg">
                    <h5 class="font-bold text-white">Consultants</h5>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-left">
                        @php $consultantsAvailable = false; @endphp
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="px-4 py-2 text-red-600">Position</th>
                                <th class="px-4 py-2 text-red-600 hidden md:block">Department</th>
                                <th class="px-4 py-2 text-red-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($careers as $career)
                                @if ($career->Category == 'Consultant')
                                    @php $consultantsAvailable = true; @endphp
                                    <tr class="odd:bg-gray-100 even:bg-gray-200 hover:bg-[#0096FF]/50">
                                        <td class="px-4 ">{{ $career->Job_title }}</td>
                                        <td class="px-4  hidden md:block">{{ $career->Department }}</td>
                                        <td class="px-4 py-5">
                                            <a href="{{ route('career', $career) }}" class="btn bg-blue-600 text-white text-nowrap rounded-full px-4 py-2">More Info...</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @if (!$consultantsAvailable)
                                <tr>
                                    <td colspan="4" class="px-4 py-2">
                                        There are no consultant positions available at the moment.
                                        <p>For further inquiries, please contact us on <b>Phone: +254 715 077 817 or Email: <a href="mailto:trainingjobs@indepthresearch.co.ke"> trainingjobs@indepthresearch.co.ke </a></b></p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END page content -->
    
      <!-- about brief -->
      <div class="bg-[#00a651] text-white py-6">
        <div class="lg:w-[1024px] mx-auto my-10">
            <div class="pb-5 px-2">
                <span class="ip-tagline">
                    <h2 class="text-3xl font-bold text-center">What You Should Expect from Us</h2>
                    <hr class="my-4 border border-[#0096FF]"/>
                </span>
            </div>
            <div class="flex flex-wrap justify-center mx-5 lg:mx-px">
                <!-- Leadership Column -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="lead-brief-c text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-12 text-[#0096FF] w-max mx-auto" viewBox="0 0 48 48"><g fill="currentColor"><path d="M18 16.5a4.5 4.5 0 0 1-4.5 4.5A4.5 4.5 0 0 1 9 16.5c0-2.486 2.014-4.5 4.5-4.5s4.5 2.014 4.5 4.5M4 28.333C4 24.787 10.33 23 13.5 23s9.5 1.787 9.5 5.333V36H4zM39 16.5a4.5 4.5 0 0 1-4.5 4.5a4.5 4.5 0 0 1-4.5-4.5c0-2.486 2.014-4.5 4.5-4.5s4.5 2.014 4.5 4.5M27 15a3 3 0 1 1-6 0a3 3 0 1 1 6 0m-2 13.333C25 24.787 31.33 23 34.5 23s9.5 1.787 9.5 5.333V36H25z"/><path fill-rule="evenodd" d="M28.75 22.185q-.4.147-.788.313c-1.17.5-2.353 1.176-3.272 2.08c-.246.243-.48.508-.69.797a6.5 6.5 0 0 0-.69-.797c-.919-.904-2.101-1.58-3.273-2.08a17 17 0 0 0-.788-.313C20.772 21.396 22.73 21 24 21s3.228.396 4.75 1.185" clip-rule="evenodd"/></g></svg>
                        <h4 class="text-xl font-semibold mb-2">Leadership</h4>
                        <p class="text-justify lg:text-left">Our leadership is dedicated to empowering and guiding our teams. Expect visionary leadership that encourages innovation, values open communication, and provides opportunities for professional growth. 
                            We believe in leading by example, fostering a positive and inclusive atmosphere where everyone's contributions are acknowledged and celebrated.
                        </p>
                    </div>
                </div>
                <!-- Work Culture Column -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="lead-brief-c text-center">
                        <span class="fa fa-2x fa-puzzle-piece text-[#0096FF] mb-4 inline-block"></span>
                        <h4 class="text-xl font-semibold mb-2">Work Culture</h4>
                        <p class="text-justify lg:text-left">Our work culture promotes teamwork, diversity, and a sense of belonging. We thrive on a collaborative spirit, where every voice is heard and respected. 
                            Expect a supportive work environment that encourages creativity, embraces diversity, and values a healthy work-life balance. 
                            Together, we create a culture that inspires and motivates.
                        </p>
                    </div>
                </div>
                <!-- Work Environment Column -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
                    <div class="lead-brief-c text-center">
                        <span class="fa fa-2x fa-briefcase text-[#0096FF] mb-4 inline-block"></span>
                        <h4 class="text-xl font-semibold mb-2">Work Environment</h4>
                        <p class="text-justify lg:text-left">IRES work environment is conducive to productivity and well-being. We prioritize creating spaces that stimulate creativity and provide the necessary resources for success. 
                            From modern and ergonomic workspaces to fostering a culture of flexibility, our work environment is designed to enhance your overall experience and contribute to your professional and personal fulfillment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END about brief -->

    <!-- values brief -->
    <div class="bg-white py-6">
        <div class="lg:w-[1024px] mx-auto my-10">
            <div class="pb-5 px-2">
                <span class="">
                    <h3 class="text-4xl font-bold text-center text-[#00a651]">What some of our Team Members have to say About Us</h3>
                    <hr class="my-4 border border-[#00a651]"/>
                </span>
            </div>
            <div class="flex flex-wrap justify-center text-left px-2 lg:px-0 pt-5 mx-px">
                <!-- First Testimonial -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8 order-1">
                    <div class="lead-brief-c">
                        {{-- <img src="{{ asset('images/pension.webp') }}" alt="pension" class="img-central"> --}}
                        <p class="text-gray-700">"As a data scientist, I've had the privilege of working on projects that push the boundaries of what's possible. 
                            The culture at IRES encourages us to think outside the box, take risks, and turn our ideas into reality."
                        </p>
                        <h6 class="font-semibold mt-4 text-[#0096FF]">"Empowerment and Innovation" by Kelvin, Data Scientist.</h6>
                    </div>
                </div>
                <!-- Second Testimonial -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8 order-3 lg:order-2">
                    <div class="lead-brief-c">
                        {{-- <img src="{{ asset('images/Team Member.webp') }}" class="img-central"> --}}
                        <p class="text-gray-700">"From day one, I felt welcomed into a community that not only values my skills but also encourages personal growth. 
                            The vibrant atmosphere coupled with a strong sense of camaraderie among colleagues makes coming to work feel like coming home."
                        </p>
                        <h6 class="font-semibold mt-4 text-[#0096FF]">“A Home Away from Home" by Jacinta, Customer Success Executive.</h6>
                    </div>
                </div>
                <!-- Third Testimonial -->
                <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8 order-2 lg:order-3">
                    <div class="lead-brief-c">
                        {{-- <img src="{{ asset('images/pension.webp') }}" alt="pension" class="img-central"> --}}
                        <p class="text-gray-700">"IRES isn't just a workplace – it's a community driven by a shared passion for excellence. 
                            I've had the privilege of witnessing firsthand the dedication and talent that permeates every aspect of our organization."
                        </p>
                        <h6 class="font-semibold mt-4 text-[#0096FF]">"A Culture of Excellence" by James, Accountant.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END values brief -->
</div>
<!-- END page container -->

</div>
@endsection
