@extends('backoffice.master')

@section('title', 'Add Certification Bundle')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD NEW CERTIFICATION BUNDLE
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
                                    <form action="{{ route('backoffice.certification_bundle.store') }}" method="post" id="certification-form" enctype="multipart/form-data">

                                        <div v-if="categories.length && subcategories.length">

                                            @csrf

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="code" class="form-control" placeholder="Certification Code" value="{{ old('code') }}">
                                                </div>
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

                                            <div class="form-group">
                                                <label for="certifying_body_id">
                                                    Certifying Body
                                                </label>

                                                <div class="form-line">
                                                    <select id="certifying_body_id" name="certifying_body_id" class="form-control show-tick">
                                                        @foreach (App\CertifyingBody::all() as $certifying_body)

                                                            <option value="{{ $certifying_body->id }}"
                                                            @if ( $certifying_body->id == old('certifying_body_id') )
                                                                selected
                                                            @endif>{{ $certifying_body->name }}</option>

                                                        @endforeach
                                                    </select>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'certifying_body_id'])
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
                                                            @if ( in_array($staff->id, old('trainers', [])) )
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
                                                            @if ( in_array($software->id, old('software') ?? []) )
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
                                                            @if ( in_array($tour->id, old('tours') ?? []) )
                                                                selected
                                                            @endif>{{ $tour->name }}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="certifications">
                                                    Select Certifications
                                                </label>

                                                <div class="form-line">
                                                    <select id="certifications" name="certifications[]" class="form-control show-tick" multiple>
                                                        @foreach (App\Certification::all() as $certification)

                                                            <option value="{{ $certification->id }}"
                                                            @if ( in_array($certification->id, old('certifications', [])) )
                                                                selected
                                                            @endif>

                                                                {{ $certification->name }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'certifications'])
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
                                                            @if ( in_array($event, old('event_types') ?? []) )
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

                                            <!-- Description -->

                                            <label>Description:</label>

                                            <div class="">
                                                <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>
                                            </div>
                                            <!-- End -->

                                            <h4>Certification Outline</h4>

                                            <div class="">
                                                <textarea name="outline" class="ckeditor">{{ old('outline') }}</textarea>
                                            </div>

                                            <h4>Modules</h4>

                                            <div class="">
                                                <textarea name="module" class="ckeditor">{{ old('module') }}</textarea>
                                            </div>

                                            <h4>Exam & Certification</h4>

                                            <div class="">
                                                <textarea name="exam" class="ckeditor">{{ old('exam') }}</textarea>
                                            </div>

                                            <hr/>

                                            <div>
                                                <a href="{{ route('backoffice.certification_bundle.index') }}" class="btn btn-danger">
                                                    CANCEL
                                                </a>
                                                <button type="submit" class="btn btn-success">
                                                    ADD
                                                </button>
                                            </div>

                                        </div>

                                        <div v-else>
                                            <p>
                                                Proceed to create categories with subcategories before adding a course.
                                            </p>

                                            <a href="{{ route('backoffice.course.category.create') }}">
                                                Create categories
                                            </a>
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

@push('scripts')
    <script src="{{ asset('backoffice/assets/js/vue-2.6.11.js') }}"></script>

    <script>
        new Vue({

            el: '#certification-form',

            data: () => ({
                categories: @json( App\Category::certification()->with('subcategories.topics')->get() ),
                selectedCategory: @json( old('category_id') ),
                selectedSubcategory: @json( old('subcategory_id') ),
                selectedTopic: @json( old('topic_id') ),
            }),

            created() {

                this.selectedCategory = Array.isArray(this.categories) && this.categories.length ? this.selectedCategory || this.categories[0].id : undefined;

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
