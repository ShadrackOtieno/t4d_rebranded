@extends('backoffice.master')

@section('title', 'Subcategories | ' . ucfirst($category->name) . ' | Courses')

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ strtoupper($category->name) }} COURSE SUBCATEGORIES
                        </h2>
                    </div>

                    @include('backoffice/partials/alerts/response_message')

                    <div class="body">

                        <div class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="dt-buttons">
                                <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.course.category.subcategory.create', $category) }}">
                                    <span>Add Subcategory</span>
                                </a>
                                
                                @can('export_data')
                                <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.course.subcategory.export', $category) }}" target="_blank">
                                    <span>Export to Excel</span>
                                </a>
                                @endcan
                            </div>

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
                                        @forelse ($subcategories as $subcategory)
                                        <tr>
                                            <td>{{ $subcategory->id }}</td>
                                            <td>{{ ucfirst($subcategory->name) }}</td>
                                            <td>
                                                <a href="{{ route('backoffice.course.subcategory.topic.index', compact('subcategory')) }}" class="btn btn-sm btn-secondary">
                                                    Topics
                                                </a>

                                                &nbsp;

                                                <a href="{{route('backoffice.course.category.subcategory.show', [
                                               'category' => $category,
                                               'subcategory' => $subcategory
                                               ]) }}" class="btn btn-sm btn-primary">
                                                   Courses
                                               </a>

                                               &nbsp;

                                               <a href="{{ route('backoffice.course.category.subcategory.edit', [
                                               'category' => $category,
                                               'subcategory' => $subcategory
                                               ]) }}" class="btn btn-sm btn-success">Edit</a>

                                               &nbsp;
                                               @can('delete_course')
                                               <form class="form-action" action="{{ route('backoffice.course.category.subcategory.destroy', [
                                               'category' => $category,
                                               'subcategory' => $subcategory
                                               ]) }}" method="post">
                                               @csrf
                                               @method('DELETE')
                                               <button onclick="return confirm('Are you sure to delete subcategory') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td class="text-center" colspan="3">
                                        No subcategories available
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $subcategories->links('backoffice.partials.pagination') }}

                </div>

            </div>
        </div>
    </div>
</div>
<!-- #END# -->

</div>
</section>
@endsection
