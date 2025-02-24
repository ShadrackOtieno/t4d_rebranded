@extends('front.Projects.master')
@section('content')


    <main class="">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-blue-900 to-indigo-800 text-white overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-90"></div>
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/ticket.webp') }}');"></div>

            <div class="container mx-auto px-4 py-24 md:py-32 relative z-10">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <!-- Left Side: Company Info -->
                    <div class="w-full md:w-1/2 mb-12 md:mb-0">
                        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight text-white">
                            Mapping Minds,<br>Shaping the World.<br>
                        </h1>
                        <p class="text-xl my-8 text-white">25 Years of GIS Excellence.</p>
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSe3e3zpzSBC4uGqIIPiWdx2HIBSoFbvSVTQWh5sUWOhl5VBPw/viewform?usp=sf_link" class="bg-[rgb(50,141,139)] text-white font-semibold px-8 py-3 rounded-full hover:bg-blue-100 transition duration-300 text-center">Register For this Event</a>
                        </div>
                    </div>
                    <!-- Right Side: Features -->
                    <div class="w-full md:w-1/2 md:pl-12">
                        <div class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-xl p-8 shadow-2xl">
                            <span class="inline-flex mb-6 items-center rounded-md bg-[#00a651] px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-red-600/10">Free Event</span>
                            <span class="inline-flex mb-6 items-center rounded-md bg-[#00a651] px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-red-600/10">November 20, 2024</span>
                            <span class="inline-flex mb-6 items-center rounded-md bg-[#00a651] px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-red-600/10">10:00 AM – 12:30 PM</span>
                            <h2 class="text-2xl font-semibold mb-6">Why Participate?</h2>
                            <ul class="space-y-4 mb-6">
                                <li class="flex items-center ">
                                    <svg class="w-6 h-6 mr-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    <span>Practical Insights</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    <span>Career Development</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                                    <span>Access to Expert Speakers</span>
                                </li>
                            </ul>
                            <br>
                            <span class="inline-flex items-center rounded-md bg-[#00a651] px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-red-600/10"> Virtual (Zoom/Webinar Platform)</span>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Decorative Element -->
            <div class="absolute bottom-0 left-0 right-0">
                <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
                </svg>
            </div>

        </section>

{{-- section 2 --}}

        <section class="bg-[#1EA19D] py-10">
            <div class="max-w-5xl mx-auto px-6 lg:px-8 flex flex-col items-center justify-center text-center">
                <h2 class="text-white text-5xl my-8">Celebrate 25 years of GIS Day</h2>
                <p class="text-white text-sm lg:text-lg leading-relaxed mb-12">
                    Join us as we celebrate 25 years of GIS Day! This milestone marks not only a quarter-century of innovation and progress in Geographic Information Systems but also highlights the transformative power of GIS in shaping our understanding of the world. Together, we reflect on the achievements of the past while looking forward to a future empowered by data-driven decision-making and collaboration. Let’s honor the contributions of the GIS community and inspire the next generation of geospatial professionals committed to making a positive impact in their fields.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-4 p-2">
                    <div class="bg-[#00a651] rounded-full px-6 py-2 min-w-[120px]">
                        <div id="days" class="font-bold text-xl text-white"></div>
                        <div class="text-xs uppercase text-[#F0F8FF]">days</div>
                    </div>
                    <div class="bg-[#00a651] rounded-full px-6 py-2 min-w-[120px]">
                        <div id="hours" class="font-bold text-xl text-white"></div>
                        <div class="text-xs uppercase text-[#F0F8FF]">hours</div>
                    </div>
                    <div class="bg-[#00a651] rounded-full px-6 py-2 min-w-[120px]">
                        <div id="minutes" class="font-bold text-xl text-white"></div>
                        <div class="text-xs uppercase text-[#F0F8FF]">minutes</div>
                    </div>
                    <div class="bg-[#00a651] rounded-full px-6 py-2 min-w-[120px]">
                        <div id="seconds" class="font-bold text-xl text-white"></div>
                        <div class="text-xs uppercase text-[#F0F8FF]">seconds</div>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row pt-5 space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSe3e3zpzSBC4uGqIIPiWdx2HIBSoFbvSVTQWh5sUWOhl5VBPw/viewform?usp=sf_link" class="bg-[#fff] text-[#1EA19D] font-semibold px-8 py-3 rounded-full hover:bg-blue-100 transition duration-300 text-center">Register For this Event</a>
                </div>
            </div>
        </section>
{{-- section 3 --}}
            <section class="bg-white py-20">
                    <div class="max-w-5xl mx-auto px-6 lg:px-12 flex flex-col items-center">
                        <!-- Tab Buttons -->
                        <div class=" p-2 ">
                        <div class="flex justify-center space-x-4">
                            <button class="bg-[#1EA19D] px-4 py-2 text-white text-base border-b-4 border-[#00a651] hover:bg-[#00a651] focus:outline-none tab-button" onclick="showTab('tab1')">10:00 am -10:05 am</button>
                            <button class="bg-[#1EA19D] px-4 py-2 text-white font-thin border-b-4 border-[#00a651] hover:bg-[#00a651] focus:outline-none tab-button" onclick="showTab('tab2')">10:05 am -10:45 am</button>
                            <button class="bg-[#1EA19D] px-4 py-2 text-white font-thin border-b-4 border-[#00a651] hover:bg-[#00a651] focus:outline-none tab-button" onclick="showTab('tab3')">10:45 am -10:50 am</button>
                            <button class="bg-[#1EA19D] px-4 py-2 text-white font-thin border-b-4 border-[#00a651] hover:bg-[#00a651] focus:outline-none tab-button" onclick="showTab('tab4')">10:50 am -11:30 am</button>
                            <button class="bg-[#1EA19D] px-4 py-2 text-white font-thin border-b-4 border-[#00a651] hover:bg-[#00a651] focus:outline-none tab-button" onclick="showTab('tab5')">11:30 am -12:00 am</button>
                            <button class="bg-[#1EA19D] px-4 py-2 text-white font-thin border-b-4 border-[#00a651] hover:bg-[#00a651] focus:outline-none tab-button" onclick="showTab('tab6')">12:00 am -12:10 am</button>
                            <button class="bg-[#1EA19D] px-4 py-2 text-white font-thin border-b-4 border-[#00a651] hover:bg-[#00a651] focus:outline-none tab-button" onclick="showTab('tab7')">12:10 am -12:30 am</button>
                            <button class="bg-[#1EA19D] px-4 py-2 text-white font-thin border-b-4 border-[#00a651] hover:bg-[#00a651] focus:outline-none tab-button" onclick="showTab('tab8')">12:30 am</button>

                        </div>
                        </div>

                        <!-- Tab Content -->
                        <div id="tab1" class="p-4 tab-content bg-white shadow-md rounded-lg">
                        <h2 class="text-2xl font-semibold mb-2 text-[#00a651]">Opening Remarks</h2>
                        <p>
                           Host Extend a warm welcome to all participants and introduce the theme of the event, highlighting the significance of GIS data.
                        </p>
                        </div>
                        <div id="tab2" class="p-4 px-12 tab-content bg-white shadow-md rounded-lg hidden">
                        <h2 class="text-2xl font-semibold mb-2 text-[#00a651]">Keynote Presentation 1</h2>
                        <h4>GIS for Sustainable Development</h4>
                        <p>Critical role that Geographic Information Systems (GIS) play in promoting sustainable development. By harnessing the power of spatial data and advanced mapping technologies, GIS can help address global challenges such as environmental conservation, urban planning, resource management, and climate change. Throughout this event, we will explore how GIS can be leveraged to create more informed and data-driven solutions for a sustainable future, ultimately contributing to the well-being of both communities and ecosystems.</p>
                        </div>
                        <div id="tab3" class="p-4 tab-content bg-white shadow-md rounded-lg hidden">
                        <h2 class="text-2xl font-semibold mb-2 text-[#00a651]">Introduction to IRES</h2>
                        <p>A comprehensive overview of the Tech For Development(IRES), including its mission, vision, and core values. Highlight the organization's commitment to advancing knowledge through research and training in various fields. Additionally, offer detailed information about the upcoming training programs, focusing on their objectives, topics covered, and the benefits they provide to participants. Explain how these programs are designed to equip professionals and researchers with the latest skills and knowledge, ensuring they stay ahead in their respective industries and contribute meaningfully to their sectors.</p>
                        </div>

                        <div id="tab4" class="p-4 tab-content bg-white shadow-md rounded-lg hidden">
                            <h2 class="text-2xl font-semibold mb-2 text-[#00a651]">Keynote Presentation 2</h2>
                            <p>Explore The Future of GIS: Emerging Technologies and Their Global Impact Across Various Sectors, a theme that delves into the transformative role of Geographic Information Systems in shaping the future of industries worldwide. This discussion will highlight the latest advancements in GIS technologies, including artificial intelligence, machine learning, and real-time data analytics, and how they are driving innovation across multiple sectors. From urban planning and environmental management to agriculture, healthcare, and disaster response, we will examine how GIS is revolutionizing decision-making processes, improving efficiency, and addressing some of the world’s most pressing challenges.</p>
                            </div>
                        <div id="tab5" class="p-4 tab-content bg-white shadow-md rounded-lg hidden">
                            <h2 class="text-2xl font-semibold mb-2 text-[#00a651]">Interactive Q&A Session</h2>
                            <p>Encourage all participants to actively engage with both keynote speakers by posing questions and participating in meaningful discussions. This is a valuable opportunity to delve deeper into the topics presented and gain insights from their expertise.</p>
                        </div>
                    <div id="tab6" class="p-4 tab-content bg-white shadow-md rounded-lg hidden">
                        <h2 class="text-2xl font-semibold mb-2 text-[#00a651]">Feedback Session</h2>
                        <p>Gather insights and opinions from participants by utilizing the chat feature or conducting a brief poll during the event. This will allow everyone to share their thoughts and experiences effectively, ensuring that all voices are heard and valuable feedback is collected in real time.</p>
                    </div>
                    <div id="tab7" class="p-4 tab-content bg-white shadow-md rounded-lg hidden">
                        <h2 class="text-2xl font-semibold mb-2 text-[#00a651]">Networking Session</h2>
                        <p>This event provides a valuable opportunity for participants to connect with one another, fostering relationships and networking in a collaborative environment. Attendees will have the chance to engage in meaningful conversations, share insights, and exchange ideas, ultimately building a supportive network that can enhance both their personal and professional growth.</p>
                    </div>
                    <div id="tab8" class="p-4 tab-content bg-white shadow-md rounded-lg hidden">
                        <h2 class="text-2xl font-semibold mb-2 text-[#00a651]">Closing Remarks</h2>
                        <p>Express heartfelt gratitude to all attendees for their participation and engagement, and take a moment to share details about our upcoming events. We appreciate your support and interest, and we are excited to inform you about the various initiatives and activities we have planned for the near future. These events will provide excellent opportunities for learning, networking, and collaboration, and we hope you will join us as we continue to explore these exciting topics together.</p>
                    </div>
                    </div>
            </section>


            {{-- section 4 --}}

    <!-- About the Event Section -->
    </main>


@endsection

<script>
    // Set the date we're counting down to
        var countDownDate = new Date("Nov 20, 2024 00:00:00").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("days").textContent = days + "d";
            document.getElementById("hours").textContent = hours + "h";
            document.getElementById("minutes").textContent = minutes + "m";
            document.getElementById("seconds").textContent = seconds + "s";


            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);

        // tabs

        function showTab(tabId) {
    // Hide all tab content
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach((content) => {
      content.classList.add('hidden');
    });

    // Show the selected tab content
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
      selectedTab.classList.remove('hidden');
    }

    // Remove the 'active' class from all tab buttons
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach((button) => {
      button.classList.remove('active');
    });

    // Add the 'active' class to the clicked tab button
    const clickedButton = document.querySelector(`[onclick="showTab('${tabId}')"]`);
    if (clickedButton) {
      clickedButton.classList.add('active');
    }
  }

  // Initialize the first tab
  showTab('tab1');
</script>
