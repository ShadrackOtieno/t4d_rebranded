@extends('backoffice.master')

@section('title', 'Edit ' . $program->name)

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                {{ $program->name }}
                            </h2>

                            <a class="pull-right" style="cursor: pointer;"
                                onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.programs.programs.index') }}` ) : window.history.back()">
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
                                    <form action="{{ route('backoffice.programs.programs.update', $program->id) }}"
                                        method="post" id="course-form" enctype="multipart/form-data" >

                                        @csrf
                                        @method('PATCH')

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Name"
                                                    value="{{ $program->name }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'name',
                                            ])
                                        </div>



                                        <div class="form-group">
                                            <label for="image">
                                                Program Image
                                            </label>

                                            <div class="form-line">
                                                <input type="file" class="form-control" name="program_banner" >
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'program_banner',
                                            ])
                                        </div>

                                        <div class="form-group">
                                            <label for="software">
                                                Skill Type
                                            </label>

                                            <div class="form-line">
                                                <select id="skill_type" name="skill_type[]"
                                                    class="form-control show-tick select2" multiple>
                                                    @foreach (App\ProductsConfig\SkillType::all() as $skill_type)
                                                        <option value="{{ $skill_type->id }}"
                                                            @if (in_array($skill_type->id, old('skill_type', @$program->skill_types->modelKeys() ?? []))) selected @endif>
                                                            {{ $skill_type->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="software">
                                                Skill Level
                                            </label>

                                            <div class="form-line">
                                                <select id="skill_level" name="skill_level[]"
                                                    class="form-control show-tick select2" multiple>
                                                    @foreach (App\ProductsConfig\SkillLevel::all() as $skill_level)
                                                        <option value="{{ $skill_level->id }}"
                                                            @if (in_array($skill_level->id, old('skill_level', @$program->skill_levels->modelKeys() ?? []))) selected @endif>
                                                            {{ $skill_level->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="software">
                                                Target Staff
                                            </label>

                                            <div class="form-line">
                                                <select id="target_staff" name="target_staff[]"
                                                    class="form-control show-tick select2" multiple>
                                                    @foreach (App\ProductsConfig\TargetStaff::all() as $target_staff)
                                                        <option value="{{ $target_staff->id }}"
                                                            @if (in_array($target_staff->id, old('target_staff', @$program->target_staffs->modelKeys() ?? []))) selected @endif>
                                                            {{ $target_staff->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="software">
                                                PDC Stage
                                            </label>

                                            <div class="form-line">
                                                <select id="pdc_stage" name="pdc_stage[]"
                                                    class="form-control show-tick select2" multiple>
                                                    @foreach (App\ProductsConfig\PDCStage::all() as $pdc_stage)
                                                        <option value="{{ $pdc_stage->id }}"
                                                            @if (in_array($pdc_stage->id, old('pdc_stage', @$program->pdc_stages->modelKeys() ?? []))) selected @endif>
                                                            {{ $pdc_stage->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="software">
                                                BCG Level
                                            </label>

                                            <div class="form-line">
                                                <select id="bcg_level" name="bcg_level[]"
                                                    class="form-control show-tick select2" multiple>
                                                    @foreach (App\ProductsConfig\BCGLevel::all() as $bcg_level)
                                                        <option value="{{ $bcg_level->id }}"
                                                            @if (in_array($bcg_level->id, old('bcg_level', @$program->bcg_levels->modelKeys() ?? []))) selected @endif>
                                                            {{ $bcg_level->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="brochure">
                                                Program Brochure
                                            </label>

                                            <div class="form-line">
                                                <input type="file" class="form-control" name="brochure">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'brochure',
                                            ])
                                        </div>

                                        <!-- Introduction -->

                                        <h4>Meta description</h4>

                                        <div class="">
                                            <textarea name="introduction" class="ckeditor">{{ $program->introduction }}</textarea>
                                        </div>

                                        <!-- Description -->

                                        <label>Description:</label>

                                        <div class="">
                                            <textarea name="description" class="ckeditor">{{ $program->description }}</textarea>
                                        </div>
                                        <!-- End -->

                                        <!-- about -->

                                        <label>About Program:</label>

                                        <div class="">
                                            <textarea name="about" class="ckeditor">{{ $program->about }}</textarea>
                                        </div>

                                        <!-- Methodology -->

                                        <label>Methodology:</label>

                                        <div class="">
                                            <textarea name="methodology" class="ckeditor">{{ $program->methodology }}</textarea>
                                        </div>


                                        <label>Program Prerequisites:</label>

                                        <div class="">
                                            <textarea name="prerequisite" class="ckeditor">{{ $program->prerequisite }}</textarea>
                                        </div>


                                        <label>Learning Outcomes:</label>
                                        <div class="">
                                            <textarea name="outcomes" class="ckeditor">{{ $program->outcomes }}</textarea>
                                        </div>
                                        <!-- End -->

                                        <h4>Participants</h4>

                                        <div class="">
                                            <textarea name="participants" class="ckeditor">{{ $program->participants }}</textarea>
                                        </div>

                                        <h4>Alumni Information</h4>

                                        <div class="">
                                            <textarea name="alumni_information" class="ckeditor">{{ $program->alumni_information }}</textarea>
                                        </div>

                                        <h4>Related Courses</h4>

                                        <div class="">
                                            <textarea name="courses" class="ckeditor">{{ old('courses') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'courses',
                                            ])
                                        </div>
                                        <h4>Program Tools</h4>

                                        <hr />

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="tool_images">Tools Images </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
        
                                                        @include('backoffice.partials.alerts.form_error', ['field' => 'tools'])
                                                        
                                                        <input name="tools" type="file"  multiple>
                                                    </div>
                                                </div>
                                                {{-- <div class="" style="">
                                                    <div class="" style="display:flex;flex-wrap:wrap;" id="pic_purse"></div>    
                                                </div> --}}
                                            </div>
                                        </div>
                                   

                                        @can('create_edit_programs')
                                            <div>
                                                <button type="submit" class="btn btn-success">
                                                    UPDATE PROGRAM
                                                </button>
                                            </div>
                                        @endcan

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="header">
                            <h2>PROGRAM MODULES</h2>
                            @can('create_edit_programs')
                                <div style="padding-top: 5px">
                                    <a class="btn btn-primary"
                                        href="{{ route('backoffice.programs.programmodule', $program->id) }}">
                                        <span>Add Module</span>
                                    </a>
                                </div>
                            @endcan

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Module Level</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse($program->modules as $module)
                                            <tr>
                                                <td>{{ $module->name }}</td>
                                                <td>{{ $module->module->name }}</td>
                                                <td>
                                                    <a href="{{ route('backoffice.programs.edit.program-module', $module->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        Edit
                                                    </a>

                                                    &nbsp;

                                                    @can('delete_programs')
                                                        <form class="form-action"
                                                            action="{{ route('backoffice.programs.delete.program-module', $module->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                onclick="return confirm('Are you sure to delete {{ $module->name }}') ? true : false"
                                                                type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No Modules available
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="header">
                            <h2>MODULE SESSIONS</h2>
                            @can('create_edit_programs')
                                <div style="padding-top: 5px">
                                    <a class="btn btn-primary"
                                        href="{{ route('backoffice.programs.session', $program->id) }}">
                                        <span>Add Session</span>
                                    </a>
                                </div>
                            @endcan

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Module</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse($program->sessions as $session)
                                            <tr>
                                                <td>{{ $session->title }}</td>
                                                <td>{{ $session->module->name }}</td>
                                                <td>
                                                    <a href="{{ route('backoffice.programs.edit.session', $session->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        View
                                                    </a>

                                                    &nbsp;

                                                    @can('delete_programs')
                                                        <form class="form-action"
                                                            action="{{ route('backoffice.programs.delete.session', $session->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                onclick="return confirm('Are you sure to delete {{ $session->title }}') ? true : false"
                                                                type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No sessions available
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="header">
                            <h2>
                                PROGRAM INTAKES/DATES
                            </h2>

                            @can('create_edit_programs')
                                <div style="padding-top: 5px">
                                    <a class="btn btn-primary"
                                        href="{{ route('backoffice.programs.intake', $program->id) }}">
                                        <span>Add Intake</span>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse($program->intakes as $intake)
                                            <tr>
                                                <td>{{ date('j M Y', strtotime($intake->start_date)) }}</td>
                                                <td>{{ date('j M Y', strtotime($intake->end_date)) }}</td>
                                                <td>
                                                    <a href="{{ route('backoffice.programs.edit.intake', $intake->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        View
                                                    </a>

                                                    &nbsp;

                                                    @can('delete_programs')
                                                        <form class="form-action"
                                                            action="{{ route('backoffice.programs.delete.intake', $intake->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                onclick="return confirm('Are you sure to delete {{ date('j M Y', strtotime($intake->start_date)) }} Intake') ? true : false"
                                                                type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No intakes available
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2>
                                PRICING AND MODES OF STUDY
                            </h2>

                            @can('create_edit_programs')
                                <div style="padding-top: 5px">
                                    <a class="btn btn-primary" href="{{ route('backoffice.programs.price', $program->id) }}">
                                        <span>Add Mode &amp; Pricing</span>
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mode</th>
                                            <th>Session</th>
                                            <th>Fees</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse($program->prices as $price)
                                            <tr>
                                                <td>{{ $price->learning_mode }}</td>
                                                <td>{{ $price->session }}</td>
                                                <td>KSH {{ $price->ksh }}, USD {{ $price->usd }}</td>
                                                <td>
                                                    <a href="{{ route('backoffice.programs.edit.price', $price->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        View
                                                    </a>

                                                    &nbsp;

                                                    @can('delete_programs')
                                                        <form class="form-action"
                                                            action="{{ route('backoffice.programs.delete.price', $price->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                onclick="return confirm('Are you sure to delete {{ $price->learning_mode }} - {{ $price->session }} Price') ? true : false"
                                                                type="submit" class="btn btn-sm btn-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    No Prices available
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!-- #END#  -->

        </div>
    </section>
@endsection
