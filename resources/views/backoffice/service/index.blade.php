@extends('backoffice.master')

@section('title', "Services")

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    @include('backoffice/partials/alerts/response_message')

                    <div class="card">
                        <div class="header">
                            <h2>SERVICES:</h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go Back
                            </a>
                        </div>

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">
                                @can('create_edit_programs')
                                    <div class="dt-buttons">
                                        <a class="dt-button buttons-html5" tabindex="0" href="{{route('backoffice.services.create')}}">
                                            <span>Add Service</span>
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
                                            <th>#</th>
                                            <th>Name</th>
                                            {{-- <th>Industries</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $count = 0 @endphp
                                        @forelse ($services as $service)
                                            @php $count += 1 @endphp
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $service->name }}</td>
                                                {{-- <td>
                                                    @foreach($service->industries as $industry)
                                                        <span class="btn btn-xs">{{ $industry->name }}</span>
                                                    @endforeach
                                                </td> --}}
                                                <td>
                                                    <a href="{{ route('backoffice.services.edit', $service) }}" class="btn btn-sm btn-secondary">Edit</a>                                                     &nbsp;

                                                    @can('delete_companies')
                                                        <form class="form-action" action="{{ route('backoffice.services.destroy', $service) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete Service?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No services available
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <!-- #END# -->
        </div>
    </section>
@endsection
