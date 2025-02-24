@extends('front.master')

@section('content')
    <div class="main-body">

        <!-- page conainer -->
        <div>
            <!-- page breadcrumbs -->
            <div class="breadcrumbs">
                <span>
                    <a href="{{ route('home') }}" class="fa fa-home"></a>
                </span>
                <span class="bc-sep"></span>
                <span>
                    <a href="{{ route('software.index') }}">
                        Enterprise Systems
                    </a>
                </span>
                <span class="bc-sep"></span>
                <span class="bc-current-page">{{ $software->name }}</span>
            </div>
            <!-- END page breadcrumbs -->

            <!-- page content -->
            <div class="ip-content">
                <div class="container">
                    <div class="card">
                        <div class="container-fliud">
                            @if ( session()->has('success') )
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <div class="wrapper row">
                                <div class="preview col-md-6">

                                    <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-0">
                                            <img src="{{ asset('storage/'.$software->cover) }}" height="300"/>
                                        </div>

                                        @foreach ($software->gallery as $image)
                                            <div class="tab-pane" id="pic-{{ $loop->iteration }}">
                                                <img src="{{ asset('storage/'.$image->path) }}" height="300"/>
                                            </div>
                                        @endforeach
                                    </div>

                                    <ul class="preview-thumbnail nav nav-tabs">
                                        <li class="active">
                                            <a data-target="#pic-0" data-toggle="tab">
                                                <img src="{{ asset('storage/'.$software->cover) }}" width="120" height="80"/>
                                            </a>
                                        </li>

                                        @foreach ($software->gallery as $image)
                                            <li>
                                                <a data-target="#pic-{{ $loop->iteration }}" data-toggle="tab">
                                                    <img src="{{ asset('storage/'.$image->path) }}" width="120" height="80"/>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <div class="details col-md-6">
                                    <h2 class="product-title">{{ $software->name }}</h2>
                                    <p class="product-description">
                                        {!! $software->highlights !!}
                                    </p>
                                    <div class="action">
                                        {{-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#request-quote-modal">
                                            Request Quote
                                        </button> --}}
                                        <a href="{{ route('software.quotation.create', $software->slug ?? $software->id) }}" class="btn btn-primary">
                                            Request Quote
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- request quote form -->
                    <div class="modal fade" id="request-quote-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <form action="{{ route('software.quote') }}" method="post" class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Request Quote</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="software_id" value="{{ $software->id }}">
                                <div class="form-group">
                                    <small class="form-text text-muted">Full Name</small>
                                    <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name', @$customer->name) }}" required>
                                </div>
                                <div class="form-group">
                                    <small class="form-text text-muted">Email Address</small>
                                    <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('name', @$customer->account->email) }}" required>
                                </div>
                                <div class="form-group">
                                    <small class="form-text text-muted">Phone Number</small>
                                    <input type="tel" class="form-control" placeholder="Phone Number" value="{{ old('name', @$customer->phone) }}" name="phone">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                            </div>
                        </form>
                    </div>

                    <!-- Tabs Section -->
                    <div>
                        <nav>
                            <div class="nav nav-tabs ip-cdesc-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-cdesc-tab" data-toggle="tab" href="#nav-cdesc" role="tab" aria-controls="nav-cdesc" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="nav-cdld-tab" data-toggle="tab" href="#nav-cdld" role="tab" aria-controls="nav-cdld" aria-selected="false">Downloads</a>
                                <a class="nav-item nav-link" id="nav-ctrn-tab" data-toggle="tab" href="#nav-ctrn" role="tab" aria-controls="nav-ctrn" aria-selected="false">Additional Info</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-cdesc" role="tabpanel" aria-labelledby="nav-cdesc-tab">
                                {!! $software->description !!}
                            </div>

                            <div class="tab-pane fade" id="nav-cdld" role="tabpanel" aria-labelledby="nav-cdld-tab">
                                @if ($software->brochure)
                                    <table class="table table-sm table-responsive table-striped ires-table tb-download">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Brochure</td>
                                                <td>
                                                    <a class="td-reg-btn" href="#" data-toggle="modal" data-target="#popDownload">
                                                        Download
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>

                            <div class="tab-pane fade" id="nav-ctrn" role="tabpanel" aria-labelledby="nav-ctrn-tab">
                                <p>Once your payment is confirmed, you shall receive the download link and all licences on your email.</p>
                            </div>
                        </div>

                    </div>

                    <!-- related courses section -->
                    @php
                        $related_software = $software->subcategory ? $software->subcategory->software()->where('id', '<>', $software->id)->inRandomOrder()->take(4)->get() : [];
                    @endphp

                    @if ( count($related_software) > 0 )
                        <div class="c-desc-related c-desc-extra" id="">
                            <div class="ip-inner-header">
                                <h4>Other related software</h4>
                                <hr/>
                            </div>
                            <!-- columns -->
                            <div class="row">
                                @foreach ($related_software as $software_item)
                                    <div class="col-sm-3 ip-sub-col">
                                        <div class="ip-sub-img">
                                            <a href="{{ route('software.show', $software_item) }}">
                                                <img src="{{ asset('storage/'.$software_item->cover) }}">
                                            </a>
                                            <p>
                                                <a href="{{ route('software.show', $software_item) }}">
                                                    {{ $software_item->name }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <!-- END related courses section -->

                </div>
            </div>
            <!-- END page content -->

        </div>
        <!-- END page container -->

    </div>
@endsection
