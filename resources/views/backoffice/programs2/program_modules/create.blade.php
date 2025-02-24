@extends('backoffice.master')

@section('title', 'Add MODULE | ' . $program->name)

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                Add {{ $program->name }} Modules
                            </h2>

                            <a class="pull-right" style="cursor: pointer;"
                                onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.programs.programs.edit', $program->id) }}` ) : window.history.back()">
                                <i class="material-icons" style="font-size: 11px;">
                                    arrow_back
                                </i>
                                Go back
                            </a>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="{{ route('backoffice.programs.add.programmodule', $program->id) }}"
                                        method="post">

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
                                        {{-- added description --}}
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <div class="">
                                                <textarea name="description" class="ckeditor"></textarea>
                                                @include('backoffice.partials.alerts.form_error', [
                                                    'field' => 'description',
                                                ])
                                            </div>
                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'description',
                                            ])
                                        </div>
                                        {{-- end of addition --}}

                                        <div class="form-group">
                                            <label>Module Level:</label>
                                            <select class="form-control" name="module_id">
                                                <option value="">Select Module Level</option>
                                                @foreach ($modules as $module)
                                                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                                                @endforeach
                                            </select>

                                            @include('backoffice.partials.alerts.form_error', [
                                                'field' => 'module_id',
                                            ])
                                        </div>
                                        <!-- End -->

                                        <hr />

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
