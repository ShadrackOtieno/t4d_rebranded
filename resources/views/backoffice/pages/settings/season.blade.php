@extends('backoffice.master')

@section('title', 'Seasons | Settings')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <!-- Start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SEASONS
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <form action="" method="post">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="low_months">
                                                Low Season Months
                                            </label>

                                            <div class="form-line">
                                                <select id="low_months" name="low_months" class="form-control show-tick" multiple>
                                                    @foreach (['January', '	February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'] as $key => $month)

                                                        <option value="{{ $month }}"
                                                        @if ($key % 2 == 0)
                                                            selected
                                                        @endif>
                                                            {{ $month }}
                                                        </option>

                                                    @endforeach
                                                </select>

                                                @include('backoffice.partials.alerts.form_error', ['field' => 'low_months'])
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="low_percentage">Low Season Percentage</label>

                                            <div class="form-line">
                                                <input type="number" name="low_percentage" id="low_percentage" class="form-control" value="5">
    
                                                @include('backoffice.partials.alerts.form_error', ['field' => 'low_percentage'])
                                            </div>
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