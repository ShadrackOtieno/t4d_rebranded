@extends('backoffice.master')

@section('title', 'Enterprise Systems')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ENTERPRISE SYSTEMS
                            </h2>
                        </div>

                        @include('backoffice/partials/alerts/response_message')
                        
                        <div class="body">

                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="dt-buttons">
                                    @can('create_edit_e_systems')
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.software.create') }}">
                                        <span>Add Enterprise System</span>
                                    </a>
                                    @endcan
                                    @can('export_data')
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.software.export') }}" target="_blank">
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
                                            @forelse ($softwares as $software)
                                                <tr>
                                                    <td>{{ $software->id }}</td>
                                                    <td>{{ ucfirst($software->name) }}</td>
                                                    <td>
                                                        @can('create_edit_e_systems')
                                                        <a href="{{ route('backoffice.software.edit', $software->slug ?? $software->id) }}" class="btn btn-sm btn-success">Edit</a> 
                                                        @endcan
                                                        &nbsp;
                                                        @can('delete_e_systems')
                                                        <form class="form-action" action="{{ route('backoffice.software.destroy', $software->slug ?? $software->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete software') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>

                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="3">
                                                        No enterprise systems available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{ $softwares->links('backoffice.partials.pagination') }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
            
        </div>
    </section>
@endsection