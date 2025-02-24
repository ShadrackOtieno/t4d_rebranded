@extends('backoffice.master')

@section('title', 'Edit Session |'. $session->title)

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            Edit {{$session->title}}
                        </h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.programs.programs.edit', $session->program->id) }}` ) : window.history.back()">
                            <i class="material-icons" style="font-size: 11px;">
                                arrow_back
                            </i>
                            Go back
                        </a>
                    </div>

                    @include('backoffice/partials/alerts/response_message')

                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <form action="{{route('backoffice.programs.update.session', $session->id)}}" method="post">

                                    @csrf
                                    @method('PATCH')

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $session->title }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Module:</label>
                                                <select class="form-control" name="program_module_id">
                                                    <option value="{{$session->module->id}}">{{$session->module->name}}</option>
                                                    @foreach($modules as $module)
                                                    <option value="{{$module->id}}">{{ $module->name}}</option>
                                                    @endforeach
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'program_module_id'])
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                        </div>
                                    </div>

                                    <label>Description:</label>

                                    <div class="">
                                        <textarea name="description" class="ckeditor">{{$session->description}}</textarea>
                                        @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                    </div>
                                    <!-- End -->

                                    <hr/>

                                    @can('create_edit_programs')
                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            UPDATE SESSION
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
