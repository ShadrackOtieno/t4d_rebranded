@extends('backoffice.master')

@section('title', 'Add FAQ')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD NEW FAQ
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.faqs.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                                        <div v-if="categories.length && subcategories.length">

                                            @csrf

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="title" class="form-control" placeholder="Title or Question?" value="{{ old('title') }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
                                            </div>

                                            <div class="form-group">
                                                <input type="checkbox" id="featured" name="featured" class="filled-in chk-col-red"
                                                @if ( old('featured') )
                                                    checked
                                                @endif>

                                                <label for="featured">
                                                    Mark as featured
                                                </label>
                                            </div>

                                            <!-- Tag -->

                                            <label>FAQ Tag:</label>

                                            <div class="form-group">
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'tag'])
                                                <select class="form-control select2" name="tag" id="tag">
                                                    @php
                                                        $options = ['Registration', 'Training', 'Payment',
                                                                    'Contact', 'Certificate',
                                                                    'Accomodation', 'Delegates/ Visas'];
                                                        foreach($options AS $option){
                                                            echo "<option value='$option'>$option</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                            <!-- End tag-->

                                            <!-- Description -->

                                            <label>Description:</label>

                                            <div class="">
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>
                                            </div>
                                            <!-- End -->

                                            <hr/>

                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    ADD
                                                </button>
                                            </div>

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
