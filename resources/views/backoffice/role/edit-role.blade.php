@extends('backoffice.master')

@section('title', "User Roles")

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @include('backoffice/partials/alerts/response_message')                
                    
            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                Edit Role: {{$role->label}}
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>

                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{route('backoffice.roles.update', $role)}}" method="post" enctype="multipart/form-data">

                                        <div>

                                            @csrf
                                            @method('PATCH')

                                            <div class="form-group">
                                                <label>Name:</label>
                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" placeholder="Role Name" value="{{ $role->name }}" required disabled>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>

                                            <div class="form-group">
                                                <label>Label:</label>
                                                <div class="form-line">
                                                    <input type="text" name="label" class="form-control" placeholder="Role Label" value="{{ $role->label }}" required>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'label'])
                                            </div>

                                            <hr/>

                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    UPDATE
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
            
            
            <div class="card">
                <div class="header">
                    <h2>Permissions attached to the role</h2>
                </div>

                <div class="body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            @forelse ($role->permissions as $permission)
                                <div class='col-md-3'>
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="{{$permission->id}}" checked disabled>
                                    <label class="form-check-label text-nowrap" for="{{$permission->id}}">
                                        {{$permission->label}}
                                        <form class="form-action" action="{{route('backoffice.invokePermission', $role)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="permission" value="{{ $permission->id }}">                                           
                                                <button onclick="return confirm('Are you sure to delete Permission: {{$permission->label}}?') ? true : false" type="submit" class= "btn btn-xs material-icons text-sm text-danger">delete</i>                                        
                                        </form>
                                    </label>                    
                                  </div>
                                </div>
                            @empty
                                <div class='col-md-12'>
                                    <td colspan="4" class="text-center">
                                        No permission available
                                    </td>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <form class="form-action" action="{{route('backoffice.assignPermission', $role)}}" method="post">

                        @csrf                                        

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id="permission" name="permission" class="form-control show-tick">
                                            @foreach (App\Permission::all() as $permission)
                                                
                                                <option value="{{ $permission->name }}"
                                                @if ( old('permission') == $permission->name )
                                                    selected
                                                @endif>
                                                    {{ $permission->label }}
                                                </option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @include('backoffice.partials.alerts.form_error', ['field' => 'permission'])
                            </div>   
                        </div>                                     

                        
                        <button type="submit" class="btn btn-primary waves-effect">
                            ADD PERMISSION
                        </button>
                            
                    </form>
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
