@extends('backoffice.master')

@section('title', 'Edit Tour')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT TOUR
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <form action="" method="post" enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="country" class="form-control" placeholder="Country" value="{{ old('country') }}">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'country'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'city'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="cost" class="form-control" placeholder="Cost" value="{{ old('cost') }}">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'cost'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Category</label>

                                            <div class="form-line">
                                                <select id="category" name="category" class="form-control show-tick">
                                                    <option value="value"
                                                    @if ( old('category') == 'value')
                                                        selected
                                                    @endif>Sample Category</option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'category'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="brochure">
                                                Brochure Document
                                            </label>

                                            <div class="form-line">
                                                <input type="file" id="brochure" class="form-control" name="brochure">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'brochure'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cover">Cover</label>
                                            <div class="form-line">
                                                <input type="file" id="cover" class="form-control" name="cover">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'cover'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gallery">Gallery</label>

                                            <div class="form-line">
                                                <input type="file" id="gallery" class="form-control" name="gallery[]" multiple>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="availability">
                                                Availability
                                            </label>

                                            <div class="form-line">
                                                <select id="availability" class="form-control show-tick">
                                                    <option value="scheduled" selected>
                                                        Scheduled Date
                                                    </option>
                                                    <option value="available">
                                                        Readily Available
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="dates">
                                            <div class="form-group">
                                                <label for="scheduled_date">
                                                    Select date
                                                </label>

                                                <div class="form-line">
                                                    <input type="date" name="scheduled_date" id="scheduled_date" class="form-control" placeholder="scheduled_date" value="{{ old('scheduled_date') }}">

                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'scheduled_date'])
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Description -->

                                        <label>Description:</label>

                                        <div class="">
                                            <textarea name="description" id="ckeditor">{{ old('description') }}</textarea>
                                        </div>
                                        <!-- End -->

                                        <hr/>

                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                UPDATE
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
