@extends('backoffice.master')

@section('title', 'Add Session |'. $program->name)

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            Add {{$program->name}} Sessions
                        </h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.programs.programs.edit', $program->id) }}` ) : window.history.back()">
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
                                <form action="{{ route('backoffice.programs.add.session', $program->id)}}" method="post">

                                    @csrf

                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'title'])
                                    </div>

                                    <div class="form-group">
                                        <label>Module</label>
                                        <select class="form-control" name="program_module_id">
                                            <option value="">Select Module</option>
                                            @foreach($modules as $module)
                                            <option value="{{$module->id}}">{{ $module->name}}</option>
                                            @endforeach
                                        </select>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'program_module_id'])
                                    </div>

                                    <label>Description:</label>

                                    <div class="">
                                        <textarea name="description" class="ckeditor"></textarea>
                                        @include('backoffice.partials.alerts.form_error', ['field' => 'description'])
                                    </div>
                                    <!-- End -->

                                    <hr/>

                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            ADD
                                        </button>
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
</section>
@endsection
