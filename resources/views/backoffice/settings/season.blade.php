@extends('backoffice.master')

@section('title', 'Seasons | Settings')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header clearfix">
                            <h2 class="pull-left">
                                SEASONS
                            </h2>

                            <a class="pull-right" style="cursor: pointer;" onclick="'{{ url()->previous() }}' == '{{ url()->current() }}' ? window.location.assign( `{{ route('backoffice.home') }}` ) : window.history.back()">
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

                                    <form action="{{ route('backoffice.season.update') }}" method="post">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="months">
                                                Low Season Months
                                            </label>

                                            @include('backoffice.partials.alerts.form_error', ['field' => 'months'])

                                            <div class="form-group">

                                                @foreach (['January', '	February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'] as $key => $month)

                                                    <div>
                                                        <input type="checkbox" name="months[]" id="{{ $key }}" value="{{ $month }}" class="filled-in chk-col-red"
                                                        @if ( in_array($month, old('months', $season->months ?? [])) )
                                                            checked
                                                        @endif> 
            
                                                        <label for="{{ $key }}">
                                                            {{ $month }}
                                                        </label>
                                                    </div>

                                                @endforeach

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="percentage">Low Season Percentage</label>

                                            <div class="form-line">
                                                <input type="number" name="percentage" id="percentage" class="form-control" value="{{ old('percentage', @$season->percentage) }}">
                                            </div>
                                            
                                            @include('backoffice.partials.alerts.form_error', ['field' => 'percentage'])
                                        </div>
    
                                        <hr/>
    
                                        <div>
                                            <button type="submit" class="btn btn-success">
                                                UPDATE
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