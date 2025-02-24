@extends('front.master')
@section('content')
<div class="main-body">
  <div>
    <div id="carouselndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner text-center" role="listbox">
            <ul class="pt-5">
                @foreach($pages as $page)
                <li><a href='{{route('landing-page', $page->slug)}}'>{{ $page->subcategory->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
  </div>
</div>
@endsection
