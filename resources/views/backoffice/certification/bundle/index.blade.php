@extends('backoffice.master')

@section('title', "Certification Bundles")

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
                                CERTIFICATION BUNDLES
                            </h2>
                        </div>

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="dt-buttons">
                                    
                                    @can('create_edit_certifications')
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.certification_bundle.create') }}">
                                        <span>Add Certification</span>
                                    </a>
                                    @endcan
                                    @can('export_data')
                                    <a class="dt-button buttons-html5" tabindex="0" href="{{ route('backoffice.certification_bundle.export') }}" target="_blank">
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
                                                <th>Category</th>
                                                <th>Mode of Learning</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bundles as $bundle)
                                                <tr>
                                                    <td>{{ $bundle->id }}</td>
                                                    <td>{{ $bundle->name }}</td>
                                                    <td>{{ $bundle->category->name }}</td>
                                                    <td>
                                                        {{ collect($bundle->event_types)->map( function ($type) {

                                                            switch ($type) {

                                                                case 'physical':
                                                                    $title = 'Face to Face';
                                                                    break;

                                                                case 'virtual':
                                                                    $title = 'Virtual';
                                                                    break;

                                                                case 'elearning':
                                                                    $title = 'E-learning';
                                                                    break;
                                                                
                                                                default:
                                                                    $title = '';
                                                                    break;
                                                            }

                                                            return $title;

                                                        })->join(', ', ' and ') }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('backoffice.certification_bundle.edit', $bundle) }}" class="btn btn-sm btn-secondary">Edit</a>

                                                        &nbsp;

                                                        <form class="form-action" action="{{ route('backoffice.certification_bundle.destroy', $bundle) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete certification') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        No certification bundles available
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {{ $bundles->links('backoffice.partials.pagination') }}
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