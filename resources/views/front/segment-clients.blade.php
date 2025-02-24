@extends('front.master')

@section('content')
<div class="main-body">

<!-- page conainer -->
<div>
    <!-- page breadcrumbs -->
    {{-- <div class="breadcrumbs">
        <span>
            <a href="{{ route('home') }}" class="fa fa-home"></a>
        </span>
        <span class="bc-sep"></span>
        <span>
            <a href="{{ route('clients') }}"> Our Alumni </a>
        </span>
        <span class="bc-sep"></span>
        <span class="bc-current-page">{{ $segment->name }} Alumni</span>
    </div> --}}

    <!-- about brief -->
    <div class="light-bg-sec lead-brief">
        <div class="container">
            <div>
                    <span class="ip-tagline">
                        <h3>{{ $segment->name }} Alumni</h3>
                        <hr/>
                    </span>

                <p>{!! $segment->description !!}</p>
                <div class="ires-tb-filter">
                    <select class="btn" name="categories" id="segments">
                        <optgroup label="Filter by Segment">
                            <option class="text-left" value="{{ route('all-clients') }}">All Segments</option>
                            @foreach (App\Segment::all() as $otherSegment)
                                <option class="text-left"
                                        value="{{ route('viewClients', $otherSegment->slug) }}"
                                    {{ $otherSegment->id == $segment->id ? 'selected' : '' }}>
                                    {{ $otherSegment->name }}
                                </option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <table id="coursesTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Sector</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END about brief -->
</div>
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            var table = $('#coursesTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                pageLength: 50,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                ajax: "{{ route('viewClients', $segment->slug) }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
                    { data: 'name', name: 'name' },
                    { data: 'sector', name: 'sector' },
                ]
            });

            //Event listener to the selected element
            $('#segments').on('change', function () {
                var selectedValue = $(this).val();

                // Reload the DataTable with the selected URL
                table.ajax.url(selectedValue).load();
            });
        });
        $.fn.dataTable.ext.errMode = 'throw';
    </script>
@endpush



