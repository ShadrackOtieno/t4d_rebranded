@extends('backoffice.master')

@section('title', 'Edit Intake |'. $intake->program->name)

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            Edit {{$intake->program->name}} Intake
                        </h2>

                        <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.programs.programs.edit', $intake->program->id) }}` ) : window.history.back()">
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
                                <form action="{{ route('backoffice.programs.update.intake', $intake->id)}}" method="post">

                                    @csrf
                                    @method('PATCH')

                                    <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                        <span class="input-group-addon">From</span>
                                        <div class="form-line">
                                            <input type="date" class="form-control" placeholder="Date start..." name="start_date" value="{{ $intake->start_date }}" min="{{ date('Y-m-d') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'start_date'])

                                        <span class="input-group-addon">to</span>
                                        <div class="form-line">
                                            <input type="date" class="form-control" placeholder="Date end..." name="end_date" value="{{ $intake->end_date }}" min="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                                        </div>

                                        @include('backoffice.partials.alerts.form_error', ['field' => 'end_date'])
                                    </div>
                                    <!-- End -->

                                    <hr/>

                                    @can('create_edit_programs')
                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            UPDATE
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
