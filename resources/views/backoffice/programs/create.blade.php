@extends('backoffice.master')

@section('title', 'Add PROGRAM')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                ADD PROGRAM
                            </h2>

                            <a class="pull-right" style="cursor: pointer;"
                                onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.programs.programs.index') }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{ route('backoffice.programs.programs.store') }}" method="post"
                                        enctype="multipart/form-data">

                                        @csrf

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Name"
                                                    value="{{ old('name') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'name',
                                            ])
                                        </div>
                                        <div class="form-group">
                                            <label for="cover">
                                                cover
                                            </label>
                                            <div class="form-line">
                                                <input type="file" name="cover" class="form-control"
                                                    placeholder="Cover" value="{{ old('Cover') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'cover',
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
                                                            @if (in_array($skill_type->id, old('skill_type') ?? [])) selected @endif>
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
                                                            @if (in_array($skill_level->id, old('skill_level') ?? [])) selected @endif>
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
                                                            @if (in_array($target_staff->id, old('target_staff') ?? [])) selected @endif>
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
                                                            @if (in_array($pdc_stage->id, old('pdc_stage') ?? [])) selected @endif>
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
                                                            @if (in_array($bcg_level->id, old('bcg_level') ?? [])) selected @endif>
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
                                            <textarea name="introduction" class="ckeditor">{{ old('introduction') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'introduction',
                                            ])
                                        </div>

                                        <!-- Description -->

                                        <label>Description:</label>

                                        <div class="">
                                            <textarea name="description" class="ckeditor">{{ old('description') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'description',
                                            ])
                                        </div>

                                        <!-- End -->
                                        {{-- about program --}}
                                        <label>About Program:</label>

                                        <div class="">
                                            <textarea name="about" class="ckeditor">{{ old('about') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'about',
                                            ])
                                        </div>
                                        {{-- methodlogy --}}
                                        <label>Methodology:</label>

                                        <div class="">
                                            <textarea name="methodology" class="ckeditor">{{ old('methodology') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'methodology',
                                            ])
                                        </div>
                                          {{-- objectives --}}
                                          <label>Program Objectives:</label>

                                          <div class="">
                                              <textarea name="objective" class="ckeditor">{{ old('objective') }}</textarea>
                                              @include('backoffice.partials.alerts.form_error', [
                                                  'field' => 'objective',
                                              ])
                                          </div>

                                        <label>Program Prerequisites:</label>

                                        <div class="">
                                            <textarea name="prerequisite" class="ckeditor">{{ old('prerequisits') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'prerequisite',
                                            ])
                                        </div>

                                        <label>Learning Outcomes:</label>
                                        <div class="">
                                            <textarea name="outcomes" class="ckeditor">{{ old('outcomes') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'outcomes',
                                            ])
                                        </div>
                                        {{-- end --}}

                                        <h4>Participants</h4>

                                        <div class="">
                                            <textarea name="participants" class="ckeditor">{{ old('participants') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'participants',
                                            ])
                                        </div>

                                        <h4>Alumni Information</h4>

                                        <div class="">
                                            <textarea name="alumni_information" class="ckeditor">{{ old('alumni_information') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'alumni_information',
                                            ])
                                        </div>

                                        <h4>Related Courses</h4>

                                        <div class="">
                                            <textarea name="courses" class="ckeditor">{{ old('courses') }}</textarea>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'courses',
                                            ])
                                        </div>
                                        {{-- tech stack --}}




                                        {{-- <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tool_name" class="form-control" placeholder="Tools used" value="{{ old('tool_name') }}">
                                            </div>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'tool_name'])
                                        </div> --}}

                                        <div class="form-group">
                                            <label for="software">
                                                Select Tech stacks Associated
                                            </label>

                                            <div class="form-line">
                                                <select id="Tech_stacks" name="TechStack[]"
                                                    class="form-control show-tick select2" multiple>
                                                    @foreach (App\TechStack::all() as $tech)
                                                        <option value="{{ $tech->id }}"
                                                            @if (in_array($tech->id, old('TechStack') ?? [])) selected @endif>
                                                            {{ $tech->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <hr />

                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                ADD PROGRAM
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
