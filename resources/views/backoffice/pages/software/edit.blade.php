@extends('backoffice.master')

@section('title', 'Edit Software')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT SOFTWARE
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <form action="" method="post">

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
                                                <input type="number" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'price'])
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

                                        <h4>Key Highlights</h4>

                                        <div class="">
                                            <textarea name="highlights" class="ckeditor">{{ old('highlights') }}</textarea>
                                        </div>

                                        <!-- Description -->

                                        <label>Description:</label>

                                        <div class="">
                                            <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>
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
