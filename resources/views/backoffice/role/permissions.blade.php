@extends('backoffice.master')

@section('title', "User Permissions")

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @include('backoffice/partials/alerts/response_message')

                <div class="card">
                    <div class="header">
                        <h2>User Access Permissions</h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                            <i class="material-icons" style="font-size: 11px;">
                                arrow_back
                            </i>
                            Go back
                        </a>
                    </div>

                    <div class="body">
                        <div class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Label</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $count = 0 @endphp
                                    @forelse (App\Permission::all() as $permission)
                                        @php $count += 1 @endphp
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->label }}</td>
                                            <td>
                                                <a href="{{ route('backoffice.permissions.edit', $permission) }}" class="btn btn-sm btn-secondary">Edit</a>                                                     &nbsp;

                                                <form class="form-action" action="{{ route('backoffice.permissions.destroy', $permission) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure to delete permission?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                No permissions available
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
                    

<!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                Add User Permission
                            </h2>

                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.permissions.store')}}" method="post" enctype="multipart/form-data">

                                        <div>

                                            @csrf

                                            <div class="form-group">
                                                <label>Name:</label>
                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" placeholder="Permission Name" value="{{ old('name') }}" required>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>

                                            <div class="form-group">
                                                <label>Label:</label>
                                                <div class="form-line">
                                                    <input type="text" name="label" class="form-control" placeholder="Permission Label" value="{{ old('label') }}" required>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'label'])
                                            </div>

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
            <!-- #END#  -->


                </div>
            </div>
        </div>
        <!-- #END# -->

    </div>
</section>
@endsection
