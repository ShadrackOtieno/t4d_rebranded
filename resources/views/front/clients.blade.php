@extends('front.Projects.master')
@section('content')

<div class="main-body">
    <!-- Breadcrumbs -->
    <div class="lex items-center space-x-2 text-sm text-white bg-[#0096FF] mx-auto px-4 mb-8">
        <div class="breadcrumbs flex items-center space-x-2 text-gray-600 text-sm">
            <a href="{{ route('home') }}" class="fas fa-home text-white"></a>
            <span class="text-white">/</span>
            <span class="font-semibold text-white">Our Alumni</span>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="container mx-auto px-4 mb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="order-1 md:order-2 z-10">
                <img class="rounded-xl shadow-lg object-cover w-full h-full" src="{{ asset('images/server room.webp') }}" alt="server room">
            </div>
            <div class="order-2 md:order-1 z-0 xl:py-20">
                <h1 class="text-3xl md:text-4xl font-bold text-[#00a651] mb-4 ">Network with Other IRES Alumni</h1>
                <p class="text-gray-700 mb-4">
                    As our alumni, you can leverage the power of the IRES network throughout your career. Continue your education with free webinars, videos, and podcasts, join the conversation on social media, and network with fellow professionals at the IRES Summit!
                </p>
                <p class="text-gray-700 mb-6">
                    Be sure to join our LinkedIn group of over 15,000 professionals for exclusive content and conversations. Plus, you can post job opportunities to find IRES-trained alumni, ask difficult questions, or connect with other driven top performers.
                </p>
                <a href="https://www.linkedin.com/groups/9369211/" target="_blank"
                   class="inline-block bg-[#0096FF] hover:bg-[#00a651] text-white font-semibold py-3 px-6 rounded-full transition-all duration-300">
                    JOIN THE IRES LINKEDIN NETWORK
                </a>
            </div>
        </div>
    </div>

    <!-- Who We Serve Section -->
    <div class="container mx-auto px-4 mb-12">
        <h2 class="text-3xl font-bold text-[#00a651] mb-8">Who We Serve</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Public Sector -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold mb-4 text-[#00a651]">Public Sector</h3>
                <p class="text-gray-600">
                    The public sector is important for the essential services that they offer to the general public. It is the anchor of all service delivery efforts of a state. Through our learning and development programs, professional and consultancy services, and industry solutions, we have effectively equipped public sector professionals and institutions with the requisite human capital knowledge to tackle challenges and drive meaningful change. We have ushered in a new era of excellence; transforming public institutions into beacons of progress and innovation.
                </p>
            </div>
            <!-- Private Sector -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold mb-4 text-[#00a651]">Private Sector</h3>
                <p class="text-gray-600">
                    The private sector is the backbone of economies worldwide. The private sector has consistently been the driver of economic growth and development, employment and sustainable practices. Tech For Developmentrecognizes this fact and this has forged a duty-bound obligation of enabling these entities to reach new heights of success. We recognize that the private sector needs an empowered workforce that is primed to drive sustainable change and efficiency. Through our services, we have empowered private companies and SMEs to address their unique challenges, capitalize on opportunities and unlock their true potential.
                </p>
            </div>
            <!-- NGOs -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-semibold mb-4 text-[#00a651]">NGOs</h3>
                <p class="text-gray-600">
                    NGOs play a vital role in addressing social and environmental challenges. NGOs have been at the forefront of assisting populations in distress, promoting good governance and accountability and improving the socio-economic conditions of disadvantaged groups. We recognize the efforts NGOs make towards making the world a better place. As espoused by our mantra Transforming People and Organizations, we effectively share the same vision. Our comprehensive training programs have helped empower NGOs to enhance their advocacy and communication efforts, build sustainable partnerships and drive meaningful change..
                </p>
            </div>
        </div>
    </div>

    <!-- Alumni Section -->
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-[#00a651] mb-8">Some of Our Alumni</h2>
    
        <!-- Alumni Section: Central Bank of Kenya -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('images/cbk.webp') }}" alt="Central Bank of Kenya" class=" rounded-md mb-4">
                <hr class="border-t-2 border-gray-200 my-4">
                <p class="text-gray-600">
                    The Central Bank of Kenya is a public institution established under Article 231 of the Constitution of Kenya, 2010.
                    The Bank is responsible for formulating monetary policy to achieve and maintain price stability and issuing currency.
                    It also provides oversight of payment, clearing, and settlement systems.
                </p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-[#00a651]">Central Bank of Kenya (CBK)</h3>
                <hr class="border-t-2 border-gray-300 my-4">
                <h4 class="text-xl font-semibold text-[#00a651]">Training Program</h4>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>Health Systems Management Program</li>
                    <li>Cyber Security Risk Assessment and Management</li>
                    <li>Leadership Coaching for Management</li>
                    <li>Public Procurement and Asset Disposal</li>
                    <li>Accounts Payable Program</li>
                    <li>Data Analysis and Visualization Using Excel</li>
                </ul>
            </div>
        </div>
    
        <!-- Alumni Section: KeNHA -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            <div>
                <h3 class="text-2xl font-semibold text-[#00a651]">Kenya National Highways Authority (KeNHA)</h3>
                <hr class="border-t-2 border-gray-300 my-4">
                <h4 class="text-xl font-semibold text-[#00a651]">Training Program</h4>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>Project Management, Monitoring and Evaluation</li>
                    <li>Negotiating, Drafting and Understanding Contracts</li>
                </ul>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('images/kenha.webp') }}" alt="Kenya National Highways Authority" class="rounded-md mb-4">
                <hr class="border-t-2 border-gray-200 my-4">
                <p class="text-gray-600">
                    The Kenya National Highways Authority (KeNHA) is a statutory body established under the Kenya Roads Act of 2007. It’s responsible for the development, rehabilitation, management, and maintenance of all National Trunk Roads in Kenya.
                </p>
            </div>
        </div>
    
        <!-- Alumni Section: The African Union -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('images/au.webp') }}" alt="The African Union" class="rounded-md mb-4">
                <hr class="border-t-2 border-gray-200 my-4">
                <p class="text-gray-600">
                    The African Union (AU) is a continental body consisting of 55 member states that make up the countries of the African Continent. It was officially launched in 2002 as a successor to the Organisation of African Unity (OAU).
                </p>
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-[#00a651]">The African Union (AU)</h3>
                <hr class="border-t-2 border-gray-300 my-4">
                <h4 class="text-xl font-semibold text-[#00a651]">Training Program</h4>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>VIP Protection and Personal Assistance Program</li>
                    <li>Electronic Document and Records Management</li>
                    <li>Modern Records Management Using SharePoint and Office 365</li>
                </ul>
            </div>
        </div>
    
        <!-- Alumni Section: James Finlays Limited -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            <div>
                <h3 class="text-2xl font-semibold text-[#00a651]">James Finlays Limited</h3>
                <hr class="border-t-2 border-gray-300 my-4">
                <p class="text-gray-600">
                    Finlay’s is a leading independent B2B manufacturer and supplier of tea, coffee, and botanical solutions to beverage and brand owners worldwide. With deep roots across the globe and extensive expertise, they help brand owners bring the best from bush to cap.
                </p>
                <h4 class="text-xl font-semibold text-[#00a651]">Training Program</h4>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>GIS Mapping and Spatial Analysis using ArcGIS Desktop Level 1</li>
                    <li>GIS Data Collection, Analysis, Visualization and Mapping</li>
                </ul>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('images/finlays.webp') }}" alt="James Finlays Limited" class="rounded-md mb-4">
            </div>
        </div>
    
        <!-- Alumni Section: K Unity Sacco -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('images/k_unity.webp') }}" alt="K Unity Sacco" class="rounded-md mb-4 h-90 w-90">
                <hr class="border-t-2 border-gray-200 my-4">
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-[#00a651]">K Unity Sacco</h3>
                <hr class="border-t-2 border-gray-300 my-4">
                <p class="text-gray-600">
                    K-unity is a savings and credit co-operative in Kenya, established in 1974 to facilitate savings and credit facilities for dairy and pyrethrum societies within Kiambu county. It currently has an asset base of over 5.1 billion with over 100,000 members.
                </p>
                <h4 class="text-xl font-semibold text-[#00a651]">Training Program</h4>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>Advanced Excel Course</li>
                    <li>Advanced Microsoft Excel Course</li>
                </ul>
            </div>
        </div>
    
        <!-- Alumni Section: United Nations (UN) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            <div>
                <h3 class="text-2xl font-semibold text-[#00a651]">United Nations (UN)</h3>
                <hr class="border-t-2 border-gray-300 my-4">
                <h4 class="text-xl font-semibold text-[#00a651]">Training Program</h4>
                <ul class="list-disc pl-6 text-gray-700">
                    <li>Health System Management Training Course</li>
                    <li>Cyber Security Risk Assessment and Management</li>
                    <li>Diseases Surveillance and Reporting Course</li>
                    <li>Accounts Payable and Operations Course</li>
                    <li>Leadership Coaching for Management</li>
                    <li>Public Procurement and Asset Disposal Regulation</li>
                    <li>Facility Planning and Design Management</li>
                    <li>Hazardous Waste Management and Disposal</li>
                </ul>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('images/un.webp') }}" alt="United Nations" class="rounded-md mb-4">
                <hr class="border-t-2 border-gray-200 my-4">
                <p class="text-gray-600">
                    The United Nations works to maintain international peace and security, provide humanitarian assistance, protect human rights, and uphold international law. UN staff work globally on peacekeeping missions.
                </p>
            </div>
        </div>
    </div>
    
</div>

@endsection