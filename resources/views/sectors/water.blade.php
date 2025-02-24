@extends('front.Projects.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Blog Title</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <section class="bg-cover bg-center h-96 relative" style="background-image: url('/images/forestblog.png');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center text-white">
            <div class="max-w-3xl px-4">
                <h1 class="text-4xl font-bold mb-4">Mobile Data Collection in Water</h1>
                {{-- <p class="text-lg">By
                    Lee
                    February 6, 2025</p> --}}
                <a href="#" class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Read More</a>
            </div>
        </div>
    </section>

    <main class="container mx-auto px-4 py-8">
        <div class="md:grid-cols-3 gap-8">

            <div class="md:col-span-2">
                <h2 class="text-3xl font-bold mb-6 text-blue-300">Key Take aways</h2>

                <article class="mb-8 bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="images/forestheader.jpg" alt="Article 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <ol class="list-decimal p-4 text-justify">
                            <li>Forestry is essential to our existence, safeguarding the planet’s <a href="" style="color:teal;text-decoration:underline"> health</a> and providing sustenance for humanity.</li>
                            <li>From oxygen production, water catchment, and medicinal wealth, to providing sacred sanctuaries, forests are indispensable components of the Earth.</li>
                            <li>The world’s forests are, however, under constant threat from rapid urbanization, agricultural expansion, and illegal logging.</li>
                            <li>Mobile data collection offers a powerful solution to many forestry challenges, enabling efficient and accurate monitoring, improved data analysis, and more effective decision-making for sustainable forest management.</li>
                            <li>This article demonstrates how mobile data collection tools have assisted numerous forest conservation efforts around the world and secured the future of mankind.</li>
                        </ol>
                        <a href="#" class="text-blue-500 hover:underline">Read More</a>
                    </div>
                </article>
                <article class="mb-8 bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="font-semibold mb-2 text-sm">Case Study Summary Of Mobile Data Collection in Forestry and Environmental Conservation</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tool
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Project
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Country
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Sector
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Organization
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                           Year Adopted
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Donor
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Open Foris
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Forest inventory and monitoring
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Tanzania
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Forestry
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Tanzania Forest Services Agency (TFS)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2017
                                        </td>
                                         <td class="px-6 py-4 whitespace-nowrap">
                                            FAO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            ODK
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Tree risk assessments
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            United States of America
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Forestry
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            International Society of Arboriculture (ISA)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2013
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            International Society of Arboriculture (ISA)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            iTree
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Tree inventory (tree census) in San Fransisco Carlifornia
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            United States of America
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Forestry
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Davey Resource Group (DRG)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2012
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            City of San Francisco
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            TIMBY (This Is My Backyard)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Tracking illegal logging
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Liberia
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Forestry
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Liberia Forest Initiative (LFI)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2017
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Liberia Forest Initiative (LFI)
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Lukim Gather
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Forest Monitoring
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Papua New Guinea
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Forestry
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            The Papua New Guinea Forest Authority (PNGFA)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2018
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            The United Nations Development Programme (UNDP), Global Environment Facility (GEF)
                                        </td>
                                    </tr>
           
           
                                    </tbody>
                            </table>
                        </div>

                       
                    </div>
                </article>

                {{-- <article class="mb-8 bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="placeholder-article2.jpg" alt="Article 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2">Article 2 Title</h3>
                        <p class="text-gray-700 mb-4">Article 2 excerpt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="text-blue-500 hover:underline">Read More</a>
                    </div>
                </article>

                <article class="mb-8 bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="placeholder-article3.jpg" alt="Article 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2">Article 3 Title</h3>
                        <p class="text-gray-700 mb-4">Article 3 excerpt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="text-blue-500 hover:underline">Read More</a>
                    </div>
                </article> --}}

                <div class="flex justify-center mt-8">
                    <a href="#" class="px-4 py-2 mx-1 bg-white border rounded hover:bg-gray-100">Previous</a>
                    <a href="#" class="px-4 py-2 mx-1 bg-blue-500 text-white rounded hover:bg-blue-600">Next</a>
                </div>
            </div>

            {{-- <aside class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4">About Us</h3>
                    <p class="text-gray-700">A brief description of your blog. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-500 hover:underline">Category 1</a></li>
                        <li><a href="#" class="text-blue-500 hover:underline">Category 2</a></li>
                        <li><a href="#" class="text-blue-500 hover:underline">Category 3</a></li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-500 hover:text-gray-800">Facebook</a>
                        <a href="#" class="text-gray-500 hover:text-gray-800">Twitter</a>
                        <a href="#" class="text-gray-500 hover:text-gray-800">Instagram</a>
                    </div>
                </div>
            </aside> --}}
        </div>

        <section class="mt-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Testimonials</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <p class="text-gray-700 mb-4">"This blog has been incredibly helpful. I've learned so much!"</p>
                    <p class="font-semibold">- John Doe</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <p class="text-gray-700 mb-4">"The content is always high-quality and engaging. Highly recommend!"</p>
                    <p class="font-semibold">- Jane Smith</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <p class="text-gray-700 mb-4">"I love the variety of topics covered. Great blog!"</p>
                    <p class="font-semibold">- David Lee</p>
                </div>
            </div>
        </section>

    </main>

 

</body>
</html>
@endsection