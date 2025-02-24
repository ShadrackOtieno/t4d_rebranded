@extends('backoffice.master')

@section('title', 'Edit '. $module->name )

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            Edit {{$module->name}}
                        </h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.programs.modules.index') }}` ) : window.history.back()">
                            <i class="material-icons" style="font-size: 11px;">
                                arrow_back
                            </i>
                            Go back
                        </a>
                    </div>

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <form action="{{route('backoffice.programs.modules.update', $module->id)}}" method="post">

                                        @csrf
                                        @method('PATCH')

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $module->name }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'name'])
                                        </div>

                                        <label>Description:</label>

                                        <div class="">
                                            <textarea name="description" class="form-control">{{ $module->description }}</textarea>
                                        </div>
                                        <!-- End -->

                                        <hr/>

                                        @can('create_edit_programs')
                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                UPDATE MODULE
                                            </button>
                                        </div>
                                        @endcan
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END#  -->

    </div>
</section>
@endsection
