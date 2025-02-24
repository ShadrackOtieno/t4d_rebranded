@if (session()->has('success'))
    <p class="alert alert-success text-center" style="color: white">
        {{ session()->get('success') }}
    </p>
@elseif (session()->has('error'))
    <p class="alert alert-danger text-center" style="color: white">
        {{ session()->get('error') }}
    </p>
@endif