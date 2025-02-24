@extends('backoffice.master')

@section('title', 'Add Pricing | '. $program->name)

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">
                            Add {{$program->name}} Prices
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
                                <form action="{{ route('backoffice.programs.add.price', $program->id)}}" method="post">

                                    @csrf
                                    <div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Learning Mode</label>
                                                <select class="form-control" name="learning_mode">
                                                    <option value="">Select Mode</option>
                                                    <option value="Virtual">Virtual</option>
                                                    <!-- <option value="Face to Face">Face to Face</option> -->
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'learning_mode'])
                                            </div>

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="ksh" class="form-control" placeholder="KSH" value="{{ old('ksh') }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'ksh'])
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Sessions</label>
                                                <select class="form-control" name="session">
                                                    <option value="">Select Session</option>
                                                    <option value="Half-Day">Half-Day</option>
                                                    <option value="Evening">Evening</option>
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'session'])
                                            </div>

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="usd" class="form-control" placeholder="USD" value="{{ old('usd') }}">
                                                </div>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'usd'])
                                            </div>
                                        </div>
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
