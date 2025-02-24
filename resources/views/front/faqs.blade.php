@extends('front.master')

@section('content')
    <div class="main-body">

        <!-- page container -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <!-- home -->
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <!-- separator -->
                <span class="bc-sep"></span>
                <!-- current page -->
                <span class="bc-current-page">Frequently Asked Questions</span>
            </div>
            <!-- END page breadcrumbs -->

            @include('front/partials/alert')

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="ip-content-one">
                        <span class="ip-tagline">
                            <h1>Frequently Asked Questions</h1>
                            <hr class="ip-inner-header" />
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
                                <span class="fs-4">
                                    <h2>FAQs Panel</h2>
                                </span>
                                <ul class="nav nav-pills flex-column mb-auto" id="faq-tags">
                                    <ul class="nav nav-pills flex-column mb-auto" id="faq-tags">
                                        @foreach ($faqts as $faq)
                                            <li class="nav-item">
                                                <a style="color: #1EA19D;" href="{{ route('faqs-show', $faq->tag) }}"
                                                    class="nav-link">
                                                    {{ $faq->tag }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </ul>
                            </div>
                        </div>

                        <div class="col-md-9" id="description-container" class="description">
                            {{-- @foreach ($faqs as $faq)
                                <h3>{!! $faq->title !!}</h3>

                                {!! $faq->description !!}
                            @endforeach --}}
                            @php
                                $count = 0;
                            @endphp

                            @foreach ($faqs as $faq)
                                @if ($count < 2)
                                    <h3>{!! $faq->title !!}</h3>
                                    <p>{!! $faq->description !!}</p>
                                @endif

                                @php
                                    $count++;
                                @endphp
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <!-- END page content -->
        </div>
        <!-- END page container -->

    </div>













