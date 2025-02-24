<div class="card">
    <div class="header">
        <h2>
            TESTIMONIALS
        </h2>
    </div>
    <div class="body">
        <div class="py-3">
            <a class="btn btn-primary" tabindex="0" href="{{ route('backoffice.testimonials.create', ['landing_page'=>$landing_page]) }}">
                <span>Add Testimonial</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($landing_page->testimonials as $testimonial)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $testimonial->name_organization }}</td>
                            <td>
                                <a href="{{ route('backoffice.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-success">
                                    View
                                </a>
                                <form class="form-action" action="{{ route('backoffice.testimonials.destroy', $testimonial) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure to delete Landing page testimonial?') ? true : false" type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            No testimonials available
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>