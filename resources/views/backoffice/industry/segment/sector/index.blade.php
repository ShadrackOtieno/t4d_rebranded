@extends('backoffice.master')

@section('title', 'Sectors | ' . ucfirst($segment->name) )

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>SECTORS: {{ strtoupper($segment->name) }}</h2>                        

                        <a class="pull-right" style="cursor: pointer;" onclick="window.history.back()">
                            <i class="material-icons" style="font-size: 11px;">
                                arrow_back
                            </i>
                            Go Back
                        </a>
                    </div>

                    @include('backoffice/partials/alerts/response_message')

                    <div class="body">

                        <div class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $count = 0 @endphp
                                        @forelse ($segment->sectors as $sector)
                                        @php $count += 1 @endphp
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ ucfirst($sector->name) }}</td>
                                            <td>
                                                <a href="{{ route('backoffice.sectors.show', $sector) }}" class="btn btn-sm btn-secondary">
                                                    Sub Sectors
                                                </a>

                                                &nbsp;

                                                <a href="{{ route('backoffice.sector-companies', $sector) }}" class="btn btn-sm btn-primary">
                                                   Companies
                                               </a>

                                               &nbsp;

                                               <a href="{{ route('backoffice.sectors.edit', $sector) }}" class="btn btn-sm btn-success">Edit</a>

                                               &nbsp;

                                               @can('delete_companies')
                                               <form class="form-action" action="{{ route('backoffice.sectors.destroy', $sector) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure to delete sector?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                                @endcan
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td class="text-center" colspan="3">
                                        No sectors available
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
                            ADD SECTOR
                        </h2>
                    </div>

                    <div class="body">
                        <form class="form-horizontal" action="{{ route('backoffice.sectors.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="name">Sector Name:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Sector Name" value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="segment_id">Segment:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="segment_id">
                                                <option value="{{ $segment->id }}" selected>{{$segment->name}}</option>
                                                    @foreach(App\Segment::all() as $seg)
                                                        <option value="{{ $seg->id }}"> {{ $seg->name }} </option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @include('backoffice.partials.alerts.form_error', ['field' => 'segment_id'])
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="description">Brief Description:</label>
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
