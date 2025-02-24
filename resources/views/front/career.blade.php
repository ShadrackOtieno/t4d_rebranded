@extends('front.Projects.master')

@section('title', $career->Job_title.'|Opportunity')

@section('css')
    {{-- <style>
        .prose p{
            /* padding: 8px 0; */
            /* margin: 8px 0; */
        }
    </style> --}}
@endsection

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
        <span class="bc-current-page">{{ $career->Job_title }} </span>
    </div>
    <!-- END page breadcrumbs -->

    <!-- END page breadcrumbs  background-color: rgb(239, 247, 248);-->
    <div class="flex justify-center w-max mx-auto mt-8 mb-12">
        <div class="bg-gray-100 shadow-lg shadow-gray-400 w-dvw lg:w-[1024px] my-2 p-5 md:rounded-2xl">
            <div class="mt-2 px-2 text-2xl font-bold">
                <div>{{ $career->Job_title }}</div>
            </div>
            <hr class="my-4 border-gray-300">
            <div class="flex justify-start bg-gray-200 w-max mt-1 px-2 rounded-md">
                <div class="px-4 py-2  text-black">
                    <b>Full Time</b>
                </div>
                <div class="px-4 py-2 md:ml-12">
                    <b>deadline:&nbsp;</b><i class="text-red-600">{{ $career->Apply_before }}</i>
                </div>
            </div>
            <div class="mt-2 p-2 w-max">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <tr class="border-b border-black">
                            <td class="px-4 py-2">Work Experience</td>
                            @if(isset($career->Experience))
                                <td class="px-4 py-2">: {{ $career->Experience }}+ years</td>
                            @else
                                <td class="px-4 py-2">: </td>
                            @endif
                        </tr>
                        <tr class="border-b border-black">
                            <td class="px-4 py-2">Category</td>
                            <td class="px-4 py-2">: {{ $career->Category }}</td>
                        </tr>
                        <tr class="">
                            <td class="px-4 py-2">Department</td>
                            <td class="px-4 py-2">: {{ $career->Department }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class=" mt-5 p-2 *:py-2">
                <p class="text-2xl font-bold">Job Description:</p>
                {!! $career->Description !!}
            </div>
            <div class=" mt-5 p-2 *:py-2">
                <p class="text-2xl font-bold">Requirements:</p>
                {!! $career->Requirements !!}
            </div>
            <div class="mt-2">
                <p>To apply for the position send a copy of your CV and Cover letter to
                    <a href="mailto:hr@indepthresearch.org?subject={{ $career->Job_title }}" class="text-blue-600 underline">
                        <b>hr@indepthresearch.org</b>
                    </a>
                </p>
            </div>
            <div class="mt-5">
                <p>For further inquiries, please contact us on
                    <b>Phone: +254 715 077 817 or Email: hr@indepthresearch.org.</b>
                </p>
            </div>
        </div>
    </div>



</div>
<!-- END page container -->

</div>
@endsection
