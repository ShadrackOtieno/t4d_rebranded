@extends('backoffice.master')

@section('title', "User permissions")

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
                                Edit Permission: {{$permission->label}}
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
                                    <form action="{{route('backoffice.permissions.update', $permission)}}" method="post" enctype="multipart/form-data">

                                        <div>

                                            @csrf
                                            @method('PATCH')

                                            <div class="form-group">
                                                <label>Name:</label>
                                                <div class="form-line">
                                                    <input type="text" name="name" class="form-control" placeholder="Permission Name" value="{{ $permission->name }}" required disabled>
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                            </div>

                                            <div class="form-group">
                                                <label>Label:</label>
                                                <div class="form-line">
                                                    <input type="text" name="label" class="form-control" placeholder="Permission Label" value="{{ $permission->label }}" required>
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
                    <h2>Roles Granted</h2>
                </div>

                <div class="body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            @forelse ($permission->roles as $role)
                                <div class='col-md-3'>
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="{{$role->id}}" checked disabled>
                                    <label class="form-check-label" for="{{$role->id}}">{{$role->label}}</label>
                                  </div>
                                </div>
                            @empty
                                <div class='col-md-12'>
                                    <td colspan="4" class="text-center">
                                        No role granted
                                    </td>
                                </div>
                            @endforelse
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
