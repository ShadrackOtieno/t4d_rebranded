@extends('backoffice.master')

@section('title', 'Add Landing Page')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD NEW LANDING PAGE
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')
                        
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <h4>Please fix below errors</h4>
                            <ul style="list-style: none">
                                @foreach ($errors->all() as $error)
                                    <li><strong>Oh Snap! </strong>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.landing-pages.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                                        @csrf

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="name">Sub Category</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <select class="form-control select2" name="subcategory_id" id="subcategory">
                                                        @foreach(App\Subcategory::all() as $subcategory)
                                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'subcategory_id'])
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="cover">Banner Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'banner_description'])
                                                        <textarea name="banner_description" class="ckeditor">{{ old('banner_description') }}</textarea>                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="cover">Description Title</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="description_title" class="form-control" placeholder="Page Description Title" value="{{ old('description_title') }}">
                                                    </div>
                                                </div>
        
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'description_title'])
                                            </div>
                                        </div>
                                        
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="cover">Description</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                        <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="catalog_file">Catalog File</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input name="catalog_file" type="file" id="catalog_file">
                                                    </div>
                                                </div>
        
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'catalog_file'])
                                            </div>
                                        </div>
                                        <!-- End -->

                                        <hr/>

                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                ADD
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->

        </div>
    </section>
@endsection
