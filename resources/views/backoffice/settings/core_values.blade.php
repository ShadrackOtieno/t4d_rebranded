@extends('backoffice.master')

@section('title', "Core Values")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                CORE VALUES
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
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $column_count = 0 @endphp
                                        @forelse($values as $value)
                                            @php $column_count += 1 @endphp
                                            <tr>
                                                <td>{{$column_count}}</td>
                                                <td>{{$value->title}}</td>
                                                <td>
                                                    <a href="{{route('backoffice.about.values.edit', $value->id)}}" class="btn btn-sm btn-success">Edit</a>                                                  &nbsp;

                                                    <form class="form-action" action="{{route('backoffice.about.values.destroy', $value->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure to delete Core Value') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    No core values available
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
                                ADD CORE VALUE
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <form action="{{route('backoffice.about.values.store')}}" method="post" id="course-form" enctype="multipart/form-data">

                                        <div v-if="categories.length && subcategories.length">

                                            @csrf

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="title" class="form-control" placeholder="Core Value Title" value="{{ old('title') }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
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
