@extends('backoffice.master')

@section('title', "Programs")

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
                                PROGRAMS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                @can('create_edit_programs')
                                    <div class="dt-buttons">
                                        <a class="dt-button buttons-html5" tabindex="0" href="{{route('backoffice.programs.programs.create')}}">
                                            <span>Add Program</span>
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

                                        @forelse($programs as $program)
                                            <tr>
                                                <td>{{ $program->id }}</td>
                                                <td>{{ $program->name }}</td>
                                                <td>
                                                    <a href="{{route('backoffice.programs.programs.edit', $program->id)}}" class="btn btn-sm btn-secondary">Edit</a>                                            &nbsp;

                                                    @can('delete_programs')
                                                        <form class="form-action" action="{{route('backoffice.programs.programs.destroy', $program->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete {{ $program->name }}') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No programs available
                                                </td>
                                            </tr>
                                        @endforelse

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
