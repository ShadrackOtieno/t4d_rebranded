<div class="text-left">
	@if($topics->count() > 0)
		<h3><b>Areas of Training</b></h3>
	@endif
</div>
<div class="shadow-sm ip-cat-img-new px-5 mb-3 breadcrumbs">
	<style>
.links {
            justify-content: space-between;
            padding: 2px;
            margin-top: 2px;
            margin-bottom: 5px;
			text-align: center;
			box-shadow: 5px 5px #00a651;
            display: block;
			border: inset;
			transition: background-color 0.3s, color 0.3s;
        }

        .links:hover {
            color: #00a651;
			background-color: #fff;
            font-weight: bolder;
			text-align: center;
			display: block;
			padding: 10px;
			border-radius: 5%;
			margin: 1px;
        }

		.links .active {
			background-color: #fff;
			color: #00a651;
		}

	</style>
	<hr>


	<div class="mt-3">
		<!-- search form  class="mn-searchsec" id="searchCollapse"-->
		<form action="{{ route('search') }}" method="get">
			<div class="input-group rounded">
				<p style="font-weight: bolder;">Not sure what you're looking for? Search here...</p>&nbsp;
				<input type="text" class="form-control" placeholder="Search here..." autofocus name="search" value="{{ request()->query('search') }}">
				<div class="input-group-append" >
					<button class="fa fa-2x fa-search" type="submit" ></button>
				</div>
			</div>
		</form>
		<!-- END search form -->
		<hr>
		{{-- <div>
			@foreach($topics as $course_topic)
				<a class="links active" href="{{ route('course.topic.show', $course_topic) }}"><strong>{{$course_topic->name}}</strong></a>
				<hr>
			@endforeach
		</div> --}}
		{{-- <div class="container">
            <h1 class="ip-heading">Areas of Training in {{ $topic->name }}.</h1>
			@foreach($topics as $course_topic)
                <a class="btn bc-btn btn-primary rounded-pill areas" href="{{ route('course.topic.show', $course_topic) }}"><strong>{{$course_topic->name}}</strong></a>
            @endforeach
        </div> --}}
	</div>

	<div>
		<div class="text-center">
			<h5><b>Face to Face Schedules</b></h5><hr>
		</div>
			<a class="links" href="{{ route('course.category.week', [$subcategory, $duration = '1-week']) }}">1 Week or Less</a><br>
			<a class="links" href="{{ route('course.category.weeks', [$subcategory, $duration = '2-weeks']) }}">2 Weeks and More</a><hr>

	</div>

</div>
