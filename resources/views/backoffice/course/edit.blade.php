@extends('backoffice.master')

@section('title', 'Edit Course')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT COURSE
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
                                    <form action="{{ route('backoffice.course.update', $course) }}" method="post" id="course-form" enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $course->name) }}">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="code" class="form-control" placeholder="Course Code" value="{{ old('code', $course->code) }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" id="featured" name="featured" class="filled-in chk-col-red"
                                                   @if ( old('featured', $course->featured) )
                                                   checked
                                                @endif>

                                            <label for="featured">
                                                Mark as featured
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_id">Category</label>

                                            <div class="form-line">
                                                <select id="category_id" name="category_id" class="form-control" v-model="selectedCategory">
                                                    <option v-for="(category, index) in categories" :key="category-index" :value="category.id">
                                                        @{{ category.name }}
                                                    </option>
                                                </select>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'category_id'])
                                        </div>

                                        <div class="form-group">
                                            <label for="subcategory_id">Subcategory</label>

                                            <div class="form-line">
                                                <select id="subcategory_id" name="subcategory_id" class="form-control" v-model="selectedSubcategory">
                                                    <option v-for="(subcategory, index) in subcategories" :key="subcategory-index" :value="subcategory.id">
                                                        @{{ subcategory.name }}
                                                    </option>
                                                </select>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'subcategory_id'])
                                        </div>

                                        <div class="form-group">
                                            <label for="topic_id">
                                                Topic
                                            </label>

                                            <div class="form-line">
                                                <select id="topic_id" name="topic_id" class="form-control" v-model="selectedTopic">
                                                    <option v-for="(topic, index) in topics" :key="index" :value="topic.id">
                                                        @{{ topic.name }}
                                                    </option>
                                                </select>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'topic_id'])
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="level">
                                                        Level of Course
                                                    </label>

                                                    <div class="form-line">
                                                        <select id="level" name="level" class="form-control show-tick">
                                                            @foreach ([
                                                                'Foundation',
                                                                'Intermediate',
                                                                'Advanced'
                                                            ] as $level)

                                                                <option value="{{ $level }}"
                                                                        @if ( old('level', $course->level) == $level )
                                                                        selected
                                                                    @endif>

                                                                    {{ $level }}

                                                                </option>

                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @include('backoffice.partials.alerts.form_error', ['field' => 'level'])
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="software">
                                                        Product Type
                                                    </label>

                                                    <div class="form-line">
                                                        <select id="product_type" name="product_type[]" class="form-control show-tick select2" multiple>
                                                            @foreach (App\ProductsConfig\ProductType::all() as $product_type)
                                                                <option value="{{ $product_type->id }}"
                                                                        @if ( in_array($product_type->id, old('product_type', @$course->product_types->modelKeys() ?? [])) )
                                                                        selected
                                                                    @endif>{{ $product_type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="software">
                                                        Skill Type
                                                    </label>

                                                    <div class="form-line">
                                                        <select id="skill_type" name="skill_type[]" class="form-control show-tick select2" multiple>
                                                            @foreach (App\ProductsConfig\SkillType::all() as $skill_type)
                                                                <option value="{{ $skill_type->id }}"
                                                                        @if ( in_array($skill_type->id, old('skill_type', @$course->skill_types->modelKeys() ?? [])) )
                                                                        selected
                                                                    @endif>{{ $skill_type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="software">
                                                        Skill Level
                                                    </label>

                                                    <div class="form-line">
                                                        <select id="skill_level" name="skill_level[]" class="form-control show-tick select2" multiple>
                                                            @foreach (App\ProductsConfig\SkillLevel::all() as $skill_level)
                                                                <option value="{{ $skill_level->id }}"
                                                                        @if ( in_array($skill_level->id, old('skill_level', @$course->skill_levels->modelKeys() ?? [])) )
                                                                        selected
                                                                    @endif>{{ $skill_level->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="software">
                                                        Target Staff
                                                    </label>

                                                    <div class="form-line">
                                                        <select id="target_staff" name="target_staff[]" class="form-control show-tick select2" multiple>
                                                            @foreach (App\ProductsConfig\TargetStaff::all() as $target_staff)
                                                                <option value="{{ $target_staff->id }}"
                                                                        @if ( in_array($target_staff->id, old('target_staff', @$course->target_staffs->modelKeys() ?? [])) )
                                                                        selected
                                                                    @endif>{{ $target_staff->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="software">
                                                        PDC Stage
                                                    </label>

                                                    <div class="form-line">
                                                        <select id="pdc_stage" name="pdc_stage[]" class="form-control show-tick select2" multiple>
                                                            @foreach (App\ProductsConfig\PDCStage::all() as $pdc_stage)
                                                                <option value="{{ $pdc_stage->id }}"
                                                                        @if ( in_array($pdc_stage->id, old('pdc_stage', @$course->pdc_stages->modelKeys() ?? [])) )
                                                                        selected
                                                                    @endif>{{ $pdc_stage->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="software">
                                                        BCG Level
                                                    </label>

                                                    <div class="form-line">
                                                        <select id="bcg_level" name="bcg_level[]" class="form-control show-tick select2" multiple>
                                                            @foreach (App\ProductsConfig\BCGLevel::all() as $bcg_level)
                                                                <option value="{{ $bcg_level->id }}"
                                                                        @if ( in_array($bcg_level->id, old('bcg_level', @$course->bcg_levels->modelKeys() ?? [])) )
                                                                        selected
                                                                    @endif>{{ $bcg_level->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="industry">Industry:</label>
                                            <select class="form-control select2" name="industries[]" id="industry" multiple>
                                                @foreach(App\ServiceIndustry::all() as $industry)
                                                    <option value="{{ $industry->id }}"
                                                            @if ( in_array($industry->id, old('industries', @$course->industries->modelKeys() ?? [])) )
                                                            selected
                                                        @endif>{{ $industry->name }}
                                                    </option>
                                                @endforeach

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'industry'])

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="trainers">
                                                Trainer
                                            </label>

                                            <div class="form-line">
                                                <select id="trainers" name="trainers[]" class="form-control show-tick" multiple>
                                                    @foreach (App\Staff::whereHas('account', function ($query) {

                                                        return $query->where('role', 'trainer');

                                                    })->get() as $staff)

                                                        <option value="{{ $staff->id }}"
                                                                @if ( in_array($staff->id, old('trainers', $course->trainers->modelKeys())) )
                                                                selected
                                                            @endif>{{ $staff->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'trainers'])
                                        </div>

                                        <div class="form-group">
                                            <label for="software">
                                                Recommended Software
                                            </label>

                                            <div class="form-line">
                                                <select id="software" name="software[]" class="form-control show-tick" multiple>
                                                    @foreach (App\Software::all() as $software)

                                                        <option value="{{ $software->id }}"
                                                                @if ( in_array($software->id, old('software', @$course->software->modelKeys() ?? [])) )
                                                                selected
                                                            @endif>{{ $software->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="tours">
                                                Recommended Tours
                                            </label>

                                            <div class="form-line">
                                                <select id="tours" name="tours[]" class="form-control show-tick" multiple>
                                                    @foreach (App\Tour::all() as $tour)

                                                        <option value="{{ $tour->id }}"
                                                                @if ( in_array($tour->id, old('tours', @$course->tours->modelKeys() ?? [])) )
                                                                selected
                                                            @endif>{{ $tour->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="event_types">
                                                Select Event Types
                                            </label>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'event_types'])

                                            <div class="form-group">

                                                @foreach ([
                                                    'Face to Face' => 'physical',
                                                    'Virtual' => 'virtual',
                                                    'E-learning' => 'elearning',

                                                ] as $key => $event)

                                                    <div>
                                                        <input type="checkbox" name="event_types[]" id="{{ $event }}" value="{{ $event }}" class="filled-in chk-col-red"
                                                               @if ( in_array($event, old('event_types', $course->event_types ?? [])) )
                                                               checked
                                                            @endif>

                                                        <label for="{{ $event }}">
                                                            {{ $key }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cover">
                                                Cover Image
                                            </label>

                                            <div class="form-line">
                                                <input type="file" id="cover" class="form-control" name="cover">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'cover'])
                                        </div>

                                        <!-- Banner Description -->

                                        <label>Banner Description:</label>
                                        <small>Applicable for industry courses</small>

                                        <div class="">
                                            <textarea name="banner_description" class="ckeditor">{{ old('banner_description', $course->banner_description) }}</textarea>
                                        </div>

                                        <!-- Target Audience -->

                                        <label>Target Audience:</label>
                                        <small>Applicable for industry courses</small>

                                        <div class="">
                                            <textarea name="who_should_attend" class="ckeditor">{{ old('who_should_attend', $course->who_should_attend) }}</textarea>
                                        </div>

                                        <!-- Description -->

                                        <label>Description:</label>

                                        <div class="">
                                            <textarea name="description" class="ckeditor">{{ old('description', $course->description) }}</textarea>
                                        </div>
                                        <!-- End -->

                                        <h4>Course Objectives</h4>

                                        <div class="">
                                            <textarea name="outline" class="ckeditor">{{ old('outline', $course->outline) }}</textarea>
                                        </div>

                                        <h4>Modules</h4>

                                        <div class="">
                                            <textarea name="module" class="ckeditor">{{ old('module', $course->module) }}</textarea>
                                        </div>

                                        <h4>Course Administration Details</h4>

                                        <div class="">
                                            <textarea name="adminstration_details" class="ckeditor">{{ old('adminstration_details', $course->adminstration_details) }}</textarea>
                                        </div>

                                        <hr/>

                                        <div>
                                            @can('create_edit_course')
                                                <button type="submit" class="btn btn-success">
                                                    UPDATE
                                                </button>
                                            @endcan
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>
                                SCHEDULE COURSE
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Count</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ( in_array('physical', $course->event_types) )
                                        <tr>
                                            <td>Face to Face schedule</td>
                                            <td>{{ $course->physical_classes_count }}</td>
                                            <td>
                                                <a href="{{ route('backoffice.course.physical_class.index', $course) }}" class="btn btn-sm btn-success">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @endif

                                    @if ( in_array('virtual', $course->event_types) )
                                        <tr>
                                            <td>Virtual schedule</td>
                                            <td>{{ $course->virtual_classes_count }}</td>
                                            <td>
                                                <a href="{{ route('backoffice.course.virtual_class.index', $course) }}" class="btn btn-sm btn-success">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                                @if ( in_array('elearning', $course->event_types) )

                                    <form action="{{ route('backoffice.course.elearning_class.store', $course) }}" method="POST" class="dates">

                                        @csrf

                                        <div class="form-group">
                                            <label for="website">
                                                E-learning Website
                                            </label>

                                            <div class="form-line">
                                                <input type="text" name="website" id="website" class="form-control" placeholder="Website Link" value="{{ old('website', @$course->elearningClass->website) }}">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-secondary">
                                            SAVE
                                        </button>
                                    </form>

                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>
                                ATTACH DOCUMENTS
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Count</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Documents</td>
                                        <td>{{ $course->documents_count }}</td>
                                        <td>
                                            <a href="{{ route('backoffice.course.document.index', $course) }}" class="btn btn-sm btn-success">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->

        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('backoffice/assets/js/vue-2.6.11.js') }}"></script>

    <script>
        new Vue({

            el: '#course-form',

            data: () => ({
                categories: @json( App\Category::course()->with('subcategories.topics')->get() ),
                selectedCategory: @json( old('category_id', $course->category_id) ),
                selectedSubcategory: @json( old('subcategory_id', $course->subcategory_id) ),
                selectedTopic: @json( old('topic_id', $course->topic_id) ),
            }),

            created() {

                this.selectedCategory = this.selectedCategory || this.categories[0].id;

                if ( this.selectedSubcategory == null ) {

                    let subcategory = this.selectedCategory ? this.categories.find(category => category.id == this.selectedCategory).subcategories[0] : undefined;

                    this.selectedSubcategory = subcategory ? subcategory.id : undefined;
                }
            },

            computed: {

                subcategories() {

                    return this.selectedCategory ? this.categories.find(category => category.id == this.selectedCategory).subcategories : [];
                },

                topics() {

                    if (this.subcategories.length == 0)

                        return [];

                    let subcategory = this.subcategories.find(subcategory => subcategory.id == this.selectedSubcategory);

                    return subcategory ? subcategory.topics : [];
                },
            }
        });
    </script>
@endpush
