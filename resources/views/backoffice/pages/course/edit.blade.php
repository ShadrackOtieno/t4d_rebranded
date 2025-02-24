@extends('backoffice.master')

@section('title', 'Edit Course')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT NEW COURSE
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
                                            <label for="category">
                                                Select Category
                                            </label>
                                            <div class="form-line">
                                                <select id="category" name="category" class="form-control show-tick">
                                                    <option value="Category A"
                                                    @if ( old('category') == 'value')
                                                        selected
                                                    @endif>Category A</option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'category'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="trainer">
                                                Trainer
                                            </label>
                                            <div class="form-line">
                                                <select id="trainer" name="trainer" class="form-control show-tick" multiple>
                                                    <option value=""
                                                    @if ( old('trainer') == 'value')
                                                        selected
                                                    @endif>John Doe</option>
                                                    <option value=""
                                                    @if ( old('trainer') == 'value')
                                                        selected
                                                    @endif>Mary Jane</option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'trainer'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">
                                                Select Event Types
                                            </label>

                                            <div class="form-line">
                                                <select id="category" name="category" class="form-control show-tick" multiple>
                                                    <option value="face to face" selected>
                                                        Face to Face
                                                    </option>
                                                    <option value="virtual" selected>
                                                        Virtual
                                                    </option>
                                                    <option value="e-learning" selected>
                                                        E-learning
                                                    </option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'category'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="software">
                                                Recommended Software
                                            </label>
                                            <div class="form-line">
                                                <select id="software" name="software" class="form-control show-tick" multiple>
                                                    <option value="Tour A"
                                                    @if ( old('software') == 'value')
                                                        selected
                                                    @endif>Software A</option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'software'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tour">
                                                Recommended Tours
                                            </label>
                                            <div class="form-line">
                                                <select id="tour" name="tour" class="form-control show-tick" multiple>
                                                    <option value="Tour A"
                                                    @if ( old('tour') == 'value')
                                                        selected
                                                    @endif>Tour A</option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'tour'])
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

                                        <h4>Face to Face Occurrence</h4>

                                        <div class="dates">

                                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                <span class="input-group-addon">From</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Date start...">
                                                </div>
                                                <span class="input-group-addon">to</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Date end...">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-line">
                                                <select class="form-control show-tick">
                                                    <option value="">-- Select Venue --</option>
                                                    <option value="Venue A">Venue A</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                <span class="input-group-addon">KES</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">RWF</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">UGX</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">USD</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">EUR</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">GBP</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                <span class="input-group-addon">Booking Starts</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Date start...">
                                                </div>
                                                <span class="input-group-addon">Booking Ends</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Date end...">
                                                </div>
                                            </div>

                                            <div>
                                                <a class="btn btn-success">Add another date</a>
                                            </div>
                                        </div>

                                        <h4>Virtual Occurrence</h4>

                                        <div class="dates">

                                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                <span class="input-group-addon">From</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Date start...">
                                                </div>
                                                <span class="input-group-addon">to</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Date end...">
                                                </div>
                                            </div>

                                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                <span class="input-group-addon">KES</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">RWF</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">UGX</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">USD</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">EUR</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>

                                                <span class="input-group-addon">GBP</span>
                                                <div class="form-line">
                                                    <input type="number" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                                <span class="input-group-addon">Booking Starts</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Date start...">
                                                </div>
                                                <span class="input-group-addon">Booking Ends</span>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" placeholder="Date end...">
                                                </div>
                                            </div>

                                            <div>
                                                <a class="btn btn-success">Add another date</a>
                                            </div>
                                        </div>

                                        <h4>E-learning Occurrence</h4>

                                        <div class="dates">

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="url" class="form-control" placeholder="Website Link" value="{{ old('url') }}">

                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'url'])
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="cover">
                                                Cover Image
                                            </label>

                                            <div class="form-line">
                                                <input type="file" id="cover" class="form-control" name="cover">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'cover'])
                                            </div>
                                        </div>

                                        <!-- Description -->

                                        <label>Description:</label>

                                        <div class="">
                                            <textarea name="description" id="ckeditor">{{ old('description') }}</textarea>
                                        </div>
                                        <!-- End -->

                                        <h4>Course Outline</h4>

                                        <div class="">
                                            <textarea name="outline" class="ckeditor">{{ old('outline') }}</textarea>
                                        </div>

                                        <h4>Module</h4>

                                        <div class="">
                                            <textarea name="module" class="ckeditor">{{ old('module') }}</textarea>
                                        </div>

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
