<!-- filter courses -->
<div class="ires-tb-filter dropdown">
    <a class="btn dropdown-toggle" href="#" role="button" id="country-selector" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Filter courses
    </a>

    <div class="dropdown-menu" aria-labelledby="country-selector">
        <a class="dropdown-item" href="{{ route('course.virtual', ['sort' => 'title']) }}">By Title</a>
        <a class="dropdown-item" href="{{ route('course.virtual') }}">By Month</a>
    </div>
</div>
<!-- END filter courses -->