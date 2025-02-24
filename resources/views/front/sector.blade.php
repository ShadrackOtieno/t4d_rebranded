@extends('front.Projects.master')




@section('content')


<div class="breadcrumbs  pb-3 pt-2 pl-5 bg-[#0096FF] h-10 text-white" id="tp">
    <span>
        <a href="{{ route('home') }}" class="fa fa-home"></a>
    </span>



    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline" viewBox="0 0 24 24"><path fill="currentColor" d="m23.068 11.993l-4.25-4.236l-1.412 1.417l1.835 1.83L.932 11v2l18.305.002l-1.821 1.828l1.416 1.412z"/></svg>

    <span class="bc-current-page">Industry Solutions</span>
</div>

<div class="main-body lg:w5/6 container mx-auto mt-10 mb-10 px-8 lg:px-20">
    <div class="px-6 md:px-20  items-center justify-center mb-16 overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center  max-w8xl">
            <div class="w-full md:w1/2 lg:pr32">
                <h1 class="text-2xl lg:text-3xl text-center md:text-left text-[#00a651] leading-tight font-bold">Industry Solutions</h1>
                <p class="mt-6 md:mt-10 text-md lg:text-xl textcenter md:text-left text-black font-light trackingwider leadingrelaxed">
                    Welcome to our innovative Industry Solutions designed to cater to the diverse needs of various industries. We therefore go above and beyond the conventional by providing sector-specific training, development, and consultancy services. Navigate effortlessly through our sector pages to explore tailored solutions for the following industries:
                </p>
                <div class="itemscenter my-10">
                    <a href="{{ route('contact') }}" class="ires-primary-btn">Get Started <i class='fas fa-arrow-right'></i></a>
                </div>
            </div>
            <div class="w-full md:w1/2 fle justify-center md:justify-end ">
                <img class="rounded-2xl" src="{{ asset('images/Industry Solutions.webp') }}">
            </div>
        </div>
    </div>

    <div class="bg-gray-100 hscreen mb-25">
        <div class="py-10 maxw-screen-lg mxauto">
            <div class="lg:text-center">
                <h2 class="text-[#00a651] text-center text-xl sm:text-2xl leading-normal font-extrabold trackingtight">
                    Sectors
                </h2>
                <p class="my-8 mx-4 text-black">
                    Tech For Development(IRES) has a firm belief that every organization has a unique purpose only they can fulfil in this world. We work with you in organizing your resources to exploit opportunities so that you can fulfil your purpose and realize full potential.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:my-20">
                @foreach(App\ServiceIndustry::with('services')->get() as $industry)
                    <div class="w[300px] rounded-md border shadow-lg transition-colors duration-500 mx-6">
                        <img
                        src="{{asset('storage/'.$industry->cover_image)}}"
                        alt="{{$industry->name}}"
                        class="h-40 w-full rounded-t-md object-cover"
                        />
                        <div class="p-4">
                            <h3 class="inline-flex items-center text-lg font-semibold text-[#00a651]">
                                {{$industry->name}} &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                </svg>
                            </h3>
                            <p class="mt-3 text-md text-black">
                                {!! substr(strip_tags($industry->description), 0, 200) !!}...
                            </p>
                            <div class="ires-primary-btn my-4 ml4">
                                <a class="" href="{{ route('sector-service', $industry->slug) }}">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- END page container -->
</div>

@endsection
