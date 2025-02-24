@extends('backoffice.master')

@section('title', 'Topics | ' . ucfirst($subcategory->name) . ' | Courses')

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @include('backoffice/partials/alerts/response_message')

                <!-- form -->

                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            ADD NEW TOPIC
                        </h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                            <i class="material-icons" style="font-size: 11px;">
                                arrow_back
                            </i>
                            Go back
                        </a>
                    </div>

                    <div class="body">
                        <form class="form-horizontal" action="{{ route('backoffice.course.subcategory.topic.store', compact('subcategory')) }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="name">Topic Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Topic Name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="slug">Slug</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="slug" id="slug" type="text" class="form-control" placeholder="URL Slug" value="{{ old('slug') }}">
                                        </div>
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'slug'])
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="description">Brief Description</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="description" id="description" class="ckeditor" placeholder="Brief Description">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="cover">Add Image</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="cover" type="file" id="cover">
                                        </div>
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'cover'])
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">ADD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- table -->

                <div class="card">
                    <div class="header">
                        <h2>
                            {{ strtoupper("$subcategory->name Topics") }}
                        </h2>
                    </div>

                    <div class="body">

                        <div class="dataTables_wrapper form-inline dt-bootstrap">
                            
                            @can('export_data')
                            <div class="dt-buttons">
                                <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.course.topic.export', $subcategory) }}" target="_blank">
                                    <span>Export to Excel</span>
                                </a>
                            </div>
                            @endcan

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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($topics as $topic)
                                        <tr>
                                            <td>{{ $topic->id }}</td>
                                            <td>{{ ucfirst($topic->name) }}</td>
                                            <td>

                                                &nbsp;

                                                <a href="{{route('backoffice.course.subcategory.topic.show', [$subcategory, $topic]) }}" class="btn btn-sm btn-primary">
                                                Courses
                                            </a>

                                            &nbsp;

                                            <a href="{{ route('backoffice.course.subcategory.topic.edit', compact('subcategory', 'topic')) }}" class="btn btn-sm btn-success">Edit</a>

                                            &nbsp;

                                            @can('delete_course')
                                            <form class="form-action" action="{{ route('backoffice.course.subcategory.topic.destroy', compact('subcategory', 'topic')) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure to delete topic') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>

                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="3">
                                            No topics available
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{ $topics->links('backoffice.partials.pagination') }}

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- #END# -->

</div>
</section>
@endsection
