@extends('backoffice.master')

@section('title', "About Page Sections")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ABOUT US PAGE SECTIONS
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="dataTables_filter">
                                    <form action="{{ url()->current() }}" method="GET">
                                        <label>
                                            Search:
                                            <input name="search" type="search" class="form-control input-sm" value="{{ request()->query('search') }}">
                                        </label>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Order</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $count = 0 @endphp
                                        @forelse($sections as $section)
                                            @php $count += 1 @endphp
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$section->title}}</td>
                                                <td>
                                                    {{$section->order}}
                                                </td>
                                                <td>
                                                    <a href="{{route('backoffice.about.sections.edit', $section->id)}}" class="btn btn-sm btn-success">Edit</a>                                                  &nbsp;

                                                    <form class="form-action" action="{{route('backoffice.about.sections.destroy', $section->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure to delete section') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No section available
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD SECTION
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                <form action="{{route('backoffice.about.sections.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                                    <div v-if="categories.length && subcategories.length">

                                        @csrf

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="title" class="form-control" placeholder="Section Title" value="{{ old('title') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
                                        </div>

                                        <div class="form-group">
                                            <label for="featured">
                                                Section Order:
                                            </label>
                                            <select class="form-control" aria-label="Default select example" name="order">
                                                <option selected value="Unordered">Select Value</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
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
            <!-- #END# -->

        </div>
    </section>
@endsection
