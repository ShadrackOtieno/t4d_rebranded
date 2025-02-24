<!-- Start -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header clearfix">
                <h2 class="pull-left">
                    ADD INDUSTRY
                </h2>
            </div>

            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <form action="{{route('backoffice.industries.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                            <div v-if="categories.length && subcategories.length">

                                @csrf

                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="subsector_id">Industry:</label>
                                        <select class="form-control select2" name="name">
                                            <option value="">Select Industry</option>
                                            @foreach(App\Industry::all() as $industry)
                                                <option value="{{ $industry->id }}"> {{ $industry->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="subsector_id">Sub-Sector:</label>
                                        <select class="form-control select2" name="subsector_id">
                                            <option value="{{ $subSector->id }}" selected>{{$subSector->name}}</option>
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
