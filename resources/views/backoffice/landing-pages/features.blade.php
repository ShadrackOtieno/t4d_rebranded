<div class="card">
    <div class="header">
        <h2>
            FEATURES
        </h2>
    </div>
    <div class="body">
        <div class="my-3">
            <a class="btn btn-primary" tabindex="0" href="{{ route('backoffice.features.create', ['landing_page'=>$landing_page]) }}">
                <span>Add Feature</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Feature Title</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($landing_page->features as $feature)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $feature->title }}</td>
                            <td>
                                <a href="{{ route('backoffice.features.edit', $feature) }}" class="btn btn-sm btn-success">
                                    View
                                </a>
                                <form class="form-action" action="{{ route('backoffice.features.destroy', $feature) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure to delete Landing page feature?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            No features available
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>