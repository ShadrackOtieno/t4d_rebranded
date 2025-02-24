@extends('backoffice.master')

@section('title', 'Edit Industry')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT INDUSTRY
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go Back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.industries.update', $industry)}}" method="post" id="course-form" enctype="multipart/form-data">

                                        <div v-if="categories.length && subcategories.length">

                                            @csrf

                                            @method('PUT')

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" placeholder="Industry Name" value="{{ $industry->name }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>


                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="subsector_id">Sub-Sector:</label>
                                                    <select class="form-control" name="subsector_id">
                                                        <option value="{{ $industry->subsector_id ?? '' }}" selected>{{$industry->subSector->name ?? ''}}</option>
                                                            @foreach(App\SubSector::all() as $subs)
                                                                <option value="{{ $subs->id }}"> {{ $subs->name }} </option>
                                                            @endforeach
                                                    </select>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'subsector_id'])
                                            </div>

                                            <!-- Description -->

                                            <label>Description:</label>

                                            <div class="">
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                                <textarea name="description" class="ckeditor">{{ $industry->description }}</textarea>
                                            </div>
                                            <!-- End -->

                                            <hr/>

                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    Save
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
