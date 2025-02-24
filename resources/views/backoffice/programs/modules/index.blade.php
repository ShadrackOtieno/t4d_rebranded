@extends('backoffice.master')

@section('title', "Module Levels")

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @include('backoffice/partials/alerts/response_message')

                <div class="card">
                    <div class="header">
                        <h2>
                            PROGRAM MODULE LEVELS
                        </h2>
                    </div>

                    <div class="body">
                        <div class="dataTables_wrapper form-inline dt-bootstrap">
                            @can('create_edit_programs')
                            <div class="dt-buttons">
                                <a class="dt-button buttons-html5" tabindex="0" href="{{route('backoffice.programs.modules.create')}}">
                                    <span>Add Module Level</span>
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
                                        @forelse($modules as $module)
                                        <tr>
                                            <td>{{ $module->id }}</td>
                                            <td>{{ $module->name }}</td>
                                            <td>
                                                <a href="{{route('backoffice.programs.modules.edit', $module->id)}}" class="btn btn-sm btn-secondary">View</a>

                                                &nbsp;

                                                @can('delete_programs')
                                                <form class="form-action" action="{{route('backoffice.programs.modules.destroy', $module->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure to delete {{ $module->name }}') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                No modules available
                                            </td>
                                        </tr>
                                        @endforelse()
                                    </tbody>
                                </table>
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
