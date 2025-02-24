@extends('backoffice.master')

@section('title', 'Company Details')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT COMPANY
                            </h2>
                        </div>

                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <form action="" method="post">

                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input class="form-control" value="Company Name" disabled>
                                            </div>
                                        </div>
    
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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EMPLOYEES
                            </h2>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Total Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Current Employees</td>
                                            <td>5</td>
                                            <td>
                                                <a href="{{ route('frontend.admin.company.employee.current') }}" class="btn btn-sm btn-secondary">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Past Employees</td>
                                            <td>15</td>
                                            <td>
                                                <a href="{{ route('frontend.admin.company.employee.past') }}" class="btn btn-sm btn-secondary">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Approved Authorities</td>
                                            <td>24</td>
                                            <td>
                                                <a href="{{ route('frontend.admin.company.employee.approved_authority') }}" class="btn btn-sm btn-secondary">View</a>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection