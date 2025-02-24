@extends('backoffice.master')

@section('title', 'Sub Sectors | ' . ucfirst($sector->name))

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    @include('backoffice/partials/alerts/response_message')

                    <!-- table -->

                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ strtoupper("SUB-SECTORS: $sector->name") }}
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go Back
                            </a>
                        </div>

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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($sector->subsectors as $subsector)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst($subsector->name) }}</td>
                                                <td>                                                  &nbsp;

                                                    <a href="{{ route('backoffice.sub-sectors.show', $subsector) }}" class="btn btn-sm btn-primary">
                                                        Industries</a>

                                                    <a href="{{route('backoffice.subsector-companies', $subsector)}}" class="btn btn-sm btn-primary">
                                                        Companies</a>                                           &nbsp;

                                                    <a href="{{ route('backoffice.sub-sectors.edit', $subsector) }}" class="btn btn-sm btn-success">Edit</a>                                            &nbsp;

                                                    @can('delete_companies')
                                                        <form class="form-action" action="{{ route('backoffice.sub-sectors.destroy', $subsector) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure to delete subsector?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="3">
                                                    No sub-sectors available
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- form -->

                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD SUB-SECTOR
                            </h2>
                        </div>

                        <div class="body">
                            <form class="form-horizontal" action="{{ route('backoffice.sub-sectors.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="name">Sub-sector Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="name" id="name" type="text" class="form-control" placeholder="Sub-sector Name" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="sector_id">Sector:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="sector_id">
                                                    <option value="{{ $sector->id }}" selected>{{$sector->name}}</option>
                                                    @foreach(App\Sector::all() as $seg)
                                                        <option value="{{ $seg->id }}"> {{ $seg->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'sector_id'])
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
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# -->

        </div>
    </section>
@endsection
