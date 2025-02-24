@extends('backoffice.master')

@section('title', 'Edit Enterprise System')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT ENTERPRISE SYSTEM
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

                                    <form action="{{ route('backoffice.software.update', $software->id ?? $software->slug) }}" method="post" enctype="multipart/form-data" id="software-form">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $software->name) }}">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_id">Category</label>

                                            <div class="form-line">
                                                <select id="category_id" name="category_id" class="form-control" v-model="selectedCategory">
                                                    <option v-for="(category, index) in categories" :key="category-index" :value="category.id">
                                                        @{{ category.name }}
                                                    </option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'category_id'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="subcategory_id">Subcategory</label>

                                            <div class="form-line">
                                                <select id="subcategory_id" name="subcategory_id" class="form-control" v-model="selectedSubcategory">
                                                    <option v-for="(subcategory, index) in subcategories" :key="subcategory-index" :value="subcategory.id">
                                                        @{{ subcategory.name }}
                                                    </option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'subcategory_id'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="industry">Industry:</label>
                                            <select class="form-control select2" name="industries[]" id="industry" multiple>
                                                @foreach(App\ServiceIndustry::all() as $industry)
                                                    <option value="{{ $industry->id }}"
                                                            @if ( in_array($industry->id, old('industries', @$software->industries->modelKeys() ?? [])) )
                                                            selected
                                                        @endif>{{ $industry->name }}
                                                    </option>
                                                @endforeach

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'industry'])

                                            </select>
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
                                            <label for="cover">
                                                Cover
                                            </label>

                                            <div class="form-line">
                                                <input type="file" id="cover" class="form-control" name="cover">

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'cover'])
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="gallery">
                                                Gallery
                                            </label>

                                            <div class="form-line">
                                                <input type="file" id="gallery" class="form-control" name="gallery[]" multiple>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" name="featured" id="featured" class="filled-in chk-col-red"
                                                   @if ( old('featured', $software->featured) )
                                                   checked
                                                @endif>

                                            <label for="featured">
                                                Mark as featured
                                            </label>
                                        </div>

                                        <h4>Key Highlights</h4>

                                        <div class="">
                                            <textarea name="highlights" class="ckeditor">{{ old('highlights', $software->highlights) }}</textarea>
                                        </div>

                                        <!-- Description -->

                                        <label>Description:</label>

                                        <div class="">
                                            <textarea name="description" class="ckeditor">{{ old('description', $software->description) }}</textarea>
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

@push('scripts')
    <script src="{{ asset('backoffice/assets/js/vue-2.6.11.js') }}"></script>

    <script>
        new Vue({

            el: '#software-form',

            data: () => ({
                categories: @json( App\Category::software()->with('subcategories')->get() ),
                selectedCategory: @json( old('category_id', $software->category_id) ),
                selectedSubcategory: @json( old('subcategory_id', $software->subcategory_id) ),
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
                }
            }
        });
    </script>
@endpush
