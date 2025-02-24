@extends('front.Projects.master')

@section('title', ucfirst($search) . " | Search")

@section('content')
    <div class="main-body ">
        <!-- page breadcrumbs -->
        <div class="breadcrumbs text-white bg-[#0096FF] p-1">
            <!-- home -->
            <span>
                <a href="{{ route('home') }}" class="fa fa-home"></a>
            </span>
            <!-- separator -->
            <span class="bc-sep"></span>
            <!-- current page -->
            <span class="bc-current-page">{{ ucfirst($search) }} Search Results</span>
        </div>
        <!-- END page breadcrumbs -->

        <!-- page content -->
        <div class="ip-content lg:w-[1120px] mx-auto my-5">
            <div class="px-4">
                <div class="ip-content-one">
                    <span class="ip-heading">
                        <h3 class="text-2xl text-[#00a651] font-bold">
                            {{ ucfirst($search) }} Search Results.
                        </h3>
                    </span>
                </div>
                <!-- course tables -->
                <div class="ip-courses-sum mt-6">
                    <div class="ip-inner-header mb-4">
                        <h3 class="text-xl text-[#00a651] font-semibold">Pick your course</h3>
                        <hr class="w-[100px] mt-4 border-4 border-[#0096FF]"/>
                    </div>
                    <!-- courses -->
                    <table class="min-w-full text-left table-auto">
                        <tbody>
                            @forelse ($result as $item)
                                @php
                                    switch ($item->model) {
                                        case 'course':
                                            {{$linkname = Str::slug($item->name, '-');}}
                                            $url = route('course.show',$linkname );
                                            break;

                                        case 'tour':
                                            $url = route('tour.show', $item->id);
                                            break;

                                        case 'software':
                                            $url = route('software.show', $item->id);
                                            break;
                                    }
                                @endphp

                                <tr class="border-b-2 border-[#0096FF] px-2">
                                    <td class="py-4">
                                        <a href="{{ $url }}" class="text-lg font-medium text-[#00a651] hover:underline">
                                            <h4>{{ $item->name }}</h4>
                                        </a>
                                        <p class="text-sm text-gray-500">
                                            {!! mb_strimwidth($item->description, 0, 84, '...') !!}
                                        </p>
                                    </td>
                                    <td class="py-4 text-right">
                                        <a class="ires-primary-btn" href="{{ $url }}">
                                            View {{ ucfirst($item->model) }}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-4 text-[#00a651]">
                                        No results found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="my-3 w-max bg-transparent">
                    {{ $result->links('front.partials.pagination') }}
                </div>
            </div>
        </div>
        <!-- END page container -->
    </div>
@endsection

@section('css')
    <style>
        table {
            table-layout: fixed ;
            width: 100% ;
        }
        td:last-of-type {
            width: 25% ;
        }
    </style>
@endsection
