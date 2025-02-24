@extends('backoffice.master')

@section('title', 'Brochure Downloads Contacts ')

@section('content')
<section class="content">
    <div class="container-fluid">

        <!-- Start -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header clearfix">
                        <h2 class="pull-left">Brochure Downloads</h2>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($downloads as $download)
                                <tr>
                                    <td>{{$download->name}}</td>
                                    <td>{{$download->email}}</td>
                                    <td>{{$download->phone}}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        No downloads available
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <p class="text-center">{{$downloads->links()}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END#  -->

    </div>
</section>
@endsection
