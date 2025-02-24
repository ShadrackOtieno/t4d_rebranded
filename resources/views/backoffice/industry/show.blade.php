@extends('backoffice.master')

@section('title', "Industries")

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @include('backoffice/partials/alerts/response_message')

                <div class="card">
                    <div class="header">
                        <h2>
                        COMPANIES: {{ strtoupper($industry->name) }}
                        </h2>
                    </div>

                    <div class="body">
                        <div class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="dataTables_filter">
                                <form action="{{ url()->current() }}" method="GET">
                                    <label>
                                        Search:
                                        <input name="search" type="search" class="form-control input-sm" value="{{ request()->query('search') }}">
                                    </label>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $count = 0 @endphp
                                    @forelse ($industry->companies as $company)
                                        @php $count += 1 @endphp
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>
                                                <a href="{{ route('backoffice.company.edit', $company) }}" class="btn btn-sm btn-secondary">Edit</a>                                                     &nbsp;

                                                @can('delete_companies')
                                                <form class="form-action" action="{{ route('backoffice.company.destroy', $company) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure to delete Company?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                No Companies added
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
        </div>
        <!-- #END# -->

    </div>
</section>
@endsection
