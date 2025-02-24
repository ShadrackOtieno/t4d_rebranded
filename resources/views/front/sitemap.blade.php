@extends('front.projects.master')

@section('content')

    <div class="lg:w-[1024px] mx-auto p-6">
        <h1 class="text-2xl font-bold text-[#a11e22] mb-4">Site Map</h1>
        <section id="sec1">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-2/3 md:w-2/3 sm:w-full mb-8">
                    <h2 class="text-4xl font-semibold  mb-4">Short courses</h2>

                    @foreach (App\Category::course()->with('subcategories')->whereNotIn('id', [10])->latest()->get() as $category)
                        <a href="{{ route('course.category.subcategory.index', $category) }}">
                            <h3 class="text-xl font-medium text-[#a11e22] hover:underline mt-6 mb-3">{{ $category->name }}</h3>
                        </a>

                        <ol class="pl-4 text-[#0096FF] list-decimal">
                            @foreach ($category->subcategories as $subcategory)
                                <li>
                                    <a href="{{ route('course.category.subcategory.show', compact('category', 'subcategory')) }}" class="text-teal-500 hover:text-teal-700">
                                        {{ $subcategory->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                        
                    @endforeach
                </div>
                <div class="w-full lg:w-1/3 md:w-1/3 sm:w-full">
                    <h2 class="text-2xl font-semibold mb-4">Important links</h2>
                    <ul class="list-disc list-inside space-y-2">
                        <li><a href="{{ route('home') }}" class="text-blue-500 hover:underline">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-blue-500 hover:underline">About us</a></li>
                        <li><a href="{{ route('clients') }}" class="text-blue-500 hover:underline">Clients</a></li>
                        <li><a href="https://blog.indepthresearch.org/" class="text-blue-500 hover:underline">Blog</a></li>
                        <li><a href="{{ route('projects') }}" class="text-blue-500 hover:underline">Top projects</a></li>
                        <li><a href="{{ route('about') }}" class="text-blue-500 hover:underline">Success stories</a></li>
                        <li><a href="{{ route('faqs') }}" class="text-blue-500 hover:underline">FAQS</a></li>
                        <li><a href="{{ route('contact') }}" class="text-blue-500 hover:underline">Contact Us</a></li>
                        <li><a href="{{ route('careers') }}" class="text-blue-500 hover:underline">Careers</a></li>
                        <li><a href="{{ route('careers') }}" class="text-blue-500 hover:underline">Consultants</a></li>
                        <li><a href="{{ route('careers') }}" class="text-blue-500 hover:underline">Internships</a></li>
                        <li><a href="{{ route('faqs') }}" class="text-blue-500 hover:underline">Frequently asked questions</a></li>
                        <li><a href="{{ route('training_calendar.index') }}" class="text-blue-500 hover:underline">Training-calendar</a></li>
                        <li><a href="{{ route('become-an-affiliate') }}" class="text-blue-500 hover:underline">Become an affiliate</a></li>
                        <li><a href="{{ route('become-an-agent') }}" class="text-blue-500 hover:underline">Become an agent</a></li>
                        <li><a href="{{ route('partner-with-us') }}" class="text-blue-500 hover:underline">Franchise with Us</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <!-- /container -->

    <script>
        // Adds active state to secion navigation
        $('.nav li').click(function(e) {
            e.preventDefault();
            $('.nav li').removeClass('active');
            $(this).addClass('active');
        });
    </script>
@endsection
