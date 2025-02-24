@extends('backoffice.master')

@section('title', 'Edit Staff')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                EDIT STAFF
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;"> 
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        @include('backoffice/partials/alerts/response_message')

                        <div class="body">
                            <form class="form-horizontal" action="{{ route('backoffice.staff.update', $staff) }}" method="POST">
                                
                                @csrf
                                @method('PUT')
                                
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="first_name">First Name</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="first_name" id="first_name" type="text" class="form-control" placeholder="First Name" value="{{ old('first_name', $staff->first_name) }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'first_name'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="last_name">Last Name</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last Name" value="{{ old('last_name', $staff->last_name) }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'last_name'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">E-mail Address</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="email" id="email" type="email" class="form-control" placeholder="E-mail Address" value="{{ old('email', $staff->account->email) }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'email'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="phone">Phone Number</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone Contact" value="{{ old('phone', $staff->phone) }}">
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'phone'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="role">Role</label>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="role" name="role" class="form-control show-tick">
                                                    @foreach ([
                                                        'administrator',
                                                        'accounts',
                                                        'trainer',
                                                        'staff',

                                                    ] as $role)
                                                        
                                                        <option value="{{ $role }}"
                                                        @if ( old('role', $staff->account->role) == $role )
                                                            selected
                                                        @endif>
                                                            {{ ucfirst($role) }}
                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'role'])
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                            UPDATE
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->            

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                STAFF ACCESS ROLES
                            </h2>
                        </div>

                        <div class="body">
                            <div class="dataTables_wrapper form-inline dt-bootstrap">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Access Roles</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($staff->account->roles as $role)
                                                <tr>
                                                    <td>{{ $role->label }}</td>
                                                    <td>   
                                                        <form class="form-action" action="{{route('backoffice.removeRole', $staff->account)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="role" value="{{ $role->id }}">
                                                            <button onclick="return confirm('Are you sure to delete role') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        No access roles added 
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
    
                            </div>

                            <hr>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="role">Access Role</label>
                                    </div>

                                    <form class="form-action" action="{{route('backoffice.assignRole', $staff->account)}}" method="post">

                                        @csrf                                        

                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select id="role" name="role" class="form-control show-tick">
                                                        @foreach (App\Role::all() as $role)
                                                            
                                                            <option value="{{ $role->name }}"
                                                            @if ( old('role') == $role->name )
                                                                selected
                                                            @endif>
                                                                {{ $role->label }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'role'])
                                        </div>                                        

                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                                    ADD ROLE
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END#  -->
            
        </div>
    </section>
@endsection
